<?php
define("__PUBLIC__",realpath(__DIR__));
define("__ROOT__",realpath(__DIR__.'/../'));
include "../vendor/autoload.php";

//echo __ROOT__;



$lockfile=__ROOT__.'\.install.lock';
$application=new \Core\Application();
if(file_exists($lockfile)){
    //警告系统已经安装
    $application->log('warn','执行非法文件');
    header('Location: /');
}else{
    $_SERVER['REQUEST_URI']="/install/index/index";
    echo $application->log('warn','install');
}

echo $application->handle();