<?php 
namespace Core;

class Base {
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
		
	}
	function initConfig(){
		self::loadConfig();
	}
	function loadConfig(){
		self::$conf['application']=include_once(__ROOT__.'/conf/'.'application.php');
		self::$conf['db']=include_once(__ROOT__.'/conf/'.'db.php');
		self::$conf['cache']=include_once(__ROOT__.'/conf/'.'cache.php');
	}
	function initLogger(){
		self::$logger=new Logger();
	}
	function initRouter(){
		self::$router=new Router();
	}
	function initRequest(){
		self::$request=new Request();
	}
	function initResponse(){
		self::$response=new Response();
	}
	function initContext(){
		self::$context=new Context();
	}
	function initCache(){
		self::$cache=new Cache();
	}
}