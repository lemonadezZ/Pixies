<?php
define("__PUBLIC__",realpath(__DIR__));
define("__ROOT__",realpath(__DIR__.'/../'));

//echo __ROOT__;
include "../vendor/autoload.php";
$application=new \Core\Application();
echo $application->handle();