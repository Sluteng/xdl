<?php
namespace app\common\model;

use think\Model;

class Cgaltdk extends Model
{
    // 指定表名,不含前缀
    protected $name = 'cgaltdk';
    // 开启自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';
}
