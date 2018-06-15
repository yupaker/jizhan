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

use think\Model;
use think\Loader;

use app\common\model\AdminMember as MemberModel;

class YupakerMessages extends Model
{
    // 定义时间戳字段名
    protected $createTime = 'retime';
    protected $updateTime = false;
    // 自动写入时间戳
    protected $autoWriteTimestamp = true;


    /**
     * 回复留言
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
    public function storage($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }

        if (isset($data['id']) && !empty($data['id'])) {
            $res = $this->update($data);
        } else {
            $res = $this->create($data);
        }
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }
	
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
		
		$list = self::where($map)->order('addtime desc,id desc')->select();
		if($list){
			foreach ($list as $k => $v) {
				$list[$k]['childlist'] = self::getMessagelist($v['id'], $status);
				$list[$k]['meminfo'] = MemberModel::where('id', $v['memid'])->field('nick,email,avatar')->find()->toArray();
			}
		}
        return $list;
    }
	
	/**
     * 发表评论
     * @param array $data 入库数据
     * @author yupaker
     * @return $res
     */  
    public function savedata($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }
		$valid = Loader::validate('Messages');
		if($valid->check($data) !== true) {
			$this->error = $valid->getError();
			return false;
		}
		if(!captcha_check($data['verifycode'])) {
			// 校验失败
            $this->error = '验证码不正确';
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
		$arr = array(
			'content'=> $data['content'],
			'addtime'=> time(),
			'ip'=> get_client_ip(),
			'status'=> 1,
			'memid'=> $memid,
		);
		print_r($arr);
		exit;
		
		
		
		unset($data['verifycode']);
        if (isset($data['newsid']) && !empty($data['newsid'])) {
			$data['addtime'] = time();
			$data['ip'] = get_client_ip();
			$data['status'] = 1; //直接成功
            $res = $this->create($data);
			
			$comment =array(
				'nickname' => $data['nickname'],
				'email' => $data['email'],
				'site' => $data['site'],
			);
			// 设置Cookie 有效期为一周
			Cookie::set('comment',$comment,604800);
        } else {
            $this->error = '保存失败';
            return false;
        }
        if (!$res) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }
	
}