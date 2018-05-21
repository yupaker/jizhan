<?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	{include file="public/head" /}
</head>
<body>
<div class="wrapper">
    {include file="block/index_head" /}
	<section id="content">
      <div class="container">
		<div class="content-inner">
		  <div class="main_header">
            {include file="block/avatar_box" /}
			{include file="block/menu" /}
			{include file="block/actions_menu" /}
          </div>
          <div class="main_body">
			{include file="block/left"}
            <div id="main">
              {include file="block/canvas"}
              <div class="main-content">
                <div id="posts-lists" class="posts-box">
                  {volist name="$list" id="vo"}
                  <article>
                    <div class="post-wrap show-wrap">
                      <div class="featured-box">
                        <div class="featured-image"><a href="{:url('news/show','id='.$vo['id'])}"><img src="{$vo.image|default='__IMG__/20170222193904_255.jpg'}" alt="{$vo.title}"></a></div>
                        <div class="post-btm post-meta">
                          <span title="浏览"><i class="fa fa-eye"></i> {$vo.viewnum}</span>
                          <span title="评论"><i class="fa fa-comments-o"></i> {$vo.commentnum}</span>
                        </div>
                        {if condition="$vo['ishot'] eq 1"}
                        <div class="post-ishot"></div>
                        {/if}
                        <div class="post-isnew"></div>
                      </div>
                      <dl>
                        <dt class="post-title"><a href="{:url('news/show','id='.$vo['id'])}">{$vo.title}</a></dt>
                        <dd class="post-content">
                          <div class="post-memo">{$vo.memo|nl2br|msubstr=0,300}</div>
                          <a href="{:url('news/show','id='.$vo['id'])}" class="read-more">阅读更多</a>
                        </dd>
                        <dd class="post-btm">
                          <span><i class="fa fa-clock-o"></i> {$vo.addtime|date='Y-m-d H:i:s',###}</span>
                          <span title="作者"><i class="fa fa-bookmark"></i> {$vo.author}</span>
                          <span title="标签"><i class="fa fa-tags"></i> 
						  {volist name="$vo['tagids']" id="vol"}
                          <a href="{:url('news/index','tagname='.$vol)}">{$vol}</a>
                          {/volist}</span>
                        </dd>
                      </dl>
                    </div>
                    <div class="post-comments">
                      <ul class="list comments-list">
                        {volist name="$vo['commentlist']" id="vol"}
                        <li class="list-bt"><a href="{:url('news/show','id='.$vol['newsid'])}" title="{$vol.content}">
                        <img src="{if condition="$vol.qq eq '' "}__ADMIN_IMG__/gravatar.png{else /}https://q1.qlogo.cn/g?b=qq&nk={$vol.qq}&s=100{/if}">
                        <blue>{$vol.nickname}</blue>{if condition="$vol.reid neq 0"}回复给<blue>{$vol.rename}</blue>{/if}：{$vol.content|msubstr=0,100}</a></li>
                        {/volist}</span>
                      </ul>
                      <div style="text-align:center; cursor:pointer" class="skenjd"><i class="fa fa-angle-double-down"></i></div>
                    </div>
                  </article>
                  {/volist}
                </div>
                {$pages}
              </div>
            </div>
          </div>
		</div>
	  </div>
	</section>
    {include file="public/foot" /}
</div>
<script>
function box_list(){
	$('#posts-lists').removeClass('posts-lists');
	$('.layouts_box').removeClass('selected');
	$('.layouts_width').addClass('selected');
}
function list_box(){
	$('#posts-lists').addClass('posts-lists');
	$('.layouts_box').addClass('selected');
	$('.layouts_width').removeClass('selected');
}

//展开
$(".post-comments").each(function(){
	var thebig = $(this);
	var thesmall = thebig.find(".comments-list");
	var thebtn = thebig.find(".skenjd");
	var tarheight = thesmall.height();
	thesmall.css("margin-top","-"+tarheight+"px");
	thebtn.bind("click",function(){
			thesmall.animate({"margin-top":"0"},100);
		});
});
</script>
</body>
</html>
