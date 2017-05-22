<?php

namespace Core\Helper;

trait  Singleton {
    static $__instance=null;
    static function getInstance(){
		if(self::$__instance==null){
			$class=__CLASS__;
			return self::$__instance=new $class();
		}else{
			return self::$__instance;
		}
	}
}