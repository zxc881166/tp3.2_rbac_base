<?php
namespace Home\Model;
use Think\Model;
class CommonModel extends Model{
    protected $pk   = '';
    protected $tableName =  '';
    protected $token = '';
    protected $cacheTime = 86400;
    protected $orderby = array(); //针对全部查询出的数据的排序

    public function updateCount($id,$col,$num = 1){
        $id = (int)$id;
        
        return $this->execute(" update ".$this->getTableName()." set {$col} = ({$col} + '{$num}') where ".$this->pk." = '{$id}' ");
    }
    
    public  function  itemsByIds($ids = array()){
        if(empty($ids)) return array();
        $data = $this->where(array($this->pk=>array('IN',$ids)))->select();
        $return = array();
        foreach($data as $val){
            $return[$val[$this->pk]] = $val;
        }
        return $return;
    }
   
    public function fetchAll(){
       
        S(array('type'=>'File','expire'=>  $this->cacheTime));
        if(!$data = S($this->token)){
            $result = $this->order($this->orderby)->select();
            $data = array();
            foreach($result  as $row){
                $data[$row[$this->pk]] = $this->_format($row);
            }
            S($this->token,$data);
           
        }   
        return $data;
     }
     
     public function cleanCache(){
        
         S($this->token,null);
   
     }
    
    public  function _format($data){
        return $data;
    }
}


