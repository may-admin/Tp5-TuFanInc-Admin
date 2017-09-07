<?php
namespace app\index\model;

use think\Model;

class Config extends Model
{
    /**
     * @Title: confv
     * @Description: todo(获取配置值)
     * @param string $k
     * @param string $type
     * @return string
     * @author 苏晓信
     * @date 2017年8月26日
     * @throws
     */
    public function confv($k, $type){
        $where = [
            'k' => $k,
            'type' => $type
        ];
        $result = $this->where($where)->value('v');
        return htmlspecialchars_decode($result);
    }
}