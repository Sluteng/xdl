<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Cgalindex extends Controller
{
    public function cgalindex()
    {
    	require_once ('Base.php');

      $cgaltdkModel=Loader::model('Cgaltdk');
      $cgaltdkResult=$cgaltdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>4
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      $arr1 = i_array_column($navbarson1Result, 'id');
      $id=array_shift($arr1);

      $cgalindexModel=Loader::model('cgalindex');
      $cgalindexResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(6,false,[
           'path'=>'/cgalindexidp/'.$id.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cgalindexResult->render();
      return $this->view->fetch('',[
        'cgaltdkResult'=>$cgaltdkResult,
        'xwdtcon1Result'=>$xwdtcon1Result,
      	'tjResult'=>$tjResult,
        'id'=>$id,
        'navbarson1Result'=>$navbarson1Result,
        'cgalindexResult'=>$cgalindexResult,
        'page'=>$page,
      ]);
    }
    public function cgalindexid($id)
    {
      require_once ('Base.php');

      $cgaltdkModel=Loader::model('Navbarson');
      $cgaltdkResult=$cgaltdkModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>4
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      // $arr1 = i_array_column($navbarson1Result, 'id');
      // $id=array_shift($arr1);

      $cgalindexModel=Loader::model('cgalindex');
      $cgalindexResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(6,false,[
           'path'=>'/cgalindexidp/'.$id.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cgalindexResult->render();
      return $this->view->fetch('cgalindex',[
        'cgaltdkResult'=>$cgaltdkResult,
        'xwdtcon1Result'=>$xwdtcon1Result,
        'tjResult'=>$tjResult,
        'id'=>$id,
        'navbarson1Result'=>$navbarson1Result,
        'cgalindexResult'=>$cgalindexResult,
        'page'=>$page,
      ]);
    }
    public function cgalcon($id)
    {
      require_once ('Base.php');

      $cgaltdkModel=Loader::model('Cgaltdk');
      $cgaltdkResult=$cgaltdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>4
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      // $arr1 = i_array_column($navbarson1Result, 'id');
      // $id=array_shift($arr1);

      $cgalindexModel=Loader::model('cgalindex');
      $cgalindexResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(6,false,[
           'path'=>'/cgalindexidp/'.$id.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cgalindexResult->render();

      $cgalconResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      
      $ledtynlddtcon=i_array_column($cgalconResult,'shownum');
      $shownum = reset($ledtynlddtcon);
      $shownumResult=$cgalindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->update(['shownum' => $shownum+1]);
      $prev=$cgalindexModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['<',$id]
      ])->order('id','desc')->limit(1)->select();
      //下一页
      $next=$cgalindexModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['>',$id]
      ])->order('id','asc')->limit(1)->select();
      return $this->view->fetch('cgalcon',[
        'cgaltdkResult'=>$cgaltdkResult,
        'xwdtcon1Result'=>$xwdtcon1Result,
        'tjResult'=>$tjResult,
        'id'=>$id,
        'navbarson1Result'=>$navbarson1Result,
        'cgalindexResult'=>$cgalindexResult,
        'page'=>$page,
        'cgalconResult'=>$cgalconResult,
        'prev'=>$prev,
        'next'=>$next,
      ]);
    }
}
