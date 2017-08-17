<?php
namespace app\admin\model;

use think\Model;

class Banner extends Model
{
    public function moduleClass()
    {
        return $this->hasOne('ModuleClass', 'id', 'mid')->field('id, title');
    }
    
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
}