<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 21:54
 */

namespace app\api\controller\v1;
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

use app\api\model\User as UserModel;
use app\lib\exception\UserException;
use think\Request;


class User
{
    public function userRegister(Request $request){

        $jnum = $request->param('account');
        $user_name = $request->param('user_name');
        $password = $request->param('password');
        $name = $request->param('name');
        $authority = $request->param('role');
        $phone_num = $request->param('mobile');
        $college = $request->param('college');
        $email = $request->param('email');

//        $jnum = 23;
//        $password = "123";
//        $name = "lll";
//        $authority = 1;
//        $phone_num = "12356565";
//        $college ="数计";
//        $email = "326&qq.com";
        //验证账号是否存在
        $result = UserModel::jnumIsExit($jnum,$password,$name,$authority,$phone_num,$college,$email,$user_name);
        return $result;
        // UserModel::dingding_log("info",$aoData);
        //return "1";
    }

//    public function userLogin(Request $request){
//
//        $jnum = $request->param('account');
//        $password = $request->param('password');
//
//
////        $jnum = 23;
////        $password = "123";
////        $name = "lll";
////        $authority = 1;
////        $phone_num = "12356565";
////        $college ="数计";
////        $email = "326&qq.com";
//        //验证账号是否存在
//        $result = UserModel::userVerify($jnum,$password);
//        return $result;
//        // UserModel::dingding_log("info",$aoData);
//        //return "1";
//    }

    public function userLogin(Request $request){

       $user_name = $request->param('user_name');
       $password = $request->param('password');

//        $user_name = "student";
//        $password = "123456";
//        $jnum = 23;
//        $password = "123";
//        $name = "lll";
//        $authority = 1;
//        $phone_num = "12356565";
//        $college ="数计";
//        $email = "326&qq.com";
        //验证账号是否存在
        $result = UserModel::userLoginByUserName($user_name,$password);
        return $result;
        // UserModel::dingding_log("info",$aoData);
        //return "1";
    }


    public  function  getUserByjnum($jnum,$password){

        // (new IDMustBePositiveInt())->goCheck();
        $result = UserModel::userVerify($jnum,$password);

        return $result;
    }
}