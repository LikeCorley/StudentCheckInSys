<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 21:52
 */

namespace app\admin\model;


use think\Db;
use think\Model;

class User extends Model
{

    public static function userTree(){

        $users = Db::table('user')
            ->where('audit_status','=',0)
            ->select();
        return $users;
    }

    public static function updateAuditStatus($id){
        $user = new User;
        $user->where('id','=',$id)
            ->update([ 'audit_status'  => 1]);
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