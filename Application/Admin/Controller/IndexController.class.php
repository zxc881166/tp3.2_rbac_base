<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {
	public function index() {
		$this -> display();
	}

	public function pwd() {
		$User = M('admin');
		$user2 = session('admin');
		if ($_POST) {
			$data['user'] = I('post.user');
			$data['password'] = md5(I('post.oldpassword'));
			$newpassword = md5(I('post.newpassword'));
			$repassword = md5(I('post.repassword'));
			$result = $User -> where($data) -> find();

			if ($result) {
				if ($newpassword != $repassword) {
					$this -> error("两次输入新密码不一致");
				} else {
					$msg = $User -> where($data) -> setField('password', $newpassword);
					if ($msg) {
						$this -> success("修改成功", U('Login/index'));
						return;
					} else {
						$this -> error("修改失败");
						return;
					}
				}
			} else {
				$this -> error("账号或密码不正确");
			}
		}
		$this -> assign('user2', $user2);
		$this -> display();
	}

	public function del() { 
           
		delFileByDir(APP_PATH.'Runtime/');
		$this->success('删除缓存成功！',U('index/index'));
	}

}
