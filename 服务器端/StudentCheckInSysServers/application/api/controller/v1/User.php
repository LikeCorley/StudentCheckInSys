<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 21:54
 */

namespace app\api\controller\v1;

use app\api\model\User as UserModel;
use app\lib\exception\UserException;
use think\Console;
use think\Log;
use think\Request;

class User
{
    public function userRegister(){
        $data = input('post.');
        //$data = 12132355;
        if(!$data){
            return "0";
        }
        UserModel::dingding_log("info",$data);
        return "1";
    }

   public  function  getUserByjnum($jnum,$password){

      // (new IDMustBePositiveInt())->goCheck();
       $result = UserModel::userVerify($jnum,$password);

       if(!$result){
           throw new UserException();
           //return "0";
       }
       return $result;
   }
}