<?php
namespace app\admin\model;

use think\Model;

class Archive extends Model
{
    protected $insert  = ['description', 'writer'];
    protected $update = [];
    
    public function arctype()
    {
        return $this->hasOne('Arctype', 'id', 'typeid')->field('typename, mid, dirs');
    }
    
    public function arctypeMod()
    {
        return $this->hasOne('ArctypeMod', 'id', 'mid')->field('mod');
    }
    
    public function User()
    {
        return $this->hasOne('User', 'id', 'writer')->field('name');
    }
    
    /**
     * 文章模型关联表
     */
    public function addonarticle()
    {
        return $this->hasOne('addonarticle', 'aid', 'id');
    }
    
    /**
     * 视频模型关联表
     */
    public function addonvideo()
    {
        return $this->hasOne('addonvideo', 'aid', 'id');
    }
    
    /**
     * 相册模型关联表
     */
    public function addonalbum()
    {
        return $this->hasOne('addonalbum', 'aid', 'id');
    }
    
    protected function setDescriptionAttr($value)
    {
        return auto_description($value, input('param.content'));
    }
    
    protected function setWriterAttr($value)
    {
        if ($value){
            return $value;
        }else{
            return cookie('uid');
        }
    }
    
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
}