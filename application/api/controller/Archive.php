<?php
namespace app\api\controller;

use app\api\controller\Base;

class Archive extends Base
{
    public $modelClass = '\app\api\model\Archive';
    
    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function demo($id)
    {
        echo "demo".$id;
    }
}