<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User as Users;
use app\admin\model\AuthGroup;
use app\admin\model\AuthGroupAccess;
use app\admin\model\UserInfo;
use think\Db;

class User extends Common
{
    private $cModel;   //当前控制器关联模型
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new Users;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $where = [];
        if (input('get.search')){
            $where['username|name|email|moblie'] = ['like', '%'.input('get.search').'%'];
        }
        if (input('get._sort')){
            $order = explode(',', input('get._sort'));
            $order = $order[0].' '.$order[1];
        }else{
            $order = 'id desc';
        }
        $dataList = $this->cModel->where($where)->order($order)->paginate('', false, page_param());
        $agMolde = new AuthGroup();
        $agList = $agMolde->select();
        $agListArr = [];
        $agListArrPic = [];
        foreach ($agList as $k => $v){
            $agListArr[$v['id']] = $v['title'];
            $agListArrPic[$v['id']] = $v['pic'];
        }
        foreach ($dataList as $k => $v){
            $v->userGroup;
            if (!empty($v['userGroup'])){
                foreach ($v['userGroup'] as $k2 => $v2){
                    $v['userGroup'][$k2]['title'] = $agListArr[$v2['group_id']];
                    $v['userGroup'][$k2]['pic'] = $agListArrPic[$v2['group_id']];
                }
            }
        }
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    public function create()
    {
        if (request()->isPost()){
            Db::startTrans();
            try{
                $data = input('post.');
                $result = $this->cModel->validate(CONTROLLER_NAME.'.add')->allowField(true)->save($data);
                $uid = $this->cModel->getLastInsID();
                $uiModel = new UserInfo();
                $infoData = ['uid' => $uid];
                $result2 = $uiModel->data($infoData, true)->save();
                // 提交事务
                if ($result && $result2){
                    Db::commit();
                    return ajaxReturn(lang('action_success'), url('index'));
                }else{
                    return ajaxReturn($this->cModel->getError());
                }
            } catch (\Exception $e) {
                // 回滚事务
                Db::rollback();
                return ajaxReturn($e->getMessage());
            }
        }else{
            return $this->fetch('create');
        }
    }
    
    public function edit($id)
    {
        if (request()->isPost()){
            $data = input('post.');
            if ($data['actions'] == 'password'){    //修改密码
                if ( $data['id'] != UID ){          //修改他人密码需验证旧密码
                    $oldData = $this->cModel->where(['id' => $data['id'], 'password' => md5($data['oldpassword'])])->find();
                    if (empty($oldData)){
                        ajaxReturn(lang('oldpassword_val'));
                    }
                }
                $result = $this->cModel->validate(CONTROLLER_NAME.'.password')->allowField(true)->save($data, $data['id']);
            }elseif ($data['actions'] == 'avatar'){   //修改头像
                $uiModel = new UserInfo();
                $where = ['uid' => $data['id']];
                unset($data['actions']);
                $result = $uiModel->allowField(true)->where($where)->update($data);
            }elseif ($data['actions'] == 'infos'){   //修改附加信息
                $uiModel = new UserInfo();
                $where = ['uid' => $data['id']];
                if ( isset($data['birthday']) ){
                    $data['birthday'] = strtotime($data['birthday']);
                }
                unset($data['actions']);
                $result = $uiModel->allowField(true)->where($where)->update($data);
            }else{   //修改信息
                if (count($data) == 2){
                    foreach ($data as $k =>$v){
                        $fv = $k!='id' ? $k : '';
                    }
                    $result = $this->cModel->validate(CONTROLLER_NAME.'.'.$fv)->allowField(true)->save($data, $data['id']);
                }else{
                    $result = $this->cModel->validate(CONTROLLER_NAME.'.edit')->allowField(true)->save($data, $data['id']);
                }
            }
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            if ($id > 0){
                $data = $this->cModel->get($id);
                $data->userInfo;   //用户附加信息数据
                $this->assign('data', $data);
                return $this->fetch();
            }
        }
    }
    
    public function delete()
    {
        if (request()->isPost()){
            $id = input('id');
            if (isset($id) && !empty($id)){
                Db::startTrans();
                try{
                    $id_arr = explode(',', $id);   //用户数据
                    $where1 = [ 'uid' => ['in', $id_arr] ];
                    $uiModel = new UserInfo();
                    $data = $uiModel->where($where1)->select();   //查询用户附加表信息【用于删除头像】
                    $where2 = [ 'id' => ['in', $id_arr] ];
                    $result = $this->cModel->where($where2)->delete();   //删除主表数据
                    $where3 = [ 'uid' => ['in', $id_arr] ];
                    $agaModel = new AuthGroupAccess();
                    $agaModel->where($where1)->delete();   //删除用户分配角色
                    $result2 = $uiModel->where($where1)->delete();   //删除用户附加表
                    // 提交事务
                    if ($result && $result2){
                        Db::commit();
                        foreach ($data as $k => $v){
                            if ($v['avatar'] != '/static/global/face/default.png'){
                                unlink(WEB_PATH.$v['avatar']);   //删除头像文件
                            }
                        }
                        return ajaxReturn(lang('action_success'), url('index'));
                    }else{
                        return ajaxReturn($this->cModel->getError());
                    }
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();
                    return ajaxReturn($e->getMessage());
                }
            }
        }
    }
    
    public function authGroup($id)
    {
        $agaModel = new AuthGroupAccess;
        if (request()->isPost()){
            $data = input('post.');
            $uid = $data['id'];
            $group_id = $data['group_id'];
            $where = ['uid' => $uid];
            $agaModel->where($where)->delete();
            if (!empty($group_id)){
                $addList = array();
                foreach ($group_id as $k =>$v){
                    $addList[] = ['uid' => $uid, 'group_id' => $v];
                }
                $agaModel->saveAll($addList, false);
            }
            return ajaxReturn(lang('action_success'), url('index'));
        }else{
            if ($id > 0){
                $agModel = new AuthGroup();
                $groupList = $agModel->where(['status' => 1])->order('module ASC,level ASC,id ASC')->select();   //所有正常角色
                $userGroup = $agaModel->where(['uid' => $id])->select();   //当前用户已拥有角色
                foreach ($groupList as $k => $v){
                    foreach ($userGroup as $k2 => $v2){
                        if ($v2['group_id'] == $v['id']){
                            $groupList[$k]['ischeck'] = 'y';
                            break;
                        }
                    }
                }
                $data = $this->cModel->get($id);
                $this->assign('data', $data);
                $this->assign('groupList', $groupList);
                return $this->fetch();
            }
        }
    }
}