<div class="page-toolbar">
    <div class="layui-btn-group fl">
        <a href="{:url('add')}" class="layui-btn layui-btn-primary"><i class="aicon ai-tianjia"></i>添加</a>
        <a href="{:url('status?table=yupaker_newscategory&val=1')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-qiyong"></i>启用</a>
        <a href="{:url('status?table=yupaker_newscategory&val=0')}" class="layui-btn layui-btn-primary j-page-btns"><i class="aicon ai-jinyong1"></i>禁用</a>
        <a href="{:url('del?table=yupaker_newscategory')}" class="layui-btn layui-btn-primary j-page-btns confirm"><i class="aicon ai-jinyong"></i>删除</a>
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
                <th><input type="checkbox" lay-skin="primary" lay-filter="allChoose"></th>
                <th>名称</th>
                <th>标识</th>
                <th>状态</th>
                <th>操作</th>
            </tr> 
        </thead>
        <tbody>
        {php}
            function temp_tree($data, $level = 0) {
                $separ = '';
                if ($level > 0) {
                    for ($i=0; $i < $level; $i++) {
                        $separ .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                    }
                    $separ .= '┣&nbsp;';
                }
                foreach($data as $k => $vo) {
        {/php}
                    <tr>
                        <td><input type="checkbox" name="ids[]" class="layui-checkbox checkbox-ids" value="{$vo['id']}" lay-skin="primary"></td>
                        <td>{$separ}{$vo['title']}</td>
                        <td>{$vo['code']}</td>
                        <td><input type="checkbox" name="status" {if condition="$vo['status'] eq 1"}checked=""{/if} value="{$vo['status']}" lay-skin="switch" lay-filter="switchStatus" lay-text="正常|关闭" data-href="{:url('status?table=yupaker_newscategory&ids='.$vo['id'])}"></td>
                        <td>
                            <div class="layui-btn-group">
                                <a href="{:url('edit?id='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small"><i class="layui-icon">&#xe642;</i></a>
                                <a data-href="{:url('del?table=yupaker_newscategory&ids='.$vo['id'])}" class="layui-btn layui-btn-primary layui-btn-small j-tr-del"><i class="layui-icon">&#xe640;</i></a>
                            </div>
                        </td>
                    </tr>
        {php}
                    if (isset($vo['childs'])) {
                        echo temp_tree($vo['childs'], $level + 1);
                    }
                }
            }
            echo temp_tree($list);
        {/php}
        </tbody>
    </table>
</div>
</form>
{include file="admin@block/layui" /}