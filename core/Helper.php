<?php 
namespace Core;

trait  Helper {
    function Url($url){
        return $url;
    }
    function imageUrl($url){
        return $url;
    }
    static function success($data="",$code=0,$msg="success"){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	// return fail
	static  function fail($msg="fail",$code=1,$data=[]){
		return self::_return([
			'code'=>$code,
			'msg'=>$msg,
			'data'=>$data
		]);
	}
	// return;
	static function _return($data){
		return json_encode($data);
	}

}
