<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'admin';
    protected $token = 'admin';
   
    public function getAdminName($user){
        $data = $this->find(array('where'=>array('user'=>$user)));
        return $this->_format($data);
    }
}
