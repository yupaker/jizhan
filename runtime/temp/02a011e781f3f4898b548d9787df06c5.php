<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:49:"E:\gitlearn\yupaker/app/admin\view\menu\index.php";i:1523412544;s:45:"E:\gitlearn\yupaker\app\admin\view\layout.php";i:1523412544;s:51:"E:\gitlearn\yupaker\app\admin\view\block\header.php";i:1523412544;s:50:"E:\gitlearn\yupaker\app\admin\view\block\layui.php";i:1523412544;s:51:"E:\gitlearn\yupaker\app\admin\view\block\footer.php";i:1523412544;}*/ ?>
<?php if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $_admin_menu_current['title']; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body>
<div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
<?php else: ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php if($_admin_menu_current['url'] == 'admin/index/index'): ?>管理控制台<?php else: ?><?php echo $_admin_menu_current['title']; endif; ?> -  Powered by <?php echo config('hisiphp.name'); ?></title>
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <link rel="stylesheet" href="/static/admin/js/layui/css/layui.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/admin/css/style.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/typicons/min.css?v=<?php echo config('hisiphp.version'); ?>">
    <link rel="stylesheet" href="/static/fonts/font-awesome/min.css?v=<?php echo config('hisiphp.version'); ?>">
</head>
<body>
<?php 
$ca = strtolower(request()->controller().'/'.request()->action());
 ?>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header" style="z-index:999!important;">
        <div class="fl header-logo">管理控制台</div>
        <div class="fl header-fold"><a href="javascript:;" title="打开/关闭左侧导航" class="aicon ai-caidan" id="foldSwitch"></a></div>
        <ul class="layui-nav fl nobg main-nav">
            <?php if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if(($_admin_menu_parents['pid'] == $vo['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $vo['id'] == 3)): ?>
               <li class="layui-nav-item layui-this">
                <?php else: ?>
                <li class="layui-nav-item">
                <?php endif; ?> 
                <a href="javascript:;"><?php echo $vo['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <ul class="layui-nav fr nobg head-info">
            <li class="layui-nav-item">
                <a href="javascript:void(0);"><?php echo $admin_user['nick']; ?>&nbsp;&nbsp;</a>
                <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('admin/user/info'); ?>">个人设置</a></dd>
                    <dd><a href="<?php echo url('admin/user/iframe?val=1'); ?>" class="j-ajax" refresh="yes">框架布局</a></dd>
                    <dd><a href="<?php echo url('admin/publics/logout'); ?>">退出登陆</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item">
                <a href="javascript:void(0);"><?php echo $languages[cookie('admin_language')]['name']; ?>&nbsp;&nbsp;</a>
                <dl class="layui-nav-child">
                    <?php if(is_array($languages) || $languages instanceof \think\Collection || $languages instanceof \think\Paginator): $i = 0; $__LIST__ = $languages;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pack']): ?>
                        <dd><a href="<?php echo url('admin/index/index'); ?>?lang=<?php echo $vo['code']; ?>"><?php echo $vo['name']; ?></a></dd>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    <dd><a href="<?php echo url('admin/language/index'); ?>">语言包管理</a></dd>
                </dl>
            </li>
            <li class="layui-nav-item"><a href="/" target="_blank">前台</a></li>
            <li class="layui-nav-item"><a href="<?php echo url('admin/index/clear'); ?>" class="j-ajax" refresh="yes">清缓存</a></li>
            <li class="layui-nav-item"><a href="javascript:void(0);" id="lockScreen">锁屏</a></li>
        </ul>
    </div>
    <div class="layui-side layui-bg-black" id="switchNav">
        <div class="layui-side-scroll">
            <?php if(is_array($_admin_menu) || $_admin_menu instanceof \think\Collection || $_admin_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $_admin_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(($_admin_menu_parents['pid'] == $v['id'] and $ca != 'plugins/run') or ($ca == 'plugins/run' and $v['id'] == 3)): ?>
            <ul class="layui-nav layui-nav-tree">
            <?php else: ?>
            <ul class="layui-nav layui-nav-tree" style="display:none;">
            <?php endif; if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
                <li class="layui-nav-item <?php if($kk == 1): ?>layui-nav-itemed<?php endif; ?>">
                    <a href="javascript:;"><i class="<?php echo $vv['icon']; ?>"></i><?php echo $vv['title']; ?><span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <?php if($vv['title'] == '快捷菜单'): ?>
                            <dd><a class="admin-nav-item" href="<?php echo url('admin/index/index'); ?>"><i class="aicon ai-shouye"></i> 后台首页</a></dd>
                            <?php if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                            <dd><a class="admin-nav-item" href="<?php if(strpos('http', $vvv['url']) === false): ?>/<?php echo config('sys.admin_path').'/'.$vvv['url']; if($vvv['param']): ?>?<?php echo $vvv['param']; endif; else: ?><?php echo $vvv['url']; endif; ?>"><i class="<?php echo $vvv['icon']; ?>"></i> <?php echo $vvv['title']; ?></a><i data-href="<?php echo url('menu/del?ids='.$vvv['id']); ?>" class="layui-icon j-del-menu">&#xe640;</i></dd>
                            <?php endforeach; endif; else: echo "" ;endif; else: if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                            <dd><a class="admin-nav-item" href="<?php if(strpos('http', $vvv['url']) === false): ?>/<?php echo config('sys.admin_path').'/'.$vvv['url']; if($vvv['param']): ?>?<?php echo $vvv['param']; endif; else: ?><?php echo $vvv['url']; endif; ?>"><i class="<?php echo $vvv['icon']; ?>"></i> <?php echo $vvv['title']; ?></a></dd>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </dl>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div class="layui-body" id="switchBody">
        <ul class="bread-crumbs">
            <?php if(is_array($_bread_crumbs) || $_bread_crumbs instanceof \think\Collection || $_bread_crumbs instanceof \think\Paginator): $i = 0; $__LIST__ = $_bread_crumbs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($key > 0 && $i != count($_bread_crumbs)): ?>
                    <li>></li>
                    <li><a href="<?php echo url($v['url'].'?'.$v['param']); ?>"><?php echo $v['title']; ?></a></li>
                <?php elseif($i == count($_bread_crumbs)): ?>
                    <li>></li>
                    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
                <?php else: ?>
                    <li><a href="javascript:void(0);"><?php echo $v['title']; ?></a></li>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <li><a href="<?php echo url('admin/menu/quick?id='.$_admin_menu_current['id']); ?>" title="添加到首页快捷菜单" class="j-ajax">[+]</a></li>
        </ul>
        <div style="padding:0 10px;" class="mcolor"><?php echo runhook('system_admin_tips'); ?></div>
        <div class="page-body">
<?php endif; switch($tab_type): case "1": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['url'] == $_admin_menu_current['url'] or (url($vo['url']) == $tab_data['current'])): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; if(substr($vo['url'], 0, 4) == 'http'): ?>
                        <a href="<?php echo $vo['url']; ?>" target="_blank"><?php echo $vo['title']; ?></a>
                    <?php else: ?>
                        <a href="<?php echo url($vo['url']); ?>"><?php echo $vo['title']; ?></a>
                    <?php endif; ?>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
                </div>
            </div>
        </div>
    <?php break; case "2": ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <?php if(is_array($tab_data['menu']) || $tab_data['menu'] instanceof \think\Collection || $tab_data['menu'] instanceof \think\Paginator): $k = 0; $__LIST__ = $tab_data['menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($k == 1): ?>
                    <li class="layui-this">
                    <?php else: ?>
                    <li>
                    <?php endif; ?>
                    <a href="javascript:;"><?php echo $vo['title']; ?></a>
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
            </div>
        </div>
    <?php break; case "3": if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
    <?php break; default: ?>
    
        <div class="layui-tab layui-tab-card">
            <ul class="layui-tab-title">
                <li class="layui-this">
                    <a href="javascript:;" id="curTitle"><?php echo $_admin_menu_current['title']; ?></a>
                </li>
                <div class="tool-btns">
                    <a href="javascript:location.reload();" title="刷新当前页面" class="aicon ai-shuaxin2 font18"></a>
                    <a href="javascript:;" class="aicon ai-quanping1 font18" id="fullscreen-btn" title="打开/关闭全屏"></a>
                </div>
            </ul>
            <div class="layui-tab-content page-tab-content">
                <div class="layui-tab-item layui-show">
                    <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
<div class="layui-tab-item layui-form menu-dl <?php if($k == 1): ?>layui-show<?php endif; ?>">
<form class="page-list-form">
    <div class="page-toolbar">
        <div class="layui-btn-group fl">
            <a href="<?php echo url('add?pid='.$v['id'].'&mod='.$v['module']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加子菜单</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=1'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
            <a data-href="<?php echo url('status?table=admin_menu&val=0'); ?>" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
            <a data-href="<?php echo url('del'); ?>" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
            <a href="<?php echo url('export?id='.$v['id']); ?>" class="layui-btn layui-btn-primary"><i class="aicon ai-daochu"></i>导出</a>
        </div>
    </div>
    <dl class="menu-dl1 menu-hd mt10">
        <dt>菜单名称</dt>
        <dd>
            <span class="hd">排序</span>
            <span class="hd2">状态</span>
            <span class="hd3">操作</span>
        </dd>
    </dl>
    <?php if(is_array($v['childs']) || $v['childs'] instanceof \think\Collection || $v['childs'] instanceof \think\Paginator): $kk = 0; $__LIST__ = $v['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($kk % 2 );++$kk;?>
    <dl class="menu-dl1">
        <dt>
            <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
            <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vv['sort']; ?>" data-value="<?php echo $vv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vv['id']); ?>">
            <input type="checkbox" name="status" value="<?php echo $vv['status']; ?>" <?php if($vv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
            <div class="menu-btns">
                <a href="<?php echo url('edit?id='.$vv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                <a href="<?php echo url('add?pid='.$vv['id'].'&mod='.$vv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                <a href="<?php echo url('del?ids='.$vv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                <?php if($vv['url'] == 'admin/plugins/run'): ?>
                <a href="<?php echo url('export?id='.$vv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                <?php endif; ?>
            </div>
        </dt>
        <dd>
            <?php 
                $kk++;
             if(is_array($vv['childs']) || $vv['childs'] instanceof \think\Collection || $vv['childs'] instanceof \think\Paginator): $kkk = 0; $__LIST__ = $vv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($kkk % 2 );++$kkk;
                if ($vvv['title'] == '预留占位') continue;
                $kk++;
             ?>
            <dl class="menu-dl2">
                <dt>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvv['sort']; ?>" data-value="<?php echo $vvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvv['status']; ?>" <?php if($vvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvv['id'].'&mod='.$vvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvv['id']); ?>" title="删除"><i class="layui-icon">&#xe640;</i></a>
                        <?php if($vvv['url'] == 'admin/plugins/run'): ?>
                        <a href="<?php echo url('export?id='.$vvv['id']); ?>" title="导出菜单"><i class="layui-icon" style="font-weight:bolder;">&#xe601;</i></a>
                        <?php endif; ?>
                    </div>
                </dt>
                <?php 
                    $kk++;
                 if(is_array($vvv['childs']) || $vvv['childs'] instanceof \think\Collection || $vvv['childs'] instanceof \think\Paginator): $kkkk = 0; $__LIST__ = $vvv['childs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvvv): $mod = ($kkkk % 2 );++$kkkk;
                    $kk++;
                 ?>
                <dd>
                    <input type="checkbox" name="ids[<?php echo $kk; ?>]" value="<?php echo $vvvv['id']; ?>" class="checkbox-ids" lay-skin="primary" title="<?php echo $vvvv['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $vvvv['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                    <input type="text" class="menu-sort j-ajax-input" name="sort[<?php echo $kk; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $vvvv['sort']; ?>" data-value="<?php echo $vvvv['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$vvvv['id']); ?>">
                    <input type="checkbox" name="status" value="<?php echo $vvvv['status']; ?>" <?php if($vvvv['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$vvvv['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($vvvv['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                    <div class="menu-btns">
                        <a href="<?php echo url('edit?id='.$vvvv['id']); ?>" title="编辑"><i class="layui-icon">&#xe642;</i></a>
                        <a href="<?php echo url('add?pid='.$vvvv['id'].'&mod='.$vvvv['module']); ?>" title="添加子菜单"><i class="layui-icon">&#xe654;</i></a>
                        <a href="<?php echo url('del?ids='.$vvvv['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </dd>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </dd>
    </dl>
    <?php 
        $kk++;
     endforeach; endif; else: echo "" ;endif; ?>
</form>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="layui-tab-item layui-form menu-dl">
    <form class="page-list-form">
        <dl class="menu-dl1 menu-hd mt10">
            <dt>模块名称</dt>
            <dd>
                <span class="hd">排序</span>
                <span class="hd2">状态</span>
                <span class="hd3">操作</span>
            </dd>
        </dl>
        <?php if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): $k = 0; $__LIST__ = $menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
        <dl class="menu-dl1">
            <dt>
                <input type="checkbox" name="ids[<?php echo $k; ?>]" class="checkbox-ids" value="<?php echo $v['id']; ?>" lay-skin="primary" title="<?php echo $v['title']; ?>"><div class="layui-unselect layui-form-checkbox" lay-skin="primary"><span><?php echo $v['title']; ?></span><i class="layui-icon">&#xe626;</i></div>
                <input type="text" class="layui-input j-ajax-input menu-sort" name="sort[<?php echo $k; ?>]" onkeyup="value=value.replace(/[^\d]/g,'')" value="<?php echo $v['sort']; ?>" data-value="<?php echo $v['sort']; ?>" data-href="<?php echo url('sort?table=admin_menu&ids='.$v['id']); ?>">
                <input type="checkbox" name="status" value="<?php echo $v['status']; ?>" <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="<?php echo url('status?table=admin_menu&ids='.$v['id']); ?>"><div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em><?php if($v['status'] == 1): ?>正常<?php else: ?>关闭<?php endif; ?></em><i></i></div>
                <div class="menu-btns">
                <a href="<?php echo url('del?ids='.$v['id']); ?>" title="删除之后无法恢复，您确定要删除吗？" class="j-ajax"><i class="layui-icon">&#xe640;</i></a>
                </div>
            </dt>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </form>
</div>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
                </div>
            </div>
        </div>
<?php endswitch; if(input('param.hisi_iframe') || cookie('hisi_iframe')): ?>
</body>
</html>
<?php else: ?>
        </div>
    </div>
    <div class="layui-footer footer">
        <span class="fl">Powered by <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.name'); ?></a> v<?php echo config('hisiphp.version'); ?></span>
        <span class="fr"> © 2017-2018 <a href="<?php echo config('hisiphp.url'); ?>" target="_blank"><?php echo config('hisiphp.copyright'); ?></a> All Rights Reserved.</span>
    </div>
</div>
</body>
</html>
<?php endif; ?>