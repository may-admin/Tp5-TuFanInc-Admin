<?php
namespace app\admin\validate;

use think\Validate;

class TokenApi extends Validate
{
    protected $rule = [
        'name' => 'require',
        'module' => 'require',
        'controller' => 'require',
        'method' => 'require',
        'is_user_token' => 'require|in:0,1',
        'is_api_token' => 'require|in:0,1',
        'type' => 'require',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'name' => '{%name_val}',
        'module' => '{%module_val}',
        'controller' => '{%controller_val}',
        'method' => '{%method_val}',
        'is_user_token' => '{%is_user_token_val}',
        'is_api_token' => '{%is_api_token_val}',
        'type' => '{%type_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['name', 'module', 'controller', 'method', 'param', 'is_user_token', 'is_api_token', 'type', 'sorts', 'status'],
        'edit'  => ['name', 'module', 'controller', 'method', 'param', 'is_user_token', 'is_api_token', 'type', 'sorts', 'status'],
        'name' => ['name'],
        'module' => ['module'],
        'controller' => ['controller'],
        'method' => ['method'],
        'param' => ['param'],
        'is_user_token' => ['is_user_token'],
        'is_api_token' => ['is_api_token'],
        'status' => ['status'],
    ];
}