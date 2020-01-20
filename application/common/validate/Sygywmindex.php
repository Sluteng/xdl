<?php
namespace app\common\validate;

use think\Validate;

class Sygywmindex extends Validate
{
    protected $rule = [
        "img|图片" => "require",
        "editorValue|内容" => "require",
    ];
}
