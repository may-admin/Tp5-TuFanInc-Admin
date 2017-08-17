<?php
namespace app\admin\model;

use think\Model;

class Comment extends Model
{
    public function master()
    {
        return $this->hasOne('User', 'id', 'mid')->field('username, name');
    }
    
    public function user()
    {
        return $this->hasOne('User', 'id', 'uid')->field('username, name');
    }
    
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
}