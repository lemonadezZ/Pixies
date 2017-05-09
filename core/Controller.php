<?php 
namespace Core;

class Controller extends Base {
	public $layouts='layouts/master';
	public $note="";
	public $content="";
	function assign($name,$key=""){
		$this->$name=$key;
	}
	function render(){
		$view_root=self::$conf['application']['theme_dir'].'/'.self::$conf['application']['theme'];
		$view_path=$view_root.'/'.self::$path.'.php';
		//渲染主体
		ob_start();
		include($view_path);
		$this->content=ob_get_contents();
		ob_end_clean();
		//渲染layouts
		if($this->layouts){
			$layouts_path=$view_root.'/'.self::$path.'/../../../'.$this->layouts.'.php';
			ob_start();
			include($layouts_path);
			$content=ob_get_contents();
			ob_end_clean();
		}
		
		return $content;
	}
	function display(){
		echo $this->render();
	}
}