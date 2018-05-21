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
namespace app\yupaker\validate;

use think\Validate;

/**
 * 新闻验证器
 * @package app\yupaker\validate
 */
class News extends Validate
{
    //定义验证规则
    protected $rule = [
        'title|新闻标题' => 'require',
        'catid|新闻分类' => 'require|number',
        'content|新闻内容' => 'require',
    ];
}
