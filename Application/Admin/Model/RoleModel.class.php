<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'role';
    protected $token = 'role';
   
    public function getRoleName($name){
        $data = $this->find(array('where'=>array('name'=>$name)));
        return $this->_format($data);
    }
}
