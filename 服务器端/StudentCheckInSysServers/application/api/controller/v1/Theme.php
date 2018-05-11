<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/6
 * Time: 21:07
 */

namespace app\api\controller\v1;


use app\api\validate\IDCollection;

use app\api\model\Theme as ThemeModel;
use app\lib\exception\ThemeException;

class Theme
{
    /**
     * @url /theme?ids=id1,id2,id3...
     *
     */
    public function getSimpleList($ids=''){
        (new IDCollection())->goCheck();
       $ids = explode(',',$ids);
       $result = ThemeModel::with("topicImg,headImg")
                  ->select($ids);

       if(!$result){
          throw new ThemeException();
       }
        return $result;

    }
}