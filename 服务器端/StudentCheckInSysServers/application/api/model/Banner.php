<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 20:44
 */

namespace app\api\model;


use think\Db;
use think\Model;

class Banner extends  Model
{
    //默认class名即为表名
    //protected  $table = 'category';
    public static function getBannerByID($id)
    {
        //TODO:根据Banner ID号获取Banner信息
//        $result = Db::query(
//            'select * from banner_item where banner_id = ?',[$id] );
        //find和select的数据结构不同，find只能返回一条数据，select可以返回一条或多条数据


        $result = Db::table('banner_item')
            //->fetchSql()   //返回sql语句
            ->where('banner_id','=',$id)
            ->select();

//        $result = Db::table('banner_item')
//            ->where(function ($query) use ($id){
//                 $query->where('banner_id','=',$id);
//            })
//            ->select();
        return $result;
    }
}