<?php
namespace Api\Mock;

use Api;

trait Index  {
	function index(){
		return $this->success('this is mock');
	}
}