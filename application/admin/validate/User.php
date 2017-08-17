<?php
namespace app\admin\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'username' => 'require|min:1|unique:user',
        'password' => 'require|min:6',
        'repassword' => 'require|confirm:password',
        'email' => 'email|unique:user',
        'moblie' => '/^1[34578]\d{9}$/|unique:user',
        'sex' => 'require|in:0,1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'username.require' => '{%username_require}',
        'username.min' => '{%username_min}',
        //'username' => '{%username_val}',
        'username.unique' => '{%username_unique}',
        'password' => '{%password_val}',
        'password.min' => '{%password_min}',
        'repassword' => '{%repassword_val}',
        'email' => '{%email_val}',
        'email.unique' => '{%email_unique}',
        'moblie' => '{%moblie_val}',
        'moblie.unique' => '{%moblie_unique}',
        'sex' => '{%sex_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['username', 'password', 'repassword', 'email', 'moblie', 'sex', 'status'],
        'edit'  => ['email', 'moblie', 'sex', 'status'],
        'password' => ['password', 'repassword'],
        'status' => ['status'],
        'name' => ['name'],
    ];
}