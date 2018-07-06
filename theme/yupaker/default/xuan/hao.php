<?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	{include file="public/head" /}
    {load href="__CSS__/comment.css" /}
    {load href="__CSS__/dialog.css" /}
</head>
<body>
<div class="wrapper">
    {include file="block/index_head" /}
	<div class="cannes">
        
<div id="dialog" title="基本的对话框">
  <p>这是一个默认的对话框，用于显示信息。对话框窗口可以移动，调整尺寸，默认可通过 'x' 图标关闭。</p>
</div>
        <svg id="svg" width="100" height="100"></svg>
            
<input id="button" type="button" class="zxx_api_button" value="按钮">

	</div>
	<style>
    header{ background:none !important; position:fixed; width:100%; z-index:100; height:auto;}
    .cannes { margin-top:50px;}
    </style>
	
<script>
	/*jConfirm('www.daimabiji.com',function(){
		alert("确定的回调");
	},"代码笔记");*/
$(function() {
    $( "#dialog" ).dialog();
  });
</script>
</div>
</body>
</html>
