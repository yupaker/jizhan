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
namespace app\yupaker\model;

use think\Model;
use think\Loader;
use think\Db;
use think\Cookie;
use think\Request;

class YupakerComments extends Model
{
  
    /**
     * 回复评论
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
    public function retextarea($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }
        if (isset($data['reid']) && !empty($data['reid'])) {
			$comment = Db::name('yupaker_comments')->find($data['reid']);
			$data['newsid'] = $comment['newsid'];
			if(empty($data['rename'])) $data['rename'] = $comment['nickname'];
			//获取cookie
			$comment = Cookie::get('comment');
			$data['nickname'] = $comment['nickname'];
			$data['email'] = $comment['email'];
			$data['site'] = $comment['site'];
			if(empty($data['nickname'])){
				$data['nickname']="匿名用户";
			}
			$request = Request::instance();
			$data['addtime'] = time();
			$data['ip'] = $request->ip();
			$data['status'] = 1; //直接成功
            $res = $this->create($data);
        }
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }
	
    /**
     * 发表评论
     * @param array $data 入库数据
     * @author yupaker
     * @return $res
     */  
    public function savedata($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }
		unset($data['verifycode']);
        if (isset($data['newsid']) && !empty($data['newsid'])) {
			$request = Request::instance();
			$data['addtime'] = time();
			$data['ip'] = $request->ip();
			$data['status'] = 1; //直接成功
            $res = $this->create($data);
			
			$comment =array(
				'nickname' => $data['nickname'],
				'email' => $data['email'],
				'site' => $data['site'],
			);
			// 设置Cookie 有效期为一周
			Cookie::set('comment',$comment,604800);
        } else {
            $this->error = '保存失败';
            return false;
        }
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }
}