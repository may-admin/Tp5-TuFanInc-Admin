<?php
namespace app\api\controller;

use think\Controller;

class Base extends Controller
{
    public $modelClass = false;                 //数据模型命名空间
    public $model;                              //实例化模型
    public $modelPk;                            //模型主键
    public $query;                              //数据查询句柄
    public $invalidFilter = [];                 //无效参数过滤器
    public $param;                              //请求参数
    public $allowFormat = ['json', 'xml'];      //允许返回数据格式
    
    function _initialize()
    {
        $this->param = input('param.');
        $this->_checkToken();
        if ( isset($this->param['format']) && in_array($this->param['format'], $this->allowFormat) ){
            config('default_return_type', $this->param['format']);   //设置数据返回格式
        }
        if (!class_exists($this->modelClass)){
            exit(lang('model_empty').":'{$this->modelClass}'");
        }
        $this->model = new $this->modelClass();
        $this->modelPk = isset($this->model->pk) ? $this->model->pk : 'id';     //模型主键
    }
    
    /**
     * @Title: index
     * @Description: todo(列表查询：GET)
     * @author 苏晓信
     * @date 2017年9月18日
     * @throws
     */
    public function index()
    {
        $this->query = $this->model;
        //条件查询
        if(isset($this->param['filter'])){
            $this->_filter($this->param['filter']);
        }
        //排序
        if(isset($this->param['orderBy'])){
            $this->_orderBy($this->param['orderBy']);
        }
        //单表多条查询
        $data = $this->_responseDate();
        //关联表查询
        if (isset($this->param['addon']) && $this->param['addon'] != ''){
            $data = $this->_addonData($data);
        }
        return $this->_responseResult(200, lang("success"), $data);
    }
    
    /**
     * @Title: read
     * @Description: todo(单条查询：GET)
     * @param $id 主键ID
     * @author 苏晓信
     * @date 2017年9月18日
     * @throws
     */
    public function read($id)
    {
        $data = $this->model->get($id);
        //关联表查询
        if (isset($this->param['addon']) && $this->param['addon'] != ''){
            $data = $this->_addonDataOne($data);
        }
        if (!empty($data)){
            return $this->_responseResult(200, lang("success"), $data);
        }else{
            return $this->_responseResult(400, lang("empty"));
        }
        
    }
    
    /**
     * @Title: save
     * @Description: todo(新增：POST)
     * @author 苏晓信
     * @date 2017年9月18日
     * @throws
     */
    public function save()
    {
        $result = $this->model->validate(request()->controller().'.add')->allowField(true)->save($this->param);
        if ($result){
            $last_id = $this->model->getLastInsID();
            $data = $this->model->get($last_id);
            return $this->_responseResult(200, lang("success"), $data);
        }else{
            return $this->_responseResult(400, $this->model->getError());
        }
    }
    
    /**
     * @Title: update
     * @Description: todo(编辑：PUT)
     * @param $id 主键ID
     * @author 苏晓信
     * @date 2017年9月18日
     * @throws
     */
    public function update($id)
    {
        $result = $this->model->validate(request()->controller().'.edit')->allowField(true)->save($this->param, $id);
        if ($result){
            $data = $this->model->get($id);
            return $this->_responseResult(200, lang("success"), $data);
        }else{
            return $this->_responseResult(400, $this->model->getError());
        }
    }
    
    /**
     * @Title: delete
     * @Description: todo(删除：DELETE)
     * @param $id 主键ID
     * @author 苏晓信
     * @date 2017年9月18日
     * @throws
     */
    public function delete($id)
    {
        $id = array_filter(explode(',', $id));
        $ids = [];
        foreach ($id as $v){
            if ((int)$v != 0)
            $ids[] = (int)$v;
        }
        if (!empty($ids)){
            $where = [ $this->modelPk => ['in', $ids] ];
            $result = $this->model->where($where)->delete();
            if ($result){
                return $this->_responseResult(200, lang("success"));
            }else{
                return $this->_responseResult(400, $this->model->getError());
            }
        }else{
            return $this->_responseResult(400, $this->model->getError());
        }
    }
    
    /**
     * @Title: _responseResult
     * @Description: todo(统一返回数据格式)
     * @author 苏晓信
     * @date 2017年9月19日
     * @throws
     */
    protected function _responseResult($code, $msg, $data = [])
    {
        return $res = [
            'code' => $code,
            'msg' => $msg,
            'invalidFilter' => $this->invalidFilter,
            'data' => $data,
        ];
    }
    
    /**
     * @Title: _checkToken
     * @Description: todo(检测接口Token)
     * @author 苏晓信
     * @date 2017年9月23日
     * @throws
     */
    protected function _checkToken()
    {
        $module = request()->module();
        $controller = request()->controller();
        $action = request()->action();
        $type = request()->method();   //请求方式
        //默认RESTFul资源路由
        if ($action == 'index' || $action == 'read' || $action == 'save' || $action == 'update' || $action == 'delete'){
            $method = 'index';
        }else{
            $method = $action;
        }
        $where = [
            'module' => $module,
            'controller' => $controller,
            'method' => $method,
            'type' => $type,
        ];
        $data = $this->param;
        if (isset($data['id']) && !empty($data['id'])){
            $where['param'] = 'id';
        }
        $apiData = db('token_api')->where($where)->find();
        if ($apiData['status'] == '0'){
            $res = $this->_responseResult(400, lang("api_stop"));
            exit( json_encode($res, JSON_UNESCAPED_UNICODE) );
        }
        if ($apiData['is_api_token'] == '1' && $data['token_api'] != $apiData['token']){
            $res = $this->_responseResult(400, lang("token_api_fail"));
            exit( json_encode($res, JSON_UNESCAPED_UNICODE) );
        }
        if ($apiData['is_user_token'] == '1'){
            $where = [
                'uid' => $data['token_uid'],
                'token' => $data['token_user'],
                'type' => '2',
            ];
            $tokenUser = db('token_user')->where($where)->find();
            if (empty($tokenUser)){
                $res = $this->_responseResult(400, lang("token_user_fail"));
                exit( json_encode($res, JSON_UNESCAPED_UNICODE) );
            }
        }
    }
    
    /**
     * @Title: _filter
     * @Description: todo(生成条件查询)
     * @param string $filter
     * @return boolean
     * @author 苏晓信
     * @date 2017年9月23日
     * @throws
     */
    protected function _filter($filter)
    {
        $filters = $filter;
        //查询参数校验
        if(!$filters || !is_array($filters)){
            array_push($this->invalidFilter, $filters);
            return false;
        }
        
        foreach ($filters as $key => $filterString) {
            $filter = explode(',', $filterString);
            
            if(count($filter)<3){   //参数不足，无效的查询
                array_push($this->invalidFilter, $filterString);
                continue;
            }
            $field = $filter[0];    //字段
            $match = $filter[1];    //查询条件
            $value = $filter[2];    //匹配值
            //字段过滤
            switch ($match) {
                case 'lk':
                    $this->query->where($field, 'like', "%$value%");    //LIKE查询：%value%
                    break;
                case 'lkr':
                    $this->query->where($field, 'like', "$value%");     //LIKE查询：value%
                    break;
                case 'lkl':
                    $this->query->where($field, 'like', "%$value");     //LIKE查询：%value
                    break;
                case 'eq':
                    $this->query->where($field, 'eq', $value);          //等于
                    break;
                case 'neq':
                    $this->query->where($field, 'neq', $value);         //不等于
                    break;
                case 'gt':
                    $this->query->where($field, 'gt', $value);          //大于
                    break;
                case 'egt':
                    $this->query->where($field, 'egt', $value);         //大于等于
                    break;
                case 'lt':
                    $this->query->where($field, 'lt', $value);          //小于
                    break;
                case 'elt':
                    $this->query->where($field, 'elt', $value);         //小于等于
                    break;
                case 'bt':
                    $value = $filter[2].",".$filter[3];
                    $this->query->where($field, 'between', $value);     //区间，如filter[]=id,bt,5,10
                    break;
                case 'nbt':
                    $value = $filter[2].",".$filter[3];
                    $this->query->where($field, 'not between', $value); //区间，如filter[]=id,nbt,5,10
                    break;
                case 'in':
                    unset($filter[0], $filter[1]);
                    $value = implode(',', $filter);
                    $this->query->where($field, 'in', $value);          //范围，如filter[]=id,in,5,10,7
                    break;
                case 'nin':
                    unset($filter[0], $filter[1]);
                    $value = implode(',', $filter);
                    $this->query->where($field, 'not in', $value);      //范围，如filter[]=id,nin,5,10,7
                    break;
                default:
                    array_push($this->invalidFilter, $filterString);    //无效的查询
                    break;
            }
        }
    }
    
    /**
     * @Title: _orderBy
     * @Description: todo(排序)
     * @param string $orderBy
     * @author 苏晓信
     * @date 2017年9月24日
     * @throws
     */
    protected function _orderBy($orderBy)
    {
        foreach ($orderBy as $key => $orderString) {
            $orderBy = explode(',', $orderString);
            if(count($orderBy)<2){   //参数不足，无效的排序
                array_push($this->invalidFilter, $orderString);
                continue;
            }
            $field = $orderBy[0];
            $sort = $orderBy[1];
            $this->query->order($field." ".$sort);
        }
    }
    
    /**
     * @Title: _responseDate
     * @Description: todo(单表多条查询)
     * @return array
     * @author 苏晓信
     * @date 2017年9月24日
     * @throws
     */
    protected function _responseDate()
    {
        if(!isset($this->param['noPage'])){   //默认进行分页
            $data = $this->query->paginate($this->param['pageSize']);
        }else{
            if(isset($this->param['limit'])){   //不分页
                $this->query->limit($this->param['limit']);
            }
            $data = $this->query->select();
        }
        return $data;
    }
    
    /**
     * @Title: _addonData
     * @Description: todo(关联模型查询)
     * @param array $data
     * @author 苏晓信
     * @date 2017年9月24日
     * @throws
     */
    protected function _addonData($data)
    {
        $addonArr = array_filter(explode(',', $this->param['addon']));
        if (!empty($addonArr)){
            foreach ($data as $k => $v){
                foreach ($addonArr as $k2 => $v2){
                    if(isset($v->$v2)){   //判断关联数据属性是否存在
                        $v->$v2;
                    }else{
                        array_push($this->invalidFilter, $v2);
                        unset($addonArr[$k2]);   //不存在则之后不再查询该关联数据
                    }
                }
            }
        }
        return $data;
    }
    
    /**
     * @Title: _addonDataOne
     * @Description: todo(关联模型查询)
     * @param array $data
     * @author 苏晓信
     * @date 2017年9月24日
     * @throws
     */
    protected function _addonDataOne($data)
    {
        $addonArr = array_filter(explode(',', $this->param['addon']));
        if (!empty($addonArr)){
            foreach ($addonArr as $k2 => $v2){
                if(isset($data->$v2)){   //判断关联数据属性是否存在
                    $data->$v2;
                }else{
                    array_push($this->invalidFilter, $v2);
                    unset($addonArr[$k2]);   //不存在则之后不再查询该关联数据
                }
            }
        }
        return $data;
    }
}