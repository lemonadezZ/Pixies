<?php
namespace Frontend\Index;

use Core\Controller;
use Core\Mq;


class Index extends Controller {
	//异步处理列表
	public $asynchronous=['index'];
	function index(){

		//easy
		Mq::send($this->Request->get('topic'),$this->Request->get('msg'));

		// $this->assign('title','Page');
		// return $this->display();
	}
	
}
