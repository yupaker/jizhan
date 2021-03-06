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
	<section style="background: linear-gradient(-35deg, #2aa4d5, #030633);margin-top: -400px; padding:50px 0;">
      <div class="" style="width:80%; margin:0 auto;">
        <dl>
          <dt class="comments-title">评论列表</dt>
          <dd>
            <ul class="comments-list">
              {volist name="$list" id="vo"}
              <li class="comments-li">
                <div class="author-img"><img src='{if condition="$vo.emailimg eq '' "}__IMG__/avatar.png{else /}https://q1.qlogo.cn/g?b=qq&nk={$vo.emailimg}&s=100{/if}' ></div>
                <div class="comments-body">
                  <div class="comment-name">
                    <span class="arrow left"></span>
                    <cite class="fn">{$vo.nickname}</cite><span class="right">{$vo.addtime|date='Y-m-d H:i:s', ###} <a href="javascript:;" onClick="retextarea({$vo.id},{$vo.id},'{$vo.nickname}');">回复</a></span>
                  </div>
                  <div class="comment-text">
                  {$vo.content}
                  </div>
                  <div class="recomment">
                    {volist name="$vo['childlist']" id="vol"}
                    <div class="recomlist"><blue>{$vol.nickname}</blue> 回复 <blue>{$vol.rename}</blue> ： {$vol.content}  <span>{$vol.addtime|date='Y-m-d H:i:s', ###} <a href="javascript:;" onClick="retextarea({$vol.id},{$vo.id},'{$vol.nickname}');">回复</a></span></div>
                    {/volist}
                    <div class="retextarea" id="retextarea{$vo.id}">
                        
                    </div>
                  </div>
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
              <li class="comli30 nickname"><input class="inputtext" type="text" id="nickname" name="nickname" placeholder="尊姓大名" maxlength="10" required {if condition="$comment['nickname'] neq '' "}value="{$comment['nickname']}" disabled {/if}></li>
              <li class="comli30 email"><input class="inputtext" type="email" id="email" name="email" placeholder="联系邮箱" maxlength="30" required {if condition="$comment['email'] neq '' "}value="{$comment['email']}" disabled {/if}></li>
              <li class="comli30 site"><input class="inputtext" type="text" id="site" name="site" placeholder="站点域名" {if condition="$comment['site'] neq '' "}value="{$comment['site']}" disabled {/if}></li>
              <li class="comli100"><textarea name="content"  placeholder="留言..."></textarea></li>
              <li class="comli30 verifycode">
                  <input class="inputtext" type="text" id="verifycode" name="verifycode" placeholder="验证码" maxlength="10" required>
              </li><div class="codeimg">{:captcha_img()}</div>
              <div class="clearfix"></div>
              <input type="hidden" name="newsid" value="5">
              <li><input class="comsubmit" type="submit" value="发表评论"></li>
            </ul>
          </form></dd>
        </dl>
        {load href="__JS__/retextarea.js" /}
      </div>
	</section>
    {include file="public/foot" /}
</div>
</body>
</html>
