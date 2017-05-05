<?php 
namespace Core;

class Controller extends Base {
	function assign($name,$key=""){
		$this->$name=$key;
	}
	function render(){
		$view_root=self::$conf['application']['theme_dir'].'/'.self::$conf['application']['theme'];
		$view_path=$view_root.'/'.self::$path.'.php';
		ob_start();
		include($view_path);
		$content=ob_get_contents();
		ob_end_clean();
		return $content;
	}
	function display(){
		echo $this->render();
	}
}