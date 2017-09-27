<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User as Users;
use app\admin\model\TokenUser;

class Login extends Controller
{
    private $cModel;   //当前控制器关联模型
    
    public function _initialize()
    {
        parent::_initialize();
        $this->cModel = new Users;   //别名：避免与控制名冲突
    }
    
    public function index()
    {
        $userId = session('userId');
        if (!empty($userId)){
            $this->redirect(url('Index/index'));
        }else{
            return $this->fetch();
        }
    }
    
    public function checkLogin()
    {
        if(request()->isPost()){
            $tkModel = new TokenUser();
            $data = input('post.');
            if(!captcha_check($data['code'])){
                return ajaxReturn(lang('code_error'));
            };
            $where = ['username' => $data['username'] ];
            $user = $this->cModel->where($where)->find();
            $user->userInfo;
            if(!empty($user)){
                if($user['status'] != '1'){
                    return ajaxReturn(lang('user_stop'));
                }elseif($user['password'] != md5($data['password'])){
                    return ajaxReturn(lang('password_error'));
                }else{
                    // 更新登陆信息
                    $ip = request()->ip();
                    //$ip = '111.10.243.171';
                    $updata = [
                        'logins' => $user['logins']+1,
                        'last_time' => time(),
                        'last_ip' => $ip,
                    ];
                    $where = ['id' => $user['id']];
                    $this->cModel->where($where)->update($updata);
                    //设置session,cookie
                    session('userId', $user['id']);
                    if (!empty($user['name'])){
                        cookie('name', $user['name']);
                    }else{
                        cookie('name', $user['username']);
                    }
                    cookie('uname', $user['username']);
                    cookie('uid', $user['id']);
                    cookie('avatar', $user->userInfo->avatar);
                    $config = new \app\admin\model\Config();
                    $login_time = $config->where(['type'=>'system', 'k'=>'login_time'])->value('v');
                    $user_token = $tkModel->createToken($user['id'], 1, $login_time);
                    session('user_token', $user_token);
                    //登陆日志
                    $ipStr = @file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=js&ip=".$ip);   //.$ip
                    if ($ipStr != '-2'){
                        $llModel = new \app\admin\model\LoginLog();
                        $s = mb_strpos($ipStr, '{');
                        $e = mb_strpos($ipStr, '}');
                        $ipJsonStr = mb_substr($ipStr, $s, $e-$s+1);
                        $ipArr = json_decode($ipJsonStr, true);
                        $logData = [
                                'uid' => $user['id'],
                                'ip' => $ip,
                                'country' => $ipArr['country'],
                                'province' => $ipArr['province'],
                                'city' => $ipArr['city'],
                                'district' => $ipArr['district']
                        ];
                        $llModel->save($logData);
                    }
                    return ajaxReturn(lang('login_success'), url('Index/index'));
                }
            }else{
                return ajaxReturn(lang('user_no_exist'));
            }
        }
    }
    
    public function loginOut($params='')
    {
        session('userId', null);
        session('user_token', null);
        cookie('name', null);
        cookie('uname', null);
        cookie('uid', null);
        cookie('avatar', null);
        $this->redirect('Login/index', $params);
    }
    
    public function restLogin(){
        return $this->fetch();
    }
}
