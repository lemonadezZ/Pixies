<?php 
namespace Core;

class Application extends Base {
	function handle(){
		$this->initConfig();
		$this->initCache();
		$this->initLogger();
		$this->initRouter();
		return self::$router->handle();
	}

}