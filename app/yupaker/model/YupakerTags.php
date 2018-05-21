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

class YupakerTags extends Model
{
    /**
     * 入库
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
    public function storage($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }

        // 验证
        $valid = Loader::validate('Tags');
        if($valid->check($data) !== true) {
            $this->error = $valid->getError();
            return false;
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
	*获取标签列表
	*
	*/
	public static function getTagslist()
	{
        $res = Db::name('yupaker_tags')->where('status=1')->field('id,title,status')->select();
		foreach($res as $v=>$n){
			$res[$v]['newsnum']=Db::name('yupaker_news')->where(" find_in_set('".$n['title']."',tagids)>0 ")->field('id')->count();
		}
		
        return $res;
	}
	
	
}