<?php 
namespace Core;

class Router extends Base{
	function handle(){
		$path=$this->getPath();
		$p=explode('/',$path);
		$action=strtolower(array_pop($p));
		$this->setAction($action);
		foreach($p as &$s){
				$s=ucwords($s);
		}
		$controller=array_pop($p);
		$this->setController($controller);
		$namespace=implode('\\',$p);
		$class='\\'.$namespace.'\\'.$controller;
		$index=new $class();
		return $index->$action();
	}
	function setAction($action){
		self::$action=$action;
	}
	function setController($controller){
		self::$controller=$controller;
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
		return $path;
	}
	function setPath(){
		
	}
}