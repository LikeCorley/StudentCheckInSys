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

Route::any('api/:version/user/userRegister','api/:version.User/userRegister');
Route::any('api/:version/user/userLogin','api/:version.User/userLogin');

Route::any('api/:version/course/createCourse','api/:version.Course/createCourse');
Route::any('api/:version/course/getCourseByTid','api/:version.Course/getCourseByTid');
Route::any('api/:version/course/getAllCourseBySno','api/:version.Course/getAllCourseBySno');
Route::any('api/:version/course/deleteCourseByCno','api/:version.Course/deleteCourseByCno');
Route::any('api/:version/course/getAllCourse','api/:version.Course/getAllCourse');
Route::any('api/:version/checkIn/createCheckIn','api/:version.CheckIn/createCheckIn');
Route::any('api/:version/checkIn/getCheckInByTid','api/:version.CheckIn/getCheckInByTid');
Route::any('api/:version/checkIn/changeCheckInStatus','api/:version.CheckIn/changeCheckInStatus');
Route::any('api/:version/stuCourse/studentSC','api/:version.StuCourse/studentSC');
Route::any('api/:version/stuCourse/getSCBySno','api/:version.StuCourse/getSCBySno');
Route::any('api/:version/stuCourse/getSCByCno','api/:version.StuCourse/getSCByCno');
Route::any('api/:version/stuCourse/updateSCScoreById','api/:version.StuCourse/updateSCScoreById');

Route::any('api/:version/stuCheckIn/getStuCheckInBySno','api/:version.StuCheckIn/getStuCheckInBySno');
Route::any('api/:version/stuCheckIn/updateStuCheckInBySno','api/:version.StuCheckIn/updateStuCheckInBySno');
Route::any('api/:version/stuCheckIn/getAllStuCheckInByArriveId','api/:version.StuCheckIn/getAllStuCheckInByArriveId');




//GET,POST,DELETE,PUT,*
//Route::rule('hello','sample/Test/hello','GET|POST',['https'=>false]);
//Route::rule('hello','sample/Test/hello');
//Route::post('hello/:id','sample/Test/hello');
//Route::post('hello','sample/Test/hello');
//Route::any('hello','sample/Test/hello');  //代表*   所有请求
