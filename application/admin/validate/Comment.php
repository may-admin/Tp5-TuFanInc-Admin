<?php
namespace app\admin\validate;

use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'status' => '{%status_val}',
    ];

    protected $scene = [
        //'add'   => ['status'],
        'edit'  => ['status'],
        'status' => ['status'],
    ];
}