<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 14:36
 */

namespace app\api\model;


use think\Db;

class Course extends BaseModel
{
    public  static  function createCourse($cname,$tid,$ctime,$tname,$day,$start_week,$end_week,$class_location,$status){
        //插入数据库
        $course = new Course;
            $course->data([
                'cname'=> $cname,
                'tid' => $tid,
                'ctime' =>  $ctime,
                'tname'  =>  $tname,
                'day'=> $day,
                'start_week' =>$start_week,
                'end_week'=>$end_week,
                'class_location'=> $class_location,
                'status' =>$status,
                'rows'=> 5,
                'cols'=> 6
            ]);
         $course->save();
         $arr = array(
                'status'=> '0',
                'message'=> '创建成功'
         );
         return json($arr);
    }


    public static function getCourseByTid($tid){
        $result = Db::table('course')
            ->where('tid','=',$tid)
            ->select();
       if(!$result){
           $arr = array(
               'status'=> '1',
               'message'=> '该老师没开课信息'
           );
           return json($arr);

       }
        $arr = array(
            'status'=> '0',
            'message'=> '查找成功',
            'course' => $result
        );
        return json($arr);
    }
    public static function getAllCourse(){
        $result = Db::table('course')
            ->select();

        $arr = array(
            'status'=> '0',
            'message'=> '查找成功',
            'getAllCourse' => $result
        );
        return json($arr);
    }

    public static function deleteCourseByCno($cno){
        course::destroy($cno);
        $arr = array(
            'status'=> '0',
            'message'=> '删除成功'
        );
        return json($arr);

    }

    public static function getAllCourseBySno($sno){

        $allCno = StuCourse::where('sno','=',$sno)->column('cno');
        if(!$allCno){
            $arr = array(
                'status'=> '1',
                'message'=> '该学生还没选课！'
            );
            return json($arr);
        }
        //$newResult = array();
        $arr = array(
            'status'=> '0',
            'message'=> '老师创建的课程信息',
            'getAllCourseBySno'=>[]
        );
        foreach ($allCno as $itemCno){
            $result = Db::table('course')
                ->where('cno','=',$itemCno)
                ->select();
            $arr["getAllCourseBySno"][]=$result;

            //$newResult = json_encode(array_merge(json_decode($result,true),json_decode($newResult,true)));
        }

        return json($arr);

    }
}