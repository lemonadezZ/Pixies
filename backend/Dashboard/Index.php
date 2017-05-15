<?php
namespace Backend\Dashboard;

use Core\Controller;


class Index extends Controller {
	use \Core\Helper;
	function index(){
		$this->assign('title','后台-仪表盘');
		return $this->render();
	}
	
}