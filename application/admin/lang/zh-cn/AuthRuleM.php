<?php

return [
    'id'                => 'ID',
    'pid'               => '父级节点',
    'module'            => '所属模块',
    'level'             => '节点类型',
    'name'              => '节点地址',
    'title'             => '节点名称',
    'type'              => '类型',
    'status'            => '状态',
    'ismenu'            => '是否菜单',
    'condition'         => '条件',
    'icon'              => '节点图标',
    'sorts'             => '排序',
    
    //数据验证提示
    'pid_val'               => '父级节点必须为数字整数',
    'level_val'             => '节点类型必须为数字整数（1,2,3）',
    'name_require'          => '节点地址不能为空',
    'name_unique'           => '节点地址已存在',
    'name_val'              => '节点地址必须为有效的URL地址',
    'title_val'             => '节点名称不能为空',
    'status_val'            => '状态必须为数字整数（0,1）',
    'ismenu_val'            => '是否菜单为数字整数（0,1）',
    'sorts_val'             => '排序必须为大于0数字整数',
    
    //其他
    'top_pid'               => '顶级节点',
];