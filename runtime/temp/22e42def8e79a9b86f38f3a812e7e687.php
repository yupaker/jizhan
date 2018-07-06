<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:37:"theme\example\default\index\index.php";i:1530240845;}*/ ?>
<?php defined("IN_SYSTEM") or die("Access Denied");//防止模板被盗?>
<!DOCTYPE html>
<html>
<head>
<link href="/theme/example/default/static/css/min.css" rel="stylesheet" type="text/css" title="当前模块CSS文件调用"  />
<script src="/static/js/jquery.2.1.4.min.js" title="公共JS文件调用"></script>
<script src="/theme/example/default/static/js/js.js" title="当前模块JS文件调用"></script>
</head>
<body>
<div style="width:1000px;margin:50px auto;">
    <h1 style="text-align:center;">前台首页示例模板</h1>
    <div style="float:left;background-color:#f5f5f5;width:760px;padding:20px;height:600px;">
        <h3>资讯列表</h3>
        <ul>
            <?php if(is_array($data['news']) || $data['news'] instanceof \think\Collection || $data['news'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['news'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><a href="/show?id=<?php echo $vo['id']; ?>"><?php echo $vo['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
    <div style="float:right;background-color:#d5d5d5;width:180px;padding:20px 10px;height:600px;">
        <h3>资讯分类</h3>
        <ul>
            <?php if(is_array($data['category']) || $data['category'] instanceof \think\Collection || $data['category'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['category'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li><a href="/?cid=<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
</body>
</html>