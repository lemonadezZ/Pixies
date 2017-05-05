<?php 
namespace Core;

class Logger {
	function handle(){

	}
	function info($log){
		
	}
	function log($segment,$log){
		$t=date('Y-m-d H:i:s',time());
        $rid=$_SERVER['REQUEST_TIME_FLOAT'];
        //echo "[ $rid ] [ $t ] [$segment] :$log";
	}
}