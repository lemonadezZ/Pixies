<?php 
namespace Core;

class Router extends Base{

	//处理路由
	function handle(){
		$path=$this->getPath();
		$p=explode('/',$path);
		$action=strtolower(array_pop($p));
		$action_before=$action.'_before';
		$action_after=$action.'_after';
		$this->setAction($action);
		foreach($p as &$s){
				$s=ucwords($s);
		}
		$controller=array_pop($p);
		$this->setController($controller);
		$module=@$p[1];
		$this->setModule($module);
		$namespace=implode('\\',$p);
		$class=$namespace.'\\'.$controller;
		if(class_exists($class)){
				$handler=new $class();
		}else{
				//log error
				$log=$_SERVER['HTTP_PROTOCOL'].$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
				self::$logger->log('error',$log);
				$handler=new self::$conf['application']['error_class']();
				return $handler->error();
		}
		
		// actions before
		if(property_exists($handler,'before')){
			if(in_array($action,$handler->before[1])){
					$before=$handler->before[0];
					$handler->$before();
			}
		}

		// action before
		if(method_exists($handler,$action_before)){
			$handle=$handler->$action_before();
		}
		// action
		$handler->view=new View();
		$handle=$handler->$action();
		if(is_null($handle)){
			if($handler->autorender==true){
				$handle=$handler->render();
			}
		}
		// action after
		if(method_exists($handler,$action_after)){
			$handle=$handler->$action_after();
		}
		// actions after
		if(property_exists($handler,'after')){
			if(in_array($action,$handler->after[1])){
					$after=$handler->after[0];
					$handler->$after();
			}
		}
		// $index->$action."_before"();
		return $handle;
	}
	function setAction($action){
		self::$action=$action;
	}
	function setController($controller){
		self::$controller=$controller;
	}
	function setModule($module){
		if($module==""){
			self::$module=self::$conf['application']['default_module'];
		}else{
			self::$module=$module;
		}
		
	}
	function setNamespace(){
		
	}
	function getPath(){
		if(!isset($_SERVER['REQUEST_URI'])){
			$path=self::$conf['application']['default_path'];
		}else{
			
			$path=$_SERVER['REQUEST_URI'];
			if($path=="/"){
				$path=self::$conf['application']['default_path'];
			}
			
		}
		self::$path=$path;
		return $path;
	}
	function setPath(){
		
	}
}