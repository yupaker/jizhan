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
use app\yupaker\model\YupakerOrders as OrdersModel;
use think\Db;

/**
 * 示例模块
 * @package app\yupaker\controller
 */
class Orders extends Admin
{
    public function index()
    {
        $_page = input('param.page/d', 0);
        $_keywords = input('param.keywords/s');
        $map = [];
        if ($_keywords) {
            $map['orderno'] = ['like', '%'.$_keywords.'%'];
        }
        $list = Db::name('yupaker_orders')->where($map)->paginate(50);
        $pages = $list->render();
        $this->assign('list', $list);
        $this->assign('pages', $pages);
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
            $mod = new OrdersModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        return $this->afetch('edit');
    }

    /**
     * 查看详情
     * @author yupaker
     * @return mixed
     */
    public function view()
    {
        $id = get_num();
        if ($this->request->isPost()) {
            $mod = new OrdersModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $row = OrdersModel::where('id', $id)->find();
        if (!$row) {
            return $this->error('数据不存在');
        }
        $this->assign('data_info', $row);
        return $this->afetch('edit');
    }
}