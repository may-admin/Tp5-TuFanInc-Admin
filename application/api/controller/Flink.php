<?php
namespace app\api\controller;

use app\api\controller\Base;

class Flink extends Base
{
    public $modelClass = '\app\api\model\Flink';
    
    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function demo()
    {
        echo "demo自定义接口";
    }
}