<?php
namespace Backend\Index;

use Core\Controller;


class Index extends Controller {
	use \Core\Helper;
	function index(){
		$this->assign('title','Page');
		return $this->render();
	}
	
}