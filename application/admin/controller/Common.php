<?php
namespace app\admin\controller;

use think\Controller;
use think\Lang;
use app\admin\model\AuthRule;
use expand\Auth;
use app\admin\model\Config;

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
        $userId = session('userId');   //判断是登陆
        if (empty($userId)){
            $this->redirect('Login/index');
        }
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
}
