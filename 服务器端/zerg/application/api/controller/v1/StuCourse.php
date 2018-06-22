<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 14:20
 */

namespace app\api\controller\v1;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
use think\Request;
use app\api\model\StuCourse as StuCourseModel;

class StuCourse
{
    public  static  function  studentSC(Request $request){

        $cno = $request->param('courseId');
        $cname = $request->param('courseName');
        $has_arrive = $request->param('hasArrive');
        $score= $request->param('score');
        $tid = $request->param('teacherId');
        $tname = $request->param('teacherName');
        $sno = $request->param('studentId');
        $sname = $request->param('studentName');
        $college = $request->param('college');

//        $cno = 5;
//        $cname = "aaa";
//        $has_arrive = 0;
//        $score= 0;
//        $tid = 11;
//        $tname = "xxx";
//        $sno = 17000;
//        $sname = "ze";
//        $college="shuji";

        $result = StuCourseModel::studentSC($cno,$cname,$has_arrive,$score,$tid,$tname,$sno,$sname,$college);

        return $result;

    }

    public static function getSCBySno(Request $request){
        $sno = $request->param('studentId');
        $result = StuCourseModel::getSCBySno($sno);
        return $result;
    }

    public static function getSCByCno(Request $request){
        $cno = $request->param('courseId');
        $result = StuCourseModel::getSCByCno($cno);
        return $result;
    }

    public static function updateSCScoreById(Request $request){
        $id = $request->param('id');
        $score = $request->param('score');
        $result = StuCourseModel::updateSCScoreById($id,$score);
        return $result;
    }

}