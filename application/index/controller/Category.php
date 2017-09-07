<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Arctype;
use app\index\model\Archive;

class Category extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    
    public function index($dirs)
    {
        //检测静态页面
        //return
        
        $arctypeModel = new Arctype();
        $arctype = $arctypeModel->field(true)->where(['dirs'=>$dirs, 'status'=>1])->order('id DESC')->find();
        if (!$arctype){
            //跳转404
            exit("404");
        }
        $arctype->arctypeMod;
        if ($arctype->arctypeMod->mod == 'addonpage'){
            return $this->tpl_page($arctype);
        }else{
            return $this->tpl_list($arctype);
        }
    }
    
    private function tpl_list($arctype)
    {
        $typeid_arr = cache('ARCTYPE_ARR_'.$arctype['id']);
        if(!$typeid_arr){
            $arctypeModel = new Arctype();
            $arctypeModel::$allChild = [];   //初始化无限子分类数组
            $typeid_arr = $arctypeModel->allChildArctype($arctype['id']);
            cache('ARCTYPE_ARR_'.$arctype['id'], $typeid_arr);
        }
        
        $where = [
            'typeid' => ['in', $typeid_arr],
            'status' => '1',
        ];
        if (input('get.search')){
            $where['title'] = ['like', '%'.input('get.search').'%'];
        }
        $archiveModel = new Archive();
        $dataList = $archiveModel->where($where)->order('id DESC')
        ->paginate($arctype['pagesize'], false, ['query'=> ['search' => input('get.search')]]);
        foreach ($dataList as $k => $v){
            $v->arctype;
            $dataList[$k]['arctypeurl'] = url('@category/'.$v->arctype->dirs);   //文章栏目链接
            $dataList[$k]['arcurl'] = url('detail/'.$v->arctype->dirs.'/'.$v['id']);   //文章链接
        }
        
        if($arctype['pid'] == '0'){
            $parent = $arctype;
        }else{
            $arctypeModel = new Arctype();
            $parent = $arctypeModel->topArctypeData($arctype['pid']);
        }
        
        $this->assign('parent', $parent);   //当前栏目顶级栏目信息
        $this->assign('arctype', $arctype);   //当前栏目信息
        $this->assign('dataList', $dataList);   //列表数据【包含无限子类数据】
        return $this->fetch($arctype['templist']);   //栏目模板
    }
    
    private function tpl_page($arctype)
    {
        if($arctype['pid'] == '0'){
            $parent = $arctype;
        }else{
            $arctypeModel = new Arctype();
            $parent = $arctypeModel->topArctypeData($arctype['pid']);
        }
        $this->assign('parent', $parent);   //当前栏目顶级栏目信息
        $this->assign('arctype', $arctype);   //当前栏目信息
        return $this->fetch($arctype['templist']);   //栏目模板
    }
}
