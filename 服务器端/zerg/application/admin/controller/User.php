<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/6/6
 * Time: 21:54
 */

namespace app\admin\controller;
header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
use app\admin\model\User as UserModel;
use think\Request;


class User extends Common
{

    public function lst(){
        $userRes=UserModel::userTree();
        $this->assign('userRes',$userRes);
        return view();
    }

    public function edit(Request $request){
//        if(request()->isPost()) {
//            $date = input('post.');
//            UserModel::updateAuditStatus($date['id']);
//        }
        $id = $request->param('id');
        UserModel::updateAuditStatus($id);
        return view();
    }
    public  function  getUserByjnum($jnum,$password){

        // (new IDMustBePositiveInt())->goCheck();
        $result = UserModel::userVerify($jnum,$password);

        return $result;
    }
}