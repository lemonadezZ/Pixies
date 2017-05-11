<?php
namespace Install;

use Core\Controller;


class Index extends Controller {
	use \Core\Helper;
	function index(){
        $systemInfo=json_decode(file_get_contents(__ROOT__.'/pixies.json'));
		printf( $systemInfo->version."<br>");
        printf( $systemInfo->homepage."<br>");
        printf( $systemInfo->license."<br>");
        printf( $systemInfo->description."<br>");

	}
	
}