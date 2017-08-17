<?php
namespace app\admin\validate;

use think\Validate;

class Archive extends Validate
{
    protected $rule = [
        'typeid' => 'require|integer',
        'title' => 'require',
        'click' => 'require|integer|>=:0',
        'status' => 'require|in:0,1',
        'create_time' => 'require',
    ];

    protected $message = [
        'typeid' => '{%typeid_val}',
        'title' => '{%title_val}',
        'click' => '{%click_val}',
        'status' => '{%status_val}',
        'create_time' => '{%create_time_val}',
    ];

    protected $scene = [
        'add'   => ['typeid', 'title', 'click', 'status', 'create_time'],
        'edit'  => ['typeid', 'title', 'click', 'status', 'create_time'],
        'status' => ['status'],
        'title' => ['title'],
        'writer' => ['writer'],
    ];
}