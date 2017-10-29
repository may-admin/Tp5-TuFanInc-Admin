<?php
namespace app\api\validate;

use think\Validate;

class Archive extends Validate
{
    protected $rule = [
        'typeid' => 'require|integer',
        'mod' => 'require',
        'title' => 'require',
        'click' => 'require|integer|>=:0',
        'status' => 'require|in:0,1',
    ];

    protected $scene = [
        'add'   => ['typeid', 'mod', 'title', 'click', 'status'],
        'edit'  => ['typeid', 'title'],
    ];
}