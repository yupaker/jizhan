<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:51:"E:\gitlearn\yupaker/app/admin\view\develop\edit.php";i:1530240845;s:45:"E:\gitlearn\yupaker\app\admin\view\layout.php";i:1530240845;s:51:"E:\gitlearn\yupaker\app\admin\view\block\header.php";i:1530240845;s:50:"E:\gitlearn\yupaker\app\admin\view\block\layui.php";i:1530240845;s:51:"E:\gitlearn\yupaker\app\admin\view\block\footer.php";i:1530240845;}*/ ?>
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
                    <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
        </div>
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
<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
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
                <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
        </div>
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
<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
<script src="/static/admin/js/footer.js"></script>
            </div>
        </div>
    <?php break; case "3": ?>
    
        <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
        </div>
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
<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
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
                    <div class="layui-tab-item layui-show">
    <!--
    +----------------------------------------------------------------------
    | 添加修改实例模板，可直接复制以下代码使用
    | select元素需要加type="select"
    | 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
    +----------------------------------------------------------------------
    -->
    <div class="layui-collapse page-tips">
      <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
          <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
      </div>
    </div>
    <form class="layui-form layui-form-pane" action="<?php echo url(); ?>" id="editForm" method="post">
        <fieldset class="layui-elem-field layui-field-title">
          <legend>表单集合</legend>
        </fieldset>
        <div class="layui-form-item">
            <label class="layui-form-label">角色分组</label>
            <div class="layui-input-inline">
                <select name="role_id" class="field-role_id" type="select">
                    <option value="0">超级管理员</option>
                    <option value="1" selected="">普通管理员</option>
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-username" name="username" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
            <div class="layui-form-mid layui-word-aux">表单操作提示</div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">会员</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" name="member" lay-verify="" autocomplete="off" placeholder="会员选择">
            </div>
            <a href="<?php echo url('admin/member/pop?callback=func'); ?>" title="选择会员" class="layui-btn layui-btn-primary j-iframe-pop fl">选择会员</a>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">系统图标</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input" id="input-icon" name="icon" lay-verify="" autocomplete="off" placeholder="可自定义或使用系统图标">
            </div>
            <i class="" id="form-icon-preview"></i>
            <a href="<?php echo url('publics/icon?input=input-icon&show=form-icon-preview'); ?>" class="layui-btn layui-btn-primary j-iframe-pop fl" title="选择图标">选择图标</a>
        </div>
        <!--图片-->
        <div class="layui-form-item">
            <label class="layui-form-label">图片上传</label>
            <div class="layui-input-inline upload">
                <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input" name="image" value="">
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">昵&nbsp;&nbsp;&nbsp;&nbsp;称</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-nick" name="nick" lay-verify="title" autocomplete="off" placeholder="请输入用户名">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">登陆密码</label>
            <div class="layui-input-inline">
                <input type="password" class="layui-input" name="password" lay-verify="password" autocomplete="off" placeholder="******">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系邮箱</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-email" name="email" lay-verify="title" autocomplete="off" placeholder="请输入邮箱地址">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">联系手机</label>
            <div class="layui-input-inline">
                <input type="text" class="layui-input field-mobile" name="mobile" lay-verify="title" autocomplete="off" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor" name="content">CKEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">CKEditor</label>
            <div class="layui-input-block">
                <textarea id="ckeditor2" name="content">CKEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor1" name="content1">kindEditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">kindEditor</label>
            <div class="layui-input-block">
                <textarea id="kindeditor2" name="content2">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor1" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UEditor</label>
            <div class="layui-input-block">
                <textarea id="UEditor2" name="content3">kindEditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor1" name="UMditor1">UMditor 1</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">UMditor</label>
            <div class="layui-input-block">
                <textarea id="UMeditor2" name="UMditor2">UMditor 2</textarea>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状&nbsp;&nbsp;&nbsp;&nbsp;态</label>
            <div class="layui-input-inline">
                <input type="radio" class="field-status" name="status" value="1" title="启用">
                <input type="radio" class="field-status" name="status" value="0" title="禁用">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="hidden" class="field-id" name="id">
                <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
                <a href="<?php echo url('index'); ?>" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
            </div>
        </div>
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
<script>
/* 修改模式下需要将数据放入此变量 */
var formData = {"id":1,"role_id":1,"nick":"\u8d85\u7ea7\u7ba1\u7406\u5458","email":"chenf4hua12@qq.com","mobile":13888888888,"status":0};
// 会员选择回调函数
function func(data) {
    var $ = layui.jquery;
    $('input[name="member"]').val('['+data[0]['id']+']'+data[0]['username']);
}
layui.use(['upload'], function() {
    var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
    /**
     * 附件上传url参数说明
     * @param string $from 来源
     * @param string $group 附件分组,默认sys[系统]，模块格式：m_模块名，插件：p_插件名
     * @param string $water 水印，参数为空默认调用系统配置，no直接关闭水印，image 图片水印，text文字水印
     * @param string $thumb 缩略图，参数为空默认调用系统配置，no直接关闭缩略图，如需生成 500x500 的缩略图，则 500x500多个规格请用";"隔开
     * @param string $thumb_type 缩略图方式
     * @param string $input 文件表单字段名
     */
    upload.render({
        elem: '.layui-upload'
        ,url: '<?php echo url("admin/annex/upload?water=&thumb=&from=&group="); ?>'
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
            if ($(obj).attr('lay-type') == 'image') {
                input.siblings('img').attr('src', res.data.file).show();
            }
            input.val(res.data.file);
        }
    });
});
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
<?php echo editor(['UMeditor1', 'UMeditor2']); ?>
<?php echo editor(['kindeditor1', 'kindeditor2'], 'kindeditor'); ?>
<?php echo editor(['ckeditor', 'ckeditor2'], 'ckeditor'); ?>
<?php echo editor(['UEditor1', 'UEditor2'], 'ueditor'); ?>
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