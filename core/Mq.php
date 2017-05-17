<?php
namespace Core;

//消息队列核心类
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


class MQ extends Base{
        static $connection=null;
   	static function send($topic="",$message){
                if(DI::getInstance()->config->application['features']['mq']){
                        $connection = self::getConnection();
                        $channel = $connection->channel();
                        $channel->queue_declare($topic, false, false, false, false);
                        $msg = new AMQPMessage($message);
                        $channel->basic_publish($msg, '', $topic);
                        $channel->close();
                }else{
                     DI::getInstance()->Dispatcher->to($topic,$message);
                }
        }
        static function getConnection(){
                $config=DI::getInstance()->config;
                if(self::$connection==null){
                        self::$connection=new AMQPStreamConnection(
                                                        $config->mq['hostname'],
                                                        $config->mq['port'] ,
                                                        $config->mq['username'],
                                                        $config->mq['password']
                        );
                }
                return self::$connection;
        }
        static function closeConnect(){
               return  self::$connection->close();
        }
        static function recive($topic,$callback){


        }
}