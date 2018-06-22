<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 23:36
 */

namespace app\api\controller\v1;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
use think\Request;
use app\api\model\CheckIn as CheckInModel;

class CheckIn
{
    public  static  function  createCheckIn(Request $request){

        $cno = $request->param('courseId');
        $cname = $request->param('courseName');
        $early_arrive = $request->param('earlyArrive');
        $lately_arrive = $request->param('latelyArrive');
        $tid = $request->param('teacherId');
        $tname = $request->param('teacherName');
        //$arrive_people = $request->param('arrivePeople');
        $fix_position = $request->param('fixPosition');
     //   $status = $request->param('status');
//        $cno = 2;
//        $cname = '软件工程';
      // $early_arrive = '12:11';
       //$lately_arrive = "12:20";
       // $tid = 21105;
//        $tname = "柯逍";
//        //$arrive_people = 12;
//        $fix_position = "12.663 56.5666";
//        //$status = 0;

        $result = CheckInModel::createCheckIn($cno,$cname,$early_arrive,$lately_arrive,$tid,$tname,$fix_position);
        //创建跟这个课程有关的学生签到表
        CheckInModel::createStuCheckIn($cno,$cname,$early_arrive,$lately_arrive,$tid,$tname);

        return $result;

    }


    public static  function  getCheckInByTid(Request $request){

        $tid = $request->param('teacherId');
        //  $tid = 123;
        $result = CheckInModel::getCheckInByTid($tid);
        return $result;
    }

    public static  function  changeCheckInStatus(Request $request){

       $id = $request->param('arriveListId');
       // $id = 1;
        $result = CheckInModel::changeCheckInStatus($id);
        return $result;
    }


}