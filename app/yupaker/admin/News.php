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
use app\yupaker\model\YupakerNews as NewsModel;
use app\yupaker\model\YupakerNewscategory as NewscategoryModel;
use app\yupaker\model\YupakerTags as TagsModel;
use think\Db;

/**
 * 示例模块
 * @package app\yupaker\controller
 */
class News extends Admin
{
    public function index()
    {
        $_page = input('param.page/d', 0);
        $_keywords = input('param.keywords/s');
        $map = [];
        if ($_keywords) {
            $map['title'] = ['like', '%'.$_keywords.'%'];
        }
        $list = Db::name('yupaker_news')->where($map)->order('id desc')->paginate(50)->each(function($item, $key){
			$item['tagids'] = explode(',',$item['tagids']);
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
            $mod = new NewsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $category = NewscategoryModel::getSelect(NewscategoryModel::getChilds());
        $this->assign('category', $category);
		$tagslist = TagsModel::getTagslist();
		$this->assign('tagslist',$tagslist);
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
            $mod = new NewsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $row = NewsModel::where('id', $id)->find();
		if($row['tagids']){
			$row['tagids'] = explode(',',$row['tagids']);
		}
        if (!$row) {
            return $this->error('数据不存在');
        }
        $category = NewscategoryModel::getSelect(NewscategoryModel::getChilds());
		$tagslist = TagsModel::getTagslist();
		$this->assign('tagslist',$tagslist);
        $this->assign('category', $category);
        $this->assign('data_info', $row);
        return $this->afetch('edit');
    }
}