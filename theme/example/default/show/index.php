<?php defined("IN_SYSTEM") or die("Access Denied");//防止模板被盗?><!DOCTYPE html>
<html>
<head>
<link href="__CSS__/min.css" rel="stylesheet" type="text/css" title="当前模块CSS文件调用"  />
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js" title="公共JS文件调用"></script>
<script src="__JS__/js.js" title="当前模块JS文件调用"></script>
</head>
<body>
<div style="width:1000px;margin:50px auto;">
    <h1 style="text-align:center;">前台内页示例模板</h1>
    <div style="float:left;background-color:#f5f5f5;width:760px;padding:20px;height:600px;">
        <h3 style="text-align:center;">{$data['news']['title']}</h3>
        <p style="text-align:center;">作者：{$data['news']['author']}&nbsp;&nbsp;&nbsp;&nbsp;来源：{$data['news']['source']}&nbsp;&nbsp;&nbsp;&nbsp;时间：{$data['news']['ctime']}</p>
        <p>{$data['news']['content']}</p>
    </div>
    <div style="float:right;background-color:#d5d5d5;width:180px;padding:20px 10px;height:600px;">
        <h3>资讯分类</h3>
        <ul>
            {volist name="data['category']" id="vo"}
            <li><a href="/?cid={$vo['id']}">{$vo['name']}</a></li>
            {/volist}
        </ul>
    </div>
</div>
</body>
</html>