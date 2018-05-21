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

class YupakerNewscategory extends Model
{
    // 自动写入时间戳
    protected $autoWriteTimestamp = false;

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
        $valid = Loader::validate('Newscategory');
        if($valid->check($data) !== true) {
            $this->error = $valid->getError();
            return false;
        }

        if (isset($data['id']) && !empty($data['id'])) {
            $res = $this->update($data);
        } else {
			//$res = Db::name('yupaker_newscategory')->insert($data);
            $res = $this->create($data);
        }
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }

    /**
     * 将数据集格式化成父子结构
     * @param int $id 选中的ID
     * @param int $status 状态值
     * @param int $level 层级
     * @param int $data  要格式化的数据集
     * @author yupaker
     * @return string
     */
    public static function getChilds($upid = 0, $status = 1, $level = 0, $data = [])
    {
        $trees = [];
        if (empty($data)) {
            $map = [];
            if ($status == 1) {
                $map['status'] = 1;
            }
			
            $data = self::where($map)->column('id,title,upid,code,status');
        	//$data = Db::name('yupaker_newscategory')->where($map)->field('id,title,upid,status')->find();
        }
		if($data){
			foreach ($data as $k => $v) {
				if ($v['upid'] == $upid) {
					unset($data[$k]);
					$v['childs'] = self::getChilds($v['id'], $status, $level+1, $data);
					$trees[] = $v;
				}
			}
		}
        return $trees;
    }

    /**
     * 将数据集格式化成下拉选项
     * @param int $id 选中的ID
     * @author yupaker
     * @return string
     */
    public static function getSelect($data = [], $id = 0, $level = 0)
    {
        if (empty($data)) {
            return '';
        }
        $str = $separ = '';
        if ($level > 0) {
            for ($i=0; $i < $level; $i++) {
                $separ .= '&nbsp;&nbsp;&nbsp;';
            }
            $separ .= '┣&nbsp;';
        }

        foreach ($data as $k => $v) {
            if ($id == $v['id']) {
                $str .= '<option value="'.$v['id'].'" selected>'.$separ.$v['title'].'</option>';
            } else {
                $str .= '<option value="'.$v['id'].'">'.$separ.$v['title'].'</option>';
            }
            if (isset($v['childs'])) {
                $str.= self::getSelect($v['childs'], $id, $level+1);
            }
        }
        return $str;
    }
}