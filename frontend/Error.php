<?php
namespace Frontend;

use Core\Controller;


class Error extends Controller {
	use \Core\Helper;
    //error handle
	function Error(){
       header('Location: /404.html');
	}
}