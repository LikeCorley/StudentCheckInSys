<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{

    protected $rule=[
        'name'=>'unique:admin|require|max:25',
        'password'=>'require|min:6',
    ];


    protected $message=[
        'name.require'=>'管理员名称不得为空！',
        'name.unique'=>'管理员名称不得重复！',
        'password.require'=>'管理员密码不得为空！',
        'password.min'=>'密码不得少于6为！',
    ];

    protected $scene=[
        'add'=>['name','password'],
        'edit'=>['name','password'=>'min:6'],
    ];





    

    




   

	












}
