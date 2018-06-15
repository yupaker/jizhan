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
use app\yupaker\model\YupakerMessages as MessagesModel;
use think\Db;
use think\Cookie;

class Messages extends Base
{
	
	/**
	 * 留言列表
	 *
	 */
	public function index()
    {
		$list = MessagesModel::getMessagelist(0, 1);
		$this->assign('list',$list);
		//获取cookie
		$comment = Cookie::get('comment');
		$this->assign('comment',$comment);
        return $this->fetch();
    }
	/**
	 * 发表评论
	 *
	 */
	public function save(){
        if ($this->request->isPost()) {
            $mod = new MessagesModel();
            if (!$mod->savedata()) {
                return $this->error($mod->getError());
            }
            return $this->success('发表成功');
        }else{
			return $this->error('数据错误');
		}
		exit;
	}
	
}