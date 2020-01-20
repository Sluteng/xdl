<?php
namespace app\common\validate;

use think\Validate;

class Xwdtcontent extends Validate
{
    protected $rule = [
        "title|标题" => "require",
        "editorValue|内容" => "require",
        "img|图片" => "require",
    ];
}
