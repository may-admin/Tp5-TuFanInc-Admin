<?php
namespace app\index\controller;

use think\Controller;
use app\index\model\Arctype;
use app\index\model\Archive;

class Detail extends Common
{
    public function _initialize(){
        parent::_initialize();
    }
    
    public function index($dirs, $id)
    {
        //检测静态页面
        //return
        
        $arctypeModel = new Arctype();
        $arctype = $arctypeModel->where(['dirs'=>$dirs])->order('id DESC')->find();
        $arctype->arctypeMod;
        
        $archiveModel = new Archive();
        $archive = $archiveModel->where(['id'=>$id, 'status'=>1])->find();
        if (empty($archive)){
            //跳转404
        }
        $archive['addondata'] = $archive->{$arctype->arctypeMod->mod};   //拓展模式表数据
        unset($archive[$arctype->arctypeMod->mod]);
        
        if($arctype['pid'] == '0'){
            $parent = $arctype;
        }else{
            $arctypeModel = new Arctype();
            $parent = $arctypeModel->topArctypeData($arctype['pid']);
        }
        
        $this->assign('parent', $parent);   //当前文章栏目顶级栏目信息
        $this->assign('arctype', $arctype);   //当前文章栏目信息
        $this->assign('archive', $archive);   //当前文章信息
        return $this->fetch($arctype['temparticle']);   //栏目模板
    }
}
