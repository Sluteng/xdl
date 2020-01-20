<?php
namespace app\common\validate;

use think\Validate;

class Navbar extends Validate
{
    protected $rule = [
        "link|链接" => "require",
    ];
}
