<?php
namespace Core;

// 连接池管理
// mq连接池
// mysql 连接池
// redis 连接池
// ..连接池
// 需要swoole的支持
class Pool {
    //单例模式
   use \Core\helper\Singleton;
   //设置连接数
   function __construct(){
        //var_dump($para2);
   }
   function setConnectNum(){

   }
   //获取一个链接
   function getConnect(){
       
   }
   function init($callback){
       var_dump($callback);
       echo "初始化";
   }
   function release(){

   }
}