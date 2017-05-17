<?php
namespace Backend\Index;

use Core\Controller;
use Core\Page;


class Index extends Controller {
	use \Core\Helper;
	function index(){
		$this->page->title="1111111";
		$this->assign('title','Page');
		return $this->render();
	}
	
}