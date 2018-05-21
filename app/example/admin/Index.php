<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP提供个人非商业用途免费使用，商业需授权。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------

namespace app\example\admin;
use app\admin\controller\Admin;
use app\example\model\ExampleNews as NewsModel;
use app\example\model\ExampleCategory as CategoryModel;
use think\Db;

/**
 * 示例模块
 * @package app\example\controller
 */
class Index extends Admin
{
	
	
    public function index()
    {
        $_page = input('param.page/d', 0);
        $_keywords = input('param.keywords/s');
        $map = [];
        if ($_keywords) {
            $map['title'] = ['like', '%'.$_keywords.'%'];
        }
        $data_list = Db::name('example_news')->where($map)->paginate(50);
        $pages = $data_list->render();
        $this->assign('pages', $pages);
        $this->assign('data_list', $data_list);
        return $this->afetch();
    }

    /**
     * 添加内容
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $mod = new NewsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $category = CategoryModel::getSelect(CategoryModel::getChilds());
        $this->assign('category', $category);
        return $this->afetch('form');
    }

    /**
     * 修改内容
     * @author 橘子俊 <364666827@qq.com>
     * @return mixed
     */
    public function edit()
    {
        $id = get_num();
        if ($this->request->isPost()) {
            $mod = new NewsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $row = NewsModel::where('id', $id)->find();
        if (!$row) {
            return $this->error('数据不存在');
        }
        $category = CategoryModel::getSelect(CategoryModel::getChilds());
        $this->assign('category', $category);
        $this->assign('data_info', $row);
        return $this->afetch('form');
    }
}