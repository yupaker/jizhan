<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:48:"E:\gitlearn\yupaker/app/admin\view\menu\form.php";i:1530240845;s:45:"E:\gitlearn\yupaker\app\admin\view\layout.php";i:1530240845;s:51:"E:\gitlearn\yupaker\app\admin\view\block\header.php";i:1530240845;s:50:"E:\gitlearn\yupaker\app\admin\view\block\layui.php";i:1530240845;s:51:"E:\gitlearn\yupaker\app\admin\view\block\footer.php";i:1530240845;}*/ ?>
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
                    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="post" id="editForm">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>后台权限验证采用白名单方式，而白名单数据均来源于系统菜单。请严格按照系统要求填写菜单链接和扩展参数。</p>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属模块</label>
        <div class="layui-input-inline">
            <select name="module" class="field-module" type="select">
                <option value="">请选择...</option>
                <?php echo $module_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">插件请选择[admin]系统管理模块</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属菜单</label>
        <div class="layui-input-inline">
            <select name="pid" class="field-pid" type="select" lay-filter="pid">
                <option value="0" level="0">顶级菜单</option>
                <?php echo $menu_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">
            尽量选择与所属模块一致的菜单，根据 “[ ]” 里面的内容判断
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请输入菜单名称">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，长度限制3-24个字节(1个汉字等于3个字节)
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标设置</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-icon" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="<?php if(isset($data_info['icon'])): ?><?php echo $data_info['icon']; endif; ?>" id="form-icon-preview"></i>
        <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" title="选择图标" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单链接</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-url" name="url" lay-verify="required" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，模块格式：模块名/控制器名/方法名，插件直接设置：admin/plugins/run，<span class="red">请留意大小写</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">扩展参数</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-param" name="param" lay-verify="" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            选填，参考格式：a=123&b=345，插件格式：_p=插件名称&_c=插件控制器&_a=插件方法
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统菜单</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-system" name="system" value="1" title="是">
            <input type="radio" class="field-system" name="system" value="0" title="否" checked>
        </div>
        <div class="layui-form-mid layui-word-aux">
            设置为系统菜单后，无法删除
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">后台导航</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-nav" name="nav" value="1" title="是" checked>
            <input type="radio" class="field-nav" name="nav" value="0" title="否">
        </div>
        <div class="layui-form-mid layui-word-aux">此设置只对前一二三级菜单有效</div>
    </div>
<!--     <div class="layui-form-item">
        <label class="layui-form-label">开发可见</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-debug" name="debug" value="1" title="是">
            <input type="radio" class="field-debug" name="debug" value="0" title="否" checked>
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <!-- <input type="hidden" class="ass-level" name="level"> -->
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
var formData = <?php echo json_encode($data_info); ?>;
layui.use(['form'], function() {
    var $ = layui.jquery, form = layui.form;
    // form.on('select(pid)', function(data) {
    //     var level = $('.field-pid option:selected').attr('level');
    //     // 根据所属菜单层级对菜单链接做出相应提示
    //     switch(parseInt(level)) {
    //         case 0:
    //             $('.menu-url').hide().eq(0).show();
    //             $('.ass-level').val(1);
    //             break;
    //         case 1:
    //             $('.menu-url').hide().eq(1).show();
    //             $('.ass-level').val(2);
    //             break;
    //         default:
    //             $('.menu-url').hide().eq(2).show();
    //             $('.ass-level').val(3);
    //             break;
    //     }
    // });
    if (formData) {
        $('.ass-level').val(parseInt($('.field-pid option:selected').attr('level'))+1);
    }
});
</script>
<script src="/static/admin/js/footer.js"></script>
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
                <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="post" id="editForm">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>后台权限验证采用白名单方式，而白名单数据均来源于系统菜单。请严格按照系统要求填写菜单链接和扩展参数。</p>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属模块</label>
        <div class="layui-input-inline">
            <select name="module" class="field-module" type="select">
                <option value="">请选择...</option>
                <?php echo $module_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">插件请选择[admin]系统管理模块</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属菜单</label>
        <div class="layui-input-inline">
            <select name="pid" class="field-pid" type="select" lay-filter="pid">
                <option value="0" level="0">顶级菜单</option>
                <?php echo $menu_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">
            尽量选择与所属模块一致的菜单，根据 “[ ]” 里面的内容判断
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请输入菜单名称">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，长度限制3-24个字节(1个汉字等于3个字节)
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标设置</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-icon" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="<?php if(isset($data_info['icon'])): ?><?php echo $data_info['icon']; endif; ?>" id="form-icon-preview"></i>
        <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" title="选择图标" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单链接</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-url" name="url" lay-verify="required" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，模块格式：模块名/控制器名/方法名，插件直接设置：admin/plugins/run，<span class="red">请留意大小写</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">扩展参数</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-param" name="param" lay-verify="" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            选填，参考格式：a=123&b=345，插件格式：_p=插件名称&_c=插件控制器&_a=插件方法
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统菜单</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-system" name="system" value="1" title="是">
            <input type="radio" class="field-system" name="system" value="0" title="否" checked>
        </div>
        <div class="layui-form-mid layui-word-aux">
            设置为系统菜单后，无法删除
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">后台导航</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-nav" name="nav" value="1" title="是" checked>
            <input type="radio" class="field-nav" name="nav" value="0" title="否">
        </div>
        <div class="layui-form-mid layui-word-aux">此设置只对前一二三级菜单有效</div>
    </div>
<!--     <div class="layui-form-item">
        <label class="layui-form-label">开发可见</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-debug" name="debug" value="1" title="是">
            <input type="radio" class="field-debug" name="debug" value="0" title="否" checked>
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <!-- <input type="hidden" class="ass-level" name="level"> -->
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
var formData = <?php echo json_encode($data_info); ?>;
layui.use(['form'], function() {
    var $ = layui.jquery, form = layui.form;
    // form.on('select(pid)', function(data) {
    //     var level = $('.field-pid option:selected').attr('level');
    //     // 根据所属菜单层级对菜单链接做出相应提示
    //     switch(parseInt(level)) {
    //         case 0:
    //             $('.menu-url').hide().eq(0).show();
    //             $('.ass-level').val(1);
    //             break;
    //         case 1:
    //             $('.menu-url').hide().eq(1).show();
    //             $('.ass-level').val(2);
    //             break;
    //         default:
    //             $('.menu-url').hide().eq(2).show();
    //             $('.ass-level').val(3);
    //             break;
    //     }
    // });
    if (formData) {
        $('.ass-level').val(parseInt($('.field-pid option:selected').attr('level'))+1);
    }
});
</script>
<script src="/static/admin/js/footer.js"></script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="post" id="editForm">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>后台权限验证采用白名单方式，而白名单数据均来源于系统菜单。请严格按照系统要求填写菜单链接和扩展参数。</p>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属模块</label>
        <div class="layui-input-inline">
            <select name="module" class="field-module" type="select">
                <option value="">请选择...</option>
                <?php echo $module_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">插件请选择[admin]系统管理模块</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属菜单</label>
        <div class="layui-input-inline">
            <select name="pid" class="field-pid" type="select" lay-filter="pid">
                <option value="0" level="0">顶级菜单</option>
                <?php echo $menu_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">
            尽量选择与所属模块一致的菜单，根据 “[ ]” 里面的内容判断
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请输入菜单名称">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，长度限制3-24个字节(1个汉字等于3个字节)
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标设置</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-icon" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="<?php if(isset($data_info['icon'])): ?><?php echo $data_info['icon']; endif; ?>" id="form-icon-preview"></i>
        <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" title="选择图标" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单链接</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-url" name="url" lay-verify="required" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，模块格式：模块名/控制器名/方法名，插件直接设置：admin/plugins/run，<span class="red">请留意大小写</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">扩展参数</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-param" name="param" lay-verify="" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            选填，参考格式：a=123&b=345，插件格式：_p=插件名称&_c=插件控制器&_a=插件方法
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统菜单</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-system" name="system" value="1" title="是">
            <input type="radio" class="field-system" name="system" value="0" title="否" checked>
        </div>
        <div class="layui-form-mid layui-word-aux">
            设置为系统菜单后，无法删除
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">后台导航</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-nav" name="nav" value="1" title="是" checked>
            <input type="radio" class="field-nav" name="nav" value="0" title="否">
        </div>
        <div class="layui-form-mid layui-word-aux">此设置只对前一二三级菜单有效</div>
    </div>
<!--     <div class="layui-form-item">
        <label class="layui-form-label">开发可见</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-debug" name="debug" value="1" title="是">
            <input type="radio" class="field-debug" name="debug" value="0" title="否" checked>
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <!-- <input type="hidden" class="ass-level" name="level"> -->
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
var formData = <?php echo json_encode($data_info); ?>;
layui.use(['form'], function() {
    var $ = layui.jquery, form = layui.form;
    // form.on('select(pid)', function(data) {
    //     var level = $('.field-pid option:selected').attr('level');
    //     // 根据所属菜单层级对菜单链接做出相应提示
    //     switch(parseInt(level)) {
    //         case 0:
    //             $('.menu-url').hide().eq(0).show();
    //             $('.ass-level').val(1);
    //             break;
    //         case 1:
    //             $('.menu-url').hide().eq(1).show();
    //             $('.ass-level').val(2);
    //             break;
    //         default:
    //             $('.menu-url').hide().eq(2).show();
    //             $('.ass-level').val(3);
    //             break;
    //     }
    // });
    if (formData) {
        $('.ass-level').val(parseInt($('.field-pid option:selected').attr('level'))+1);
    }
});
</script>
<script src="/static/admin/js/footer.js"></script>
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
                    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="post" id="editForm">
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>后台权限验证采用白名单方式，而白名单数据均来源于系统菜单。请严格按照系统要求填写菜单链接和扩展参数。</p>
        </div>
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属模块</label>
        <div class="layui-input-inline">
            <select name="module" class="field-module" type="select">
                <option value="">请选择...</option>
                <?php echo $module_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">插件请选择[admin]系统管理模块</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">所属菜单</label>
        <div class="layui-input-inline">
            <select name="pid" class="field-pid" type="select" lay-filter="pid">
                <option value="0" level="0">顶级菜单</option>
                <?php echo $menu_option; ?>
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux">
            尽量选择与所属模块一致的菜单，根据 “[ ]” 里面的内容判断
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单名称</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请输入菜单名称">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，长度限制3-24个字节(1个汉字等于3个字节)
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">图标设置</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-icon" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
        </div>
        <i class="<?php if(isset($data_info['icon'])): ?><?php echo $data_info['icon']; endif; ?>" id="form-icon-preview"></i>
        <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" title="选择图标" class="layui-btn layui-btn-primary j-iframe-pop fl">选择图标</a>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">菜单链接</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-url" name="url" lay-verify="required" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            必填，模块格式：模块名/控制器名/方法名，插件直接设置：admin/plugins/run，<span class="red">请留意大小写</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">扩展参数</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-param" name="param" lay-verify="" autocomplete="off" placeholder="请严格按照参考格式填写">
        </div>
        <div class="layui-form-mid layui-word-aux">
            选填，参考格式：a=123&b=345，插件格式：_p=插件名称&_c=插件控制器&_a=插件方法
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">系统菜单</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-system" name="system" value="1" title="是">
            <input type="radio" class="field-system" name="system" value="0" title="否" checked>
        </div>
        <div class="layui-form-mid layui-word-aux">
            设置为系统菜单后，无法删除
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">后台导航</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-nav" name="nav" value="1" title="是" checked>
            <input type="radio" class="field-nav" name="nav" value="0" title="否">
        </div>
        <div class="layui-form-mid layui-word-aux">此设置只对前一二三级菜单有效</div>
    </div>
<!--     <div class="layui-form-item">
        <label class="layui-form-label">开发可见</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-debug" name="debug" value="1" title="是">
            <input type="radio" class="field-debug" name="debug" value="0" title="否" checked>
        </div>
    </div> -->
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <!-- <input type="hidden" class="ass-level" name="level"> -->
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script>
var formData = <?php echo json_encode($data_info); ?>;
layui.use(['form'], function() {
    var $ = layui.jquery, form = layui.form;
    // form.on('select(pid)', function(data) {
    //     var level = $('.field-pid option:selected').attr('level');
    //     // 根据所属菜单层级对菜单链接做出相应提示
    //     switch(parseInt(level)) {
    //         case 0:
    //             $('.menu-url').hide().eq(0).show();
    //             $('.ass-level').val(1);
    //             break;
    //         case 1:
    //             $('.menu-url').hide().eq(1).show();
    //             $('.ass-level').val(2);
    //             break;
    //         default:
    //             $('.menu-url').hide().eq(2).show();
    //             $('.ass-level').val(3);
    //             break;
    //     }
    // });
    if (formData) {
        $('.ass-level').val(parseInt($('.field-pid option:selected').attr('level'))+1);
    }
});
</script>
<script src="/static/admin/js/footer.js"></script>
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