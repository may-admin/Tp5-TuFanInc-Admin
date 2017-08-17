<?php
namespace app\admin\validate;

use think\Validate;

class ModuleClass extends Validate
{
    protected $rule = [
        'title' => 'require',
        'action' => 'require|alpha',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'title' => '{%title_val}',
        'action.alpha' => '{%action_alpha}',
        'action' => '{%action_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['title', 'action', 'sorts', 'status'],
        'edit'  => ['title', 'action', 'sorts', 'status'],
        'status' => ['status'],
        'title' => ['title'],
    ];
}