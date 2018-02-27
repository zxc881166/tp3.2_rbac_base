<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends CommonModel{
    protected $pk   = 'id';
    protected $tableName =  'comment';
    protected $token = 'comment';
}
