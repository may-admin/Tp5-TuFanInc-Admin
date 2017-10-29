<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\TokenApi as TokenApis;
use app\admin\model\Config;

class TokenApi extends Common
{
    private $cModel;   //当前控制器关联模型
    private $apiModel = false;
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new TokenApis;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $where = [];
        if (input('get.search')){
            $where['name|url'] = ['like', '%'.input('get.search').'%'];
        }
        if (input('get._sort')){
            $order = explode(',', input('get._sort'));
            $order = $order[0].' '.$order[1];
        }else{
            $order = 'sorts asc,id asc';
        }
        $dataList = $this->cModel->where($where)->order($order)->paginate('', false, page_param());
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    public function create()
    {
        if (request()->isPost()){
            $data = input('post.');
            $result = $this->cModel->validate(CONTROLLER_NAME.'.add')->allowField(true)->save($data);
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            return $this->fetch('edit');
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
                if ($result){
                    return ajaxReturn(lang('action_success'), url('index'));
                }else{
                    return ajaxReturn($this->cModel->getError());
                }
            }
        }
    }
    
    public function token()
    {
        if (request()->isPost()){
            $id = input('id');
            $data = $this->cModel->get($id);
            $encryption = Config::getByK('api_token_encryption');
            //token生成规则【模块/控制器/方法/ID/加密字段】
            $rule = data['module'].$data['controller'].$data['method'].$data['id'].$encryption['v'];
            $token = md5($rule);
            $data = ['token' => $token];
            $result = $this->cModel->allowField(true)->save($data, ['id' => $id]);
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }
    }
    
    public function generateDocument()
    {
        if (request()->isPost()){
            $id = input('id');
            $data = $this->cModel->get($id);
            
            $this->apiModel = "\app\\".$data['module']."\model\\".$data['controller'];
            
            if (class_exists($this->apiModel)){
                switch ($data['type']){
                    case "GET":
                        $result = $this->_get($data);
                        break;
                    case "POST":
                        $result = $this->_post($data);
                        break;
                    case "PUT":
                        $result = $this->_put($data);
                        break;
                    case "DELETE":
                        $result = $this->_delete($data);
                        break;
                    default:
                        $result = 0;
                }
            }else{
                return ajaxReturn(lang('no_model'));
            }
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn(lang('action_fail'));
            }
        }
    }
    
    private function _get($data)
    {
        $document = [];
        if (!empty($data['param'])){
            $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/1';
        }else{
            if ($data['method'] != 'index'){
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/'.$data['method'];
            }else{
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']);
            }
        }
        $edata['document'] = json_encode($document);
        $res = $this->cModel->allowField(true)->save($edata, ['id' => $data['id']]);
        return $res;
    }
    
    private function _post($data)
    {
        $document = [];
        if ($data['method'] != 'index'){
            $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/'.$data['method'];
        }else{
            $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']);
        }
        $apiModel = new $this->apiModel;
        $fields = $apiModel->getTableFields();   //获取当前表所有字段生成基础文档字段
        $fieldsArr = [];
        foreach ($fields as $k => $v){
            $fieldsArr[$k]['key'] = $v;
            $fieldsArr[$k]['value'] = '';
            $fieldsArr[$k]['type'] = 'text';
            $fieldsArr[$k]['enabled'] = true;
        }
        $document['data'] = $fieldsArr;
        $edata['document'] = json_encode($document);
        $res = $this->cModel->allowField(true)->save($edata, ['id' => $data['id']]);
        return $res;
    }
    
    private function _put($data)
    {
        $document = [];
        if (!empty($data['param'])){
            if ($data['method'] != 'index'){
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/'.$data['method'];
            }else{
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/1';
            }
            $apiModel = new $this->apiModel;
            $fields = $apiModel->getTableFields();   //获取当前表所有字段生成基础文档字段
            $fieldsArr = [];
            foreach ($fields as $k => $v){
                $fieldsArr[$k]['key'] = $v;
                $fieldsArr[$k]['value'] = '';
                $fieldsArr[$k]['type'] = 'text';
                $fieldsArr[$k]['enabled'] = true;
            }
            $document['data'] = $fieldsArr;
            $edata['document'] = json_encode($document);
            $res = $this->cModel->allowField(true)->save($edata, ['id' => $data['id']]);
        }else{
            $res = 0;
        }
        return $res;
    }
    
    private function _delete($data)
    {
        $document = [];
        if (!empty($data['param'])){
            if ($data['method'] != 'index'){
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/'.$data['method'];
            }else{
                $document['url'] = '/'.$data['module'].'/'.strtolower($data['controller']).'/1,2,3';
            }
            $edata['document'] = json_encode($document);
            $res = $this->cModel->allowField(true)->save($edata, ['id' => $data['id']]);
        }else{
            $res = 0;
        }
        return $res;
    }
    
    //接口请求地址 OK
    //请求方式 OK
    //4个示例方式参数说明
    //参数值 必填 非必填
    //导出postman格式json
    //自动生成接口基础文档
    public function viewDocument($id)
    {
        if (request()->isPost()){
            $id = input('post.id');
            $type = input('post.type');
            if ($type == 'GET' || $type == 'DELETE'){
                $url = input('post.url');
                if (!empty($url)){
                    $document['url'] = input('post.url');
                    $document = json_encode($document);
                }else{
                    $document = '';
                }
                $data['document'] = $document;
            }elseif ($type == 'POST' || $type == 'PUT'){
                $data = input('post.');
                $url = $data['url'];
                $enabled = $data['enabled'];
                $key = $data['key'];
                $value = $data['value'];
                if (empty($url) || empty($enabled) || empty($key) || empty($value)){
                    $document = '';
                    $data['document'] = $document;
                }else{
                    $fieldsArr = [];
                    foreach ($key as $k=>$v){
                        if (!empty($v)){
                            $fieldsArr[$k]['key'] = $v;
                            $fieldsArr[$k]['value'] = $value[$k];
                            $fieldsArr[$k]['type'] = 'text';
                            if ($enabled[$k] == 'true'){
                                $fieldsArr[$k]['enabled'] = true;
                            }else{
                                $fieldsArr[$k]['enabled'] = false;
                            }
                        }
                    }
                    if (!empty($fieldsArr)){
                        $document['url'] = $url;
                        $document['data'] = $fieldsArr;
                        $document = json_encode($document);
                    }else{
                        $document = '';
                    }
                    $data['document'] = $document;
                }
            }else{
                $data = [];
            }
            $result = $this->cModel->allowField(true)->save($data, ['id' => $id]);
            if ($result){
                return ajaxReturn(lang('action_success'), url('index'));
            }else{
                return ajaxReturn($this->cModel->getError());
            }
        }else{
            $data = $this->cModel->get($id);
            $document = json_decode($data['document'], true);
            $api_url = Config::getByK('api_url');
            $api_url = $api_url['v'].$document['url'];
            if (isset($document['data'])){
                $documentdata = $document['data'];
                $this->assign('documentdata', $documentdata);
            }
            $this->assign('data', $data);
            $this->assign('url', $document['url']);
            $this->assign('api_url', $api_url);
            return $this->fetch();
        }
    }
}