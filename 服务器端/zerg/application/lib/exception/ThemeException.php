<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/6
 * Time: 23:36
 */

namespace app\lib\exception;


class ThemeException extends BaseException
{
    public $code = 404;
    public $msg = '请求的theme不存在,请检查主题ID';
    public $errorCode = 30000;
}