<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table class="table_a" border="1" width="100%" cellpadding="5" cellspacing="0">
    <tbody>
    <tr style="font-weight: bold;" bgcolor="#cccccc">
        <td>序号</td>
        <td>公司id</td>
        <td>子分类id</td>

    </tr>

    <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr id="product1">
            <td><a href="#"> <?php echo ($v["pro_id"]); ?> </a></td>
            <td><?php echo ($v["com_id"]); ?></td>
            <td><?php echo ($v["pro_class_id"]); ?></td>

        </tr><?php endforeach; endif; ?>

    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>