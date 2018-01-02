<?php
namespace app\admin\controller;

use think\Controller;
use think\Lang;
use app\admin\model\AuthRule;
use expand\Auth;
use app\admin\model\Config;
use app\admin\controller\Login;
use app\admin\model\TokenUser;

/**
 * admin基础控制器
 * @author duqiu
 */
class Common extends Controller
{
    /**
     * 基础控制器初始化
     * @author duqiu
     */
    public function _initialize()
    {
        $this->restLogin();
        $userId = session('userId');
        define('UID', $userId);   //设置登陆用户ID常量
        
        define('MODULE_NAME', request()->module());
        define('CONTROLLER_NAME', request()->controller());
        define('ACTION_NAME', request()->action());
        
        $box_is_pjax = $this->request->isPjax();
        $this->assign('box_is_pjax', $box_is_pjax);
        
        $treeMenu = $this->treeMenu();
        $this->assign('treeMenu', $treeMenu);
        
        //加载多语言相应控制器对应字段
        if($_COOKIE['think_var']){
            $langField = $_COOKIE['think_var'];
        }else{
            $langField = config('default_lang');
        }
        Lang::load(APP_PATH . 'admin/lang/'.$langField.'/'.CONTROLLER_NAME.'.php');
        
        $auth = new Auth();
        if (!$auth->check(CONTROLLER_NAME.'/'.ACTION_NAME, UID)){
            $this->error(lang('auth_no_exist'), url('Login/index'));
        }
    }
    
    public function treeMenu()
    {
        $treeMenu = cache('DB_TREE_MENU_'.UID);
        if(!$treeMenu){
            $where = [
                'ismenu' => 1,
                'module' => 'admin',
            ];
            if (UID != '-1'){
                $where['status'] = 1;
            }
            $arModel = new AuthRule();
            $lists =  $arModel->where($where)->order('sorts ASC,id ASC')->select();
            $treeClass = new \expand\Tree();
            $treeMenu = $treeClass->create($lists);
            //判断导航tree用户使用权限
            foreach($treeMenu as $k=>$val){
                if( authcheck($val['name'], UID) == 'noauth' ){
                    unset($treeMenu[$k]);
                }
            }
            cache('DB_TREE_MENU_'.UID, $treeMenu);
        }
        return $treeMenu;
    }
    
    private function restLogin()
    {
        $login = new Login();
        $userId = session('userId');
        if (empty($userId)){   //未登录
            $login->loginOut();
        }
        $config = new Config();
        $login_time = $config->where(['type'=>'system', 'k'=>'login_time'])->value('v');
        $now_token = session('user_token');   //当前token
        $tkModel = new TokenUser();
        $db_token = $tkModel->where(['uid'=>$userId, 'type'=>'1'])->find();   //数据库token
        if ($db_token['token'] != $now_token){   //其他地方登录
            $this->loginBox(lang('login_other'));
        }else{
            if ($db_token['token_time'] < time()){   //登录超时
                $this->loginBox(lang('login_timeout'));
            }else{
                $token_time = time() + $login_time;
                $data = ['token_time' => $token_time];
                $tkModel->where(['uid'=>$userId, 'type'=>'1'])->update($data);
            }
        }
        return;
    }
    
    private function loginBox($info='')
    {
        if (request()->isGet()){
            $rest_login = 1;
            $this->assign('rest_login_info', $info);
            $this->assign('rest_login', $rest_login);
        }else{
            ajaxReturn($info, '', 2);
        }
    }
}