<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/29
 * Time: 20:44
 */

namespace app\api\model;////        $result = Db::query(



use think\Db;
use think\Model;
use  app\api\model\Banner as BannerModel;
class Banner extends BaseModel
{
    //默认class名即为表名
    //protected  $table = 'category';
     protected  $hidden = ['delete_time','update_time'];
   // protected  $visible = ['id '];
    public function items(){
        return $this->hasMany("BannerItem",'banner_id','id');
    }

    public static function getBannerByID($id)
    {
        //TODO:根据Banner ID号获取Banner信息
        //with 链式with 关联其他表模型
        $banner = BannerModel::with(['items','items.img'])->find($id);
        return $banner;
////            'select * from banner_item .where banner_id = ?',[$id] );
//        //find和select的数据结构不同，find只能返回一条数据，select可以返回一条或多条数据
//
//
//        $result = Db::table('banner_item')
//            //->fetchSql()   //返回sql语句
//            ->where('banner_id','=',$id)
//            ->select();
//
////        $result = Db::table('banner_item')
////            ->where(function ($query) use ($id){
////                 $query->where('banner_id','=',$id);
////            })
////            ->select();
//        return $result;
    }
}