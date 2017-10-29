<?php

return [
    'id'                => 'ID',
    'name'              => '接口名称',
    'module'            => '模块',
    'controller'        => '控制器',
    'method'            => '方法',
    'param'             => '参数',
    'is_user_token'     => '验证用户token',
    'is_api_token'      => '验证接口token',
    'type'              => '请求方式',
    'token'             => '接口令牌',
    'remark'            => '备注',
    'sorts'             => '排序',
    'status'            => '状态',
    'create_time'       => '创建时间',
    'update_time'       => '编辑时间',
    
    //数据验证提示
    'name_val'              => '接口名称不能为空',
    'module_val'            => '模块不能为空',
    'controller_val'        => '控制器不能为空',
    'method_val'            => '方法不能为空',
    'is_user_token_val'     => '验证用户token必须为数字整数（0,1）',
    'is_api_token_val'      => '验证接口token必须为数字整数（0,1）',
    'type_val'              => '请求方式不能为空',
    'sorts_val'             => '排序必须为大于0数字整数',
    'status_val'            => '状态必须为数字整数（0,1）',
    
    //其他
    'type_get'              => 'GET',
    'type_post'             => 'POST',
    'type_put'              => 'PUT',
    'type_delete'           => 'DELETE',
    
    'tokenapi'              => '生成token',
    'generate_document'     => '生成文档',
    'view_document'         => '查看文档',
    'directions_param'      => '接口说明',
    'test_api'              => '测试接口',
    'no_model'              => '接口Model未创建',
    
    'api_url'               => '接口请求地址',
    'url'                   => '接口URL',
    'form_data'             => '表单数据',
    'add_field'             => '添加字段',
    'search_param'          => 'URL条件',
    'form_txt1'             => '是否必填值',
    'form_txt2'             => 'Key',
    'form_txt3'             => 'Value',
    'form_txt4'             => '操作',
];