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
	static $di="";

	
	function __get($name){
		$di=DI::getInstance();
		if(property_exists($di,$name)){
		 	return $di->$name;
		}
		//注册到DI树;
		return $di->register($name);
	}
}