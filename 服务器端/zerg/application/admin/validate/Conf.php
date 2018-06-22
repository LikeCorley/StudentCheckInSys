<?php
namespace app\admin\validate;
use think\Validate;
class Conf extends Validate
{

    protected $rule=[
        'cnname'=>'unique:conf|require|max:60',
        'enname'=>'unique:conf|require|max:60',
        'type'=>'require',
    ];


    protected $message=[
        'cnname.require'=>'中文名称不得为空！',
        'cnname.unique'=>'中文名称不得重复！',
        'enname.unique'=>'英文名称不得重复！',
        'enname.require'=>'英文名称不得为空！',
        'cnname.max'=>'中文名称不能大于60个字符！',
        'enname.max'=>'英文名称不能大于60个字符！',
        'type.require'=>'配置类型不得为空！',
    ];

    protected $scene=[
        'edit'=>['cnname','enname'],
    ];






    

    




   

	












}
