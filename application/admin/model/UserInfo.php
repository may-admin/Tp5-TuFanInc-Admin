<?php
namespace app\admin\model;

use think\Model;

class UserInfo extends Model
{
    protected $insert  = ['avatar'];
    
    protected function setAvatarAttr($value)
    {
        if ($value){
            return $value;
        }else{
            return '/static/global/face/default.png';
        }
    }
    
    public function getBirthdayTurnAttr($value, $data)
    {
        return date('Y-m-d', $data['birthday']);
    }
}