<?php 
namespace Core;

class Config {
    function __construct(){
        $this->application=include_once(__ROOT__.'/conf/'.'application.php');
		$this->db=include_once(__ROOT__.'/conf/'.'db.php');
		$this->config=include_once(__ROOT__.'/conf/'.'cache.php');
    }
    
}