<?php 
namespace Core;

class Application extends Base {
	function __construct(){
		self::$start_time=microtime();
		$this->initConfig();
		$this->initLogger();
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