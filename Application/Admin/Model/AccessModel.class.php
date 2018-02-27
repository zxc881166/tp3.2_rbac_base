<?php
namespace Admin\Model;
use Think\Model;
class AccessModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'access';
    protected $token = 'access';
    public function getMenuIdsByRoleId($id)
    {
        return $this->where(array("role_id"=>$id))->field('node_id')->select();
        
    }
    
    
}