<?php 
namespace Core;

class View extends Base {
	public $note="";
	public $autorender=false;
	public $content="";
	public $user=['name'=>"默认用户名"];
	function assign($name,$key=""){
		$this->$name=$key;
	}
	function render($path=null){
		$view_root=self::$conf['application']['theme_dir'].'/'.self::$conf['application']['theme'];
		if(is_null($path)){
			$view_path=$view_root.'/'.self::$path.'.php';
		}else{
			$view_path=$view_root.'/'.$path.'.php';
		}
		// define("__LAYOUTS__",$view_root.'/'.$this->layouts);
	
		//渲染主体
		ob_start();
		include($view_path);
		$this->content=ob_get_contents();
		ob_end_clean();
		//渲染layouts
		if(self::$layouts){
			ob_start();
			$layouts_path=$view_root.'/'.self::$module.'/'.self::$layouts.'.php';
			if(file_exists($layouts_path)){
			}else{
				$layouts_path=$view_root.'/'.self::$conf['application']['default_module'].'/'.self::$layouts.'.php';
			}
			include($layouts_path);
			$this->content=ob_get_contents();
			ob_end_clean();
		}
		
		return $this->content;
	}
	function display($path=null){
		return $this->render();
	}
	function __destruct(){
		
	}
}
