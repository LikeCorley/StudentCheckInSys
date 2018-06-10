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
                'status' =>$status
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

        $arr = array(
            'status'=> '0',
            'message'=> '查找成功',
            'course' => $result
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
}