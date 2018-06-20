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

class YupakerNews extends Model
{
    // 定义时间戳字段名
    protected $createTime = 'addtime';
    protected $updateTime = 'addtime';
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;

    public function getContentAttr($value)
    {
        return htmlspecialchars_decode($value);
    }

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
        $valid = Loader::validate('News');
        if($valid->check($data) !== true) {
            $this->error = $valid->getError();
            return false;
        }
		if(empty($data['isnew'])){
			$data['isnew'] = 0;
		}
		if(empty($data['ishot'])){
			$data['ishot'] = 0;
		}
		if($data['tagids']){
			$data['tagids'] = implode(',',$data['tagids']);
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
}