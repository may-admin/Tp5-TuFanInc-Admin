<?php
namespace app\admin\validate;

use think\Validate;

class Banner extends Validate
{
    protected $rule = [
        'title' => 'require',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'title' => '{%title_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['title', 'sorts', 'status'],
        'edit'  => ['title', 'sorts', 'status'],
        'status' => ['status'],
        'title' => ['title'],
        'url' => ['url'],
    ];
}