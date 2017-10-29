<?php
namespace app\api\validate;

use think\Validate;

class Flink extends Validate
{
    protected $rule = [
        'mid' => 'require',
        'webname' => 'require',
        'email' => 'email',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $scene = [
        'add'   => ['mid', 'webname', 'email', 'sorts', 'status'],
        'edit'  => ['mid', 'webname', 'email', 'sorts', 'status'],
    ];
}