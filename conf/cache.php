<?php
return [
	"cache"=>false,						//是否缓存
	"cache_max"=>'10M',	 				//缓存大小
	"cache_driver"=>"redis",
	"cache_dir"=>__ROOT__.'/tmp/cache', //文件缓存目录
];