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
 * 评论验证器
 * @package app\yupaker\validate
 */
class Comments extends Validate
{
    //定义验证规则
	protected $rule = [
        'nick|姓名'  =>  'require|max:10|token',
        'email|邮箱' =>  'email',
        'content|评论内容' =>  'require',
		'verifycode|验证码' => 'require'
    ];
}
