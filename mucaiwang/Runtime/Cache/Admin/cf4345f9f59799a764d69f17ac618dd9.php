<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
    <link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_CSS_URL); ?>public.css" />
</head>
<body>
<!--<h1>添加分类</h1>-->

<!--<table width="70%" border="1" cellpadding="2" cellspacing="0" bgcolor="#cccccc">-->
<!--<tr><th>父分类</th><th>父分类</th><th>父分类</th></tr>-->
<!--&lt;!&ndash;<tr>&ndash;&gt;-->
<!--&lt;!&ndash;<td>分类ID</td>&ndash;&gt;-->
<!--&lt;!&ndash;<td>父类名称</td>&ndash;&gt;-->
<!--&lt;!&ndash;<td>子类名称</td>&ndash;&gt;-->
<!--&lt;!&ndash;<td>创建时间</td>&ndash;&gt;-->
<!--&lt;!&ndash;<td colspan="2">操作</td>&ndash;&gt;-->
<!--&lt;!&ndash;</tr>&ndash;&gt;-->
<!--&lt;!&ndash;判断info是否为空&ndash;&gt;-->
<!--<?php if(!empty($pro)): ?>-->
<!--<?php if(is_array($pro)): foreach($pro as $key=>$v): ?>-->
<!--&lt;!&ndash;v.数据表的名字&ndash;&gt;-->
<!--<?php if(is_array($v["pro_class"])): foreach($v["pro_class"] as $k=>$vv): ?>-->
<!--<tr>-->
<!--&lt;!&ndash;<?php if(is_array($vv)): foreach($vv as $key=>$iv): ?>&ndash;&gt;-->
<!--<?php if(($k == 0)): ?>-->
<!--<td rowspan="<?php echo (count($v["pro_class"])); ?>"><?php echo ($v["pro_pclass"]); ?></td>-->
<!--<?php endif; ?>-->

<!--<td align="left"><?php echo ($vv["pro_class"]); ?></td>-->
<!--&lt;!&ndash;<td align="left"><?php echo ($v["pro_pclass_id"]); ?></td>&ndash;&gt;-->

<!--&lt;!&ndash;<td align="left">子分类</td>&ndash;&gt;-->
<!--</tr>-->
<!--&lt;!&ndash;<td colspan="5"><input type="submit" value="添加分类"/></td>&ndash;&gt;-->
<!--&lt;!&ndash;<?php endforeach; endif; ?>&ndash;&gt;-->
<!--<?php endforeach; endif; ?>-->
<!--<?php endforeach; endif; ?>-->
<!--<?php else: ?>-->
<!--<tr><td>查询的结果不存在！！</td></tr>-->
<!--<?php endif; ?>-->


<!--</table>-->
<table class="table" >
    <tr style="background-color: #e8e8e8">
        <!--<th>id</th>-->
        <td align="center">父分类</td>
        <td align="center">子分类</td>
         <td align="center">操作</td>

    </tr>

    <?php if(is_array($pro)): foreach($pro as $key=>$v): if(is_array($v["pro_class"])): foreach($v["pro_class"] as $k=>$vv): ?><tr>
                <!--<td><?php echo ($v["pro_pclass_id"]); ?></td>-->
                <?php if(($k == 0)): ?><td rowspan="<?php echo (count($v["pro_class"])); ?>" align="center"><?php echo ($v["pro_pclass"]); ?></td><?php endif; ?>
                <td align="center"><?php echo ($vv["pro_class"]); ?></td>
                <td align="center"><a href="#">编辑</a> <a href="/mucaiwang/index.php/Admin/Pro/delcate/pro_pclass_id/<?php echo ($v["pro_pclass_id"]); ?>/pro_class_id/<?php echo ($vv["pro_class_id"]); ?>">删除</a></td>
            </tr><?php endforeach; endif; endforeach; endif; ?>
</table>
</body>
</html>