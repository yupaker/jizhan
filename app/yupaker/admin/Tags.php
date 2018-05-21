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
use app\yupaker\model\YupakerTags as TagsModel;
use think\Db;

/**
 * 示例模块
 * @package app\yupaker\controller
 */
class Tags extends Admin
{
    public function index()
    {
        $_page = input('param.page/d', 0);
        $_keywords = input('param.keywords/s');
        $map = [];
        if ($_keywords) {
            $map['title'] = ['like', '%'.$_keywords.'%'];
        }
        $list = Db::name('yupaker_tags')->where($map)->paginate(50)->each(function($item, $key){
			$item['newsnum'] = Db::name('yupaker_news')->where(" find_in_set('".$item['title']."',tagids)>0 ")->field('id')->count();
			return $item;
		});
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
            $mod = new TagsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
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
            $mod = new TagsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $row = TagsModel::where('id', $id)->find();
        if (!$row) {
            return $this->error('数据不存在');
        }
        $this->assign('data_info', $row);
        return $this->afetch('edit');
    }
}