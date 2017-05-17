<?php
namespace Core;

//消息队列核心类
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class Mq {
   	   static function send($topic="",$message){
                $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
                $channel = $connection->channel();
                $channel->queue_declare($topic, false, false, false, false);
                $msg = new AMQPMessage($message);
                $channel->basic_publish($msg, '', $topic);
                $channel->close();
                $connection->close();
        }
        static function recive($topic,$callback){


        }
}