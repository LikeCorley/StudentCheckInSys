<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 14:36
 */

namespace app\api\controller\v1;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
use app\api\model\Course as CourseModel;

use think\Request;

class Course
{
    public  static  function  createCourse(Request $request){

       $cname = $request->param('courseName');
       $tid = $request->param('teacherId');
       $ctime = $request->param('courseTime');
       $tname = $request->param('teacherName');
       $day = $request->param('courseDay');
       $start_week = $request->param('courseStartWeek');
       $end_week = $request->param('courseEndWeek');
       $class_location = $request->param('courseDes');
       $status = $request->param('courseStatus');

//       $cname = "fdsf2";
//       $tid =123;
//       $ctime = "1";
//       $tname ="fdsf";
//       $day = "1";
//       $start_week = "1";
//       $end_week = "18";
//       $class_location ="dong1";
//       $status = 0;
       //CourseModel::dingding_log("info",$cname);

       $result = CourseModel::createCourse($cname,$tid,$ctime,$tname,$day,$start_week,$end_week,$class_location,$status);

       return $result;

   }

   public static  function  getCourseByTid(Request $request){

       $tid = $request->param('teacherId');
     //  $tid = 123;
       $result = CourseModel::getCourseByTid($tid);
       return $result;
   }

    public static  function  getAllCourse(){

        $result = CourseModel::getAllCourse();
        return $result;
    }

    public static  function getAllCourseBySno(Request $request){

        $sno = $request->param('studentId');
        //$sno = 17000;
        $result = CourseModel::getAllCourseBySno($sno);
        return $result;


    }
   public  static function deleteCourseByCno(Request $request){

        $cno = $request->param('cno');
        //$cno = 00001;
        $result = CourseModel::deleteCourseByCno($cno);
        return $result;
   }
}