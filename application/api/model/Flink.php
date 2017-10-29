<?php
namespace app\api\model;

use think\Model;

class Flink extends Model
{
    public function moduleClass()
    {
        return $this->hasOne('moduleClass', 'id', 'mid');
    }
}