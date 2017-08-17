<?php
namespace app\admin\model;

use think\Model;

class Guestbook extends Model
{
    protected $insert  = ['uid'];
    
    public function user()
    {
        return $this->hasOne('User', 'id', 'uid')->field('id, username, name');
    }
    
    protected function setUidAttr($value)
    {
        if ($value){
            return $value;
        }else{
            return session('userId');
        }
    }
    
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
}