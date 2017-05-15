<?php
namespace Frontend;

use Core\Controller;


class Error extends Controller {
	use \Core\Helper;
    //error handle
	function Error(){
	   $page404='/404.html?from='.$_SERVER['PATH_INFO'];
       header('Location: '.$page404);
	}
}