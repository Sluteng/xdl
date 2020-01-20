<?php
namespace app\common\validate;

use think\Validate;

class GygsQywh extends Validate
{
    protected $rule = [
        "editorValue|图片（可以添加文字）" => "require",
    ];
}
