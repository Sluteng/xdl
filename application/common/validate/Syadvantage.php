<?php
namespace app\common\validate;

use think\Validate;

class Syadvantage extends Validate
{
    protected $rule = [
        "img|图片" => "require",
        "title|标题" => "require",
        "content|内容" => "require",
    ];
}
