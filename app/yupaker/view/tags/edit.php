<style type="text/css">
    .layui-form-select dl{z-index:9999;}
</style>
<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">标签名称</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请填写分类名称">
        </div>
        <div class="layui-form-mid layui-word-aux red">必填项，名称中禁止出现英文逗号：  “,”</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline">
            <input type="radio" class="field-status" name="status" value="1" title="启用" checked>
            <input type="radio" class="field-status" name="status" value="0" title="禁用">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</div>
</form>
{include file="admin@block/layui" /}
<script>
var formData = {:json_encode($data_info)};
</script>
<script src="__ADMIN_JS__/footer.js"></script>