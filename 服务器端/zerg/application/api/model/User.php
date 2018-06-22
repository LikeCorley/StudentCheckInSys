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
    public  static  function jnumIsExit($jnum,$password,$name,$authority,$phone_num,$college,$email,$user_name){

        $result = Db::table('user')
            ->where('user_name','=',$user_name)
            ->select();

        if(!$result){
            //插入数据库
            $user = new User;
            $user->data([
                'jnum'=> $jnum,
                'user_name'=>$user_name,
                'phone_num' => $phone_num,
                'email' =>  $email,
                'name'  =>  $name,
                'authority'=> $authority,
                'password' =>$password,
                'college'=>$college,
                'audit_status'=> 0
            ]);
            $user->save();
            //
            $arr = array(
                'status'=> '0',
                'message'=> '注册成功,请等待管理员审核！',
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

    public  static  function userLoginByUserName($user_name,$password){
        //权限是否已经审核
        $audit_status = User::where('user_name','=',$user_name)->value('audit_status');
        if($audit_status!=1){
            $arr = array(
                'status'=> '1',
                'message'=> '您的权限还没被审核！'
            );
            return json($arr);
        }
        $result = Db::table('user')
            ->where('user_name','=',$user_name)
            ->where('password',$password)
            ->select();
        //$authority = User::where('user_name','=',$user_name)->where('password',$password)->value('authority');

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
    public  static  function userVerify($jnum,$password){
        //权限是否已经审核
        $audit_status = User::where('jnum','=',$jnum)->value('audit_status');
        if($audit_status==0){
            $arr = array(
                'status'=> '1',
                'message'=> '您的权限还没被审核！'
            );
            return json($arr);
        }
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