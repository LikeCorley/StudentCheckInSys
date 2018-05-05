<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/7
 * Time: 21:05
 */

namespace app\sample\controller;


use think\Request;

class Test
{
 /*   //获取参数 法1：在方法中传入变量
     public  function hello($id,$name,$age){
         echo $id;
         echo  '|';
         echo $name;
         echo  '|';
         echo $age;
      //   return "hello,like!";
     }*/
   /* //获取参数 法2：利用request变量
    public  function hello(){
        $id = Request::instance()->param('id');
        $name = Request::instance()->param('name');
        $age = Request::instance()->param('age');

        echo $id;
        echo  '|';
        echo $name;
        echo  '|';
        echo $age;
        //获取所有变量信息
//        $all = Request::instance()->param();
//        var_dump($all);
        //   return "hello,like!";
    }*/

    //获取参数 法3：利用input变量

    public  function hello(Request $request){  //依赖注入
     /*  //$all = input('param.');  //全部信息
        $id = input('param.id');  //id信息
        var_dump($id);*/

     $all = $request->param();
     var_dump($all);

    }

}