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

class YupakerComments extends Model
{
  
    /**
     * 回复评论
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
    public function storage($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }

        if (isset($data['id']) && !empty($data['id'])) {
            $res = $this->update($data);
        } else {
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

        if (isset($data['newsid']) && !empty($data['newsid'])) {
            print_r($data);
			exit;
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