<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 11:34
 */

namespace app\api\controller\v1;

header("Access-Control-Allow-Origin: * ");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

use app\api\validate\IDMustBePositiveInt;
use app\api\model\Student as StudentModel;
use app\lib\exception\StudentException;

class Student
{
   public function  getStudentIDVerify($id,$password){

        (new IDMustBePositiveInt())->goCheck();
        $result = StudentModel::studentIDVerify($id,$password);

        if(!$result){
           throw new StudentException();
            //return "0";
        }
        return $result;
    }
}