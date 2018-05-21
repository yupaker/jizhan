<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP提供个人非商业用途免费使用，商业需授权。
// +----------------------------------------------------------------------
// | Author: yupaker
// +----------------------------------------------------------------------

namespace app\yupaker\admin;
use app\admin\controller\Admin;
use app\yupaker\model\YupakerNewscategory as NewscategoryModel;
use think\Db;

/**
 * 示例模块
 * @package app\yupaker\controller
 */
class Newscategory extends Admin
{
    public function index()
    {
        $list = NewscategoryModel::getChilds(0, 0);
        $this->assign('list', $list);
        return $this->afetch();
    }

    /**
     * 添加内容
     * @author yupaker
     * @return mixed
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $mod = new NewscategoryModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $category = NewscategoryModel::getSelect(NewscategoryModel::getChilds());
        $this->assign('category', $category);
        return $this->afetch('edit');
    }

    /**
     * 修改内容
     * @author yupaker
     * @return mixed
     */
    public function edit()
    {
        $id = get_num();
        if ($this->request->isPost()) {
            $mod = new NewscategoryModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $row = NewscategoryModel::where('id', $id)->find();
        if (!$row) {
            return $this->error('数据不存在');
        }
        $category = NewscategoryModel::getSelect(NewscategoryModel::getChilds());
        $this->assign('category', $category);
        $this->assign('data_info', $row);
        return $this->afetch('edit');
    }
}