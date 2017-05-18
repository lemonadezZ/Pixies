<?php
namespace Frontend;

use Core\Controller;
use Core\MQ;


class User extends Controller {
	//异步处理列表
	public $asynchronous=['index'];
    
	function index(){
        $this->forward('/frontend/user/login');
	}

    function login(){
        echo "用户登录";
    }
}
