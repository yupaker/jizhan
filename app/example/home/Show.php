<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
namespace app\example\home;
use app\common\controller\Common;
use app\example\model\ExampleNews as NewsModel;
use think\Db;

class Show extends Common
{
    public function index()
    {
        $_id = get_num();

        $data['news'] = NewsModel::get($_id);
        if (!$data['news']) {
            return $this->error('数据不存在！');
        }
        $data['category'] = Db::name('example_category')->where('status', 1)->column('id,name,status');

        $this->assign('data', $data);
        return $this->fetch();
    }
}