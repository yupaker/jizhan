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
namespace app\common\model;

use think\Model;

/**
 * 支付宝参数模型
 * @package app\common\model
 */
class AdminAlipayConfig extends Model
{
     public function alipay_config(){
        $alipay_config = array(
            'partner'  => '',

            //收款支付宝账号，以2088开头由16位纯数字组成的字符串，一般情况下收款账号就是签约账号
            'seller_id'    =>'',

            // MD5密钥，安全检验码，由数字和字母组成的32位字符串，查看地址：https://b.alipay.com/order/pidAndKey.htm
            'key'     => '',

            // 服务器异步通知页面路径  需http://格式的完整路径，不能加?id=>123这类自定义参数，必须外网可以正常访问
           'notify_url' => "",

            // 页面跳转同步通知页面路径 需http://格式的完整路径，不能加?id=>123这类自定义参数，必须外网可以正常访问
           'return_url' => "",

            //签名方式
           'sign_type'   => strtoupper('MD5'),

            //字符编码格式 目前支持 gbk 或 utf-8
           'input_charset'=> strtolower('utf-8'),

            //ca证书路径地址，用于curl中ssl校验
            //请保证cacert.pem文件在当前文件夹目录中
           'cacert'   => getcwd().'\\cacert.pem',

            //访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
           'transport'    => 'http',
            // 支付类型 ，无需修改
           'payment_type'=> "1",

            // 产品类型，无需修改
           'service'=> "create_direct_pay_by_user",

            //↑↑↑↑↑↑↑↑↑↑请在这里配置您的基本信息↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            //↓↓↓↓↓↓↓↓↓↓ 请在这里配置防钓鱼信息，如果没开通防钓鱼功能，为空即可 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

            // 防钓鱼时间戳  若要使用请调用类文件submit中的query_timestamp函数
           'anti_phishing_key' => "",
            // 客户端的IP地址 非局域网的外网IP地址，如：221.0.0.1
           'exter_invoke_ip' => "",
        );
       return $alipay_config;
	}
	
	
	
    public function parameter(){
        $config = new Config();
        $alipay_config = $config->alipay_config();
        $parameter = array(
            "service"       => $alipay_config['service'],
            "partner"       => $alipay_config['partner'],
            "seller_id"  => $alipay_config['seller_id'],
            "payment_type" => $alipay_config['payment_type'],
            "notify_url"   => $alipay_config['notify_url'],
            "return_url"   => $alipay_config['return_url'],

            "anti_phishing_key"=>$alipay_config['anti_phishing_key'],
            "exter_invoke_ip"=>$alipay_config['exter_invoke_ip'],
            "out_trade_no" => '',
            "subject"  => '',
            "total_fee"    => '',
            "body" => '',
            "_input_charset"   => trim(strtolower($alipay_config['input_charset']))
            //其他业务参数根据在线开发文档，添加参数.文档地址:https://doc.open.alipay.com/doc2/detail.htm?spm=a219a.7629140.0.0.kiX33I&treeId=62&articleId=103740&docType=1
            //如"参数名"=>"参数值"

        );
        return $parameter;
    }
	
}