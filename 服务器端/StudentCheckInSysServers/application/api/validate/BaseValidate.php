<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 20:15
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //1.获取http请求参数
        //2.对这些参数进行验证
        $request = Request::instance();
        $params = $request->param();
        $result = $this->batch()->check($params);

        if (!$result) {
            $e = new ParameterException([
                'msg'=>$this->error
            ]);
            throw $e;

        } else {
            return true;
        }


    }


}