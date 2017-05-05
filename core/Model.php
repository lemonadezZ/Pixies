<?php 
namespace Core;

//模型
class Model extends Base {
    public $table;   
    public $sql;
    public $where="";
    public $group="";
    public $limit=1;
    public $offset=0;
    public $database="";
    // public $action;
    public $order=null;
    //alias select *;  
    function __construct(){
        $this->database=self::$conf['db']['database'];
        // echo "初始化";
    } 
    function getTablename(){
        $tableName=strtolower(array_pop(explode("\\", get_called_class())));
        return "`$this->database`.`".$tableName.'`';
    }
    public $conn=null;
    //开始事务
    function beginTransaction(){

    }
    //提交事务
    function commit(){

    }
    //回滚
    function rollBack(){

    }
    function findALL(){

    }
    //alias limit 1;
    function first(){

    }
    //表名
    //基本操作
    function select($field="*"){
        $this->sql="select ".$field." from ".$this->getTableName().' ';
    }
    //删除操作
    function delete(){

    }
    //插入操作
    function insert(){

    }
    //更新操作
    function update(){

    }
    //where 查询
    function where($expression,$op='and'){
        if($this->where==""){
            $this->where="where";
            $op="";
        }
        $this->where=$this->where.' '.$op.' '.$expression;
        return $this;
    }
    function order($field,$sort='desc'){
        $this->order=$this->order.' `'.$field.'` '.$sort;
        return $this;
    }
    function group($field){
        if($this->group==""){
            $this->group=" group by ";
        }
         $this->group=$this->group.'`'.$field.'`';
        return $this;
    }
    //内连接
    function join(){

    }
    //左连接
    function leftjoin(){

    }
    //右连接
    function rightjoin(){

    }
    //分页这里处理
    function limit($limit=1){
         $this->limit=(int)$limit;
    }
    //偏移量
    function offset($offset=0){
         $this->offset=(int)$offset;
    }
    //原始sql查询
    function query($sql){
        $this->log($sql);
    }
    //组装最新执行的sql
    function get($field="*"){
        //执行的sql
        $this->sql="select ".$field." from ".$this->getTableName().' '.$this->where.$this->group.' order by '.$this->order.' offset '.(int)$this->offset.' limit '.(int)$this->limit;
        $this->query($this->sql);
    }
    function sql(){
        
    }
    function __toString(){
        echo  $this->sql
        .$this->where.$this->group.' order by '.$this->order.' offset '.(int)$this->offset.' limit '.(int)$this->limit;

    }
    //应用层sqlmap sql写入日志
    function log($sql){
        self::$logger->log('sql',$sql);
        self::$lastsql=$sql;
    }
}