<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 14:16
 */

namespace app\api\model;


use think\Db;

class StuCourse extends BaseModel
{
    protected  $table = 'stu_course';
    public  static  function StudentSC($cno,$cname,$has_arrive,$score,$tid,$tname,$sno,$sname,$college){

        //判断该生这门课程是否已经选了

        //判断是否可以选课，还得去查，该生已经添加的选课，星期+第几节，相同的情况下不能选
        //根据传进来的cno，获取course表中的星期几和第几节课
        $newDay = Course::where('cno','=',$cno)->value('day');
        $newCtime = Course::where('cno','=',$cno)->value('ctime');

        //获得该生的所有的选课信息
        $allCno = StuCourse::where('sno','=',$sno)->column('cno');

        if($allCno){
            foreach ($allCno as $itemCno){
                if($itemCno == $cno){
                    $arr = array(
                        'status'=> '1',
                        'message'=> '你已经选修过这门课程了！'
                    );
                    return json($arr);
                }
                //获取course表中的星期几和第几节课
                $day = Course::where('cno','=',$itemCno)->value('day');
                $ctime = Course::where('cno','=',$itemCno)->value('ctime');
                if($day&&$ctime&&$newDay&&$newCtime&&$newDay==$day && $newCtime==$ctime){
                    $arr = array(
                        'status'=> '1',
                        'message'=> '课程时间冲突，请核实！'
                    );
                    return json($arr);
                }
            }
        }
        //插入数据库
        $StuCourse = new StuCourse;
        $StuCourse->data([
            'cno'=> $cno,
            'cname' => $cname,
            'has_arrive' =>  $has_arrive,
            'score'  =>  $score,
            'tid'=> $tid,
            'tname' =>$tname,
            'sno'=>$sno,
            'sname'=> $sname,
            'college' =>$college
        ]);
        $StuCourse->save();
        $arr = array(
            'status'=> '0',
            'message'=> '课程添加成功'
        );
        return json($arr);
    }

    public static function getSCBySno($sno){
        $result = Db::table('stu_course')
            ->where('sno','=',$sno)
            ->select();
        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '该生无选课信息'
            );
            return json($arr);
        }
        $arr = array(
            'status'=> '0',
            'message'=> '选课信息查找成功',
            'getSCBySno'=>$result
        );
        return json($arr);
    }
    public static function getSCByCno($cno){
        $result = Db::table('stu_course')
            ->where('cno','=',$cno)
            ->select();
        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '该课程还没有学生选择'
            );
            return json($arr);
        }
        $arr = array(
            'status'=> '0',
            'message'=> '学生信息查找成功',
            'getSCByCno'=>$result
        );
        return json($arr);
    }

    public static function updateSCScoreById($id,$score){
        $StuCourse =new StuCourse;
        $StuCourse->where('id','=',$id)
            ->update([ 'score'  =>$score ]);

        $arr = array(
            'status'=> '0',
            'message'=> '更新成功'
        );
        return json($arr);
    }

}