<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/13
 * Time: 21:08
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\validate\TestValidate;
use app\lib\exception\BannerMissException;
use think\Exception;
use think\Validate;

use  app\api\model\Banner as BannerModel;

class Banner
{
    /**
     * 获取指定id的banner信息
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     */
    public function getBanner($id)
    {

        //AOP 面向切面编程
        (new IDMustBePositiveInt())->goCheck();

        $banner = BannerModel::get($id);  //返回是一个模型对象
       // $banner = BannerModel::getBannerByID($id);

        if (!$banner) {
            throw new BannerMissException();
            //throw new Exception('服务器内部错误');
        }
        return json($banner);
    }
}