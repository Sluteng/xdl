<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Lxwmindex extends Controller
{
    public function lxwmindex()
    {
      require_once ('Base.php');

      $lxwmtdkModel=Loader::model('Lxwmtdk');
      $lxwmtdkResult=$lxwmtdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);
      return $this->view->fetch('',[
      	'lxwmtdkResult'=>$lxwmtdkResult,
      	'tjResult'=>$tjResult,
      ]);
    }
}
