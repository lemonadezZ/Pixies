<?php 
namespace Core;

class Config {
    function __construct(){
	    $this->application=@include __ROOT__.'/conf/'.'application.php';
		$this->db=@include __ROOT__.'/conf/'.'db.php';
		$this->config=@include __ROOT__.'/conf/'.'cache.php';
        $this->route=@include __ROOT__.'/conf/'.'route.php';
		$this->server=@include __ROOT__.'/conf/'.'server.php';
        $this->mq=@include __ROOT__.'/conf/'.'mq.php';
    }
    
}
