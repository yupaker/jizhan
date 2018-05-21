<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: yupaker
// +----------------------------------------------------------------------
namespace app\yupaker\home;
use think\Db;

class Index extends Base
{
    public function index()
    {
        $catid = input('param.catid', 0);
        $tagname = input('param.tagname');
        $where = ' status = 1 ';
        if ($catid > 0) {
            $where .= ' and catid='.$catid.' ';
        }
        if ($tagname) {
            $where .= " and find_in_set('".$tagname."',tagids)>0 ";
        }
		//新闻主体
		
        $list = Db::name('yupaker_news')->where($where)->order('id desc')->paginate(50)->each(function($item, $key){
			$item['tagids'] = explode(',',$item['tagids']);
			//评论个数
			$item['commentnum'] = Db::name('yupaker_comments')->where('newsid='.$item['id'].' and status=1 ')->count();
			//评论内容
			$item['commentlist'] = Db::name('yupaker_comments')->where('newsid='.$item['id'].' and reid=0 and status=1 ')->limit('10')->order('addtime desc')->select();
			return $item;
		});
        $pages = $list->render();
        $this->assign('list', $list);
        $this->assign('pages', $pages);
        return $this->fetch();
    }
	
}