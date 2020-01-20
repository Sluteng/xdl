<?php
namespace app\common\validate;

use think\Validate;

class Navbarson extends Validate
{
    protected $rule = [
        "state|一级导航栏ID" => "require",
        "navbarson|二级导航标题" => "require",
    ];
}
