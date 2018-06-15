<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 20:13
 */

namespace app\api\controller\v1;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
use think\Request;
use app\api\model\StuCheckIn as StuCheckInModel;


class StuCheckIn
{
    public  static function getStuCheckInBySno(Request $request){

        $sno = $request->param('studentId');
        $result =StuCheckInModel::getStuCheckInBySno($sno);
        return $result;
    }

    public  static function getAllStuCheckInByArriveId(Request $request){

        $arriveId = $request->param('arriveId');
        $result =StuCheckInModel::getAllStuCheckInByArriveId($arriveId);
        return $result;
    }

    public  static  function  updateStuCheckInBySno(Request $request){
//
        $id = $request->param('studentArriveListId');
        $arrive_status = $request->param('arriveStatus');
        $set_number = $request->param('seatNumber');
        $fix_position = $request->param('fixPosition');
        $local_time = $request->param('localTime');
        $arrive_id =  $request->param('arriveId');

      //  $local_time = date($local_time);

      //  $local_time =date('Y-m-d H:i:s',time());


//        $id = 47;
//        $arrive_status = 2;
//        $set_number = 9;
//        $fix_position = null;
//    //     $local_time = new \DateTime() ;
//    //  $local_time=date("Y-m-d H:i:s");
////      //  $local_time = $request->param('localTime');
//        $arrive_id = 2;

        $result = StuCheckInModel::updateStuCheckInBySno($id,$arrive_id,$arrive_status,$set_number,$fix_position,$local_time);

         return $result;

    }
}