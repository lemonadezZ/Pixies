<?php 
namespace Core;

class Logger extends Base {
	function handle(){

	}
	function info($log){
		
	}
	function log($segment,$log){
		$time=time();
		$t=date('Y-m-d H:i:s',$time);
        $rid=$_SERVER['REQUEST_TIME_FLOAT'];
		$file_dir=self::$conf['application']['log_dir'].'/'.$segment;
		$file_path=$file_dir.'/'.date('Y-m-d').'.log';
		// check dir
		if(!file_exists($file_dir)){
			mkdir($file_dir,777,true);
		}
		$logstr=sprintf("[%15s][%10s][%3s] %s\r\n",$rid,$t,$segment,$log);
		file_put_contents($file_path,$logstr,FILE_APPEND);
	}
}