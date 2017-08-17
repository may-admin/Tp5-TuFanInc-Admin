<?php
namespace app\admin\validate;

use think\Validate;

class Arctype extends Validate
{
    protected $rule = [
        'pid' => 'require|integer',
        'typename' => 'require',
        'mid' => 'require|integer',
        'dirs' => 'require|/^[a-zA-Z0-9\-\_]+$/',
        'target' => 'require',
        'templist' => 'require|/^[a-zA-Z0-9\_]+$/',
        'temparticle' => 'require|/^[a-zA-Z0-9\_]+$/',
        'pagesize' => 'require|integer|>=:1',
        'sorts' => 'require|integer|>=:1',
        'status' => 'require|in:0,1',
    ];

    protected $message = [
        'pid' => '{%pid_val}',
        'typename' => '{%typename_val}',
        'mid' => '{%mid_val}',
        'dirs.require' => '{%dirs_require}',
        'dirs' => '{%dirs_val}',
        'target' => '{%target_val}',
        'templist' => '{%templist_val}',
        'temparticle' => '{%temparticle_val}',
        'pagesize' => '{%pagesize_val}',
        'sorts' => '{%sorts_val}',
        'status' => '{%status_val}',
    ];

    protected $scene = [
        'add'   => ['pid', 'typename', 'mid', 'dirs', 'target', 'templist', 'temparticle', 'pagesize', 'sorts', 'status'],
        'edit'  => ['pid', 'typename', 'mid', 'dirs', 'target', 'templist', 'temparticle', 'pagesize', 'sorts', 'status'],
        'status' => ['status'],
        'typename' => ['typename'],
        'dirs' => ['dirs'],
    ];
}