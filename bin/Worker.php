<?php 


define("__ROOT__",realpath(__DIR__.'/../'));
define("__PUBLIC__",realpath(__DIR__.'/../public'));

include __ROOT__."/vendor/autoload.php";
use PhpAmqpLib\Connection\AMQPStreamConnection;
$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();


$callback = function($msg) {
  echo " [x] Received ", $msg->body, "\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);

while(count($channel->callbacks)) {
    $channel->wait();
}