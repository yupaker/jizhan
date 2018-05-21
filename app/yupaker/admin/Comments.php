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
use app\yupaker\model\YupakerComments as CommentsModel;
use think\Db;

/**
 * 留言模块
 * @package app\yupaker\controller
 */
class Comments extends Admin
{
    public function index()
    {
        $_keywords = input('param.keywords/s');
        $newsid = input('param.newsid/s');
        $map = [];
        if ($_keywords) {
            $map['content'] = ['like', '%'.$_keywords.'%'];
        }
        if ($newsid) {
            $map['newsid'] = $newsid;
        }
        $list = CommentsModel::where($map)->paginate(50)->each(function($item, $key){
			//回复至文章的个数
			$item['newsnum'] = CommentsModel::where(' newsid='.$item['newsid'].'')->count();
			return $item;
		});
		$pages = $list->render();
        $this->assign('list', $list);
        $this->assign('pages', $pages);
        return $this->afetch();
    }

    /**
     * 查看留言
     * @author yupaker
     * @return mixed
     */
    public function edit()
    {
        $id = get_num();
        if ($this->request->isPost()) {
            $mod = new CommentsModel();
            if (!$mod->storage()) {
                return $this->error($mod->getError());
            }
            return $this->success('保存成功');
        }
        $data = CommentsModel::where('id', $id)->find();
		if (!$data) {
            return $this->error('评论不存在');
        }
        $this->assign('data', $data);
        return $this->afetch();
    }
}