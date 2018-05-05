<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/4/1
 * Time: 16:00
 */

namespace app\lib\exception;


class ParameterException extends  BaseException
{
    //HTTP 状态码 404,200
    public $code = 400;

    //错误的具体信息
    public $msg = '参数错误';

    //自定义的错误码
    public $errorCode = 100000;
}