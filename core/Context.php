<?php  
namespace Core;

class Context extends Base {
    public $Get=null;
    public $Post=null;
    public $Request=null;
    public $Server=null;
    public function __construct(){
        $this->Get=$_GET;
        $this->Post=$_POST;
        $this->Request=$_REQUEST;
        $this->Server=$_SERVER;
    }
}