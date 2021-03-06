<?php 
namespace Core;

//模型
class Model extends Base {
    public $pdo; 
    public $connect; 
    public $table;   
    public $sql;
    public $para=[];
    public $lastsql;
    public $sqls=[];
    public $where="";
    public $group="";
    public $limit="";
    public $offset="";
    public $database="";
    // public $action;
    public $order=null;

    //alias select *;  
    function __construct(){
        // $connect=$this->Pool->getConnect(

        // );
        //初始化连接池
        $this->connect=new \PDO('mysql:host='.$this->config->db['hostname'].';dbname='.$this->config->db['database'], $this->config->db['username'],$this->config->db['password']);

        $this->database=$this->config->db['database'];
        
        // echo "初始化";
        return $this;
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
         if($this->order==""){
            $this->order=" order by ";
        }
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
         $this->limit=" limit ".(int)$limit;
    }
    //偏移量
    function offset($offset=0){
         $this->offset="offset ".(int)$offset;
    }
    function para($para=[]){
        $this->para=$para;
        return $this;
    }
    //原始sql查询
    function query($sql){
        $res=$this->connect->prepare($sql);
        $this->log($sql);

        if($r=$res->execute($this->para)){
           return $res->fetchAll(\PDO::FETCH_OBJ);
        }
        return $r;
    }
    // function fetchAll($sql){

    // }
    //组装最新执行的sql
    function get($field="*"){
        //执行的sql
        $this->sql="select ".$field." from ".$this->getTableName().' '.$this->where.$this->group.$this->order.$this->limit.$this->offset;
       return  $this->query($this->sql);
    }
    function sql(){
        
    }
    // function __toString(){
    //     echo  $this->sql
    //     .$this->where.$this->group.' order by '.$this->order.' offset '.(int)$this->offset.' limit '.(int)$this->limit;

    // }
    //应用层sqlmap sql写入日志
    function log($sql){
        $this->logger->log('sql',$sql);
        $this->lastsql=$sql;
        array_push($this->sqls,$sql);
    }
    function __destruct(){
        //释放当前 链接
        $this->Pool('db','10')->release($this->connect);
    }
}