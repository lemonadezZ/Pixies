<?php 
namespace Core;

class Application extends Base {
	function __construct(){
		self::$start_time=microtime();
		//初始化配置
		$this->initConfig();
		//初始化日志
		$this->initLogger();
		//初始化请求
		$this->initRequest();
		//初始化上下文
		$this->initContext();
		//初始化响应
		$this->initResponse();	
		$this->initCache();
	}
	function handle(){
		$this->initRouter();
		return self::$router->handle();
	}
	function __destruct(){
		 self::$end_time=microtime();
		 self::$logger->log('info',"[".$_SERVER['REQUEST_URI'].'] '.(self::$end_time-self::$start_time));
		// echo "time：".(microtime()-self::$start_time)."";
	}
	function log($segment,$log){

		Logger::log($segment,$log);
	}

}