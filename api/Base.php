<?php
namespace Api;


class Base {
	// return success
	function success($data,$code=0,$msg="success"){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	// return fail
	function fail($msg="fail",$code=1,$data=[]){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	// return;
	function _return($data){
		return json_encode($data);
	}
	
}