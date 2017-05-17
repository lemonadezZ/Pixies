<?php
namespace Backend\Menu;

use Core\Controller;
use Core\Page;


class Index extends Controller {
	use \Core\Helper;
    function __construct(){
        $this->page->push_nav([
                'name'=>"菜单管理",
                'href'=>"/backend/menu/index/index"
        ]);
    }
	function index(){
            $this->page->push_nav([
                'name'=>"菜单列表"
            ]);
		return $this->render();
	}
    function create(){
            $this->page->push_nav([
                'name'=>"创建菜单"
            ]);
		return $this->render();
	}
	
}