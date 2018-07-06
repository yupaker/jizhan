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
use app\common\model\AdminAlipayConfig as AlipayConfigModel;

use think\Model;
use think\Loader;
use think\Db;

class YupakerOrders extends Model
{
    /**
     * 入库
     * @param array $data 入库数据
     * @author yupaker
     * @return bool
     */  
    public function savedata($data = [])
    {
        if (empty($data)) {
            $data = request()->post();
        }
        $id = input('id');
		
		$arr=[
			'WIDout_trade_no'=>'20180303030303',
			'WIDsubject'=>'在线支付',
			'WIDtotal_amount'=>'123',
			'WIDbody'=>'商品名'
		];
		$mod = new AlipayConfigModel();
		$status = $mod->alipay($arr);
		exit;
		
		
        if (!$data) {
            $this->error = '保存失败';
            return false;
        }
        
        return $res;
    }
}