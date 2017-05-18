<?php 
namespace Core;

class Controller extends Base {

	public $note="";
	public $autorender=false;
	public $content="";
	public $view=null;
	public $layouts="layouts/master";
	public $user=['name'=>"默认用户名"];
	function assign($name,$key=""){
		if(is_null($this->view)){
			$this->view=new View();
		}
		$this->view->$name=$key;
	}
	function render($path=null){
		if(is_null($this->view)){
			$this->view=new View();
		}
		return $this->view->render($path);
	}
	function display($path=null){
		return $this->render();
	}
	function __destruct(){
		
	}
	//重定向
	function  redirect($path=""){
			return header('Location: '.$path);
	}
	//内部跳转
	function forward($path="/",$para=""){
			return $this->dispatcher->to($path,$para);
	}
}
