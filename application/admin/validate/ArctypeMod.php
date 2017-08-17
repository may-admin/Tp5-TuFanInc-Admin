<?php
namespace app\admin\validate;

use think\Validate;

class ArctypeMod extends Validate
{
    protected $rule = [
        'name' => 'require',
        'mod' => 'require|alpha',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'name' => '{%name_val}',
        'mod.alpha' => '{%mod_alpha}',
        'mod' => '{%mod_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['name', 'mod', 'sorts', 'status'],
        'edit'  => ['name', 'mod', 'sorts', 'status'],
        'status' => ['status'],
    ];
}