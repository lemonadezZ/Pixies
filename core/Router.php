<?php 
namespace Core;

class Router extends Base{

	//处理路由
	use Helper;
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
		//echo $class."\r\n";
		if(class_exists($class)){	
			$handler=new $class();
		}else{
				$class=$this->config->application['error_class'];
				$errorHandler=new $class();
				return $errorHandler->error();
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
		if(method_exists($handler,$action)){
				$handle=$handler->$action();
		}else{
				$errorHandler=new $this->config->application['error_class']();
				return $errorHandler->error();
		}
		
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
		$this->Request->action=$action;
	}
	function setController($controller){
		$this->Request->controller=$controller;
	}
	function setModule($module){
		if($module==""){
			$this->Request->module=$this->config->application['default_module'];
		}else{
			$this->Request->module=$module;
		}
		
	}
	function setNamespace(){
		
	}
	function getPath($path=null){
		//路由处理
		if(!isset($_SERVER['REQUEST_URI'])){
			$path=$this->config->application['default_path'];
		}else{
			$path=$_SERVER['REQUEST_URI'];
			if($path=="/"){
				$path=$this->config->application['default_path'];
			}
		}

		$path=self::$path=explode('?',$path)[0];
		//路由判断
		switch($this->config->application['features']['route']){
			case 1:
			//正则路由
			$res=self::route($this->config->route,$path);
			if($res){
				$path=$res[0];
				$this->Request->Get=$res[1];
				break;
			}else{
				
			}
			default:
			//默认路由
			;;
		}
		// var_dump($path);
		$this->setPath($path);
		return $path;
	}
	function setPath($path){
			$this->Request->Path=$path;
			//self::$path=$path;
			//$this->path=$path;
	}
}
