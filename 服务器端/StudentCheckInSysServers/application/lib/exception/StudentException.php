<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/26
 * Time: 14:50
 */

namespace app\lib\exception;


class StudentException extends BaseException
{
    public $code = 404;
    public $msg = '学生账号不存在或密码错误！';
    public $errorCode = 40000;
}