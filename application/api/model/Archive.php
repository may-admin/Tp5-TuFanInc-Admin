<?php
namespace app\api\model;

use think\Model;

class Archive extends Model
{
    protected $readonly = ['mod'];
    
    public function arctype()
    {
        return $this->hasOne('Arctype', 'id', 'typeid')->field('typename, mid, dirs');
    }
    
    public function arctypeMod()
    {
        return $this->hasOne('ArctypeMod', 'mod', 'mod')->field('mod');
    }
}