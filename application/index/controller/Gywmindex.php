<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Gywmindex extends Controller
{
    public function gywmindex()
    {
    	require_once ('Base.php');
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);
      return $this->view->fetch('',[
        'tjResult'=>$tjResult,
      ]);
    }
    public function gygs_qywh()
    {
    	require_once ('Base.php');

      $gygsqywhModel=Loader::model('GygsQywh');
      $gygsqywhResult=$gygsqywhModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);
      return $this->view->fetch('',[
        'gygsqywhResult'=>$gygsqywhResult,
        'tjResult'=>$tjResult,
      ]);
    }
    public function gywm_gsry()
    {
    	require_once ('Base.php');

      $gywmgsryModel=Loader::model('GywmGsry');
      $gywmgsryResult=$gywmgsryModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();

      $gywmgsrytdkModel=Loader::model('GuwmGsrytdk');
      $gywmgsrytdkResult=$gywmgsrytdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);
      return $this->view->fetch('',[
        'gywmgsryResult'=>$gywmgsryResult,
        'gywmgsrytdkResult'=>$gywmgsrytdkResult,
        'tjResult'=>$tjResult,
      ]);
    }
}
