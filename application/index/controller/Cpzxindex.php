<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Cpzxindex extends Controller
{
    public function cpzxindex()
    {
    	require_once ('Base.php');

      $cpzxindextdkModel=Loader::model('Cpzxindextdk');
      $cpzxindextdkResult=$cpzxindextdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();

      $cpzxindexsonModel=Loader::model('Cpzxindexson');
      $cpzxindexson1Result=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();

      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>2
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);
      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      // return json($fid);
      $arr1 = i_array_column($navbarson1Result, 'id');
      $id1=array_shift($arr1);
      // return json($id1);
      $arr2 = i_array_column($cpzxindextdkResult, 'id');
      $tid=array_shift($arr2);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$tid
      ])->paginate(6,false,[
           'path'=>'/cpzxindexidp/'.$tid.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cpzxcontentResult->render();
      // return json($cpzxcontentResult);
      $id="";
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('',[
      	'cpzxindextdkResult'=>$cpzxindextdkResult,
      	'cpzxindexson1Result'=>$cpzxindexson1Result,
        'id'=>$id,
        'id1'=>$id1,
      	'cpzxcontentResult'=>$cpzxcontentResult,
      	'page'=>$page,
        'tjResult'=>$tjResult,
        'navbarson1Result'=>$navbarson1Result,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function cpzxindexid($id)
    {
    	require_once ('Base.php');

      $cpzxindextdkModel=Loader::model('Cpzxindexson');
      $cpzxindextdkResult=$cpzxindextdkModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      // return json($id);
      // return json($cpzxindextdkResult);
      $cpzxindexsonModel=Loader::model('Cpzxindexson');
      $cpzxindexsonResult=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      $cpzxindexson1Result=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>2
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);

      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      $arr1 = i_array_column($navbarson1Result, 'id');
      $id1=array_shift($arr1);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->paginate(6,false,[
           'path'=>'/cpzxindexidp/'.$id.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      // return json($cpzxcontentResult);
      $page = $cpzxcontentResult->render();
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('cpzxindex',[
      	'cpzxindextdkResult'=>$cpzxindextdkResult,
        'cpzxindexsonResult'=>$cpzxindexsonResult,
        'cpzxindexson1Result'=>$cpzxindexson1Result,
      	'navbarson1Result'=>$navbarson1Result,
      	'cpzxcontentResult'=>$cpzxcontentResult,
        'page'=>$page,
      	'tjResult'=>$tjResult,
        'id'=>$id,
        'id1'=>$id1,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function cpzxcontent($id)
    {
    	require_once ('Base.php');

      $cpzxindexsonModel=Loader::model('Cpzxindexson');
      $cpzxindexsonResult=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      $cpzxindexson1Result=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$id
      ])->paginate(6,false,[
           'path'=>'/cpzxindexidp/'.$id.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cpzxcontentResult->render();
      $cpzxconResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->select();
      $ledtynlddtcon=i_array_column($cpzxconResult,'shownum');
      $shownum = reset($ledtynlddtcon);
      $shownumResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id
      ])->update(['shownum' => $shownum+1]);

      //上一页
      $prev=$cpzxcontentModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['<',$id]
      ])->order('id','desc')->limit(1)->select();
      //下一页
      $next=$cpzxcontentModel->where([
        'isdelete'=>0,
        'status'=>1,
        'id' => ['>',$id]
      ])->order('id','asc')->limit(1)->select();
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('',[
        'id'=>$id,
        'cpzxindexsonResult'=>$cpzxindexsonResult,
        'cpzxindexson1Result'=>$cpzxindexson1Result,
        'cpzxcontentResult'=>$cpzxcontentResult,
        'page'=>$page,
      	'cpzxconResult'=>$cpzxconResult,
        'prev'=>$prev,
        'next'=>$next,
        'tjResult'=>$tjResult,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function naidiwen($id1)
    {
      require_once ('Base.php'); 
      // return json($sytdkResult);
      // return json($id1);
      // $cpzxindextdkModel=Loader::model('Cpzxindextdk');
      // $cpzxindextdkResult=$cpzxindextdkModel->where([
      //     'isdelete'=>0,  
      //     'status'=>1,
      // ])->select();
      $cpzxindextdkResult=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>$id1
      ])->select();
     
      $cpzxindexsonModel=Loader::model('Cpzxindexson');
      $cpzxindexson1Result=$cpzxindexsonModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
     
      $navbaraResult=$navbarModel->where([
          'isdelete'=>0,
          'status'=>1,
          'id'=>2
      ])->select();
      $arr1 = i_array_column($navbaraResult, 'id');
      $fid=array_shift($arr1);
      // return json($navbaraResult);
      $navbarson1Result=$navbarsonModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$fid
      ])->select();
      // return json($navbarson1Result);
      $arr2 = i_array_column($cpzxindextdkResult, 'id');
      $tid=array_shift($arr2);

      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
          'state'=>$tid
      ])->paginate(6,false,[
           'path'=>'/cpzxindexidp/'.$tid.'/[PAGE].html',
           'page' => input('param.p'),
          ]);
      $page = $cpzxcontentResult->render();
      // return json($cpzxcontentResult);
      $id="";
      $xwdtconModel=Loader::model('xwdtcontent');
      $xwdtcon1Result=$xwdtconModel->where([
          'isdelete'=>0,
          'status'=>1,
          'display'=>1
      ])->order('id','desc')->paginate(6);
      return $this->view->fetch('cpzxindex',[
        'cpzxindextdkResult'=>$cpzxindextdkResult,
        'cpzxindexson1Result'=>$cpzxindexson1Result,
        'id1'=>$id1,
        'id'=>$id,
        'cpzxcontentResult'=>$cpzxcontentResult,
        'page'=>$page,
        'tjResult'=>$tjResult,
        'navbarson1Result'=>$navbarson1Result,
        'xwdtcon1Result'=>$xwdtcon1Result,
      ]);
    }
    public function souso()
    {
      $title=request()->param();
      $titles=reset($title);
      if ($titles != null) {
        $cpzxindexsonModel=Loader::model('Cpzxindexson');
        $sousoResult=$cpzxindexsonModel->where([
            'isdelete'=>0,
            'status'=>1,
            'title'=>['like', "%".$titles."%"]
        ])->limit(1)->select();
        if ($sousoResult != null) {
          $arr=i_array_column($sousoResult,'id');
          $id=reset($arr);
          $this->redirect('/cpzxindexid/'.$id.'.html');
          exit;
        }
        $cpzxindexModel=Loader::model('Navbarson');
        $souso1Result=$cpzxindexModel->where([
            'isdelete'=>0,
            'status'=>1,
            'navbarson'=>['like', "%".$titles."%"]
        ])->limit(1)->select();
        if ($souso1Result != null) {
          $arr=i_array_column($souso1Result,'id');
          $id=reset($arr);
          $this->redirect('/naidiwen/'.$id.'.html');
          exit;
        }else{
          echo "<script>alert('没有你所查询的词语');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";exit;
        }
      }else{
        echo "<script>alert('请输入关键词');location.href='".$_SERVER["HTTP_REFERER"]."';</script>";exit;
      }
    }
}
