<?php
namespace app\index\controller;

use think\Controller;

class Index extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    
    public function index()
    {
        $parent = ['id' => '0'];
        $this->assign('parent', $parent);
        return $this->fetch();
    }
    
    public function newarc($page){
        $archive = new \app\index\model\Archive();
        $typeid = 1;
        $typeidStr = cache('ARCTYPE_ARR_'.$typeid);
        if (!$typeidStr){
            $arctype = new \app\index\model\Arctype();
            $arctype::$allChild = array();   //初始化无限子分类数组
            $typeidArr = $arctype->allChildArctype($typeid);
            $typeidStr = implode(',', $typeidArr);
            cache('ARCTYPE_ARR_'.$typeid, $typeidStr);
        }
        $where['status'] = 1;
        $where['typeid'] = ['in', $typeidStr];
        $dataList = $archive->where($where)->order('id desc')->page($page.', 5')->select();
        
        foreach ($dataList as $k => $val){
            $flag_arr = explode(',', $val['flag']);
            if(in_array('j',$flag_arr) && !empty($val['jumplink'])){
                $dataList[$k]['arcurl'] = $val['jumplink'];
            }else{
                $dataList[$k]['arcurl'] = url('detail/'.$val->arctype->dirs.'/'.$val['id']);
            }
        }
        
        $this->assign('dataList', $dataList);
        return $this->fetch('inc/new_arc');
    }
}
