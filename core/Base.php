<?php 
namespace Core;

class Base {
	public $container;
	static $conf=[];
	static $logger=null;
	static $cache=null;
	static $router=null;
	static $request=null;
	static $response=null;
	static $context=null;

	static $controller=null;
	static $action=null;
	static $module=null;
	static $path=null;
	static $lastsql="";
	static $sqls=[];
	static $start_time="";
	static $end_time="";
	static $layouts="layouts/master";
	function getInstance(){
		if($this->instance==null){
			$class=__CLASS__;
			$this->instance=new $class();
		}else{
			return $this->instance;
		}
	}
	

	function __get($name){
		$name='\\Core\\'.ucwords($name);
		return $this->$name=new $name();
	}
}