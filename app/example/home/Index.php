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
use think\Db;

class Index extends Common
{
    public function index()
    {
        $_cid = input('param.cid', 0);
        $map = [];
        if ($_cid > 0) {
            $map['cid'] = $_cid;
        }

        $data['news'] = Db::name('example_news')->where($map)->select();
        $data['category'] = Db::name('example_category')->where('status', 1)->column('id,name,status');

        $this->assign('data', $data);
        return $this->fetch();
    }
}