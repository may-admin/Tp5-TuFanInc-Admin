<?php

return [
    'id'                => 'ID',
    'username'          => '用户名',
    'password'          => '密码',
    'name'              => '姓名',
    'email'             => '邮箱',
    'moblie'            => '手机号码',
    'avatar'            => '头像',
    'qq'                => 'QQ',
    'birthday'          => '生日',
    'sex'               => '性别',
    'info'              => '用户信息',
    'logins'            => '登陆次数',
    'create_time'       => '创建时间',
    'update_time'       => '编辑时间',
    'reg_ip'            => '注册IP',
    'last_time'         => '最后登录时间',
    'last_ip'           => '最后登录IP',
    'status'            => '状态',
    
    //数据验证提示
    'username_require'      => '用户名不能为空',
    'username_min'          => '用户名长度不能少于1位',
    'username_unique'       => '用户名已经存在，请重新填写',
    //'username_val'          => '用户名只能使用字母和数字',
    'password_val'          => '密码不能为空',
    'password_min'          => '密码长度不能少于6位',
    'repassword_val'        => '确认密码不正确',
    'email_val'             => '请填写正确的邮箱格式',
    'email_unique'          => '邮箱已经被使用，请重新填写',
    'moblie_val'            => '请填写正确的手机号码格式',
    'moblie_unique'         => '手机号码已经被使用，请重新填写',
    'sex_val'               => '性别必须为数字整数（0,1）',
    'status_val'            => '状态必须为数字整数（0,1）',
    'oldpassword_val'       => '旧密码错误，请重新填写',
    
    //其他
    'repassword'        => '确认密码',
    'oldpassword'       => '旧密码',
    'newpassword'       => '新密码',
    'auth_group'        => '授权角色',
];