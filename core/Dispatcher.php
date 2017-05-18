<?php 
namespace Core;

//调度器
class Dispatcher extends Base {
    //执行调度
    function handle(){

    }
    function to($path,$context){
        //写入文件
        $_SERVER['REQUEST_URI']=$path;
        return $this->router->handle();
        //调度到指定位置
    }
}