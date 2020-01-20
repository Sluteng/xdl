<?php
namespace app\admin\controller;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;

class Lxwmindex extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];

    protected function filter(&$map)
    {
        if ($this->request->param("company")) {
            $map['company'] = ["like", "%" . $this->request->param("company") . "%"];
        }
        if ($this->request->param("address")) {
            $map['address'] = ["like", "%" . $this->request->param("address") . "%"];
        }
    }
}
