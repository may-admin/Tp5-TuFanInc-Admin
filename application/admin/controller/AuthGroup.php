<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\AuthGroup as AuthGroups;
use app\admin\model\AuthRule;
use app\admin\model\AuthGroupAccess;
use app\admin\model\User;

class AuthGroup extends Common
{
    private $cModel;   //当前控制器关联模型
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new AuthGroups;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $where = [];
        if (input('get.search')){
            $where['title|notation'] = ['like', '%'.input('get.search').'%'];
        }
        if (input('get._sort')){
            $order = explode(',', input('get._sort'));
            $order = $order[0].' '.$order[1];
        }else{
            $order = 'module asc,level desc,id asc';
        }
        $dataList = $this->cModel->where($where)->order($order)->paginate('', false, page_param());
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    public function create()
    {
        if (request()->isPost()){
            $data = input('post.');
            $data['rules'] = $data['rules'] ? implode(',', $data['rules']) : '';
            $result = $this->cModel->validate(CONTROLLER_NAME.'.add')->allowField(true)->save($data);
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $arModel = new AuthRule();
            $authRuleTree = $arModel->treeList();
            $this->assign('authRuleTree', $authRuleTree);   //树形权限节点列表
            return $this->fetch('edit');
        }
    }
    
    public function edit($id)
    {
        if (request()->isPost()){
            $data = input('post.');
            if ( isset($data['rules']) ){
                $data['rules'] = $data['rules'] ? implode(',', $data['rules']) : '';
            }
            if (count($data) == 2){
                foreach ($data as $k =>$v){
                    $fv = $k!='id' ? $k : '';
                }
                $result = $this->cModel->validate(CONTROLLER_NAME.'.'.$fv)->allowField(true)->save($data, $data['id']);
            }else{
                $result = $this->cModel->validate(CONTROLLER_NAME.'.edit')->allowField(true)->save($data, $data['id']);
            }
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $data = $this->cModel->get($id);
            $this->assign('data', $data);
            
            $arModel = new AuthRule();
            $authRuleTree = $arModel->treeList('', 1);   //树形权限节点列表
            
            $rulesArr = explode(',', $data['rules']);   //以前就拥有的权限节点
            foreach ($authRuleTree as $k => $val){
                if(in_array($val['id'], $rulesArr)){
                    $authRuleTree[$k]['ischeck'] = 'y';
                }else {
                    $authRuleTree[$k]['ischeck'] = 'n';
                }
            }
            
            $this->assign('authRuleTree', $authRuleTree);
            return $this->fetch();
        }
    }
    
    public function delete()
    {
        if (request()->isPost()){
            $id = input('id');
            if (isset($id) && !empty($id)){
                $id_arr = explode(',', $id);
                $where = [ 'id' => ['in', $id_arr] ];
                $result = $this->cModel->where($where)->delete();
                
                $where = [ 'group_id' => ['in', $id_arr] ];
                $agaModel = new AuthGroupAccess();
                $agaModel->where($where)->delete();
                if ($result){
                    return ajaxReturn(lang('action_success'), url('index'));
                }else{
                    return ajaxReturn($this->cModel->getError());
                }
            }
        }
    }
    
    public function authUser($id)
    {
        $agaModel = new AuthGroupAccess();
        if (request()->isPost()){
            $data = input('post.');
            $group_id = $data['id'];   //当前角色ID
            $uid = $data['uid'];   //新提交授权用户数组:[1,2,3,4....]
            
            $oldData = $agaModel->where(['group_id' => $group_id])->select();
            $oldUser = array();   //以前授权用户
            $mixArr = array();   //交集授权用户
            $addArr = array();   //新增授权用户
            $delArr = array();   //删除授权用户
            foreach ($oldData as $k =>$v){
                $oldUser[] = $v['uid'];
            }
            $mixArr = array_intersect($uid, $oldUser);
            if (empty($mixArr)){
                $addArr = $uid;
                $delArr = $oldUser;
            }else{
                $addArr = array_diff($uid, $mixArr);
                $delArr = array_diff($oldUser, $mixArr);
            }
            if (!empty($delArr)){
                $where = [
                    'group_id' => $group_id,
                    'uid' => ['in', $delArr],
                ];
                $agaModel->where($where)->delete();
            }
            if (!empty($addArr)){
                $addList = array();
                foreach ($addArr as $k => $v){
                    $addList[] = ['group_id' => $group_id, 'uid' => $v];
                }
                $agaModel->saveAll($addList, false);
            }
            return ajaxReturn(lang('action_success'), url('index'));
        }else{
            $authList = $agaModel->alias('a')->join('user u','a.uid = u.id')
                ->field('u.id,u.username,u.name')
                ->where(['group_id' => $id])->select();   //已经拥有权限用户
            
            $uModel = new User();
            $userList = $uModel->field('id,username,name')->select();   //全部用户
            
            foreach ($userList as $k => $v){   //删除全部用户中已授权用户
                foreach ($authList as $k2 => $v2){
                    if ($v['id'] == $v2['id']){
                        unset($userList[$k]);
                        break;
                    }
                }
            }
            $this->assign('id', $id);
            $this->assign('userList', $userList);
            $this->assign('authList', $authList);
            return $this->fetch();
        }
    }
}