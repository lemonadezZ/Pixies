<?php
namespace Api\V1;

use Api;

class Index extends \Api\Base {
	function index(){
		return $this->success();
	}
	
}