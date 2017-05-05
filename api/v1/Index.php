<?php
namespace Api\v1;

use Core\Controller;

class Index extends Controller {
	function index(){
		echo json_encode(['success']);
	}
	
}