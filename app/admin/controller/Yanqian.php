<?php
/**
* 微信服务器配置文件
*
*/

namespace app\admin\controller;

class Yanqian
{
	public function index(){
		//获取随机字符串
		$echoStr = input("echostr");
		if($echoStr){
			// 验证接口的有效性，由于接口有效性的验证必定会传递echostr 参数
			if($this ->checkSignature()){
				echo $echoStr;
				exit;
			}
		}else{
			$this->responseMsg();
			exit;
		}
	}
	
	protected function checkSignature(){
		// 微信加密签名
		$signature = input("signature");
		$timestamp = input("timestamp");//时间戳
		$nonce =input("nonce");//随机数
		$token = "weixin"; //token值，必须和你设置的一样
		$tmpArr =array($token,$timestamp,$nonce);
		sort($tmpArr,SORT_STRING);
		$tmpStr = implode($tmpArr);
		$tmpStr =sha1($tmpStr);
		if($tmpStr == $signature){
			return true;
		}else{
			return false;
		}
	}
	//回复文本消息测试
	public function responseMsg()
	{
		$postStr = file_get_contents('php://input');
		if (!empty($postStr)){
			/*下列常规防御措施，是从我们针对普通xml外部实体攻击（XXE）的防御措施继承而来的。我们应当拒绝xml中自定义实体对本地文件和远程HTTP请求的解析，并可使用以下可全局应用于所有内部使用了libxml2函数的PHP或xml所书写扩展的函数进行拒绝。*/
			libxml_disable_entity_loader(true);
			// 将xml数据转换为对象  当需要使用数据时使用对象调用属性即可
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			// 发送方帐号（一个OpenID）
			$fromUsername = $postObj->FromUserName;
			// 开发者微信号
			$toUsername = $postObj->ToUserName;
			// 消息类型 1.文本text 2.图片image 3.语音voice 4.视频video 5.地理位置location 6.链接link
			$MsgType = $postObj->MsgType;
			// 文本消息内容  仅仅针对于文本消息有值
			$keyword = trim($postObj->Content);
			$time = time();
			$textTpl = "<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Content><![CDATA[%s]]></Content>
				<FuncFlag>0</FuncFlag>
				</xml>";
			$picTpl="<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Image>
					<MediaId><![CDATA[%s]]></MediaId>
				</Image>
				</xml>";
			$voiceTpl="<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Voice>
					<MediaId><![CDATA[%s]]></MediaId>
				</Voice>
				</xml>";
			$VideoTpl="<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<Video>
					<MediaId><![CDATA[%s]]></MediaId>
					<Title><![CDATA[%s]]></Title>
					<Description><![CDATA[%s]]></Description>
				</Video>
				</xml>";
			$newsTpc="<xml>
				<ToUserName><![CDATA[%s]]></ToUserName>
				<FromUserName><![CDATA[%s]]></FromUserName>
				<CreateTime>%s</CreateTime>
				<MsgType><![CDATA[%s]]></MsgType>
				<ArticleCount>%d</ArticleCount>
				<Articles>%s</Articles>
				</xml>";	
				
			if($MsgType == 'text'){
				if($keyword == '图片'){
					// 关于此MediaId需要从素材库中获得，没有可以临时使用消息返回的媒体ID
					$MediaId = 'FZDcoLgIFSdmNGPI1C8SKe_fpcUO6jIloClN5QH38QQrfZK_qNcZFJ7JAJeMcCV9';
					$resultStr = sprintf($picTpl, $fromUsername, $toUsername, $time, 'image',$MediaId);
					echo $resultStr;
				}elseif($keyword == '语音'){
					// 关于此MediaId需要从素材库中获得，没有可以临时使用消息返回的媒体ID
					$MediaId = '4fI9ghvjrN1uRZyQ_3jYaoewbXR2EKT0u-5ys31B7h7Mtt48UQYt5MxTvClf2xkN';
					$resultStr = sprintf($voiceTpl, $fromUsername, $toUsername, $time, 'voice',$MediaId);
					echo $resultStr;
				}elseif($keyword == '视频'){
					// 关于此MediaId需要从素材库中获得，没有可以临时使用消息返回的媒体ID
					$MediaId = 'luFAI7hh2H5-5skuA3KG4jKqE5sBzKTcT1IJhUECEYc9_CznEk1YH0FP2B5L7prB';
					$Title = $Description = '微信回复视频有坑';
					$resultStr = sprintf($VideoTpl, $fromUsername, $toUsername, $time, 'video',$MediaId,$Title,$Description);
					echo $resultStr;
				}elseif($keyword == '图文'){
					// 模拟从数据库中查询
					$data = array(
						array('Title'=>'a','Description'=>'b','PicUrl'=>'http://wx.qlogo.cn/mmopen/1JPdic49icnxtAcxCh3V3lpEhhywYflEqrIqAtGRkebelfXcSNJGuU5icNvkrbkN0Tiaz2Fzc2QibcZopPzicTHcrtic43QL55jIeTT/64','Url'=>'http://itcast.cn')
					);
					foreach ($data as $key => $value) {
						$Articles .="<item>
							<Title><![CDATA[{$value['Title']}]]></Title> 
							<Description><![CDATA[{$value['Description']}]]></Description>
							<PicUrl><![CDATA[{$value['PicUrl']}]]></PicUrl>
							<Url><![CDATA[{$value['Url']}]]></Url>
						</item>";
					}
					$count = count($data);
					$resultStr = sprintf($newsTpc, $fromUsername, $toUsername, $time, 'news',$count,$Articles);
					echo $resultStr;
				}else{
					
					
					
					//针对没有匹配的关键词使用机器人回复
					$url ="http://www.tuling123.com/openapi/api?key=61d1a90e5eb748788c967c765c2c3155&info=".$keyword;
					$result = file_get_contents($url);
					$result = json_decode($result,true);
					if($result['code'] == 100000){
						// 回复文本消息
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text',
						$result['text']);
					}elseif ($result['code'] == 200000) {
						$str = '<a href="'.$result['url'].'">'.$result['text'].'</a>';
						// 机器人中区分为链接
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $str);
					}elseif ($result['code'] ==302000) {
						// 机器人中的新闻
						$data = $result['list'];
						for($i=0;$i<8;$i++){
							$Articles ="<item>
							<Title><![CDATA[{$data[$i]['article']}]]></Title>
							<Description><![CDATA[{$data[$i]['article']}]]></Description>
							<PicUrl><![CDATA[http:{$data[$i]['icon']}]]></PicUrl>
							<Url><![CDATA[{$data[$i]['detailurl']}]]></Url>
							</item>";
						}
						//error_log($Articles,3,'errors.log');
						$count = 1;
						$resultStr = sprintf($newsTpc, $fromUsername, $toUsername, $time,'news',$count,$Articles); 
					}else{
						// 回复文本消息
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text','抱歉没有理解，再说一遍问题');
					}
					// 接受到了一个文本消息
					//$contentStr = "你说的话是：".$keyword;
					// 字符串中的内容进行替换 按照消息回复的格式最终响应结果
					//$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $MsgType, $contentStr);
					file_put_contents('2', $resultStr);
					echo $resultStr;
				}
			}elseif($MsgType == 'image'){
				$contentStr = "图片消息MediaId为：".$postObj->MediaId.'图片的地址为：'.$postObj->PicUrl;
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
				file_put_contents('2', $resultStr);
				echo $resultStr;
			}elseif($MsgType == 'voice'){
				$contentStr = "语音消息MediaId为：".$postObj->MediaId.'具体内容为'.$postObj->Recognition;
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
				file_put_contents('2', $resultStr);
				echo $resultStr;
			}elseif($MsgType == 'video'){
				$contentStr = "视频消息MediaId为：".$postObj->MediaId;
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
				file_put_contents('2', $resultStr);
				echo $resultStr;
			}elseif($MsgType == 'location'){
				$contentStr = "经度为：".$postObj->Location_Y.'维度'.$postObj->Location_X.'具体地址为：'.$postObj->Label;
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
				file_put_contents('2', $resultStr);
				echo $resultStr;
			}elseif($MsgType == 'link'){
				$contentStr = '消息的标题为'.$postObj->Title;
				$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
				file_put_contents('2', $resultStr);
				echo $resultStr;
			}elseif($MsgType == 'event'){
				// 表示为事件
				$Event = $postObj->Event;//获取事件的类型
				if($Event == 'CLICK'){
					// 表示为菜单的点击事件
					$EventKey = $postObj->EventKey;//获取点击的哪一个菜单
					if($EventKey == 'info'){
						$contentStr = '本人年芳十八岁！';
						$resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, 'text', $contentStr);
						echo $resultStr;
					}
				}
			}else{
				echo "Input something...";
			}
		
		}else {
			echo "";
			exit;
		}
	}
	
	
}