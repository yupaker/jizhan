<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:40:"theme\yupaker\default\messages\index.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\head.php";i:1530240845;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\index_head.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\foot.php";i:1530240845;}*/ ?>
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
    <link rel="stylesheet" type="text/css" href="/theme/yupaker/default/static/css/comment.css" />
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
        <svg width="100%" height="100%" viewBox="0 0 600 600">
            <filter id="displacementFilter">
                <feTurbulence type="turbulence" baseFrequency="0.01 .1" numOctaves="1" result="turbulence" seed="53" />
                <feDisplacementMap in2="turbulence" in="SourceGraphic" scale="50" xChannelSelector="R" yChannelSelector="B" />
            </filter>
            <image id="blueMoon" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/theme/yupaker/default/static/image/moon.jpg" width="600" height="400"></image>
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
	<script src="/theme/yupaker/default/static/js/moon.js"></script>
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
        <dd class="comments-form" style="overflow:hidden; margin-bottom:40px;"><form action="<?php echo url('messages/save'); ?>" method="post" >
          <ul>
          	<?php if($memid == ''): ?>
            <li class="comli30 nickname"><input class="inputtext" type="text" id="nick" name="nick" placeholder="尊姓大名" maxlength="10" required ></li>
            <li class="comli30 email"><input class="inputtext" type="email" id="email" name="email" placeholder="联系邮箱" maxlength="30" required></li>
            <li class="comli30 site"><input class="inputtext" type="text" id="site" name="site" placeholder="站点域名" ></li>
            <?php endif; ?>
            <li class="comli100"><textarea name="content"  placeholder="留言..."></textarea></li>
            <li class="comli30 verifycode">
                <input class="inputtext" type="text" id="verifycode" name="verifycode" placeholder="验证码" maxlength="10" required>
            </li>
            <div class="codeimg" style="float:left;"><?php echo captcha_img(); ?></div>
            <?php echo token(); ?>
            <li style="float:right;"><input class="comsubmit" type="submit" value="发表评论"></li>
          </ul>
        </form></dd>
      </dl>
      <dl>
        <dt class="comments-title"></dt>
        <dd>
          <ul class="comments-list">
            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="comments-li">
              <div class="author-img"><img src='<?php echo (isset($vo['meminfo']['avatar']) && ($vo['meminfo']['avatar'] !== '')?$vo['meminfo']['avatar']:"/theme/yupaker/default/static/image/avatar.png"); ?>' ></div>
              <div class="comments-body">
                <div class="comment-name">
                  <span class="arrow left"></span>
                  <cite class="fn"><?php echo $vo['meminfo']['nick']; ?></cite><span class="right"><?php echo date('Y-m-d H:i:s', $vo['addtime']); ?> <a href="javascript:;" onClick="retextarea(<?php echo $vo['id']; ?>,<?php echo $vo['id']; ?>,'<?php echo $vo['meminfo']['nick']; ?>');">回复</a></span>
                </div>
                <div class="comment-text">
                <?php echo $vo['content']; ?>
                </div>
                <div class="recomment">
                  <?php if(is_array($vo['childlist']) || $vo['childlist'] instanceof \think\Collection || $vo['childlist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['childlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
                  <div class="recomlist"><blue><?php echo $vol['meminfo']['nick']; ?></blue> 回复： <?php echo $vol['content']; ?>  <span><?php echo date('Y-m-d H:i:s', $vol['addtime']); ?> <a href="javascript:;" onClick="retextarea(<?php echo $vol['id']; ?>,<?php echo $vo['id']; ?>,'<?php echo $vol['meminfo']['nick']; ?>');">回复</a></span></div>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                  <div class="retextarea" id="retextarea<?php echo $vo['id']; ?>">
                      
                  </div>
                </div>
              </div>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          
          </ul>
        </dd>
      </dl>
      <script type="text/javascript" src="/theme/yupaker/default/static/js/messages.js"></script>
    </div>
    <?php defined("IN_SYSTEM") or die("Access Denied");/* 防止模板被盗 */?>
<footer>
      <div class="container">
    	<p class="power">Powered & Designed by yupaker</p>
    	<p class="power">ICP备案号：津ICP备00000000号</p>
      </div>
    </footer>
<!--script src="/theme/yupaker/default/static/js/canvas-nest.min.js"></script-->
</div>
</body>
</html>
