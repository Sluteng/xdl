<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Xwdtindex extends Controller
{
    public function xwdtindex()
    {
    	require_once ('Base.php');

      $xwdtindexModel=Loader::model('Xwdtindex');
      $xwdtindexResult=$xwdtindexModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>3
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
      // return json($id);

      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtconResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(4,false,[
                   'path'=>'/xwdtindexidp/'.$id.'/[PAGE].html',
                   'page' => input('param.p'),
                  ]);
      $page = $xwdtconResult->render();
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('',[
      	'xwdtindexResult'=>$xwdtindexResult,
        'tjResult'=>$tjResult,
        'id'=>$id,
        'navbarson1Result'=>$navbarson1Result,
        'xwdtconResult'=>$xwdtconResult,
        'page'=>$page,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function xwdtid($id)
    {
      require_once ('Base.php');

      $xwdtindexModel=Loader::model('Navbarson');
      $xwdtindexResult=$xwdtindexModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      // return json($xwdtindexResult);
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>3
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      // $arr1 = i_array_column($navbarson1Result, 'id');
      // $ids=array_shift($arr1);

      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtconResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(4,false,[
                   'path'=>'/xwdtindexidp/'.$id.'/[PAGE].html',
                   'page' => input('param.p'),
                  ]);
      $page = $xwdtconResult->render();
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('xwdtindex',[
        'xwdtindexResult'=>$xwdtindexResult,
        'tjResult'=>$tjResult,
        // 'ids'=>$ids,
        'navbarson1Result'=>$navbarson1Result,
        'id'=>$id,
        'xwdtconResult'=>$xwdtconResult,
        'page'=>$page,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function xwdtcon($id)
    {
      require_once ('Base.php');

      $xwdtindexModel=Loader::model('Xwdtindex');
      $xwdtindexResult=$xwdtindexModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>3
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();


      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtconResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(4,false,[
                   'path'=>'/xwdtindexidp/'.$id.'/[PAGE].html',
                   'page' => input('param.p'),
                  ]);
      $page = $xwdtconResult->render();
      $xwdtconModel=Loader::model('xwdtcontent');
      $ledtynlddtcon=i_array_column($xwdtconResult,'shownum');
      $shownum = reset($ledtynlddtcon);
      $arr1=i_array_column($xwdtconResult,'state');
      $idd = reset($arr1);
      $shownumResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->update(['shownum' => $shownum+1]);

      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);

      $xwdtcontentModel=Loader::model('xwdtcontent');
      $xwdtcontentResult=$xwdtcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      return $this->view->fetch('xwdtindex',[
        'xwdtindexResult'=>$xwdtindexResult,
        'tjResult'=>$tjResult,
        // 'ids'=>$ids,
        'navbarson1Result'=>$navbarson1Result,
        'id'=>$id,
        'idd'=>$idd,
        'xwdtconResult'=>$xwdtconResult,
        'page'=>$page,
        'xwdtcon1Result'=>$xwdtcon1Result,
        'xwdtcontentResult'=>$xwdtcontentResult,
      ]);
    }
    public function xwdtcontent($id)
    {
      require_once ('Base.php');

      $xwdtindexModel=Loader::model('Xwdtindex');
      $xwdtindexResult=$xwdtindexModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>3
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();


      $xwdtconModel=Loader::model('Xwdtcontent');
      $xwdtconResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->order('id','desc')->paginate(4,false,[
                   'path'=>'/xwdtindexidp/'.$id.'/[PAGE].html',
                   'page' => input('param.p'),
                  ]);
      $page = $xwdtconResult->render();

      $arr1=i_array_column($xwdtconResult,'state');
      $idd = reset($arr1);


      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);

      $xwdtcontentResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      
      $ledtynlddtcon=i_array_column($xwdtcontentResult,'shownum');
      $shownum = reset($ledtynlddtcon);
      $shownumResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->update(['shownum' => $shownum+1]);
      $prev=$xwdtconModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['<',$id]
      ])->order('id','desc')->limit(1)->select();
      //下一页
      $next=$xwdtconModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['>',$id]
      ])->order('id','asc')->limit(1)->select();

      $xwdtcontdkResult=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      return $this->view->fetch('xwdcontent',[
        'xwdtindexResult'=>$xwdtindexResult,
        'tjResult'=>$tjResult,
        // 'ids'=>$ids,
        'navbarson1Result'=>$navbarson1Result,
        'id'=>$id,
        'idd'=>$idd,
        'xwdtconResult'=>$xwdtconResult,
        'page'=>$page,
        'xwdtcon1Result'=>$xwdtcon1Result,
        'xwdtcontentResult'=>$xwdtcontentResult,
        'prev'=>$prev,
        'next'=>$next,
        'xwdtcontdkResult'=>$xwdtcontdkResult,
      ]);
    }
}
