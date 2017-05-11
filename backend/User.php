<?php
namespace Backend;

use Core\Controller;


class User extends Controller {
	use \Core\Helper;
	function login(){
        self::$layouts=false;
		$this->assign('title','用户登录');
		return $this->render();
	}
    function dologin(){

    }
	
}