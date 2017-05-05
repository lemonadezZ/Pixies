<?php 
namespace Core;

class Cache extends Base {
	function set($key,$value,$ttl=3600){
        return $value;
    }
    function get($key){
        return "这是什么啊";
    }
}