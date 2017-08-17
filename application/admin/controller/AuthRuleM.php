<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\AuthRule as AuthRules;

class AuthRuleM extends Common
{
    private $cModel;   //当前控制器关联模型
    private $module = 'member';
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new AuthRules;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $dataList = $this->cModel->treeList($this->module);
        $this->assign('module', $this->module);
        $this->assign('dataList', $dataList);
        return $this->fetch('auth_rule/index');
    }
    
    public function create()
    {
        if (request()->isPost()){
            $data = input('post.');
            $result = $this->cModel->validate('AuthRule.add')->allowField(true)->save($data);
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $treeList = $this->cModel->treeList($this->module);
            $this->assign('module', $this->module);
            $this->assign('treeList', $treeList);
            return $this->fetch('auth_rule/edit');
        }
    }
    
    public function edit($id)
    {
        if (request()->isPost()){
            $data = input('post.');
            if (count($data) == 2){
                foreach ($data as $k =>$v){
                    $fv = $k!='id' ? $k : '';
                }
                $result = $this->cModel->validate('AuthRule.'.$fv)->allowField(true)->save($data, $data['id']);
            }else{
                $result = $this->cModel->validate('AuthRule.edit')->allowField(true)->save($data, $data['id']);
            }
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $data = $this->cModel->get($id);
            $this->assign('data', $data);
            
            $this->assign('module', $this->module);
            
            $treeList = $this->cModel->treeList($this->module);
            $this->assign('treeList', $treeList);
            return $this->fetch('auth_rule/edit');
        }
    }
    
    public function delete()
    {
        if (request()->isPost()){
            $id = input('id');
            $module = $this->module;
            if (isset($id) && !empty($id) && $module){
                $id_arr = explode(',', $id);
                $where = [ 'id' => ['in', $id_arr] ];
                $result = $this->cModel->where($where)->delete();
                if ($result){
                    return ajaxReturn(lang('action_success'), url('index'));
                }else{
                    return ajaxReturn($this->cModel->getError());
                }
            }
        }
        
    }
}