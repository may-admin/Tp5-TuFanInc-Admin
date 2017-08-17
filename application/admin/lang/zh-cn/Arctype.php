<?php

return [
    'id'                => 'ID',
    'pid'               => '上级分类',
    'typename'          => '分类名称',
    'mid'               => '分类模型',
    'target'            => '弹出方式',
    'jumplink'          => '跳转链接',
    'dirs'              => '分类目录',
    'litpic'            => '缩略图',
    'content'           => '内容',
    'sorts'             => '排序',
    'status'            => '状态',
    'keywords'          => '关键字',
    'description'       => '描述',
    'templist'          => '列表页模板',
    'temparticle'       => '内容页模板',
    'pagesize'          => '分页条数',
    'create_time'       => '创建时间',
    'update_time'       => '编辑时间',
    
    //数据验证提示
    'pid_val'               => '上级分类必须为数字整数',
    'typename_val'          => '分类名称不能为空',
    'mid_val'               => '分类模型必须为数字整数',
    'dirs_require'          => '分类目录不能为空',
    'dirs_val'              => '分类目录必须为（数字字母-_）',
    'target_val'            => '弹出方式不能为空',
    'templist_val'          => '列表页模板必须为（数字字母_）',
    'temparticle_val'       => '内容页模板必须为（数字字母_）',
    'pagesize_val'          => '分页条数必须为大于0数字整数',
    
    'sorts_val'             => '排序必须为大于0数字整数',
    'status_val'            => '状态必须为数字整数（0,1）',
    
    //其他
    'top_arctype'           => '顶级分类',
    'preview'               => '预览',
    'not_edit'              => '系统默认文章模型不可编辑',
    'create_arc'            => '新增文章',
];