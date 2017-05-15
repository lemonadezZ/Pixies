<?php
namespace Frontend\Index;

use Core\Controller;

class Index extends Controller {
	//异步处理列表
	public $asynchronous=['index'];
	function index(){	
		var_dump($this->Request->Get);
		exit();
		$this->assign('title','Page');
		return $this->display();
	}
}
