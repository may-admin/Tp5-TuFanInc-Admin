<?php
namespace app\index\controller;

use think\Controller;

class Category extends Controller
{
    protected function _initialize(){
        parent::_initialize();
    }
    
    public function index($dirs)
    {
        echo $dirs;
    }
}