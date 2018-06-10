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
use think\Route;

Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');
Route::get('api/:version/student/:id','api/:version.Student/getStudentIDVerify');
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/user/:jnum','api/:version.User/getUserByjnum');
Route::any('api/:version/userRegister','api/:version.User/userRegister');
Route::any('api/:version/userLogin','api/:version.User/userLogin');
Route::any('api/:version/createCourse','api/:version.Course/createCourse');
Route::any('api/:version/getCourseByTid','api/:version.Course/getCourseByTid');
Route::any('api/:version/deleteCourseByCno','api/:version.Course/deleteCourseByCno');


//GET,POST,DELETE,PUT,*
//Route::rule('hello','sample/Test/hello','GET|POST',['https'=>false]);
//Route::rule('hello','sample/Test/hello');
//Route::post('hello/:id','sample/Test/hello');
//Route::post('hello','sample/Test/hello');
//Route::any('hello','sample/Test/hello');  //代表*   所有请求
