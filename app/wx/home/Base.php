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
namespace app\wx\home;
use app\common\controller\Common;
use app\common\model\AdminWechat as AdminWechatModel;
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
		$mod = new AdminWechatModel();
		$this->accessToken = $mod->getAccessToken();
		
		$data = array(
            // button下的每一个元素
            "button"=>array(
                //第一个一级菜单
               array('type'=>'click',"name"=>"个人简介","key"=>"info"),
               array(
                   "name"=>"功能",
                   "sub_button"=>array(
                       array('name'=>'照相','type'=>'pic_sysphoto','key'=>'sysptoto'),
                       array('name'=>'相册','type'=>'pic_weixin','key'=>'pic_weixin')
                   )
                   ),
                array('type'=>'view','name'=>'商城','url'=>'http://www.mengjiang.xyz/wx/')
                )
        );
		//$mod->creatMenu($data);//  创建自定义菜单
		//$mod->getMenu();//  获取自定义菜单
		//$mod->delMenu();//  删除自定义菜单
    
    }
	
	
}