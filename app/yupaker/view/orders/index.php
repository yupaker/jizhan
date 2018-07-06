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
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=yupaker_orders&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>进行中</a>
        <a href="{:url('status?table=yupaker_orders&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>完成</a>
        <a href="{:url('del?table=yupaker_orders')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
    </div>
</div>
<form id="pageListForm">
<div class="layui-form">
    <table class="layui-table mt10" lay-even="" lay-skin="row">
        <colgroup>
            <col width="50">
        </colgroup>
        <thead>
            <tr>
                <th width="50"><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>订单号</th>
                <th>会员ID</th>
                <th>时间</th>
                <th>总价格</th>
                <th>付款方式</th>
                <th>付款状态</th>
                <th>订单状态</th>
                <th>IP</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
            {volist name="list" id="vo"}
            <tr>
                <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="{$vo['id']}" lay-skin="primary"> {$vo['id']}</td>
                <td>{$vo['orderno']}</td>
                <td>{$vo['memid']}</td>
                <td>{$vo['addtime']|date='Y-m-d H:i:s',###}</td>
                <td>￥{$vo['price']}</td>
                <td>{$vo['payname']}</td>
                <td>{$vo['paytype']}</td>
                <td>{$vo['status']}</td>
                <td>{$vo['ip']}</td>
                <td>
                    <div class="layui-btn-group">
                        <a href="{:url('view?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small">查看</a>
                        <a data-href="{:url('del?table=yupaker_orders&ids='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                    </div>
                </td>
            </tr>
            {/volist}
            {empty name="list"}
            <tr>
            	<td colspan="10">暂无数据</td>
            </tr>
            {/empty}
        </tbody>
    </table>
    {$pages}
</div>
</form>
{include file="admin@block/layui" /}