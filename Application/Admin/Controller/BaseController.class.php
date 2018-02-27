<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    protected $_admin = array();
    protected function _initialize(){
        $this->_admin = session('admin');
      
        if (strtolower(CONTROLLER_NAME) != 'login' && strtolower(CONTROLLER_NAME) != 'public') { 
            if (empty($this->_admin)) {
                header("Location: " . U('login/index'));
                die;
            }
            $this->assign('admin',$this->_admin);
            
            $nownav['m']=strtolower(CONTROLLER_NAME );
            $nownav['a']=strtolower(ACTION_NAME);
                
           
            $this->assign('nownav',$nownav);
            
            //权限处理
            if ($this->_admin['role'] != 0) {
                
                $this->_admin['menu_list'] = D('Access')->getMenuIdsByRoleId($this->_admin['role']);	
                
                $menu_action = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
                $menu = D('Treenode')->fetchAll();
                $menu_id = 0;
				
				foreach($this->_admin['menu_list'] as $val)
				{

					
					foreach ($menu as $k => $v) {
						if($v['id']==$val['node_id'])
						{
							if (($v['m'].'/'.$v['a']) == $menu_action) {

								$menu_id = (int) $k;
								
								break;
							}
						}
					
						
					}
                }
					
				
				
                
                if (empty($menu_id)||$menu_id==0) {
                	
                    $this->error('很抱歉您没有权限操作模块:' . $menu[$menu_id]['title']);
                }
            }
            $this->loadMenu();
        }

    }
    
    private  function  loadMenu(){
       
       foreach ($this->_admin['menu_list'] as  $v) {
       	$node_id[]=$v['node_id'];
       }
        //超级管理员
        if($this->_admin['role'] == 0){
            $menu=D('Treenode')->where(array("menuflag"=>1,'status'=>1))->order('sort')->select();
            $this->assign('menu',$menu);
        }else{

            $menu=D('Treenode')->where(array("id"=>array('IN',$node_id),"menuflag"=>1,'status'=>1))->order('sort')->select();
            $this->assign('menu',$menu);

        }

    }
    
    protected function checkFields($data = array(), $fields = array()) {
        foreach ($data as $k => $val) {
            if (!in_array($k, $fields)) {
                unset($data[$k]);
            }
        }
        return $data;
    }
   
}