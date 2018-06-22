<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/10
 * Time: 23:37
 */

namespace app\api\model;


use think\Db;
use think\exception\DbException;

class CheckIn extends BaseModel
{
    protected  $table = 'check_in';
    public  static  function createCheckIn($cno,$cname,$early_arrive,$lately_arrive,$tid,$tname,$fix_position){
        //插入数据库
        $checkIn = new CheckIn;
        $checkIn->data([
            'cno'=> $cno,
            'cname' => $cname,
            'early_arrive' =>  $early_arrive,
            'lately_arrive'  =>  $lately_arrive,
            'tid'=> $tid,
            'tname' =>$tname,
            'arrive_people'=> 0,
            'fix_position'=> $fix_position,
            'status' => 0
        ]);
        $checkIn->save();
        $arr = array(
            'status'=> '0',
            'message'=> '创建成功'
        );
        return json($arr);
    }

    public static function getCheckInByTid($tid){
        $result = Db::table('check_in')
            ->where('tid','=',$tid)
            ->select();

        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '该教师没有签到信息'
            );
            return json($arr);
        }
        $arr = array(
            'status'=> '0',
            'message'=> '查找成功',
            'checkIn' => $result
        );
        return json($arr);
    }

    public static function changeCheckInStatus($id){
         //更改status，若status=0,改为1，若status=1,改为0
        //获取数据库的status
        $status = CheckIn::where('id','=',$id)->value('status');
        $checkIn = new CheckIn;
        //通过id更新数据
       if($status==0){
           $checkIn->where('id','=',$id)
                  ->update([ 'status'  => 1]);
       }else{
           $checkIn->where('id','=',$id)
                   ->update([ 'status'  => 0]);
       }

        $arr = array(
            'status'=> '0',
            'message'=> '更改成功'
        );
        return json($arr);

    }


    public static function createStuCheckIn($cno,$cname,$early_arrive,$lately_arrive,$tid,$tname){
        //获取教师创建签到表的id
        $arrive_id = CheckIn::where('cno','=',$cno)->order('id desc')->limit(1)->value('id');
       // Db::table('think_user')->where('status=1')->order('id desc')->limit(5)->select();


        //通过cno去stu_course中获取有选这门课的学生所有信息
        $result = Db::table('stu_course')
            ->where('cno','=',$cno)
            ->select();


        foreach ($result as $item){
            $sno=$item['sno'];
            $sname=$item['sname'];
            //只要判断记录里面的arrive_id与新的不同就可以了
            $oldArriveId = StuCheckIn::where('sno','=',$sno)->value('arrive_id');
//            //先查看有没有签到记录
//            $oldSno = StuCheckIn::where('cno','=',$cno)->column('sno');
//            $snoNum = sizeof($oldSno);
           if(!$oldArriveId){
               //创建所有学生的签到表
               $StuCheckIn = new StuCheckIn;
               $StuCheckIn->data([
                   'cno'=> $cno,
                   'cname' => $cname,
                   'tid'=> $tid,
                   'tname' =>$tname,
                   'sno'=>$sno,
                   'sname'=>$sname,
                   'arrive_id'=>$arrive_id,
                   'early_arrive' =>  $early_arrive,
                   'lately_arrive'  =>  $lately_arrive,
                   'status' =>0
               ]);
               $StuCheckIn->save();
           }else{
               if($oldArriveId != $arrive_id){
                   //创建所有学生的签到表
                   $StuCheckIn = new StuCheckIn;
                   $StuCheckIn->data([
                       'cno'=> $cno,
                       'cname' => $cname,
                       'tid'=> $tid,
                       'tname' =>$tname,
                       'sno'=>$sno,
                       'sname'=>$sname,
                       'arrive_id'=>$arrive_id,
                       'early_arrive' =>  $early_arrive,
                       'lately_arrive'  =>  $lately_arrive,
                       'status' =>0
                   ]);
                   $StuCheckIn->save();
               }
           }
//               $count = 0;
//               foreach ($oldSno as $value){
//                   if($value!=$sno){
//                       $count ++;
//                   }
//                   break;
//               }
//               if($count==$snoNum){
//                   //创建所有学生的签到表
//                   $StuCheckIn = new StuCheckIn;
//                   $StuCheckIn->data([
//                       'cno'=> $cno,
//                       'cname' => $cname,
//                       'tid'=> $tid,
//                       'tname' =>$tname,
//                       'sno'=>$sno,
//                       'sname'=>$sname,
//                       'arrive_id'=>$arrive_id,
//                       'early_arrive' =>  $early_arrive,
//                       'lately_arrive'  =>  $lately_arrive,
//                       'status' =>0
//                   ]);
//                   $StuCheckIn->save();
//               }
//
//           }


        }
    }
}