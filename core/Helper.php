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

	static function route($routeMap,$url){
		foreach($routeMap as $route=>$t){
			preg_match_all('/:[0-9a-zA-Z]+/',$route,$match);
			$key=$match[0];
			$r=preg_replace('/:[0-9a-zA-Z]+/',"([0-9a-zA-Z]+)",$route);
			$r='/'.str_replace('/','\/',$r).'/';
			$res=preg_match_all($r,$url,$match);
			if($res){
					array_shift($match);
					$val=$match;
					$para=[];
					foreach($key as $k=>$v){
						$para[$v]=$val[$k][0];
					}
					$path=$t;
					return [$path,$para];
			}
		
		}
		return false;
	}

}
