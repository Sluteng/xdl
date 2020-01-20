<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

class Zxlyindex extends Controller
{
    public function zxlyindex()
    {
    	require_once ('Base.php');

      $zxlytdkModel=Loader::model('Zxlytdk');
      $zxlytdkResult=$zxlytdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);
      return $this->view->fetch('',[
        'zxlytdkResult'=>$zxlytdkResult,
      	'tjResult'=>$tjResult,
      ]);
    }
    public function zxlyindex1()
    {
      require_once ('Base.php');

      $zxlytdkModel=Loader::model('Zxlytdk');
      $zxlytdkResult=$zxlytdkModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(6);
      $cpzxcontentModel=Loader::model('Cpzxcontent');
      $tjResult=$cpzxcontentModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->order('id','desc')->paginate(4);

      $zxlyindexModel=Loader::model('Zxlyindex');
      $zxlyindexResult=$zxlyindexModel->where([
          'isdelete'=>0,
          'status'=>1,
      ])->select();
      if (request()->isPost()){
        $data = input('post.');
        // $date['flag'] = 0;在模型里边写
        $validate = validate('Zxlyindex');
        if (!$validate->batch()->check($data)) {
          $error = $validate->getError();
          $this->error(implode(',',$error));
        }
        // $result = db('student')->insert($data);
        // 下边三句话相当于上边的一句话，可以添加信息，而且还可做数据验证
        $zxlyindex = model('Zxlyindex');
        $zxlyindex->data($data,true);
        $result = $zxlyindex->allowField(true)->save();
        if ($result) {
          $this->redirect('/zxlyindex');
        } else {
          $this->redirect('/zxlyindex');
        }
      }else{
        return $this->view->fetch('zxlyindex',[
          'zxlytdkResult'=>$zxlytdkResult,
          'tjResult'=>$tjResult,
          'zxlyindexResult'=>$zxlyindexResult,
        ]);
      }
    }
}
