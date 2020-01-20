<?php
namespace app\index\controller;
use think\Controller;
use think\Loader;

  $sytdkModel=Loader::model('Sytdk');
  $sytdkResult=$sytdkModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $logoModel=Loader::model('Logo');
  $logoResult=$logoModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $lxwmindexModel=Loader::model('Lxwmindex');
  $lxwmindexResult=$lxwmindexModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $syadvantageModel=Loader::model('Syadvantage');
  $syadvantageResult=$syadvantageModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $sygywmindexModel=Loader::model('sygywmindex');
  $sygywmindexResult=$sygywmindexModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $sylinksModel=Loader::model('Sylinks');
  $sylinksResult=$sylinksModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $sywechatModel=Loader::model('sywechat');
  $sywechatResult=$sywechatModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $taobaoModel=Loader::model('Taobao');
  $taobaoResult=$taobaoModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->limit(1)->select();

  $sybannerModel=Loader::model('Sybanner');
  $sybannerResult=$sybannerModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $copyrightModel=Loader::model('Copyright');
  $copyrightResult=$copyrightModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $navbarModel=Loader::model('Navbar');
  $navbarResult=$navbarModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $navbarsonModel=Loader::model('Navbarson');
  $navbarsonResult=$navbarsonModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();
  $cont=request()->controller(); //获取控制器名称
  $foo=lcfirst($cont);  //首字母变小写

  $largeimgModel=Loader::model('Largeimg');
  $largeimgResult=$largeimgModel->where([
      'isdelete'=>0,
      'status'=>1,
  ])->select();

  $this->assign([
    'sytdkResult'=>$sytdkResult,
    'logoResult'=>$logoResult,
    'lxwmindexResult'=>$lxwmindexResult,
    'syadvantageResult'=>$syadvantageResult,
    'sygywmindexResult'=>$sygywmindexResult,
    'sylinksResult'=>$sylinksResult,
    'sywechatResult'=>$sywechatResult,
    'taobaoResult'=>$taobaoResult,
    'sybannerResult'=>$sybannerResult,
    'copyrightResult'=>$copyrightResult,
    'navbarResult'=>$navbarResult,
    'navbarsonResult'=>$navbarsonResult,
    'largeimgResult'=>$largeimgResult,
  ]);