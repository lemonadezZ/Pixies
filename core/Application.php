<?php 
namespace Core;

class Application extends Base {
	function handle(){
		
		$this->initConfig();
		$this->initLogger();
		$this->initRouter();
		self::$logger->info("����������");
		return self::$router->handle();
	}

}