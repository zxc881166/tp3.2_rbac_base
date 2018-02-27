<?php
namespace Admin\Model;
use Think\Model;
class MessageTextModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'message_text';
    protected $token = 'message_text';
    
    public function getNoticeTitle($title){
        $data = $this->find(array('where'=>array('title'=>$title)));
        return $this->_format($data);
    }
}
