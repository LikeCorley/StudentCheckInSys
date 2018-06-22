<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/11
 * Time: 20:14
 */

namespace app\api\model;


use think\Db;

class StuCheckIn extends BaseModel
{
    protected  $table = 'stu_check_in';
    public static function getStuCheckInBySno($sno){

        $result = Db::table('stu_check_in')
            ->where('sno','=',$sno)
            ->select();
        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '该生无签到表'
            );
            return json($arr);
        }
        $arr = array(
            'status'=> '0',
            'message'=> '该生签到表获取成功',
            'getStuCheckInBySno'=>$result
        );

        return json($arr);
    }


    public static function getAllStuCheckInByArriveId($arriveId){

        $result = Db::table('stu_check_in')
            ->where('arrive_id','=',$arriveId)
            ->select();
        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '该老师还未发起签到请求'
            );
            return json($arr);
        }
        $arr = array(
            'status'=> '0',
            'message'=> '该老师签到表获取成功',
            'getAllStuCheckInByArriveId'=>$result
        );

        return json($arr);
    }


    public  static  function  updateStuCheckInBySno($id,$arrive_id,$arrive_status,$set_number,$fix_position,$local_time){
        //$arrive_status=1 请假
        if($arrive_status==1){
            $stuCheckIn = new StuCheckIn;
            $stuCheckIn->where('id','=',$id)
                ->update([ 'arrive_status'  =>$arrive_status ]);
            $arr = array(
                'status'=> '1',
                'message'=> '签到失败，该生请假了！'
            );
            return json($arr);
        }

        //查看签到状态有没有被关闭  0开启  1关闭
        $status = StuCheckIn::where('id','=',$id)->value('status');
        if($status==1){
            $arr = array(
                'status'=> '1',
                'message'=> '签到失败，签到表被教师关闭了！'
            );
            return json($arr);
        }
        //判断学生有没有签到记录
        $set = StuCheckIn::where('arrive_id','=',$arrive_id)->value('set_number');
        if(!empty($set)){
            $arr = array(
                'status'=> '1',
                'message'=> '签到失败，你已经签到过了！'
            );
            return json($arr);
        }

        //判断是否在时间范围内签到
        $early_arrive = StuCheckIn::where('id','=',$id)->value('early_arrive');
        $lately_arrive = StuCheckIn::where('id','=',$id)->value('lately_arrive');


        // if(($early_arrive<= $local_time) && ($lately_arrive >= $local_time)){
        //arriveStaus如果为>1，就去判断该座位号，如果为空，返回错误信息！
        //如果座位号已经被人填了，也返回错误信息，否则，把该条信息记录

        if($arrive_status>1){
            if(!$set_number){
                $arr = array(
                    'status'=> '1',
                    'message'=> '该座位号为空，请重新选择'
                );
                return json($arr);
            }
            //判断座位号有没有被人填写
            $allSetNum = StuCheckIn::where('arrive_id',$arrive_id)->column('set_number');
            if(!$allSetNum){
                $stuCheckIn = new StuCheckIn;
                //通过$arrive_id更新数据
//        $list = [
//            ['arrive_id'=>$arrive_id, 'name'=>'thinkphp', 'email'=>'thinkphp@qq.com']
//        ];
//        $stuCheckIn->saveAll($list);
//                $stuCheckIn->where('id','=',$id)
//                    ->update([ 'set_number'  =>$set_number ],[ 'arrive_status'  =>$arrive_status ],[ 'fix_position'  =>$fix_position ]);
                $stuCheckIn->save([
                    'set_number'  => $set_number,
                    'arrive_status' => $arrive_status,
                    'fix_position'=> $fix_position,
                    'local_time'=> $local_time
                ],['id' => $id]);

                //教师签到表人数+1
                $arrive_people = CheckIn::where('id','=',$arrive_id)->value('arrive_people');
                $arrive_people= $arrive_people+1;
                $checkIn = new CheckIn;
                $checkIn->where('id','=',$arrive_id)
                    ->update([ 'arrive_people'  =>$arrive_people]);
                //学生选课表签到次数+1
                $cno = CheckIn::where('id','=',$arrive_id)->value('cno');
                $sno = StuCheckIn::where('id','=',$id)->value('sno');
                $has_arrive = StuCourse::where('sno','=',$sno)->where('cno','=',$cno)->value('has_arrive');

                $has_arrive= $has_arrive+1;
                $stuCourse = new StuCourse;
                $stuCourse->where('sno','=',$sno)
                    ->where('cno',$cno)
                    ->update([ 'has_arrive'  =>$has_arrive]);

            }
            foreach ($allSetNum as $item){
                if($set_number==$item){
                    $arr = array(
                        'status'=> '1',
                        'message'=> '该座位号已经被人填写，请重新选择'
                    );
                    return json($arr);
                }
            }
        }

        //$arrive_status<=1 更新学生签到表信息  更新多条数据
        $stuCheckIn = new StuCheckIn;
        //通过$arrive_id更新数据
//        $list = [
//            ['arrive_id'=>$arrive_id, 'name'=>'thinkphp', 'email'=>'thinkphp@qq.com']
//        ];
//        $stuCheckIn->saveAll($list);
//         $stuCheckIn->where('id','=',$id)
//            ->update([ 'set_number'  =>$set_number ],[ 'arrive_status'  =>$arrive_status ],[ 'fix_position'  =>$fix_position ]);
        $stuCheckIn->save([
            'set_number'  => $set_number,
            'arrive_status' => $arrive_status,
            'fix_position'=> $fix_position,
            'local_time'=> $local_time
        ],['id' => $id]);

        //教师签到表人数+1
        $arrive_people = CheckIn::where('id','=',$arrive_id)->value('arrive_people');
        $arrive_people= $arrive_people+1;
        $checkIn = new CheckIn;
        $checkIn->where('id','=',$arrive_id)
            ->update([ 'arrive_people'  =>$arrive_people]);

        //学生选课表签到次数+1
        $cno = CheckIn::where('id','=',$arrive_id)->value('cno');
        $sno = StuCheckIn::where('id','=',$id)->value('sno');
        $has_arrive = StuCourse::where('sno','=',$sno)->where('cno','=',$cno)->value('has_arrive');
        $has_arrive= $has_arrive+1;
        $stuCourse = new StuCourse;
        $stuCourse->where('sno','=',$sno)
            ->where('cno',$cno)
            ->update([ 'has_arrive'  =>$has_arrive]);

        //  return $result;
//      }else{
//          $arr = array(
//              'status'=> '1',
//              'message'=> '签到时间已经过去啦'
//          );
//          return json($arr);
        //   }
        $arr = array(
            'status'=> '0',
            'message'=> '签到成功！'
        );
        return json($arr);


    }
}