<?php
namespace app\admin\validate;

use think\Validate;

class Flink extends Validate
{
    protected $rule = [
        'webname' => 'require',
        'email' => 'email',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'webname' => '{%webname_val}',
        'email' => '{%email_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['webname', 'email', 'sorts', 'status'],
        'edit'  => ['webname', 'email', 'sorts', 'status'],
        'status' => ['status'],
        'webname' => ['webname'],
        'url' => ['url'],
    ];
}