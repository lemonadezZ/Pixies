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
	//@
	function index(){
		$res=(new \Model\User())->where("`id` = 1")->get();
		$this->assign('title','Page');
		return $this->display();
	}
	
}