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
namespace app\yupaker\model;
use app\common\model\AdminMember as MemberModel;

use think\Model;
use think\Loader;
use think\Cookie;

class YupakerMessages extends Model
{
	/**
     * 获取留言列表
     * @param int $reid 回复id
     * @param int $status 状态值
     * @param int $newsid 新闻ID
     * @author yupaker
     * @return string
     */
    public static function getMessagelist($reid = 0, $status = 1)
    {
		$map['reid'] = $reid;
		$map['status'] = $status;
		if($reid == 0){
			$order = "addtime desc,id desc";
		}else{
			$order = "addtime asc,id asc";
		}
		
		$list = self::where($map)->order($order)->select();
		if($list){
			foreach ($list as $k => $v) {
				$list[$k]['childlist'] = self::getMessagelist($v['id'], $status);
				$list[$k]['meminfo'] = MemberModel::where('id', $v['memid'])->field('nick,email,avatar')->find()->toArray();
			}
		}
        return $list;
    }
	
	/**
     * 发表留言
     * @param array $data 入库数据
     * @author yupaker
     * @return $res
     */  
    public function savedata($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }
		if(empty($data['reid']) && !captcha_check($data['verifycode'])) {
			// 校验失败
            $this->error = '验证码不正确';
			return false;
		}
		//获取cookie 有效期为一周
		$memid = Cookie::get('memid');
		if(empty($memid)){
			if(!empty($data['reid'])){
				// 回复失败
				$this->error = '网站没有您的信息无法回复，请先发表评论吧';
				return false;
			}
			$valid = Loader::validate('Messages');
			if($valid->check($data) !== true) {
				$this->error = $valid->getError();
				return false;
			}
			//过滤昵称里面的表情符号
			$mod = new MemberModel();
			$data['nick'] = $mod->setNickAttr($data['nick']);
			$arr = array(
				'nick'=> $data['nick'],
				'email'=> $data['email'],
				'site'=> $data['site'],
			);
			//为访客生成游客会员身份
			$memid = $mod->msgcreatemem($arr);
			unset($arr);
		}
		// 设置Cookie 有效期为一周,留言刷新cookie时间
		Cookie::set('memid',$memid,604800);
		$arr = array(
			'content'=> $data['content'],
			'addtime'=> time(),
			'ip'=> get_client_ip(),
			'status'=> 1,//直接留言成功
			'memid'=> $memid,
			'reid'=> empty($data['reid'])?0:$data['reid'],
			'catreid'=> empty($data['catreid'])?0:$data['catreid'],
			
		);
        $res = $this->create($arr);
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        return $res;
    }
	
	/**
     * 后台回复评论
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
	public function storage($data = [])
    {
       if (empty($data)) {
            $data = request()->post();
        }
		if(empty($data['recontent'])){
            $res = $this->update($data);
		}else{
			//回复
			$reid = self::where('id = '.$data['id'].'')->value('reid');
			$arr = array(
				'content'=>$data['recontent'],
				'addtime'=> time(),
				'ip'=> get_client_ip(),
				'status'=> 1,//直接留言成功
				'memid'=> '1000000',
				'reid'=> empty($reid)?0:$reid,
				'catreid'=> empty($data['id'])?0:$data['id'],
			);
            $res = $this->create($arr);
		}
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        return $res;
    }

	
}