<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:50:"E:\gitlearn\yupaker/app/admin\view\module\edit.php";i:1523412544;s:45:"E:\gitlearn\yupaker\app\admin\view\layout.php";i:1523412544;s:51:"E:\gitlearn\yupaker\app\admin\view\block\header.php";i:1523412544;s:50:"E:\gitlearn\yupaker\app\admin\view\block\layui.php";i:1523412544;s:51:"E:\gitlearn\yupaker\app\admin\view\block\footer.php";i:1523412544;}*/ ?>
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
    <div class="layui-tab-item layui-show" title="模块基本信息">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块基本信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">模块名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-name" name="name" lay-verify="required" readonly>
            </div>
            <div class="layui-form-mid layui-word-aux">禁止修改</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-title" name="title" lay-verify="required" placeholder="请输入模块标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-identifier" name="identifier" lay-verify="required" placeholder="请输入模块标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：模块名(只能为字母).开发者标识(只能为字母、数字、下划线).module</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块图标</label>
                <div class="layui-input-inline upload">
                    <button type="button" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="<?php echo url("","",true,false);?>', exts:'png', accept:'image'}">上传模块图标</button>
                    <input type="hidden" class="upload-input field-icon" name="icon">
                    <?php if(!empty($data_info['icon'])): ?>
                    <img src="<?php echo $data_info['icon']; ?>?v=<?php echo time(); ?>" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                    <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea field-intro" name="intro" placeholder="请填写模块描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-author" name="author" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-url" name="url" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-version" name="version" lay-verify="required" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
    </div>
    <div class="layui-tab-item" title="模块配置">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序[必填]</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['config']) || $module_info['config'] instanceof \think\Collection || $module_info['config'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['config'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="config-tr">
                    <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="<?php echo $vo['sort']; ?>"></td>
                    <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required" value="<?php echo $vo['title']; ?>"></td>
                    <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo['name']; ?>"></td>
                    <td>
                        <select name="config[type][]" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $vo['type']): ?>selected<?php endif; ?>>[<?php echo $key; ?>]<?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td>
                        <textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"><?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><?php echo $key; ?>:<?php echo $v; ?><?php echo "\r\n"; endforeach; endif; else: echo "" ;endif; ?></textarea>
                    </td>
                    <td><input type="text" name="config[value][]" class="layui-input" value="<?php echo $vo['value']; ?>"></td>
                    <td><input type="text" name="config[tips][]" class="layui-input" value="<?php echo $vo['tips']; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="config">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="模块依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">模块名</th>
                    <th>模块唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['module_depend']) || $module_info['module_depend'] instanceof \think\Collection || $module_info['module_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['module_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="module_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="module_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="module">添加模块依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他模块，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="插件依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>插件依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">插件名</th>
                    <th>插件唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['plugin_depend']) || $module_info['plugin_depend'] instanceof \think\Collection || $module_info['plugin_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['plugin_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="plugin_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="plugin_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="plugin">添加插件依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他插件，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="数据库设置">
        <div class="layui-form-item">
            <label class="layui-form-label">模块表前缀</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-db_prefix" name="db_prefix" lay-verify="required">
            </div>
            <div class="layui-form-mid layui-word-aux">当前模块有数据库表时必须配置</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>数据库表清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">数据库表名</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['tables']) || $module_info['tables'] instanceof \think\Collection || $module_info['tables'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['tables'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="2" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="table">添加记录</a>
                        <span class="layui-word-aux">有数据库表时必需添加此清单,<b class="red">不包含表前缀</b></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="预埋钩子">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>预埋钩子清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="200">钩子名称</th>
                    <th>钩子描述</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['hooks']) || $module_info['hooks'] instanceof \think\Collection || $module_info['hooks'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['hooks'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $key; ?>"></td>
                    <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="hook">添加钩子</a>
                        <span class="layui-word-aux">必须重装模块后新添加的钩子才生效</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交保存</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script type="text/html" id="configTr">
    <tr>
        <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="{i}"></td>
        <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[type][]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>">[<?php echo $key; ?>]<?php echo $v; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[value][]" class="layui-input"></td>
        <td><input type="text" name="config[tips][]" class="layui-input"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="moduleTr">
    <tr>
        <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="模块名.[应用ID].module.[应用分支ID]"></td>
        <td><input type="text" name="module_depend[version][]" class="layui-input" placeholder="主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="module_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="pluginTr">
    <tr>
        <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="插件名.[应用ID].plugins.[应用分支ID]"></td>
        <td><input type="text" name="plugin_depend[version][]" class="layui-input" placeholder="格式：主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="plugin_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="hookTr">
    <tr>
        <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="支持字母、下划线、数字"></td>
        <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="tableTr">
    <tr>
        <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="不含表前缀"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    var formData = <?php echo json_encode($data_info); ?>;

    layui.use(['jquery', 'form', 'upload'], function(){
        var $ = layui.jquery, form = layui.form, upload = layui.upload;

        upload.render({
            elem: '.layui-upload',
            url: '<?php echo url('icon?id='.$data_info['id']); ?>'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                input.siblings('img').attr('src', res.msg).show();
            }
        });

        $('.j-add-tr').click(function(){
            var that = $(this), tpl = $('#'+that.attr('data-tpl')+'Tr').html(), len = that.parents('tbody').find('tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+99));
            form.render();
        });

        $(document).on('click', '.tr-del', function(){
            $(this).parent().parent().remove();
        });
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
    <div class="layui-tab-item layui-show" title="模块基本信息">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块基本信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">模块名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-name" name="name" lay-verify="required" readonly>
            </div>
            <div class="layui-form-mid layui-word-aux">禁止修改</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-title" name="title" lay-verify="required" placeholder="请输入模块标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-identifier" name="identifier" lay-verify="required" placeholder="请输入模块标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：模块名(只能为字母).开发者标识(只能为字母、数字、下划线).module</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块图标</label>
                <div class="layui-input-inline upload">
                    <button type="button" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="<?php echo url("","",true,false);?>', exts:'png', accept:'image'}">上传模块图标</button>
                    <input type="hidden" class="upload-input field-icon" name="icon">
                    <?php if(!empty($data_info['icon'])): ?>
                    <img src="<?php echo $data_info['icon']; ?>?v=<?php echo time(); ?>" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                    <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea field-intro" name="intro" placeholder="请填写模块描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-author" name="author" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-url" name="url" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-version" name="version" lay-verify="required" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
    </div>
    <div class="layui-tab-item" title="模块配置">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序[必填]</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['config']) || $module_info['config'] instanceof \think\Collection || $module_info['config'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['config'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="config-tr">
                    <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="<?php echo $vo['sort']; ?>"></td>
                    <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required" value="<?php echo $vo['title']; ?>"></td>
                    <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo['name']; ?>"></td>
                    <td>
                        <select name="config[type][]" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $vo['type']): ?>selected<?php endif; ?>>[<?php echo $key; ?>]<?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td>
                        <textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"><?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><?php echo $key; ?>:<?php echo $v; ?><?php echo "\r\n"; endforeach; endif; else: echo "" ;endif; ?></textarea>
                    </td>
                    <td><input type="text" name="config[value][]" class="layui-input" value="<?php echo $vo['value']; ?>"></td>
                    <td><input type="text" name="config[tips][]" class="layui-input" value="<?php echo $vo['tips']; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="config">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="模块依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">模块名</th>
                    <th>模块唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['module_depend']) || $module_info['module_depend'] instanceof \think\Collection || $module_info['module_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['module_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="module_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="module_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="module">添加模块依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他模块，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="插件依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>插件依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">插件名</th>
                    <th>插件唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['plugin_depend']) || $module_info['plugin_depend'] instanceof \think\Collection || $module_info['plugin_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['plugin_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="plugin_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="plugin_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="plugin">添加插件依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他插件，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="数据库设置">
        <div class="layui-form-item">
            <label class="layui-form-label">模块表前缀</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-db_prefix" name="db_prefix" lay-verify="required">
            </div>
            <div class="layui-form-mid layui-word-aux">当前模块有数据库表时必须配置</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>数据库表清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">数据库表名</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['tables']) || $module_info['tables'] instanceof \think\Collection || $module_info['tables'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['tables'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="2" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="table">添加记录</a>
                        <span class="layui-word-aux">有数据库表时必需添加此清单,<b class="red">不包含表前缀</b></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="预埋钩子">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>预埋钩子清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="200">钩子名称</th>
                    <th>钩子描述</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['hooks']) || $module_info['hooks'] instanceof \think\Collection || $module_info['hooks'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['hooks'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $key; ?>"></td>
                    <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="hook">添加钩子</a>
                        <span class="layui-word-aux">必须重装模块后新添加的钩子才生效</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交保存</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script type="text/html" id="configTr">
    <tr>
        <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="{i}"></td>
        <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[type][]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>">[<?php echo $key; ?>]<?php echo $v; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[value][]" class="layui-input"></td>
        <td><input type="text" name="config[tips][]" class="layui-input"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="moduleTr">
    <tr>
        <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="模块名.[应用ID].module.[应用分支ID]"></td>
        <td><input type="text" name="module_depend[version][]" class="layui-input" placeholder="主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="module_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="pluginTr">
    <tr>
        <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="插件名.[应用ID].plugins.[应用分支ID]"></td>
        <td><input type="text" name="plugin_depend[version][]" class="layui-input" placeholder="格式：主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="plugin_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="hookTr">
    <tr>
        <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="支持字母、下划线、数字"></td>
        <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="tableTr">
    <tr>
        <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="不含表前缀"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    var formData = <?php echo json_encode($data_info); ?>;

    layui.use(['jquery', 'form', 'upload'], function(){
        var $ = layui.jquery, form = layui.form, upload = layui.upload;

        upload.render({
            elem: '.layui-upload',
            url: '<?php echo url('icon?id='.$data_info['id']); ?>'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                input.siblings('img').attr('src', res.msg).show();
            }
        });

        $('.j-add-tr').click(function(){
            var that = $(this), tpl = $('#'+that.attr('data-tpl')+'Tr').html(), len = that.parents('tbody').find('tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+99));
            form.render();
        });

        $(document).on('click', '.tr-del', function(){
            $(this).parent().parent().remove();
        });
    });
</script>
<script src="/static/admin/js/footer.js"></script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" method="post" id="editForm">
    <div class="layui-tab-item layui-show" title="模块基本信息">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块基本信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">模块名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-name" name="name" lay-verify="required" readonly>
            </div>
            <div class="layui-form-mid layui-word-aux">禁止修改</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-title" name="title" lay-verify="required" placeholder="请输入模块标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-identifier" name="identifier" lay-verify="required" placeholder="请输入模块标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：模块名(只能为字母).开发者标识(只能为字母、数字、下划线).module</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块图标</label>
                <div class="layui-input-inline upload">
                    <button type="button" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="<?php echo url("","",true,false);?>', exts:'png', accept:'image'}">上传模块图标</button>
                    <input type="hidden" class="upload-input field-icon" name="icon">
                    <?php if(!empty($data_info['icon'])): ?>
                    <img src="<?php echo $data_info['icon']; ?>?v=<?php echo time(); ?>" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                    <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea field-intro" name="intro" placeholder="请填写模块描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-author" name="author" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-url" name="url" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-version" name="version" lay-verify="required" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
    </div>
    <div class="layui-tab-item" title="模块配置">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序[必填]</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['config']) || $module_info['config'] instanceof \think\Collection || $module_info['config'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['config'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="config-tr">
                    <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="<?php echo $vo['sort']; ?>"></td>
                    <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required" value="<?php echo $vo['title']; ?>"></td>
                    <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo['name']; ?>"></td>
                    <td>
                        <select name="config[type][]" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $vo['type']): ?>selected<?php endif; ?>>[<?php echo $key; ?>]<?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td>
                        <textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"><?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><?php echo $key; ?>:<?php echo $v; ?><?php echo "\r\n"; endforeach; endif; else: echo "" ;endif; ?></textarea>
                    </td>
                    <td><input type="text" name="config[value][]" class="layui-input" value="<?php echo $vo['value']; ?>"></td>
                    <td><input type="text" name="config[tips][]" class="layui-input" value="<?php echo $vo['tips']; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="config">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="模块依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">模块名</th>
                    <th>模块唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['module_depend']) || $module_info['module_depend'] instanceof \think\Collection || $module_info['module_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['module_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="module_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="module_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="module">添加模块依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他模块，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="插件依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>插件依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">插件名</th>
                    <th>插件唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['plugin_depend']) || $module_info['plugin_depend'] instanceof \think\Collection || $module_info['plugin_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['plugin_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="plugin_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="plugin_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="plugin">添加插件依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他插件，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="数据库设置">
        <div class="layui-form-item">
            <label class="layui-form-label">模块表前缀</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-db_prefix" name="db_prefix" lay-verify="required">
            </div>
            <div class="layui-form-mid layui-word-aux">当前模块有数据库表时必须配置</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>数据库表清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">数据库表名</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['tables']) || $module_info['tables'] instanceof \think\Collection || $module_info['tables'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['tables'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="2" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="table">添加记录</a>
                        <span class="layui-word-aux">有数据库表时必需添加此清单,<b class="red">不包含表前缀</b></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="预埋钩子">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>预埋钩子清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="200">钩子名称</th>
                    <th>钩子描述</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['hooks']) || $module_info['hooks'] instanceof \think\Collection || $module_info['hooks'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['hooks'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $key; ?>"></td>
                    <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="hook">添加钩子</a>
                        <span class="layui-word-aux">必须重装模块后新添加的钩子才生效</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交保存</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script type="text/html" id="configTr">
    <tr>
        <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="{i}"></td>
        <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[type][]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>">[<?php echo $key; ?>]<?php echo $v; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[value][]" class="layui-input"></td>
        <td><input type="text" name="config[tips][]" class="layui-input"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="moduleTr">
    <tr>
        <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="模块名.[应用ID].module.[应用分支ID]"></td>
        <td><input type="text" name="module_depend[version][]" class="layui-input" placeholder="主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="module_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="pluginTr">
    <tr>
        <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="插件名.[应用ID].plugins.[应用分支ID]"></td>
        <td><input type="text" name="plugin_depend[version][]" class="layui-input" placeholder="格式：主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="plugin_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="hookTr">
    <tr>
        <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="支持字母、下划线、数字"></td>
        <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="tableTr">
    <tr>
        <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="不含表前缀"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    var formData = <?php echo json_encode($data_info); ?>;

    layui.use(['jquery', 'form', 'upload'], function(){
        var $ = layui.jquery, form = layui.form, upload = layui.upload;

        upload.render({
            elem: '.layui-upload',
            url: '<?php echo url('icon?id='.$data_info['id']); ?>'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                input.siblings('img').attr('src', res.msg).show();
            }
        });

        $('.j-add-tr').click(function(){
            var that = $(this), tpl = $('#'+that.attr('data-tpl')+'Tr').html(), len = that.parents('tbody').find('tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+99));
            form.render();
        });

        $(document).on('click', '.tr-del', function(){
            $(this).parent().parent().remove();
        });
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
    <div class="layui-tab-item layui-show" title="模块基本信息">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块基本信息</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">模块名</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-name" name="name" lay-verify="required" readonly>
            </div>
            <div class="layui-form-mid layui-word-aux">禁止修改</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标题</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-title" name="title" lay-verify="required" placeholder="请输入模块标题">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块标识</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-identifier" name="identifier" lay-verify="required" placeholder="请输入模块标识">
            </div>
            <div class="layui-form-mid layui-word-aux">格式：模块名(只能为字母).开发者标识(只能为字母、数字、下划线).module</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块图标</label>
                <div class="layui-input-inline upload">
                    <button type="button" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="<?php echo url("","",true,false);?>', exts:'png', accept:'image'}">上传模块图标</button>
                    <input type="hidden" class="upload-input field-icon" name="icon">
                    <?php if(!empty($data_info['icon'])): ?>
                    <img src="<?php echo $data_info['icon']; ?>?v=<?php echo time(); ?>" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php else: ?>
                    <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                    <?php endif; ?>
                </div>
                <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">模块描述</label>
            <div class="layui-input-inline w300">
                <textarea  class="layui-textarea field-intro" name="intro" placeholder="请填写模块描述"></textarea>
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-author" name="author" placeholder="请输入开发者">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">开发者网址</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-url" name="url" placeholder="请输入开发者网址">
            </div>
            <div class="layui-form-mid layui-word-aux">建议填写</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">版本号</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-version" name="version" lay-verify="required" placeholder="请输入版本号">
            </div>
            <div class="layui-form-mid layui-word-aux">版本号格式采用三段式：主版本号.次版本号.修订版本号</div>
        </div>
    </div>
    <div class="layui-tab-item" title="模块配置">
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th>排序[必填]</th>
                    <th>配置名称[必填]</th>
                    <th>配置变量名[必填]</th>
                    <th>配置类型[必填]</th>
                    <th>配置选项[选填]</th>
                    <th>默认值[选填]</th>
                    <th>配置提示[选填]</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['config']) || $module_info['config'] instanceof \think\Collection || $module_info['config'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['config'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr class="config-tr">
                    <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="<?php echo $vo['sort']; ?>"></td>
                    <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required" value="<?php echo $vo['title']; ?>"></td>
                    <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo['name']; ?>"></td>
                    <td>
                        <select name="config[type][]" type="select">
                        <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $key; ?>" <?php if($key == $vo['type']): ?>selected<?php endif; ?>>[<?php echo $key; ?>]<?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td>
                        <textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"><?php if(is_array($vo['options']) || $vo['options'] instanceof \think\Collection || $vo['options'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['options'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><?php echo $key; ?>:<?php echo $v; ?><?php echo "\r\n"; endforeach; endif; else: echo "" ;endif; ?></textarea>
                    </td>
                    <td><input type="text" name="config[value][]" class="layui-input" value="<?php echo $vo['value']; ?>"></td>
                    <td><input type="text" name="config[tips][]" class="layui-input" value="<?php echo $vo['tips']; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="8" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="config">添加配置</a>
                        <span class="layui-word-aux">提示：当配置类型为单选按钮、多选框、下拉框、开关的时候，配置选项为必填，参考格式：选项值:选项名，多个选项请换行。</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="模块依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>模块依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">模块名</th>
                    <th>模块唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['module_depend']) || $module_info['module_depend'] instanceof \think\Collection || $module_info['module_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['module_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="module_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="module_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="module">添加模块依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他模块，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="插件依赖">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>插件依赖清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">插件名</th>
                    <th>插件唯一标识</th>
                    <th>依赖版本</th>
                    <th width="160">对比方式</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['plugin_depend']) || $module_info['plugin_depend'] instanceof \think\Collection || $module_info['plugin_depend'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['plugin_depend'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required" value="<?php echo $vo[0]; ?>"></td>
                    <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" value="<?php echo $vo[1]; ?>"></td>
                    <td><input type="text" name="plugin_depend[version][]" class="layui-input" value="<?php echo $vo[2]; ?>"></td>
                    <td>
                        <select name="plugin_depend[type][]">
                            <option value="<" <?php if($vo[3] == '<'): ?>selected<?php endif; ?>>（ < ）小于</option>
                            <option value="<=" <?php if($vo[3] == '<='): ?>selected<?php endif; ?>>（<=）小于等于</option>
                            <option value=">" <?php if($vo[3] == '>'): ?>selected<?php endif; ?>>（ > ）大于</option>
                            <option value=">=" <?php if($vo[3] == '>='): ?>selected<?php endif; ?>>（>=）大于等于</option>
                            <option value="=" <?php if($vo[3] == '='): ?>selected<?php endif; ?>>（ = ）等于</option>
                        </select>
                    </td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="plugin">添加插件依赖</a>
                        <span class="layui-word-aux">如果您的模块有依赖其他插件，必须添加此清单</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="数据库设置">
        <div class="layui-form-item">
            <label class="layui-form-label">模块表前缀</label>
            <div class="layui-input-inline w300">
                <input type="text" class="layui-input field-db_prefix" name="db_prefix" lay-verify="required">
            </div>
            <div class="layui-form-mid layui-word-aux">当前模块有数据库表时必须配置</div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
          <legend>数据库表清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="160">数据库表名</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['tables']) || $module_info['tables'] instanceof \think\Collection || $module_info['tables'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['tables'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="2" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="table">添加记录</a>
                        <span class="layui-word-aux">有数据库表时必需添加此清单,<b class="red">不包含表前缀</b></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-tab-item" title="预埋钩子">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>预埋钩子清单</legend>
        </fieldset>
        <table class="layui-table" lay-even="" lay-skin="row">
            <thead>
                <tr>
                    <th width="200">钩子名称</th>
                    <th>钩子描述</th>
                    <th width="50">操作</th>
                </tr> 
            </thead>
            <tbody>
                <?php if(is_array($module_info['hooks']) || $module_info['hooks'] instanceof \think\Collection || $module_info['hooks'] instanceof \think\Paginator): $i = 0; $__LIST__ = $module_info['hooks'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" value="<?php echo $key; ?>"></td>
                    <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required" value="<?php echo $vo; ?>"></td>
                    <td><a href="javascript:;" class="tr-del">删除</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td colspan="5" style="background-color:#f8f8f8">
                        <a class="layui-btn layui-btn-sm j-add-tr" data-tpl="hook">添加钩子</a>
                        <span class="layui-word-aux">必须重装模块后新添加的钩子才生效</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交保存</button>
            <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>
<script type="text/html" id="configTr">
    <tr>
        <td><input type="text" name="config[sort][]" class="layui-input" lay-verify="required" value="{i}"></td>
        <td><input type="text" name="config[title][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="config[name][]" class="layui-input" lay-verify="required"></td>
        <td>
            <select name="config[type][]" class="field-type" type="select">
            <?php $_result=form_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <option value="<?php echo $key; ?>">[<?php echo $key; ?>]<?php echo $v; ?></option>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </td>
        <td><textarea name="config[options][]" class="layui-textarea" style="min-height:20px;padding:0;" placeholder="选项值:选项名"></textarea></td>
        <td><input type="text" name="config[value][]" class="layui-input"></td>
        <td><input type="text" name="config[tips][]" class="layui-input"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="moduleTr">
    <tr>
        <td><input type="text" name="module_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="module_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="模块名.[应用ID].module.[应用分支ID]"></td>
        <td><input type="text" name="module_depend[version][]" class="layui-input" placeholder="主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="module_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="pluginTr">
    <tr>
        <td><input type="text" name="plugin_depend[name][]" class="layui-input" lay-verify="required"></td>
        <td><input type="text" name="plugin_depend[identifier][]" class="layui-input" lay-verify="required" placeholder="插件名.[应用ID].plugins.[应用分支ID]"></td>
        <td><input type="text" name="plugin_depend[version][]" class="layui-input" placeholder="格式：主版本号.次版本号.修订版本号"></td>
        <td>
            <select name="plugin_depend[type][]">
                <option value="<">（ < ）小于</option>
                <option value="<=">（<=）小于等于</option>
                <option value=">">（ > ）大于</option>
                <option value=">=">（>=）大于等于</option>
                <option value="=">（ = ）等于</option>
            </select>
        </td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="hookTr">
    <tr>
        <td><input type="text" name="hooks[key][]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="支持字母、下划线、数字"></td>
        <td><input type="text" name="hooks[desc][]" class="layui-input" minlength="2" maxlength="100" lay-verify="required"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script type="text/html" id="tableTr">
    <tr>
        <td><input type="text" name="tables[]" class="layui-input" lay-verify="required" minlength="2" maxlength="50" placeholder="不含表前缀"></td>
        <td><a href="javascript:;" class="tr-del">删除</a></td>
    </tr>
</script>
<script src="/static/admin/js/layui/layui.js?v=<?php echo config('hisiphp.version'); ?>"></script>
<script>
    var ADMIN_PATH = "<?php echo $_SERVER['SCRIPT_NAME']; ?>", LAYUI_OFFSET = 0;
    layui.config({
        base: '/static/admin/js/',
        version: '<?php echo config("hisiphp.version"); ?>'
    }).use('global');
</script>
<script type="text/javascript">
    var formData = <?php echo json_encode($data_info); ?>;

    layui.use(['jquery', 'form', 'upload'], function(){
        var $ = layui.jquery, form = layui.form, upload = layui.upload;

        upload.render({
            elem: '.layui-upload',
            url: '<?php echo url('icon?id='.$data_info['id']); ?>'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                var input = $(obj).parents('.upload').find('.upload-input');
                input.siblings('img').attr('src', res.msg).show();
            }
        });

        $('.j-add-tr').click(function(){
            var that = $(this), tpl = $('#'+that.attr('data-tpl')+'Tr').html(), len = that.parents('tbody').find('tr').length;
            that.parents('tr').before(tpl.replace(/{i}/g, len+99));
            form.render();
        });

        $(document).on('click', '.tr-del', function(){
            $(this).parent().parent().remove();
        });
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