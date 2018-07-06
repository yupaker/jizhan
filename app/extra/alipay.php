<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.HisiPHP.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: 橘子俊 <364666827@qq.com>，开发者QQ群：50304283
// +----------------------------------------------------------------------
return [
	//应用ID,您的APPID
	'app_id' => "2016091400505881",
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