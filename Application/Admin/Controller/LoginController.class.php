<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends BaseController {
    public function index(){
        $this->display();
    }
    public function dologin(){
       
        $username = I('post.user');
        $password = md5(I('post.password')) ;

        if(empty($username)||empty($password)){
                $data['error']=1;
                $data['msg']="请输入帐号密码";
                $this->ajaxReturn($data);

        }
        $map = array();
        $map['user'] = $username;
        $map['state'] = 1;
        
        $admin=D('admin');
     
        
        $adminInfo=$admin->where($map)->find();
          
        if($adminInfo){
            
            if($adminInfo['password']!=$password){
                $data['error']=1;
                $data['msg']='帐号密码不正确';
                $this->ajaxReturn($data);
            }
  
            session('last_login_time',date('Y-m-d H:i:s',$adminInfo['last_logintime']));
            session('ip',$adminInfo['last_loginip']);
            session('admin',$adminInfo);
            $data = array();
            $data['last_logintime']=time();
            $data['last_loginip']="127.0.0.1";
            $admin->where(array('id'=>$adminInfo['id']))->save($data);
            $data1['error']=0;
            $data1['url']=U('Index/index');
            $this->ajaxReturn($data1);

        }else{
                $data['error']=1;
                $data['msg']='帐号不存在或者被禁用';
                $this->ajaxReturn($data);

        }
    }
	
    public function loginout(){
        session('admin',null);
        redirect(U('Login/index'));
    }
}