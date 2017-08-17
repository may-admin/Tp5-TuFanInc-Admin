<?php
use think\Route;

Route::rule('detail/:dirs/:id', 'index/Detail/index', 'GET');   //文章
Route::rule('category/:dirs', 'index/Category/index', 'GET');   //栏目
