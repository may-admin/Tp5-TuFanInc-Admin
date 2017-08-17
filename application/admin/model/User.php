<?php
namespace app\admin\model;

use think\Model;

class User extends Model
{
    protected $readonly = ['username'];
    
    protected $insert  = ['logins', 'reg_ip', 'last_time', 'last_ip'];
    //protected $update = [];
    
    public function userInfo()
    {
        return $this->hasOne('userInfo', 'uid', 'id');
    }
    
    public function userGroup()
    {
        return $this->hasMany('authGroupAccess', 'uid', 'id');
    }
    
    protected function setPasswordAttr($value)
    {
        return md5($value);
    }
    protected function setLoginsAttr()
    {
        return '0';
    }
    protected function setRegIpAttr()
    {
        return request()->ip();
    }
    protected function setLastTimeAttr()
    {
        return time();
    }
    protected function setLastIpAttr()
    {
        return request()->ip();
    }
    
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
    public function getLastTimeTurnAttr($value, $data)
    {
        return date('Y-m-d H:i:s', $data['last_time']);
    }
}