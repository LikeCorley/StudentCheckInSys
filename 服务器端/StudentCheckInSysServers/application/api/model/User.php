<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 21:52
 */

namespace app\api\model;


use think\Db;

class User extends BaseModel
{
    public  static  function jnumIsExit($jnum,$password,$name,$authority,$phone_num,$college,$email){
        $result = Db::table('user')
            ->where('jnum','=',$jnum)
            ->select();

        if(!$result){
         //插入数据库
            $user = new User;
            $user->data([
                'jnum'=> $jnum,
                'phone_num' => $phone_num,
                'email' =>  $email,
                'name'  =>  $name,
                'authority'=> $authority,
                'password' =>$password,
                'college'=>$college
            ]);
            $user->save();
            //
            $arr = array(
                'status'=> '0',
                'message'=> '注册成功',
                'id'=> $jnum
            );

            return json($arr);
        }

        $arr = array(
            'status'=> '1',
            'message'=> '账号已经存在'
        );

        return json($arr);
    }

    public  static  function userVerify($jnum,$password){
        $result = Db::table('user')
            ->where('jnum','=',$jnum)
            ->where('password',$password)
            ->select();

        if(!$result){
            $arr = array(
                'status'=> '1',
                'message'=> '密码错误或账号不存在'
            );
            return json($arr);
        }

        $arr = array(
            'status'=> '0',
            'message'=> '登录成功',
            'user'=> $result
        );

        return json($arr);

    }

}