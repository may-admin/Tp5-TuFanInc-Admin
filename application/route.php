<?php
use think\Route;

Route::rule('category/:dirs', 'index/Category/index', 'GET');   //栏目
Route::rule('detail/:dirs/:id', 'index/Detail/index', 'GET');   //文章


//api2.0
return [
        'api/flink/demo'           => 'api/flink/demo',               //测试友情链接自定义接口
        '__rest__'=>[
                'api/archive'       => 'api/archive',
                'api/flink'         => 'api/flink',
        ],
];