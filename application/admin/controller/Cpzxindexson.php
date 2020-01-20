<?php
namespace app\admin\controller;
use think\Db;
use think\Loader;
use think\exception\HttpException;
use think\Config;

\think\Loader::import('controller/Controller', \think\Config::get('traits_path') , EXT);

use app\admin\Controller;

class Cpzxindexson extends Controller
{
    use \app\admin\traits\controller\Controller;
    // 方法黑名单
    protected static $blacklist = [];


    public function add()
    {
        $title=request()->param();
        $titles=reset($title);
        // return json($titles);
        $controller = $this->request->controller();

        if ($this->request->isAjax()) {
            // 插入
            $data = $this->request->except(['id']);

            // 验证
            if (class_exists($validateClass = Loader::parseClass(Config::get('app.validate_path'), 'validate', $controller))) {
                $validate = new $validateClass();
                if (!$validate->check($data)) {
                    return ajax_return_adv_error($validate->getError());
                }
            }

            // 写入数据
            if (
                class_exists($modelClass = Loader::parseClass(Config::get('app.model_path'), 'model', $this->parseCamelCase($controller)))
                || class_exists($modelClass = Loader::parseClass(Config::get('app.model_path'), 'model', $controller))
            ) {
                //使用模型写入，可以在模型中定义更高级的操作
                $model = new $modelClass();
                $ret = $model->isUpdate(false)->save($data);
            } else {
                // 简单的直接使用db写入
                Db::startTrans();
                try {
                    $model = Db::name($this->parseTable($controller));
                    $ret = $model->insert($data);
                    // 提交事务
                    Db::commit();
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();

                    return ajax_return_adv_error($e->getMessage());
                }
            }
            return ajax_return_adv('添加成功');
        } else {
            // 添加
                $navbarModel=Loader::model('Navbar');
                $navbarResult=$navbarModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'id'=>2
                ])->select();
                $arr=i_array_column($navbarResult,'id');
                $navid=reset($arr);
                $navbarsonModel=Loader::model('Navbarson');
                $navbarsonResult=$navbarsonModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'state'=>$navid
                ])->select();
                $arr=i_array_column($navbarResult,'id');
                $id=reset($arr);
                $cpzxindexsonModel=Loader::model('Cpzxindexson');
                $cpzxindexsonResult=$cpzxindexsonModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'id'=>$id
                ])->select();
                $arr=i_array_column($cpzxindexsonResult,'state');
                $state=reset($arr);
            return $this->view->fetch(isset($this->template) ? $this->template : 'edit',[
                'navbarResult'=>$navbarResult,
            	'navbarsonResult'=>$navbarsonResult,
                'id'=>$id,
            	'state'=>$state,
            ]);
        }
    }
    public function edit()
    {
        $controller = $this->request->controller();

        if ($this->request->isAjax()) {
            // 更新
            $data = $this->request->post();
            if (!$data['id']) {
                return ajax_return_adv_error("缺少参数ID");
            }

            // 验证
            if (class_exists($validateClass = Loader::parseClass(Config::get('app.validate_path'), 'validate', $controller))) {
                $validate = new $validateClass();
                if (!$validate->check($data)) {
                    return ajax_return_adv_error($validate->getError());
                }
            }

            // 更新数据
            if (
                class_exists($modelClass = Loader::parseClass(Config::get('app.model_path'), 'model', $this->parseCamelCase($controller)))
                || class_exists($modelClass = Loader::parseClass(Config::get('app.model_path'), 'model', $controller))
            ) {
                // 使用模型更新，可以在模型中定义更高级的操作
                $model = new $modelClass();
                $ret = $model->isUpdate(true)->save($data, ['id' => $data['id']]);
            } else {
                // 简单的直接使用db更新
                Db::startTrans();
                try {
                    $model = Db::name($this->parseTable($controller));
                    $ret = $model->where('id', $data['id'])->update($data);
                    // 提交事务
                    Db::commit();
                } catch (\Exception $e) {
                    // 回滚事务
                    Db::rollback();

                    return ajax_return_adv_error($e->getMessage());
                }
            }

            return ajax_return_adv("编辑成功");
        } else {
            // 编辑
            $id = $this->request->param('id');
            if (!$id) {
                throw new HttpException(404, "缺少参数ID");
            }
            $vo = $this->getModel($controller)->find($id);
            if (!$vo) {
                throw new HttpException(404, '该记录不存在');
            }

            $this->view->assign("vo", $vo);
                $navbarModel=Loader::model('Navbar');
                $navbarResult=$navbarModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'id'=>2
                ])->select();
                $arr=i_array_column($navbarResult,'id');
                $navid=reset($arr);
                $navbarsonModel=Loader::model('Navbarson');
                $navbarsonResult=$navbarsonModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'state'=>$navid
                ])->select();
                $cpzxindexsonModel=Loader::model('Cpzxindexson');
                $cpzxindexsonResult=$cpzxindexsonModel->where([
                    'isdelete'=>0,
                    'status'=>1,
                    'id'=>$id
                ])->select();
                $arr=i_array_column($cpzxindexsonResult,'state');
                $state=reset($arr);
            return $this->view->fetch('',[
                'navbarsonResult'=>$navbarsonResult,
                'id'=>$id,
            	'state'=>$state,
            ]);
        }
    }
}
