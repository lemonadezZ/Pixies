<?php 
namespace Core;

class Base {
	static $conf=[];
	static $logger=null;
	static $router=null;
	static $controller=null;
	static $action=null;
	static $path=null;
	function getInstance(){
		
	}
	function initConfig(){
		self::loadConfig();
	}
	function loadConfig(){
		self::$conf['application']=include_once(__ROOT__.'/conf/'.'application.php');
	}
	function initLogger(){
		self::$logger=new Logger();
	}
	function initRouter(){
		self::$router=new Router();
	}
}