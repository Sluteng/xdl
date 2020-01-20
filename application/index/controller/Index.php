<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Index extends Controller
{
    public function index()
    {
    	require_once ('Base.php');

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $cpzxcontentResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);

      $cgalindexModel=Loader::model('cgalindex');
      $cgalconResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
                'isdelete'=>0,
                'status'=>1,
                'display'=>1
            ])->order('id','desc')->paginate(8);
      return $this->view->fetch('',[
        'cpzxcontentResult'=>$cpzxcontentResult,
        'cgalconResult'=>$cgalconResult,
      	'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
}
