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
namespace app\common\model;
use app\common\model\AdminAlipayConfig as AlipayConfigModel;

use think\Model;
use think\Loader;
use think\Db;

class AdminAlipayConfig extends Model
{
    //发起电脑网站支付请求
    public function alipay($post){
		$config = Config('alipay');
		$arr=[
			//应用ID,您的APPID
			'app_id'=>config('alipay.app_id'),
			//编码格式
			'charset' => "UTF-8",
			//签名方式
			'sign_type'=>"RSA2",
			//支付宝网关
			'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
			//异步回调
			'notify_url' => "",
			//同步回调
			'return_url' => "",
			//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
			'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA3+Hg2+mA+ZwLHrsnukVmi57xGO2q6RGlwbx0zKey5xZlDI9pinLJh/QmTuysdHDuf7SOWxTAiiIVc9k0ShWfDDaM786hCIV46ocVclT9FxIgO1KOHrCxCGcInkjaKI0psFK3ZGis/Zjn0Es8I0F60Ms9bKDDNqyiK7abZcU2eXNAZXeEfuNvOwgX9ZE9zwWed3y0PXDJIioTjDipDL/uHU1cXcyVWHwuMIkizSquN0U3x13ac8uqFs/0zsYh27hCtEEFl6wRgTRvhdn0DsevxAr9NqimvSAXyAKbd0siLkLSZmiVsV8bBr/9K9USr2zFmm24vyPjmXk2EsGhmJM9lQIDAQAB",
			//商户私钥
			'merchant_private_key' => "MIIEowIBAAKCAQEA3+Hg2+mA+ZwLHrsnukVmi57xGO2q6RGlwbx0zKey5xZlDI9pinLJh/QmTuysdHDuf7SOWxTAiiIVc9k0ShWfDDaM786hCIV46ocVclT9FxIgO1KOHrCxCGcInkjaKI0psFK3ZGis/Zjn0Es8I0F60Ms9bKDDNqyiK7abZcU2eXNAZXeEfuNvOwgX9ZE9zwWed3y0PXDJIioTjDipDL/uHU1cXcyVWHwuMIkizSquN0U3x13ac8uqFs/0zsYh27hCtEEFl6wRgTRvhdn0DsevxAr9NqimvSAXyAKbd0siLkLSZmiVsV8bBr/9K9USr2zFmm24vyPjmXk2EsGhmJM9lQIDAQABAoIBAHouVX7uohqXFGKDFR1M/re32DAYlKt5nBJs/PkrlDEVQbRnF9wc5OszTSzJcRxi/WXobcA7RRCdpUOCCE1eG1yY8LV2+N8jqGelrQimZTEQDVMSrMkG+LZzNHrdm2GCGHxHyBoeHjqQFgLQ7FL5S0Njh3QfECpocGCW2Zvi0uXYAJhSPX5iD+nl294Nvnnv9eUZOjcG+I6XPzA0itn3F61dIn86apoQfeSmAAZUvM8IdCfgHXtizfD5Uw/2BuuEdWbFClFWeuK79x0x4meHP/hW5n3EEhfi4SjyPhcwxRRKUoBNYdBPnhlBADmVz9MQ+Va9alwyovP9qKB9fGqa5UECgYEA99V9FcTg2cYwGxOBoNEHR+8PAsiov7gx+NI9OpTxyITsBZeNdU4DwIQzCHPKqqUer5QzSKqo9oXyakVZSpZDqLoHdf3Qkov3GQM1waiufq+HttNgI4ko8yVrm4VPRT/MSctbSdty35nQiaYjjMD6DRsE/+mnMJaKbpL2O4G65I0CgYEA50Ja2OJajI13tHoe3pnw4gNq0huEZmxjzL2mFzLOWY5wivNymqXThEwnHYn/oqh81I4foyADTG0KHmAwez3fca97TZ6Eur6BmB+LP4tguo14eay3cUt+JJfqOKqaC3on3ZOfhqFycv29o0nBUTAMnwwUcKxlKB7FhKyoZDaZ7ykCgYEA2iYCV6IX5blM6NhvtvWnegsUZHfqCfABlKrCmIk4li9ibb2sF4BXTyNOpHcAAtsbOqOxzJnj5jObYS2v3jaMUb2GCbcj24r2Mv8fV1q6Ver+A9DlhAIcmIHsyVU7pJH2qVImBcnzwJxs8mzaR/ApalXJPdYWg29PZOtZcKHNt5UCgYBdwc8nIw3m8evYJbKiOPMqDoyeRj21cLg9Z54Qxa5XLKKAExchj51jg6RQG4Sio4CIhF5bOj1cHND/Y6wEKx+N7cElxOC2/Ul5LUC9MHq052oymk19B0hK+bQh6Tiu8oV7FcCVSpsl962Mp/hSPBLB4Jng3GPekisuEPnsNx7NkQKBgCevFWApT2b83jBOdkoNvKjsZB20sEKf64X8AGi4ElFAqeat9PQzkY8Qxrbbe+sz/v3IU5qYDAIj/PMPhMHCEJE5rdtUuRLWf4PoFDNA2wS+NfQB8z0lMNIx1KaFivd9G49Q4STgTqJx0OjLEIE4Z2kAHy8w1Ub+fB6XQAUoyuWl",
		];
		vendor('alipay.AlipayTradeService');
		vendor('alipay.AlipayTradePagePayContentBuilder');
		$out_trade_no = trim($post['WIDout_trade_no']);
		$subject = trim($post['WIDsubject']);
		$total_amount = trim($post['WIDtotal_amount']);
		$body = trim($post['WIDbody']);
		$payRequestBuilder = new \AlipayTradePagePayContentBuilder();
		$payRequestBuilder->setBody($body);
		$payRequestBuilder->setSubject($subject);
		$payRequestBuilder->setTotalAmount($total_amount);
		$payRequestBuilder->setOutTradeNo($out_trade_no);
		$aop = new \AlipayTradeService($arr);
		$response = $aop->pagePay($payRequestBuilder, $arr['return_url'], $arr['notify_url']);
		var_dump($response);
    }
     
     //回调地址
    public function notify_url(){
        $arr=$_POST;
		vendor('alipay.AlipayTradeService');
        $alipaySevice = new \AlipayTradeService(); 
        $alipaySevice->writeLog(var_export($_POST,true));
        $result = $alipaySevice->check($arr);
        /* 实际验证过程建议商户添加以下校验。
         1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
         2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
         3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
         4、验证app_id是否为该商户本身。
		*/
		if($result) {//验证成功
			//请在这里加上商户的业务逻辑程序代
			//——请根据您的业务逻辑来编写程序（以下代码仅作参考）
			//获取支付宝的通知返回参数，可参考技术文档中服务器异步通知参数列表
			//商户订单号
			$out_trade_no = $_POST['out_trade_no'];
			//支付宝交易号
			$trade_no = $_POST['trade_no'];
			//交易状态
			$trade_status = $_POST['trade_status'];
			if($_POST['trade_status'] == 'TRADE_FINISHED') {
			//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
			//如果有做过处理，不执行商户的业务程序			
			//注意：
			//退款日期超过可退款期限后（如三个月可退款），支付宝系统发送该交易状态通知
			}else if ($_POST['trade_status'] == 'TRADE_SUCCESS') {
				//判断该笔订单是否在商户网站中已经做过处理
				//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
				//请务必判断请求时的total_amount与通知时获取的total_fee为一致的
				//如果有做过处理，不执行商户的业务程序			
				//注意：
				//付款完成后，支付宝系统发送该交易状态通知
			}
			//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
			echo "success";//请不要修改或删除
		}else {
			//验证失败
			echo "fail";
		 
		}
 

    }
	
}