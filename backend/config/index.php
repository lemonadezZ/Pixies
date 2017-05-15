<?php
namespace Backend\Config;

use Core\Controller;


class Index extends Controller {
	use \Core\Helper;
	function index(){
		$this->assign('title','后台-配置');
		return $this->render();
	}
	
}