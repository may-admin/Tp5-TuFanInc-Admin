<?php
namespace app\admin\controller;

use think\Controller;
use think\db\Query;

class Database extends Common
{
    public function _initialize()
    {
        parent::_initialize();
    }
    
    /**
     * @Title: index
     * @Description: todo(数据库列表)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function index()
    {
        $dataList = db()->query("SHOW TABLE STATUS");
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    /**
     * @Title: backup
     * @Description: todo(备份数据库)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function backup()
    {
        if (request()->isPost()){
            $id = input('id');
            if (isset($id) && !empty($id)){
                $table_arr = explode(',', $id);   //备份数据表
                $sql = new \expand\Baksql(\think\Config::get("database"));
                $res = $sql->backup($table_arr);
                return ajaxReturn($res, url('index'));
            }
        }
    }
    
    /**
     * @Title: reduction
     * @Description: todo(备份列表)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function reduction()
    {
        $sql = new \expand\Baksql(\think\Config::get("database"));
        $dataList = $sql->get_filelist();
        $this->assign('dataList', $dataList);
        return $this->fetch();
    }
    
    /**
     * @Title: restore
     * @Description: todo(还原数据库)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function restore()
    {
        if (request()->isPost()){
            $name = input('id');
            $sql = new \expand\Baksql(\think\Config::get("database"));
            $res = $sql->restore($name);
            return ajaxReturn($res, url('reduction'));
        }
    }
    
    /**
     * @Title: dowonload
     * @Description: todo(下载备份)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function dowonload()
    {
        $table = input('table');
        $sql = new \expand\Baksql(\think\Config::get("database"));
        $sql->downloadFile($table);
    }
    
    /**
     * @Title: delete
     * @Description: todo(删除备份)
     * @author 苏晓信
     * @date 2017年8月11日
     * @throws
     */
    public function delete()
    {
        if (request()->isPost()){
            $name = input('id');
            $sql = new \expand\Baksql(\think\Config::get("database"));
            $res = $sql->delfilename($name);
            return ajaxReturn($res, url('reduction'));
        }
    }
}