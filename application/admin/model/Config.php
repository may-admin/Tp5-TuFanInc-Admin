<?php
namespace app\admin\model;

use think\Model;

class Config extends Model
{
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
}