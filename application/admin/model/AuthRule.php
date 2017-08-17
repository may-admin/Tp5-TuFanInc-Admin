<?php
namespace app\admin\model;

use think\Model;

class AuthRule extends Model
{
    public function getStatusTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('status0'), 1=>lang('status1')];
        return $turnArr[$data['status']];
    }
    public function getLevelTurnAttr($value, $data)
    {
        $turnArr = [1=>lang('auth_level_1'), 2=>lang('auth_level_2'), 3=>lang('auth_level_3')];
        return $turnArr[$data['level']];
    }
    public function getIsmenuTurnAttr($value, $data)
    {
        $turnArr = [0=>lang('ismenu0'), 1=>lang('ismenu1')];
        return $turnArr[$data['ismenu']];
    }
    
    public function treeList($module = '', $status = '')
    {
        if ($module != ''){
            $where = [
                'module' => $module
            ];
        }
        if ($status != ''){
            $where['status'] = $status;
        }
        $list = $this->where($where)->order('sorts ASC,id ASC')->select();
        $treeClass = new \expand\Tree();
        $list = $treeClass->create($list);
        return $list;
    }
}