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
use app\common\controller\Common;
use app\yupaker\model\YupakerTags as TagsModel;
use think\Db;
/**
 * 前台公共控制器
 * @package app\admin\controller
 */
class Base extends Common
{
    /**
     * 初始化方法
     */
    protected function _initialize()
    {
        parent::_initialize();
		$config = config('module_yupaker');
		$this->assign('config', $config);
		
		//导航菜单
        $menu = Db::name('yupaker_newscategory')->where('status', 1)->column('id,title,status,link');
		$this->assign('menu', $menu);
		//标签云
		$tagslist = TagsModel::getTagslist();
		$this->assign('tagslist',$tagslist);
		
		//最新
        $news['new'] = Db::name('yupaker_news')->where('status=1 and isnew=1')->order('addtime desc')->limit('10')->field('id,title')->select();
		//推荐
        $news['hot'] = Db::name('yupaker_news')->where('status=1 and ishot=1')->order('addtime desc')->limit('10')->field('id,title')->select();
		//点击量
        $news['view'] = Db::name('yupaker_news')->where('status=1')->order('viewnum desc')->limit('10')->field('id,title')->select();
        $this->assign('news', $news);
    
    }
	
    protected function clientRedirect($url) {
        $url = U($url);
        $text = "<script>window.top.location='$url';</script>";
        die($text);
    } 
    
    protected function checkId($id) {
        if (empty($id)) {
            $this->error('访问的页面不存在');
        }
    }
	
	
}