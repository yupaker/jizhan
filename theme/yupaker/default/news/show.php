<?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	{include file="public/head" /}
    {load href="__CSS__/comment.css" /}
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
          </div>
          <div class="main_body">
			{include file="block/left"}
            <div id="main">
              <div class="main-content">
                <div id="posts-lists" class="posts-box">
                  <div class="post-wrap show-wrap">
                    <div class="post-title show-title"><a>{$data.title}</a></div>
                    <div class="post-content show-content">{$data.content}</div>
              		<div class="post-btm">
                      <span><i class="fa fa-clock-o"></i> {$data.addtime}</span>
                      <span title="作者"><i class="fa fa-bookmark"></i> {$data.author}</span>
                      <span title="标签"><i class="fa fa-tags"></i> 
                      {volist name="$data['tagids']" id="vo"}
                      <a>{$vo}</a>
                      {/volist}
                      </span>
                    </div>
                  </div>
                </div>
                <!--评论-->
                <div class="comments-box">
                  <dl>
                    <dt class="comments-title">评论列表</dt>
                    <dd>
                      <ul class="comments-list">
                        {volist name="$list" id="vo"}
                      	<li class="comments-li">
                          <div class="author-img"><img src="__IMG__/avatar.png"></div>
                          <div class="comments-body">
                            <div class="comment-name">
                              <span class="arrow left"></span>
                              <cite class="fn">{$vo.nickname}</cite><span class="right">{$vo.addtime|date='Y-m-d H:i:s', ###} <a>回复</a></span>
                            </div>
                            <div class="comment-text">
                            {$vo.content}
                            </div>
                            {if condition=" $vo['childlist'] neq Array() "}
                            <div class="recomment">
                              {volist name="$vo['childlist']" id="vol"}
                              <div class="recomlist"><blue>{$vol.nickname}</blue> 回复 <blue>{$vol.rename}</blue> ： {$vol.content}  <span>{$vol.addtime|date='Y-m-d H:i:s', ###} <a>回复</a></span></div>
                              {/volist}
                            </div>
                            {/if}
                          </div>
                        </li>
                        {/volist}
                      
                      </ul>
                    </dd>
                  </dl>
                  <dl>
                    <dt class="comments-title">发表评论</dt>
                    <dd class="comments-form"><form action="{:url('comments/save')}" method="post" >
                      <ul>
                    	<li class="comli30 nickname"><input type="text" id="nickname" name="nickname" placeholder="尊姓大名" maxlength="10" required></li>
                    	<li class="comli30 email"><input type="text" id="email" name="email" placeholder="联系邮箱" maxlength="30" required></li>
                    	<li class="comli30 site"><input type="text" id="site" name="site" placeholder="站点域名"></li>
                        <li class="comli100"><textarea name="content"  placeholder="留言..."></textarea></li>
                        <input type="hidden" name="newsid" value="{$data.id}">
                        <li><input class="comsubmit" type="submit" value="发表评论"></li>
                      </ul>
                    </form></dd>
                  </dl>
                  
                </div>
              </div>
            </div>
          </div>
		</div>
	  </div>
	</section>
    {include file="public/foot" /}
</div>
</body>
</html>
