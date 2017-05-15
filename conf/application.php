<?php
//app相关设置
return [
	"root"=>__ROOT__,
	"log_dir"=>__ROOT__.'/log',
	"appName"=>"Pixies",
	"cache_driver"=>"redis",
	"debug"=>true,
	"default_path"=>'frontend/index/index/index',
	"default_controller"=>'index',
	"default_action"=>'index',
	"default_module"=>'frontend',
	"error_class"=>'Frontend\Error',
	"theme_dir"=>__ROOT__.'/theme',
	"theme"=>'default',
	"run-model"=>'swoole',
	"features"=>[
		'route'=>0
	],//配置特性
	"extension"=>[

	],//配置扩展
];
