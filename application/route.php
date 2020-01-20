<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use Think\Route;
Route::get('index', 'index/Index/index');
Route::get('gywmindex', 'index/Gywmindex/gywmindex');
Route::get('gygs_qywh', 'index/Gywmindex/gygs_qywh');
Route::get('gywm_gsry', 'index/Gywmindex/gywm_gsry');
Route::get('cpzxindex', 'index/Cpzxindex/cpzxindex');
Route::get('cpzxindexid/:id', 'index/Cpzxindex/cpzxindexid');
Route::get('cpzxindexidp/:id/:p', 'index/Cpzxindex/cpzxindex');
Route::get('cpzxcontent/:id', 'index/Cpzxindex/cpzxcontent');
Route::get('naidiwen/:id1', 'index/Cpzxindex/naidiwen');
Route::get('xwdtindex', 'index/Xwdtindex/xwdtindex');
Route::get('xwdtindexidp/:id/:p', 'index/Xwdtindex/xwdtindex');
Route::get('xwdtid/:id', 'index/Xwdtindex/xwdtid');
Route::get('xwdtcon', 'index/Xwdtindex/xwdtcon');
Route::get('xwdtcontent/:id', 'index/Xwdtindex/xwdtcontent');
Route::get('cgalindex', 'index/Cgalindex/cgalindex');
Route::get('cgalindexid/:id', 'index/Cgalindex/cgalindexid');
Route::get('cgalindexidp/:id/:p', 'index/Cgalindex/cgalindexid');
Route::get('cgalcon/:id', 'index/Cgalindex/cgalcon');
Route::get('zxlyindex', 'index/Zxlyindex/zxlyindex');
Route::post('zxlyindex1', 'index/Zxlyindex/zxlyindex1');
Route::get('lxwmindex', 'index/Lxwmindex/lxwmindex');
Route::post('souso', 'index/Cpzxindex/souso');

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
