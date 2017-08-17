<?php
namespace app\admin\validate;

use think\Validate;

class AuthRule extends Validate
{
    protected $rule = [
        'pid' => 'require|integer',
        'title' => 'require',
        'name' => 'require|unique:auth_rule|/^[a-zA-Z0-9\/\-\_]+$/',
        'level' => 'require|in:1,2,3',
        'status' => 'require|in:0,1',
        'ismenu' => 'require|in:0,1',
        'sorts' => 'require|integer|>=:1',
    ];

    protected $message = [
        'pid' => '{%pid_val}',
        'title' => '{%title_val}',
        'name.require' => '{%name_require}',
        'name.unique' => '{%name_unique}',
        'name' => '{%name_val}',
        'level' => '{%level_val}',
        'status' => '{%status_val}',
        'ismenu' => '{%ismenu_val}',
        'sorts' => '{%sorts_val}',
    ];

    protected $scene = [
        'add'   => ['pid', 'title', 'name', 'level', 'status', 'ismenu', 'sorts'],
        'edit'  => ['pid', 'title', 'name', 'level', 'status', 'ismenu', 'sorts'],
        'status' => ['status'],
        'ismenu' => ['ismenu'],
        'title' => ['title'],
        'name' => ['name'],
    ];
}