<?php

namespace Admin\Controller;
use Think\Controller;
class SiteController extends BaseController {
    
    public function _empty(){
        $this->assign("info","不存在操作方法:".ACTION_NAME);
        $this->display( 'Public:error' );
    }
    public function index(){
        if(IS_POST){
            $this->sitesave('site.php');
        }else{
            $this->display();
        }
    }
    public function setting(){
        if(IS_POST){
            $this->sitesave('route.php');
        }else{
            $this->display();
        }
    }
    private  function sitesave($filename){
	
        if($this->update_config($_POST,$filename)){

                $this->success('操作成功',U('site/'.ACTION_NAME));

        }else{

                $this->error('操作失败',U('site/'.ACTION_NAME));

        }
    }

    private function update_config($new_config,$filename) {
	$config_file=CONF_PATH.$filename;
        if (is_file($config_file)&&is_writable($config_file)) {

            $config = require $config_file;

            $config = array_merge($config, $new_config);

            file_put_contents($config_file, "<?php \nreturn " . stripslashes(var_export($config, true)) . ";", LOCK_EX);
            
            @unlink(RUNTIME_FILE);

            return true;

        } else {

            return false;

        }
	
    }
    
    
    
    
}