<?php
namespace Backend;

use \Backend\Base;

class User extends Base {
	use \Core\Helper;
	function login(){
		$this->Controller->layouts=false;
		$this->assign('title','后台-用户登录');
		return $this->render();
	}
    function dologin(){

    }
	
}