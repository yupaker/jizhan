<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:35:"theme\yupaker\default\news\show.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\head.php";i:1530240845;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\index_head.php";i:1530240845;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\avatar_box.php";i:1530240845;s:56:"E:\gitlearn\yupaker\theme\yupaker\default\block\menu.php";i:1530240845;s:56:"E:\gitlearn\yupaker\theme\yupaker\default\block\left.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\foot.php";i:1530240845;}*/ ?>
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
	<section id="content">
      <div class="container">
		<div class="content-inner">
		  <div class="main_header">
            <div class="avatar_box">
  <div class="me_img">
    <div class="me_avatar">
    <img src="/theme/yupaker/default/static/image/avatar.png" class="ajax_gif">
    </div>
    <ul class="me_name">
      <li>
        <p class="me_num">233</p>
        <p class="me_title">文章</p>
      </li>
      <li>
        <p class="me_num">107</p>
        <p class="me_title">评论</p>
      </li>
      <li>
        <p class="me_num">5</p>
        <p class="me_title">友链</p>
      </li>
    </ul>
  </div>
  <div class="bulletin">喜欢这个网站的朋友可以加一下QQ群,我们一起交流技术。</div>
</div> 
			<div class="main-menu">
              <ul class="header-menu-list">
                <?php if(is_array($menu) || $menu instanceof \think\Collection || $menu instanceof \think\Paginator): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="menu-item-list-children"><a href="<?php if($vo['link'] != ''): ?><?php echo $vo['link']; else: ?><?php echo url('news/index','catid='.$vo['id']); endif; ?>"><?php echo $vo['title']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </div>
          </div>
          <div class="main_body">
			<aside id="sidebar">
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">定位</h3></dt>
                  <dd>
                    哏都的逗哏哏逗的都哏
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">标签云</h3></dt>
                  <dd>
                    <div class="tagcloud">
                      <?php if(is_array($tagslist) || $tagslist instanceof \think\Collection || $tagslist instanceof \think\Paginator): $i = 0; $__LIST__ = $tagslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <a href="<?php echo url('news/index','tagname='.$vo['title']); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?> <em>(<?php echo $vo['newsnum']; ?>)</em></a>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="red">最新文章</h3></dt>
                  <dd>
                    <ul class="list">
                      <?php if(is_array($news['new']) || $news['new'] instanceof \think\Collection || $news['new'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['new'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <li class="list-bt fa"><a href="<?php echo url('news/show','id='.$vo['id']); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="green">热门文章</h3></dt>
                  <dd>
                    <ul class="list">
                      <?php if(is_array($news['view']) || $news['view'] instanceof \think\Collection || $news['view'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['view'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <li class="list-bt fa"><a href="<?php echo url('news/show','id='.$vo['id']); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                  </dd>
                </dl>
              </div>
              <div class="widgets">
                <dl>
                  <dt><h3 class="blue">推荐文章</h3></dt>
                  <dd>
                    <ul class="list">
                      <?php if(is_array($news['hot']) || $news['hot'] instanceof \think\Collection || $news['hot'] instanceof \think\Paginator): $i = 0; $__LIST__ = $news['hot'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <li class="list-bt fa"><a href="<?php echo url('news/show','id='.$vo['id']); ?>" title="<?php echo $vo['title']; ?>"><?php echo $vo['title']; ?></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                  </dd>
                </dl>
              </div>
            
            </aside>
            <div id="main">
              <div class="main-content">
                <div id="posts-lists" class="posts-box">
                  <div class="post-wrap show-wrap">
                    <div class="post-title show-title"><a><?php echo $data['title']; ?></a></div>
                    <div class="post-content show-content"><?php echo $data['content']; ?></div>
              		<div class="post-btm">
                      <span><i class="fa fa-clock-o"></i> <?php echo $data['addtime']; ?></span>
                      <span title="作者"><i class="fa fa-bookmark"></i> <?php echo $data['author']; ?></span>
                      <span title="标签"><i class="fa fa-tags"></i> 
                      <?php if(is_array($data['tagids']) || $data['tagids'] instanceof \think\Collection || $data['tagids'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['tagids'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <a><?php echo $vo; ?></a>
                      <?php endforeach; endif; else: echo "" ;endif; ?>
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
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      	<li class="comments-li">
                          <div class="author-img"><img src='<?php echo (isset($vo['meminfo']['avatar']) && ($vo['meminfo']['avatar'] !== '')?$vo['meminfo']['avatar']:"/theme/yupaker/default/static/image/avatar.png"); ?>' ></div>
                          <div class="comments-body">
                            <div class="comment-name">
                              <span class="arrow left"></span>
                              <cite class="fn"><?php echo $vo['meminfo']['nick']; ?></cite><span class="right"><?php echo date('Y-m-d H:i:s', $vo['addtime']); ?> <a href="javascript:;" onClick="retextarea(<?php echo $vo['id']; ?>,<?php echo $vo['id']; ?>,'<?php echo $vo['meminfo']['nick']; ?>',<?php echo $vo['newsid']; ?>);">回复</a></span>
                            </div>
                            <div class="comment-text">
                            <?php echo $vo['content']; ?>
                            </div>
                            <div class="recomment">
                              <?php if(is_array($vo['childlist']) || $vo['childlist'] instanceof \think\Collection || $vo['childlist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['childlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
                              <div class="recomlist"><blue><?php echo $vol['meminfo']['nick']; ?></blue> 回复： <?php echo $vol['content']; ?>  <span><?php echo date('Y-m-d H:i:s', $vol['addtime']); ?> <a href="javascript:;" onClick="retextarea(<?php echo $vol['id']; ?>,<?php echo $vo['id']; ?>,'<?php echo $vol['meminfo']['nick']; ?>',<?php echo $vo['newsid']; ?>);">回复</a></span></div>
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
                  <dl>
                    <dt class="comments-title">发表评论</dt>
                    <dd class="comments-form"><form action="<?php echo url('comments/save'); ?>" method="post" >
                      <ul>
                        <?php if($memid == ''): ?>
                        <li class="comli30 nickname"><input class="inputtext" type="text" id="nick" name="nick" placeholder="尊姓大名" maxlength="10" required ></li>
                        <li class="comli30 email"><input class="inputtext" type="email" id="email" name="email" placeholder="联系邮箱" maxlength="30" required></li>
                        <li class="comli30 site"><input class="inputtext" type="text" id="site" name="site" placeholder="站点域名" ></li>
                        <?php endif; ?>
                        <li class="comli100"><textarea name="content"  placeholder="评论..."></textarea></li>
                    	<li class="comli30 verifycode">
                        	<input class="inputtext" type="text" id="verifycode" name="verifycode" placeholder="验证码" maxlength="10" required>
                        </li><div class="codeimg"><?php echo captcha_img(); ?></div>
                        <div class="clearfix"></div>
            			<?php echo token(); ?>
                        <input type="hidden" name="newsid" value="<?php echo $data['id']; ?>">
                        <li><input class="comsubmit" type="submit" value="发表评论"></li>
                      </ul>
                    </form></dd>
                  </dl>
                  
    			  <script type="text/javascript" src="/theme/yupaker/default/static/js/comments.js"></script>
                </div>
              </div>
            </div>
          </div>
		</div>
	  </div>
	</section>
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
