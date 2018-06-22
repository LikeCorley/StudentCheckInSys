<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/9
 * Time: 14:36
 */

namespace app\admin\controller;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

use app\admin\controller\Common;
use app\admin\model\Course as CourseModel;


class Course extends Common
{
    public function lst(){
        $courseRes=CourseModel::couresTree();
        $this->assign('courseRes',$courseRes);
        return view();
    }
    public function lstc(){
        $courseRes=CourseModel::couresTree();
        $this->assign('courseRes',$courseRes);
        return view();
    }

    public function edit($cno){
//        if(request()->isPost()) {
//            $date = input('post.');
//            UserModel::updateAuditStatus($date['id']);
//        }

        $course = CourseModel::couresTreeByCno($cno);
        $this->assign('course',$course);


        if(request()->isPost()){
            $data=input('post.');
            $course=new CourseModel();
            $savenum =$course->saveCourseLocation($data);
            if($savenum !== false){
                $this->success('修改成功！',url('lst'));
            }else{
                $this->error('修改失败！');
            }
            return;
        }

        return view();
    }
    public function editc($cno){
//        if(request()->isPost()) {
//            $date = input('post.');
//            UserModel::updateAuditStatus($date['id']);
//        }

        $course = CourseModel::couresTreeByCno($cno);
        $this->assign('course',$course);


        if(request()->isPost()){
            $data=input('post.');
            $course=new CourseModel();
            $savenum =$course->saveCourse($data);
            if($savenum !== false){
                $this->success('修改成功！',url('lstc'));
            }else{
                $this->error('修改失败！');
            }
            return;
        }

        return view();
    }

    public function del($cno){
        $course = new CourseModel();
        $delnum=$course->delCourse($cno);
        if($delnum == '1'){
            $this->success('删除课程成功！',url('lst'));
        }else{
            $this->error('删除课程失败！');
        }
    }

}