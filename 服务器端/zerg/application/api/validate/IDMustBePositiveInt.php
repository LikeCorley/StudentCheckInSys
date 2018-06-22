<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 23:56
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger',
    ];
    protected  $message = [
        'id' => 'id必须是正整数'
    ];


}