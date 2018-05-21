<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP提供个人非商业用途免费使用，商业需授权。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\example\model;

use think\Model;
use think\Loader;

class ExampleCategory extends Model
{
    // 自动写入时间戳
    protected $autoWriteTimestamp = false;

    /**
     * 入库
     * @param array $data 入库数据
     * @author 橘子俊 <364666827@qq.com>
     * @return bool
     */  
    public function storage($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }

        // 验证
        $valid = Loader::validate('ExampleCategory');
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
     * 将数据集格式化成父子结构
     * @param int $id 选中的ID
     * @param int $status 状态值
     * @param int $level 层级
     * @param int $data  要格式化的数据集
     * @author 橘子俊 <364666827@qq.com>
     * @return string
     */
    public static function getChilds($pid = 0, $status = 1, $level = 0, $data = [])
    {
        $trees = [];
        if (empty($data)) {
            $map = [];
            if ($status == 1) {
                $map['status'] = 1;
            }

            $data = self::where($map)->column('id,name,pid,status');
            $data = array_values($data); 
        }

        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                unset($data[$k]);
                $v['childs'] = self::getChilds($v['id'], $status, $level+1, $data);
                $trees[] = $v;
            }
        }
        return $trees;
    }

    /**
     * 将数据集格式化成下拉选项
     * @param int $id 选中的ID
     * @author 橘子俊 <364666827@qq.com>
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
                $str .= '<option value="'.$v['id'].'" selected>'.$separ.$v['name'].'</option>';
            } else {
                $str .= '<option value="'.$v['id'].'">'.$separ.$v['name'].'</option>';
            }
            if (isset($v['childs'])) {
                $str.= self::getSelect($v['childs'], $id, $level+1);
            }
        }
        return $str;
    }
}