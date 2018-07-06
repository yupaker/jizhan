<?php if (!defined('THINK_PATH')) exit(); /*a:9:{s:37:"theme\yupaker\default\index\index.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\head.php";i:1530839502;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\index_head.php";i:1530240845;s:62:"E:\gitlearn\yupaker\theme\yupaker\default\block\avatar_box.php";i:1530240845;s:56:"E:\gitlearn\yupaker\theme\yupaker\default\block\menu.php";i:1530240845;s:64:"E:\gitlearn\yupaker\theme\yupaker\default\block\actions_menu.php";i:1530240845;s:56:"E:\gitlearn\yupaker\theme\yupaker\default\block\left.php";i:1530240845;s:58:"E:\gitlearn\yupaker\theme\yupaker\default\block\canvas.php";i:1530240845;s:57:"E:\gitlearn\yupaker\theme\yupaker\default\public\foot.php";i:1530240845;}*/ ?>
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
			<div class="actions-menu">
  <a class="layouts_width selected" href="javascript:;" onClick="box_list();"><i class="fa fa-align-justify"></i></a>
  <a class="layouts_box" href="javascript:;" onClick="list_box();"><i class="fa fa-th-large"></i></a>
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
              <div class="banner"><img src="/theme/yupaker/default/static/image/banner_01.jpg" width="100%"></div>
              <div class="canvas">
				<iframe id="z" width="100%" height="100%" scrolling="no" src="canvas/1.html"></iframe>
				<script type="text/javascript">
                try {
                    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i ["test"](navigator["userAgent"])) {
                        
                    } else {
                        $("#z", parent["document"]["body"])["attr"]("src",  "/theme/yupaker/default/static/canvas/"+getRandom(7) + ".html");
                    }
                } catch (e) {
                    
                }
            
                function getRandom(n) {
                    return window["Math"]["floor"](window["Math"]["random"]() * n + 1);
                }
                </script>
              </div>
              <div class="main-content">
                <div id="posts-lists" class="posts-box">
                  <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <article>
                    <div class="post-wrap show-wrap">
                      <div class="featured-box">
                        <div class="featured-image"><a href="<?php echo url('news/show','id='.$vo['id']); ?>"><img src="<?php echo (isset($vo['image']) && ($vo['image'] !== '')?$vo['image']:'/theme/yupaker/default/static/image/20170222193904_255.jpg'); ?>" alt="<?php echo $vo['title']; ?>"></a></div>
                        <div class="post-btm post-meta">
                          <span title="浏览"><i class="fa fa-eye"></i> <?php echo $vo['viewnum']; ?></span>
                          <span title="评论"><i class="fa fa-comments-o"></i> <?php echo $vo['commentnum']; ?></span>
                        </div>
                        <?php if($vo['ishot'] == 1): ?>
                        <div class="post-ishot"></div>
                        <?php endif; ?>
                        <div class="post-isnew"></div>
                      </div>
                      <dl>
                        <dt class="post-title"><a href="<?php echo url('news/show','id='.$vo['id']); ?>"><?php echo $vo['title']; ?></a></dt>
                        <dd class="post-content">
                          <div class="post-memo"><?php echo msubstr(nl2br($vo['memo']),0,300); ?></div>
                          <a href="<?php echo url('news/show','id='.$vo['id']); ?>" class="read-more">阅读更多</a>
                        </dd>
                        <dd class="post-btm">
                          <span><i class="fa fa-clock-o"></i> <?php echo date('Y-m-d H:i:s',$vo['addtime']); ?></span>
                          <span title="作者"><i class="fa fa-bookmark"></i> <?php echo $vo['author']; ?></span>
                          <span title="标签"><i class="fa fa-tags"></i> 
						  <?php if(is_array($vo['tagids']) || $vo['tagids'] instanceof \think\Collection || $vo['tagids'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['tagids'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
                          <a href="<?php echo url('news/index','tagname='.$vol); ?>"><?php echo $vol; ?></a>
                          <?php endforeach; endif; else: echo "" ;endif; ?></span>
                        </dd>
                      </dl>
                    </div>
                    <div class="post-comments">
                      <ul class="list comments-list">
                        <?php if(is_array($vo['commentlist']) || $vo['commentlist'] instanceof \think\Collection || $vo['commentlist'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['commentlist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?>
                        <li class="list-bt"><a href="<?php echo url('news/show','id='.$vol['newsid']); ?>" title="<?php echo $vol['content']; ?>">
                        <img src="<?php if($vol['qq'] == ''): ?>/static/admin/image/gravatar.png<?php else: ?>https://q1.qlogo.cn/g?b=qq&nk=<?php echo $vol['qq']; ?>&s=100<?php endif; ?>">
                        <blue><?php echo $vol['nickname']; ?></blue><?php if($vol['reid'] != 0): ?>回复给<blue><?php echo $vol['rename']; ?></blue><?php endif; ?>：<?php echo msubstr($vol['content'],0,100); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?></span>
                      </ul>
                      <div style="text-align:center; cursor:pointer" class="skenjd"><i class="fa fa-angle-double-down"></i></div>
                    </div>
                  </article>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <?php echo $pages; ?>
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
