<?php 
namespace Core;

class Request extends Base {
    public $Get=null;
    public $Post=null;
    public $Request=null;
    public $Path=null;
    public $Server=null;

    public function __construct(){
        $this->Get=$_GET;
        $this->Post=$_POST;
        $this->Request=$_REQUEST;
        $this->Server=$_SERVER;
    }

    public function get($parm){
        return $this->Get[$parm];
    }
}