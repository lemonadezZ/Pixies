<?php
namespace Frontend\Index;

use Core\Controller;

class Index extends Controller {
	function index(){
		
		$this->assign('title','Page');
		return $this->display();
	}
}