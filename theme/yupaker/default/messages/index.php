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
	<div class="cannes">
        <svg width="100%" height="100%" viewBox="0 0 600 600">
            <filter id="displacementFilter">
                <feTurbulence type="turbulence" baseFrequency="0.01 .1" numOctaves="1" result="turbulence" seed="53" />
                <feDisplacementMap in2="turbulence" in="SourceGraphic" scale="50" xChannelSelector="R" yChannelSelector="B" />
            </filter>
            <image id="blueMoon" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="__IMG__/moon.jpg" width="600" height="400"></image>
            <use xlink:href="#blueMoon" x="-10" transform="translate(0, 600) scale(1 -0.5) " filter="url(#displacementFilter)" />
        </svg>
	</div>
	<style>
	body{background:linear-gradient(-35deg, #f7f6f1, #ffefce);}
    header{ background:none !important; position:fixed; width:100%; z-index:100; height:auto;}
    section{background: linear-gradient(-35deg, #2aa4d5, #030633);margin-top: -400px;}
    .cannes {width: 100%;position: fixed;bottom: 0; z-index:-1;overflow: hidden;box-shadow: 0 0 150px #031f40; line-height:0; display:none;}
    svg {background: #031f40;position: relative;}
    </style>
	<script src="__JS__/moon.js"></script>
    <script>
    var img = document.querySelector("#displacementFilter feTurbulence");
    var frames = 0;
    var rad = Math.PI / 180;
    
    function AnimateBaseFrequency() {
        var bf = "0.01 .1";
        bfx = Number(bf.split(" ")[0]);
        bfy = Number(bf.split(" ")[1]);
        frames += .5
        bfx += 0.001 * Math.cos(frames * rad);
        bfy += 0.005 * Math.sin(frames * rad);
    
        bf = bfx.toString() + ' ' + bfy.toString();
        img.setAttributeNS(null, 'baseFrequency', bf);
        window.requestAnimationFrame(AnimateBaseFrequency);
    }
    window.requestAnimationFrame(AnimateBaseFrequency);
    </script>
    <div style="width:80%; margin:0 auto; padding:80px 0;">
      <dl>
        <dt class="comments-title">留言</dt>
        <dd class="comments-form" style="overflow:hidden; margin-bottom:40px;"><form action="{:url('messages/save')}" method="post" >
          <ul>
          	{if condition="$memid eq '' "}
            <li class="comli30 nickname"><input class="inputtext" type="text" id="nick" name="nick" placeholder="尊姓大名" maxlength="10" required ></li>
            <li class="comli30 email"><input class="inputtext" type="email" id="email" name="email" placeholder="联系邮箱" maxlength="30" required></li>
            <li class="comli30 site"><input class="inputtext" type="text" id="site" name="site" placeholder="站点域名" ></li>
            {/if}
            <li class="comli100"><textarea name="content"  placeholder="留言..."></textarea></li>
            <li class="comli30 verifycode">
                <input class="inputtext" type="text" id="verifycode" name="verifycode" placeholder="验证码" maxlength="10" required>
            </li>
            <div class="codeimg" style="float:left;">{:captcha_img()}</div>
            {:token()}
            <li style="float:right;"><input class="comsubmit" type="submit" value="发表评论"></li>
          </ul>
        </form></dd>
      </dl>
      <dl>
        <dt class="comments-title"></dt>
        <dd>
          <ul class="comments-list">
            {volist name="$list" id="vo"}
            <li class="comments-li">
              <div class="author-img"><img src='{$vo.meminfo.avatar|default="__IMG__/avatar.png"}' ></div>
              <div class="comments-body">
                <div class="comment-name">
                  <span class="arrow left"></span>
                  <cite class="fn">{$vo.meminfo.nick}</cite><span class="right">{$vo.addtime|date='Y-m-d H:i:s', ###} <a href="javascript:;" onClick="retextarea({$vo.id},{$vo.id},'{$vo.meminfo.nick}');">回复</a></span>
                </div>
                <div class="comment-text">
                {$vo.content}
                </div>
                <div class="recomment">
                  {volist name="$vo['childlist']" id="vol"}
                  <div class="recomlist"><blue>{$vol.meminfo.nick}</blue> 回复： {$vol.content}  <span>{$vol.addtime|date='Y-m-d H:i:s', ###} <a href="javascript:;" onClick="retextarea({$vol.id},{$vo.id},'{$vol.meminfo.nick}');">回复</a></span></div>
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
      {load href="__JS__/messages.js" /}
    </div>
    {include file="public/foot" /}
</div>
</body>
</html>
