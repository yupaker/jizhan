<div class="page-toolbar">
    <div class="page-filter fr">
        <form class="layui-form layui-form-pane" action="{:url()}" method="get">
        <div class="layui-form-item">
            <label class="layui-form-label">搜索</label>
            <div class="layui-input-inline">
                <input type="text" name="keywords" lay-verify="required" placeholder="请输入关键词搜索" autocomplete="off" class="layui-input">
            </div>
        </div>
        </form>
    </div>
    <div class="layui-btn-group fl">
        <a href="{:url('status?table=yupaker_comments&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>通过</a>
        <a href="{:url('status?table=yupaker_comments&val=2')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>驳回</a>
        <a href="{:url('del?table=yupaker_comments')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<form id="pageListForm">
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <thead>
            <tr>
                <th width="50"><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th width="100">姓名</th>
                <th>内容</th>
                <th width="230">文章</th>
                <th width="80">时间</th>
                <th width="60">状态</th>
                <th width="120">操作</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="list" id="vo"}
            <tr>
                <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="{$vo['id']}" lay-skin="primary"> {$vo['id']}</td>
                <td><img src="{if condition="$vo.qq eq '' "}__ADMIN_IMG__/gravatar.png{else /}https://q1.qlogo.cn/g?b=qq&nk={$vo.qq}&s=100{/if}" style="border-radius:50%;border:1px solid #ccc; float:left;" width="36" height="36">{$vo['nickname']}</td>
                <td>{if condition="$vo.reid neq 0"}回复给<blue>{$vo.rename}</blue>：{/if}{$vo['content']|msubstr=0,100}</td>
                <td>
                    <a href="{:url('news/edit','id='.$vo['newsid'])}" class="shenglue w200" style="float:left;">{$vo.newstitle}</a>
                    <a href="{:url('comments/index','newsid='.$vo['newsid'])}"><green>({$vo.newsnum})</green></a>
                </td>
                <td>{$vo.addtime|date='Y-m-d H:i:s',###}</td>
                <td><input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="通过|审核" data-href="{:url('status?table=yupaker_comments&ids='.$vo['id'])}"></td>
                <td>
                    <div class="layui-btn-group">
                        <a href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                        <a data-href="{:url('del?table=yupaker_comments&ids='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </td>
            </tr>
            {/volist}
        </tbody>
    </table>
    {$pages}
</div>
</form>
{include file="admin@block/layui" /}