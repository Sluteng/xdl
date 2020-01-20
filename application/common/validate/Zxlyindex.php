<?php
namespace app\common\validate;

use think\Validate;

class Zxlyindex extends Validate
{
    protected $rule = [
        "name|姓名" => "require",
        "tel|电话" => "require",
        "content|留言内容" => "require",
    ];
}
