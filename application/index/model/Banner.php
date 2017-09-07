<?php
namespace app\index\model;

use think\Model;

class Banner extends Model
{
    /**
     * @Title: banners
     * @Description: todo(banner模块数据)
     * @param int $mid
     * @param string $limit
     * @author 苏晓信
     * @date 2017年8月26日
     * @throws
     */
    public function banners($mid, $limit){
        $where = [
            'mid' => $mid,
            'status' => 1,
        ];
        $result = $this->where($where)->order('sorts ASC,id ASC')->limit($limit)->select();
        return $result;
    }
}