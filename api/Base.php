<?php
namespace Api;


class Base {
	function success($data,$code=0,$msg="success"){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	function fail($msg="fail",$code=1,$data=[]){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	function _return($data){
		return json_encode($data);
	}
	
}