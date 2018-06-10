<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 11:36
 */

namespace app\api\model;


use think\Db;

class Student extends BaseModel
{
    public  static  function studentIDVerify($id,$password){
        $result = Db::table('student')
            ->where('id','=',$id)
            ->where('password',$password)
            ->select();
        return $result;

    }

}