<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:34:"theme\yupaker\default\xuan\hao.php";i:1530848279;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\head.php";i:1530846818;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\index_head.php";i:1530240845;}*/ ?>
<?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0, minimal-ui ">
	<title><?php echo $config['SETA_TITLE']; ?></title>
	<meta name="keywords" content="<?php echo $config['SETA_KEYWORDS']; ?>">
	<meta name="description" content="<?php echo $config['SETA_DESCRIPTION']; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link href="/theme/yupaker/default/static/image/favicon.ico" title="Favicon" rel="shortcut icon">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=1.0.3">

    <link rel="stylesheet" type="text/css" href="/theme/yupaker/default/static/css/style.css" />
    <script type="text/javascript" src="/theme/yupaker/default/static/js/jquery.min.js"></script>
    <script type="text/javascript" src="/theme/yupaker/default/static/js/jquery.dialog.js"></script>
    <link rel="stylesheet" type="text/css" href="/theme/yupaker/default/static/css/comment.css" />
    <link rel="stylesheet" type="text/css" href="/theme/yupaker/default/static/css/dialog.css" />
</head>
<body>
<div class="wrapper">
    <header>
      <div class="header-inner">
        <div class="container">
    	  <div class="header-logo">
    		<a href="/" title="logo"><img alt="个人博客" src="/theme/yupaker/default/static/image/logo.png" class="logo"></a>
    	  </div>
          <nav class="header-menu">
            <ul class="header-menu-list">
              <li><a href="/">首页</a></li>
              <li><a href="<?php echo url('/'); ?>">博客</a></li>
              <li><a href="<?php echo url('messages/index'); ?>">留言</a></li>
              <li><a href="<?php echo url('example/index/index'); ?>">友链</a></li>
            </ul>
    	  </nav>
          <ul class="header-menu-list header-tool">
            <li class="menu-item-list-children">
              <a href="javascript:void(0)" class="skin-btn" style="color: #990033">皮肤</a>
            </li>
            <li class="search">
              <input type="text" class="search-form-input" name="keyword" placeholder="查找...">
              <button class="search-form-submit"> 搜索</button>
            </li>
          </ul>
    	</div>
      </div>
    </header>
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
