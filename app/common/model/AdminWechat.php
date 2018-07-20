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

use think\Model;
use think\Cache;

class AdminWechat extends Model
{
	//获取access_token
	public function getAccessToken(){
		$appid = config('wechat.appid'); //微信的appid
		$secret = config('wechat.secret'); //微信的开发者密钥
		
		//方法一
		/*$appid = "wxa3cf17ca2b64573f";
		$select = "937d1498ed51a84af1155699d52c4d67";
		$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$select;
		$res = file_get_contents($url);
		dump(json_decode($res,true));*/
		//方法二，并封装
		// 读取缓存中的内容
		$value = Cache::get($appid);
		if(!$value){
			$url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
			$result = $this->http_curl($url);
			$value = $result['access_token'];
			Cache::set($appid,$value,7000);
		}
		return $value;
	}
	
	//  创建自定义菜单
	public function creatMenu($data){
        //组装请求的url地址
        $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$this->getAccessToken();
		// 将数据转换为json格式
		$data = json_encode($data,JSON_UNESCAPED_UNICODE);
		$result = $this->http_curl($url,$data,'post');
		dump($result);
    }

    // 获取自定义菜单
    public function getMenu()
    {
        $url = "https://api.weixin.qq.com/cgi-bin/menu/get?access_token=".$this->getAccessToken();
        $res =$this->http_curl($url);
        var_dump($res);
    }
    // 删除自定义菜单
    public function delMenu()
    {
        $url = 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token='.$this->getAccessToken();
        $res =$this->http_curl($url);
        dump($res);
    }
	
	
	// 获取请求的地址的方法
	public function http_curl($url,$data =array(),$method ="get",$returnType ="json"){
		//1.开启会话
		$ch = curl_init();
		//2.设置参数
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		if($method!="get"){
			curl_setopt($ch,CURLOPT_POST,TRUE);
			curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
		}
		curl_setopt($ch,CURLOPT_URL,$url);
		//执行会话
		$json = curl_exec($ch);
		curl_close($ch);
		
		if($returnType == "json"){
			return json_decode($json,true);
		}
		return $json;
	}
	
}