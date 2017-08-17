<?php
namespace app\index\controller;

use think\Controller;

class Detail extends Controller
{
    protected function _initialize(){
        parent::_initialize();
    }
    
    public function index($dirs, $id)
    {
        echo $dirs."=".$id;
    }
}