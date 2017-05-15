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

	static $di="";
	
	
	static $instance=null;

	//调用不存在的类
	function __get($name){
		$di=DI::getInstance();
		//TODO 这里比较坑点
		$class='\\Core\\'.ucwords($name);
		if(property_exists($di,$class)){
		 	return $di->$class;
		}
		//注册到DI树;
		return $di->register($name);
	}
	//调用不存在的DI;
	function __call($method,$para){
		$di=DI::getInstance();
		if(property_exists($di,$name)){
		 	return $di->$name;
		}
		//注册到DI树;
		return $di->register($name,$para);
	}
	// //设置上下文
	// function __set($name,$val){
	// 	$di=DI::getInstance();
	// 	return $di->context->$name=$val;
	// }
	
    static function getInstance(){
		if(self::$instance==null){
			$class=__CLASS__;
			return self::$instance=new $class();
		}else{
			return self::$instance;
		}
	}
}