<?php

return [
    'id'                => 'ID',
    'name'              => '文章模型名称',
    'mod'               => '文章模型操作',
    'sorts'             => '排序',
    'status'            => '状态',
    'create_time'       => '创建时间',
    'update_time'       => '编辑时间',
    
    //数据验证提示
    'name_val'              => '文章模型名称不能为空',
    'mod_val'               => '文章模型操作不能为空',
    'mod_alpha'             => '文章模型操作必须为字母',
    'sorts_val'             => '排序必须为大于0数字整数',
    'status_val'            => '状态必须为数字整数（0,1）',
    
    //其他
    'not_edit'              => '系统默认文章模型不可操作',
];