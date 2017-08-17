<?php
namespace app\admin\validate;

use think\Validate;

class Guestbook extends Validate
{
    protected $rule = [
        'title' => 'require',
        'email' => 'email',
        'status' => 'require|in:0,1',
        'content' => 'require',
    ];

    protected $message = [
        'title' => '{%title_val}',
        'email' => '{%email_val}',
        'status' => '{%status_val}',
        'content' => '{%content_val}',
    ];

    protected $scene = [
        'add'   => ['title', 'email', 'status', 'content'],
        'edit'  => ['title', 'email', 'status', 'content'],
        'status' => ['status'],
    ];
}