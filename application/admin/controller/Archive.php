<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Archive as Archives;
use app\admin\model\Arctype;
use app\admin\model\ArctypeMod;
use think\Db;

class Archive extends Common
{
    private $cModel;   //当前控制器关联模型
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new Archives;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $where = [];
        if (input('get.search')){
            $where['title|keywords|description'] = ['like', '%'.input('get.search').'%'];
        }
        if (input('get._sort')){
            $order = explode(',', input('get._sort'));
            $order = $order[0].' '.$order[1];
        }else{
            $order = 'id desc';
        }
        $dataList = $this->cModel->where($where)->order($order)->paginate('', false, page_param());
        foreach ($dataList as $k => $v){
            if(!empty($v['flag'])){ $dataList[$k]['flag'] = explode(',', $v['flag']); }
            $v->Arctype;   //关联栏目数据
            $v->User;
            if(in_array('j', $dataList[$k]['flag']) && !empty($v['jumplink'])){
                $dataList[$k]['arcurl'] = $v['jumplink'];
            }else{
                if(isset($v->Arctype->dirs)){
                    $dataList[$k]['arcurl'] = url('detail/'.$v->Arctype->dirs.'/'.$v['id']);
                }else{
                    $dataList[$k]['arcurl'] = '';
                }
            }
            $addonMod = $v['mod'];
            $v->$addonMod;
            $dataList[$k]['addondata'] = $v->$addonMod;
            unset($dataList[$k][$addonMod]);
        }
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    public function create($typeid)
    {
        if (request()->isPost()){
            Db::startTrans();
            try{
                $data = input('post.');
                $data['create_time'] = strtotime($data['create_time']);
                if (isset($data['flag']) || isset($data['litpic'])){
                    $data['flag'] = $this->_flag($data['flag'], $data['litpic']);
                }
                $result = $this->cModel->validate(CONTROLLER_NAME.'.add')->allowField(true)->save($data);
                $data['aid'] = $this->cModel->getLastInsID();
                $mod = $data['mod'];
                $addonData = db($mod)->field('id', true)->strict(false)->insert($data);   //新增关联表数据
                // 提交事务
                if ($result && $addonData){
                    Db::commit();
                    return ajaxReturn(lang('action_success'), url('Arctype/index'));
                }else{
                    return ajaxReturn($this->cModel->getError());
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return ajaxReturn($e->getMessage());
            }
        }else{
            $atModel = new Arctype();
            $arctypeList = $atModel->treeList();
            $this->assign('arctypeList', $arctypeList);
            
            $arcData = $atModel->where(['id' => $typeid])->find();   //栏目数据
            $atmModel = new ArctypeMod();
            $where = [ 'id' => $arcData['mid'] ];
            $mod = $atmModel->where($where)->field('mod')->find();
            $mod = $mod['mod'];
            $this->assign('mods', $mod);   //文章拓展表模型
            
            $data['typeid'] = $arcData['id'];
            $data['create_time'] = date('Y-m-d H:i:s', time());
            $data['mid'] = $arcData['mid'];
            $this->assign('data', $data);
            
            return $this->fetch('edit');
        }
    }
    
    public function edit($id)
    {
        if (request()->isPost()){
            $data = input('post.');
            if (isset($data['create_time'])){
                $data['create_time'] = strtotime($data['create_time']);
            }
            if (isset($data['flag']) || isset($data['litpic'])){
                $data['flag'] = $this->_flag($data['flag'], $data['litpic']);
            }
            if (count($data) == 2){
                foreach ($data as $k =>$v){
                    $fv = $k!='id' ? $k : '';
                }
                $result = $this->cModel->validate(CONTROLLER_NAME.'.'.$fv)->allowField(true)->save($data, $data['id']);
            }else{
                $result = $this->cModel->validate(CONTROLLER_NAME.'.edit')->allowField(true)->save($data, $data['id']);
                $mod = $data['mod'];
                $addonData = db($mod)->field('id', true)->strict(false)->where( 'aid='.$data['id'] )->update($data);   //关联表数据
            }
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $atModel = new Arctype();
            $arctypeList = $atModel->treeList();
            $this->assign('arctypeList', $arctypeList);
            
            $data = $this->cModel->get($id);
            $addonMod = $data['mod'];
            $data['addondata'] = $data->$addonMod;   //拓展表数据
            unset($data[$data['mod']]);
            
            $atmModel = new ArctypeMod();
            $data['mid'] = $atmModel->where(['mod' => $addonMod])->value('id');
            
            $this->assign('mods', $addonMod);
            
            if (!empty($data['flag'])){
                $data['flag'] = explode(',', $data['flag']);
            }
            $this->assign('data', $data);
            return $this->fetch();
        }
    }
    
    public function delete()
    {
        if (request()->isPost()){
            $id = input('id');
            if (isset($id) && !empty($id)){
                $id_arr = explode(',', $id);
                if (!empty($id_arr)){
                    foreach ($id_arr as $val){
                        $addonMod = $this->cModel->where(['id' => $val])->value('mod');
                        $this->cModel->where('id='.$val)->delete();
                        db($addonMod)->where('aid='.$val)->delete();   //关联表数据
                    }
                    return ajaxReturn(lang('action_success'), url('index'));
                }else{
                    return ajaxReturn(lang('action_fail'));
                }
            }
        }
    }
    
    private function _flag($flag, $litpic)
    {
        if(empty($flag)){ $flag=array(); }
        if($litpic != ''){
            array_push($flag, "p");
        }else{
            $flag = unset_array("p", $flag);
        }
        $flag_arr = array_unique($flag);
        $result = implode(',', $flag_arr );
        return $result;
    }
}