<?php
namespace Frontend\Index;

use Core\Controller;

class Index extends Controller {
	// public $before=['auth',['index']];
	// public $after=['log',['index']];
	// function index_before(){
	// 	echo "before";
	// }
	// function index_after(){
	// 	echo "after";
	// }
	// function auth(){
	// 	echo "auth";
	// }
	// function log(){
	// 	echo "log";
	// }
	function index(){
		$this->assign('title','aaaaaaaa');
		return $this->display();
	}
	
}