<?php 
namespace Core;

//注册树
class DI {
    static $instance=null;
    static $register_tree=[];
    static function getInstance(){
		if(self::$instance==null){
			$class=__CLASS__;
			return self::$instance=new $class();
		}else{
			return self::$instance;
		}
	}
    //注册
    static function register($class,$para=null){
        $class='\\Core\\'.ucwords($class);
        $di=DI::getInstance();
        return $di->$class=new $class($para);
    }
    //注销
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
}