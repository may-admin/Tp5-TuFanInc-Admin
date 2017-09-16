<?php
namespace app\admin\model;

use think\Model;

class TokenUser extends Model
{
    /**
     * @Title: createToken
     * @Description: todo(登陆时生成用户token)
     * @param int $uid 用户id
     * @param int $type 类型【1、PC，2、移动端】
     * @param int $token_time token令牌时限【PC登陆超时】
     * @return string
     * @author 苏晓信
     * @date 2017年9月16日
     * @throws
     */
    public function createToken($uid, $type = '1', $token_time = '')
    {
        $token = md5($uid.uniqid().rand(100000000, 999999999));
        $token_time = time() + $token_time;
        $where = [
            'uid' => $uid,
            'type' => $type,
        ];
        $isToken = $this->where($where)->find();
        if (!empty($isToken)){   //存在token
            $data = [
                'token' => $token,
                'token_time' => $token_time,
            ];
            $this->where($where)->update($data);
        }else{
            $data = [
                'uid' => $uid,
                'type' => $type,
                'token' => $token,
                'token_time' => $token_time,
            ];
            $this->create($data);
        }
        return $token;
    }
}