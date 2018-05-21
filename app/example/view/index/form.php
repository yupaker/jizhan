<style type="text/css">
    .layui-form-select dl{z-index:9999;}
</style>
<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">新闻标题</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-title" name="title" lay-verify="required" autocomplete="off" placeholder="请填写新闻标题">
        </div>
        <div class="layui-form-mid layui-word-aux">必填项</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新闻分类</label>
        <div class="layui-input-inline w200">
            <select name="cid" class="field-cid" type="select" lay-verify="required">
                <option value="">请选择分类</option>
                {$category}
            </select>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">作者</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-author" name="author">
        </div>
        <div class="layui-form-mid layui-word-aux">选填</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">来源</label>
        <div class="layui-input-inline w200">
            <input type="text" class="layui-input field-source" name="source">
        </div>
        <div class="layui-form-mid layui-word-aux">选填</div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">封面图</label>
            <div class="layui-input-inline upload">
                <button type="button" name="img" class="layui-btn layui-btn-primary layui-upload" lay-type="image" lay-data="{accept:'image'}">请上传图片</button>
                <input type="hidden" class="upload-input field-img" name="img">
                {if condition="!empty($data_info['img'])"}
                <img src="{$data_info['img']}" style="border-radius:5px;border:1px solid #ccc" width="36" height="36">
                {else /}
                <img src="" style="display:none;border-radius:5px;border:1px solid #ccc" width="36" height="36">
                {/if}
            </div>
            <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">新闻内容</label>
        <div class="layui-input-block" style="overflow:hidden;padding:0 10px 0 0">
            <textarea id="content" name="content" class="field-content"></textarea>
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
        ,url: '{:url("admin/annex/upload?water=&thumb=&from=&group=")}'
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
{:editor(['content'])}
<script src="__ADMIN_JS__/footer.js"></script>
<!--如果默认编辑器是 KindEditor 请将上面两行代码对换位置-->