<style type="text/css">
    .layui-form-select dl{z-index:9999;}
</style>
<form class="layui-form layui-form-pane" action="{:url()}" method="post" id="editForm">
<div class="page-form">
    <div class="layui-form-item">
        <label class="layui-form-label">文章</label>
        <div class="layui-input-inline w500">
            <div class="layui-input"><a class="shenglue">{$data.newstitle}</a></div>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    {if condition="$data.reid neq 0"}
    <div class="layui-form-item">
        <label class="layui-form-label">回复给</label>
        <div class="layui-input-inline w500">
            <div class="layui-input"><a href="{:url('edit?id='.$data['reid'])}" class="shenglue">{$data.rename}</a></div>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    {/if}
    <div class="layui-form-item">
        <label class="layui-form-label">内容</label>
        <div class="layui-input-block" style="overflow:hidden;padding:0 10px 0 0">
            <div class="layui-textarea">{$data.content}</div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-inline w200">
            <div class="layui-input">{$data.nickname}</div>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">QQ</label>
        <div class="layui-input-inline w200">
            <div class="layui-input" style="width:150px; float:left; margin-right:10px;">{$data.qq}</div>
            <img src="{if condition="$data.qq eq '' "}__ADMIN_IMG__/gravatar.png{else /}https://q1.qlogo.cn/g?b=qq&nk={$data.qq}&s=100{/if}" style="border-radius:50%;border:1px solid #ccc; float:left;" width="36" height="36">
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">时间</label>
        <div class="layui-input-inline w200">
            <div class="layui-input">{$data.addtime|date='Y-m-d H:i:s',###}</div>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">IP</label>
        <div class="layui-input-inline w200">
            <div class="layui-input">{$data.ip}</div>
        </div>
        <div class="layui-form-mid layui-word-aux"></div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">状态设置</label>
        <div class="layui-input-inline w500">
            <input type="radio" class="field-status" name="status" value="0" title="未审核" checked>
            <input type="radio" class="field-status" name="status" value="1" title="通过">
            <input type="radio" class="field-status" name="status" value="2" title="驳回">
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
var formData = {:json_encode($data)};
</script>
<script src="__ADMIN_JS__/footer.js"></script>
{:editor(['content'],'kindeditor')}
<!--如果默认编辑器是 KindEditor 请将上面两行代码对换位置-->