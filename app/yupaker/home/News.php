<?php
// +----------------------------------------------------------------------
// | HisiPHP框架[基于ThinkPHP5开发]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2018 http://www.hisiphp.com
// +----------------------------------------------------------------------
// | HisiPHP承诺基础框架永久免费开源，您可用于学习和商用，但必须保留软件版权信息。
// +----------------------------------------------------------------------
// | Author: yupaker
// +----------------------------------------------------------------------
namespace app\yupaker\home;
use app\yupaker\model\YupakerNews as NewsModel;
use app\yupaker\model\YupakerComments as CommentsModel;
use think\Db;
use think\Cookie;

class News extends Base
{
	public function index()
    {
        $catid = input('param.catid', 0);
        $tagname = input('param.tagname');
        $where = ' status = 1 ';
        if ($catid > 0) {
            $where .= ' and catid='.$catid.' ';
        }
        if ($tagname) {
            $where .= " and find_in_set('".$tagname."',tagids)>0 ";
        }
		//新闻主体
		
        $list = Db::name('yupaker_news')->where($where)->order('id desc')->paginate(50)->each(function($item, $key){
			$item['tagids'] = explode(',',$item['tagids']);
			//评论个数
			$item['commentnum'] = Db::name('yupaker_comments')->where('newsid='.$item['id'].' and status=1 ')->count();
			//评论内容
			$item['commentlist'] = Db::name('yupaker_comments')->where('newsid='.$item['id'].' and reid=0 and status=1')->limit('10')->order('addtime desc')->select();
			return $item;
		});
        $pages = $list->render();
        $this->assign('list', $list);
        $this->assign('pages', $pages);
        return $this->fetch();
    }
	
	public function show($id){
		$this->checkId($id);
        $data = NewsModel::where('id', $id)->find();
        if (!$data) {
            return $this->error('数据不存在');
        }
		if($data['tagids']){
			$data['tagids'] = explode(',',$data['tagids']);
		}
		//点击数+1
		Db::name('yupaker_news')->where('id', $id)->setInc('viewnum');
		$this->assign('data',$data);
		
		//留言内容
		$list = CommentsModel::getCommentlist(0, 1, $id);
		$this->assign('list',$list);
		//获取cookie
		$memid = Cookie::get('memid');
		$this->assign('memid',$memid);
		
		
		$toemail='838764236@qq.com';
        $name='838764236';
        $subject='QQ邮件发送测试';
        $content='恭喜你，邮件测试成功。';
        //dump(send_mail($toemail,$name,$subject,$content));
		
		
		return $this->fetch();	
	}
	
}