<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 14:36
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class Course extends Model
{
    public static function couresTree(){

        $course = Db::table('course')
            ->select();
        return $course;
    }
    public static function couresTreeByCno($cno){

        $course = Db::table('course')
            ->where('cno','=',$cno)
            ->select();
        return $course;
    }
    public function delCourse($id){
        if($this::destroy($id)){
            return 1;
        }else{
            return 2;
        }
    }

    public function saveCourse($data){

        $course = new Course();
        $course->save([
            'class_location'=>$data['class_location'],
            'rows'=>$data['rows'],
            'cols'=>$data['cols']
        ],['cno' => $data['cno']]);

        return;
    }
    public function saveCourseLocation($data){

        $course = new Course();
        $course->save([
            'class_location'=>$data['class_location']
        ],['cno' => $data['cno']]);

        return;
    }
}