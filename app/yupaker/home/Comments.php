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
use app\yupaker\model\YupakerComments as CommentsModel;
use think\Db;

class Comments extends Base
{
	public function index()
    {
       
    }
	
	public function save(){
        if ($this->request->isPost()) {
            $mod = new CommentsModel();
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