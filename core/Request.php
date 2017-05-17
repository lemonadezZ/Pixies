<?php 
namespace Core;

class Request extends Base {
    public $Get=null;
    public $Post=null;
    public $Request=null;
    public $Path=null;
    public $Server=null;
    public $is_ajax=null;//判断是否为ajax请求
    public $is_pjax=false;//判断是否为ajax请求

    public function __construct(){
        $this->Get=$_GET;
        $this->Post=$_POST;
        $this->Request=$_REQUEST;
        $this->Server=$_SERVER;
        $this->is_pjax=$this->get('_pjax');


    //    exit();
    //     if(){

    //     }
    }

    public function get($parm){
        return isset($this->Request[$parm])?$this->Request[$parm]:"";
    }
    public function __set($name,$value){
            //设置
            return $this->$name=$value;
    }
   
}