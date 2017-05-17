<?php 
namespace Core;

class Page {
    public $title="";
    public $nav=[];
    public function push_nav($nav){
        array_push($this->nav,$nav);
    }
}
