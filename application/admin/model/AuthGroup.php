<?php
namespace app\admin\model;

use think\Model;

class AuthGroup extends Model
{
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
    public function getModuleTurnAttr($value, $data)
    {
        $turnArr = ['admin'=>lang('module_admin'), 'member'=>lang('module_member')];
        return $turnArr[$data['module']];
    }
}