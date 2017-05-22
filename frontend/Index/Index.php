<?php
namespace Frontend\Index;

use Core\Controller;
use Core\MQ;
use Core\Pool;

class Index extends Controller {
	//异步处理列表
	public $asynchronous=['index'];
	function index(){
		$user=(new \Model\User())->where('name=?')->para([
			11
		])->get();
		 var_dump($user);
	}
}
