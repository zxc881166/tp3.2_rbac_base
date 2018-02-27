<?php
namespace Admin\Controller;
use Think\Controller;
class SystemController extends BaseController {
	//角色
	private $createrole_fields = array('name', 'status', 'remark', 'pid');
	private $editrole_fields = array('name', 'status', 'remark');
	//用户
	private $createuser_fields = array('user', 'password', 'username', 'userimg', 'role', 'note', 'state', 'add_time', 'last_logintime', 'last_loginip');
	private $edituser_fields = array('user', 'role', 'username', 'userimg', 'note', 'state', 'update_time');
	//系统消息
	private $createnotice_fields = array('title', 'message', 'addtime');
	private $editnotice_fields = array('title', 'info', 'update_time');

	public function role() {
		$role = D('role');
		$count = $role -> count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p -> show();
		$list = $role -> page(I('get.p')) -> order('id desc') -> limit(C('PAGE_SIZE')) -> select();
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> assign('list', $list);
		$this -> display();
	}

	public function userlist() {
		$role = D('role');
		$admin = D('admin');
		$count = $admin ->where('role != 0') -> count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p -> show();
		$list = $admin ->where('role != 0') -> page(I('get.p')) -> order('id desc') -> limit(C('PAGE_SIZE')) -> select();
		$list2 = $role -> select();
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> assign('list', $list);
		$this -> assign('list2', $list2);
		$this -> display();
	}

	public function setting() {
		$access = D('access');
		$treenode = D('treenode');
		if ($_POST) {
			$ID = I('post.id');
			$getrule = I('post.rule');
			$access -> where(array('role_id' => $ID)) -> delete();
			for ($i = 0; $i < count($getrule); $i++) {
				$data['role_id'] = $ID;
				$data['node_id'] = $getrule[$i];
				$result = $access -> add($data);
			}
			//$getruel 是一个数组
			//$getrules = implode(',', $getrule) . ',';
			//$result = $access->where('role_id=' . $ID . '')->setField('node_id', $getrules);
			if ($result) {
				$this -> success("权限修改成功", U('System/role'), 2);
			} else {
				$this -> error("权限修改失败.....");
			}
		}
		//$msg = $group ->where('id = '.$id.'' )->find();
		//$this->assign('array',$msg);
		else {
			$id = I('get.id');
			$nodeids = $access -> where('role_id = ' . $id . '') -> field('node_id') -> select();
			$ids;
			foreach ($nodeids as $val) {
				$ids = '#' . $ids . $val['node_id'] . '#';
			}

			$data = $treenode -> field('id,title,pid,menuflag') -> select();
			$this -> assign('list', $data);
			$this -> assign('group', $ids);
			$this -> assign('role', $id);
			$this -> display();
		}
	}

	public function addrole() {
		if (IS_POST) {
			$data = $this -> addroleCheck();
			$obj = D('role');

			if ($obj -> add($data)) {
				$this -> success("保存成功", U('System/role'));
				return;
			} else {
				$this -> error('操作失败！');
				return;
			}
		}
		$this -> display();
	}

	private function addroleCheck() {
		$param = I('post.');
		$data = $this -> checkFields($param["data"], $this -> createrole_fields);
		$data['name'] = trim(I('post.name', '', 'htmlspecialchars'));
		if ( D('role') -> getRoleName($data['name'])) {
			$this -> error('角色名已经存在');
			exit ;
		}
		if (empty($data['name'])) {
			$this -> error('角色名不能为空');
		}
		if (htmlspecialchars($data['status']) == "启用") {
			$data['status'] = 1;
		}
		if (htmlspecialchars($data['status']) == "停用") {
			$data['status'] = 0;
		}
		$data['remark'] = trim(I('post.remark', '', 'htmlspecialchars'));
		$data['pid'] = 0;
		return $data;
	}

	public function adduser() {
		$role = D('role');
		$list = $role -> where(array('status' => 1)) -> select();
		if (IS_POST) {
			$data = $this -> adduserCheck();
			$obj = D('admin');
			$user = M('role_user');
			$result = $obj -> add($data);
			if ($result) {
				$data2['role_id'] = htmlspecialchars($data['role']);
				$data2['user_id'] = $result;
				$user -> add($data2);
				$this -> success("保存成功", U('System/userlist'));
				return;
			} else {
				$this -> error('操作失败！');
				return;
			}
		}
		$this -> assign('list', $list);
		$this -> display();
	}

	private function adduserCheck() {
		$param = I('post.');
		$data = $this -> checkFields($param["data"], $this -> createuser_fields);
		$add_time = strtotime(date("Y-m-d H:i:s", time()));
		$ip = get_client_ip();
		$data['user'] = trim(I('post.user', '', 'htmlspecialchars'));
		if ( D('admin') -> getAdminName($data['user'])) {
			$this -> error('用户名已经存在');
			exit ;
		}
		if (empty($data['user'])) {
			$this -> error('用户名不能为空');
		}
		$data['password'] = trim(I('post.password', '', 'htmlspecialchars'));
		if (empty($data['password'])) {
			$this -> error('密码不能为空');
		}
		$data['password'] = md5($data['password']);
		$data['role'] = htmlspecialchars($data['role']);
		$data['note'] = trim(I('post.note', '', 'htmlspecialchars'));
		$data['username'] = trim(I('post.username', '', 'htmlspecialchars'));
		$data['userimg'] = trim(I('post.userimg', '', 'htmlspecialchars'));
		if (htmlspecialchars($data['state']) == "正常") {
			$data['status'] = 1;
		}
		if (htmlspecialchars($data['state']) == "停用") {
			$data['status'] = 0;
		}
		$data['add_time'] = $add_time;
		$data['last_logintime'] = $add_time;
		$data['last_loginip'] = $ip;
		return $data;
	}

	public function editrole($id = 0) {
		if ($id = (int)$id) {
			$obj = D('role');
			if (!$detail = $obj -> find($id)) {
				$this -> error('请选择要编辑的角色');
			}
			if (IS_POST) {
				$data = $this -> editroleCheck();
				$data['id'] = $id;
				if ($obj -> save($data)) {
					$this -> success('操作成功', U('System/role'));
				} else {
					$this -> error('操作失败');
				}
			} else {
				$this -> assign('detail', $detail);
				$this -> display();
			}
		} else {
			$this -> error('请选择要编辑的角色');
		}
	}

	private function editroleCheck() {
		$param = I('post.');
		$data = $this -> checkFields($param['data'], $this -> editrole_fields);
		$data['name'] = trim(I('post.name', '', 'htmlspecialchars'));
		if (empty($data['name'])) {
			$this -> error('角色名不能为空');
		}
		$data['remark'] = trim(I('post.remark', '', 'htmlspecialchars'));
		$data['status'] = htmlspecialchars($data['status']);
		return $data;
	}

	public function edituser($id = 0) {
		if ($id = (int)$id) {
			$obj = D('admin');
			$role = D('role');
			$user = M('role_user');
			$list = $role -> select();
			if (!$detail = $obj -> find($id)) {
				$this -> error('请选择要编辑的用户');
			}
			if (IS_POST) {
				$data = $this -> edituserCheck();
				$data['id'] = $id;
				if ($obj -> save($data)) {
					$data2['role_id'] = htmlspecialchars($data['role']);
					$user -> where(array('user_id' => $id)) -> save($data2);
					$this -> success('操作成功', U('System/userlist'));
				} else {
					$this -> error('操作失败');
				}
			} else {
				$this -> assign('list', $list);
				$this -> assign('detail', $detail);
				$this -> display();
			}
		} else {
			$this -> error('请选择要编辑的用户');
		}
	}

	private function edituserCheck() {
		$param = I('post.');
		$data = $this -> checkFields($param['data'], $this -> edituser_fields);
		$update_time = strtotime(date("Y-m-d H:i:s", time()));
		$data['user'] = trim(I('post.user', '', 'htmlspecialchars'));
		if (empty($data['user'])) {
			$this -> error('用户名不能为空');
		}
		$data['role'] = htmlspecialchars($data['role']);
		$data['note'] = trim(I('post.note', '', 'htmlspecialchars'));
		$data['state'] = htmlspecialchars($data['state']);
		$data['username'] = trim(I('post.username', '', 'htmlspecialchars'));
		$data['userimg'] = trim(I('post.userimg', '', 'htmlspecialchars'));
		$data['update_time'] = $update_time;
		return $data;
	}

	public function delrole() {
		$role = D('role');
		$id = I('get.id');
		$result = $role -> where('id =' . $id . '') -> delete();
		if ($result) {
			$this -> success('删除成功', U('System/role'));
		} else {
			$this -> error('删除失败');
		}
	}

	public function deluser() {
		$admin = D('admin');
		$id = I('get.id');
		$result = $admin -> where('id =' . $id . '') -> delete();
		if ($result) {
			$this -> success('删除成功', U('System/userlist'));
		} else {
			$this -> error('删除失败');
		}
	}

	//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
	/*
	 * 系统消息
	 */
	public function indexNotice() {
		$notice = D('message_text');
		$count = $notice -> where(array('type'=>1)) -> count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p -> show();
		$list = $notice -> where(array('type'=>1)) -> page(I('get.p')) -> order('addtime desc') -> limit(C('PAGE_SIZE')) -> select();
		$this -> assign('page', $show);
		// 赋值分页输出
		$this -> assign('list', $list);
		$this -> display();
	}

	public function addNotice() {
		$id = I('id','');
		if (IS_POST) {
			$data = $this -> addCheck();
			if($data['id']){
				$res = M('message_text')->save($data);
				if($res){
					$this -> success("保存成功", U('System/indexNotice'));
				}else{
					$this -> error('操作失败！');
				}
			}else{
				M()->startTrans();
				$data['addtime'] = time();
				$id = M('message_text')->add($data);
				$num = M('user')->order('uid desc')->getField('uid');
				$sql= 'insert into web_message (mid,uid,addtime) values';
				$time = time();
				for($i = 1; $i <= intval($num); $i++){
					$sql .= "($id,$i,$time),";
				}
				$sql = substr($sql,0,-1);
				$res = M()->execute($sql);

				if ($id && $res) {
					M()->commit();
					$this -> success("保存成功", U('System/indexNotice'));
				} else {
					M()->rollback();
					$this -> error('操作失败！');
				}
			}
		}
		$info = M('message_text')->find($id);
		$this->assign('info',$info);
		$this -> display();
	}

	private function addCheck() {
		$param = I('post.');
		if (empty(trim($param['title']))) {
			$this -> error('消息标题不能为空');
		}
		if (empty(trim($param['message']))) {
			$this -> error('消息内容不能为空');
		}
		$param['title'] = trim($param['title']);
		$param['message'] = trim($param['message']);
		$param['type'] = 1;	//系统消息
		return $param;
	}

	public function delNotice() {
		$notice = D('message_text');
		$id = I('get.id');
		$result = $notice -> where('id =' . $id . '') -> delete();
		if ($result) {
			$this -> success('删除成功', U('System/indexNotice'));
		} else {
			$this -> error('删除失败');
		}
	}

	/*******************************************轮播管理*********************************************/

    /*
     * 轮播列表
     */
    public function carousel_list()
    {
		$carousel_list = D('carousel_list');		
		$count = $carousel_list -> count();
		$p = getpage($count, C('PAGE_SIZE'));
		$show = $p -> show();
		$list = $carousel_list -> page(I('get.p')) -> limit(C('PAGE_SIZE')) ->order('orderby')-> select();
		$this -> assign('list', $list);
		$this -> assign('page', $show);
		$this -> display();
    }

    /*
     * 添加轮播操作
     */
    public function runadd()
    {
        if (!IS_AJAX) {
            $this->error('提交方式不正确', 0, 0);
        } else {

            $file = I('file0');//获取图片路径
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath = './Uploads/carousel/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->saveRule = 'time';
            $info = $upload->upload();

            if ($info) {
                $img_url = '/carousel/' . $info[file0][savepath] . $info[file0][savename];//如果上传成功则完成路径拼接

            } elseif (!$file) {
                $img_url = '';//否则如果字段为空，表示没有上传任何文件，赋值空
            } else {
                $this->error($upload->getError());//否则就是上传错误，显示错误原因
            }
          

            $data = array(
                'id' => I('id'),
                'title' => I('title'),
                'img' => $img_url,
                'state' => I('state'),
            	'orderby' => I('orderby'),
            	'note' => I('note'),
                'addtime' => time(),

            );

            M('carousel_list')->add($data);
            $this->success('轮播添加成功', U('carousel_list'), 1);
        }
    }



    /*
     * 修改轮播
     */
    public function editcarousel()
    {
        
        $id = I('id');
        $list = M('carousel_list')->where(array('id' => $id))->find();
        $this->assign('list', $list);
        $this->display();

    }

    /*
     * 修改轮播操作
     */
    public function runeditcarousel()
    {
        if (!IS_AJAX) {
            $this->error('提交方式不正确', 0, 0);
        } else {

            $file = I('file1');//获取图片路径
            $checkpic = I('checkpic');
            $oldcheckpic = I('oldcheckpic');

            if ($checkpic != $oldcheckpic) {

                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/carousel/'; // 设置附件上传根目录
                $upload->savePath = ''; // 设置附件上传（子）目录
                $upload->saveRule = 'time';
                $info = $upload->upload();

                if ($info) {
                    $img_url = '/carousel/' . $info[file0][savepath] . $info[file0][savename];//如果上传成功则完成路径拼接
                } else {
                    $this->error($upload->getError());//否则就是上传错误，显示错误原因
                }
            }

            $data = array(
                'id' => I('id'),
                'title' => I('title'),
                'state' => I('state'),
                'orderby' => I('orderby'),
                'note' => I('note'),
            );
            if ($checkpic != $oldcheckpic) {
                $data['img'] = $img_url;
            }

            M('carousel_list')->save($data);
            $this->success('轮播修改成功', U('carousel_list'), 1);
        }
    }

    /*
     * 删除轮播
     */
    public function del()
    {
        $id = I('id');
        M('carousel_list')->where(array('id' => $id))->delete();
        $this->redirect('carousel_list', array('p' => $p));
    }


    /*******************************************菜单管理************************************************/
    //菜单列表
    public function navlist(){
    	$list = M('treenode')->where(array('menuflag'=>1,'pid'=>1,'status'=>1))->order('sort')->select();
    	foreach ($list as $key => $value) {
    		$list[$key]['sublist'] = M('treenode')->where(array('menuflag'=>1,'pid'=>$value['id'],'status'=>1))->order('sort')->select();
    	}
    	$this->assign('list',$list);
    	// dump($list);die;
    	$this->display();
    }

    //添加菜单 / 修改菜单
    public function addnav() {
    	if(IS_POST){
    		$param = I('post.');
    		$gma = explode('/', $param['gma']);
    		$data = array(
    			'id' => $param['id'],
    			'title' => $param['title'],
    			'ico' => $param['ico'] == '' ? '' : 'fa fa-'.$param['ico'],
    			'sort' => $param['sort'],
    			'g' => $gma[0],
    			'm' => $gma[1],
    			'a' => $gma[2],
    			'pid' => $param['pid'] == '' ? 1 : $param['pid'],
    			'single' => $param['pid'] == '' ? 1 : 0 //是否单节点
    		);
    	
    		if(empty($param['id'])){
    			//添加子菜单, 修改父菜单节点
    			$single = M('treenode')->where(array('id'=>$data['pid']))->getField('single');
    			if($single == 1){
    				M('treenode')->where(array('id'=>$data['pid']))->save(array('single'=>0));
    			}
	    		M('treenode')->add($data);
	            $this->success('菜单添加成功', U('navlist'), 1);
    		}else{
    			$data['single'] = $data['id'] == 2 ? 1 : $data['single'];
    			M('treenode')->save($data);
	            $this->success('菜单修改成功', U('navlist'), 1);
    		}

    	}
    }

    //删除菜单
    public function del_nav(){
    	$id = I('id','');
    	$mark = M('treenode')->where(array('pid'=>$id))->select();
    	// echo M()->_sql();die;
    	// var_dump($mark);die;
    	if($mark){
    		$this->error('请先删除子菜单',U('navlist'));
    	}
    	$res = M('treenode')->where(array('id'=>$id))->delete();
    	if($res){
    		$this->success('删除成功');
    	}else{
    		$this->error('删除失败');
    	}
    }
}
