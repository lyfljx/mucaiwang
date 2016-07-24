<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="/mucaiwang/index.php/Admin/Buy/offerlist"><h4>返回</h4></a></div>
<table width="100%" border="1px dashed" cellpadding="2" cellspacing="0">
    <tr>
        <td align="center">报价人id</td>
        <td align="center">公司id</td>
        <td align="center">邮箱</td>
        <td align="center">报价人</td>
        <td align="center">职位</td>
        <td align="center">电话</td>
        <td align="center">QQ</td>
        <td align="center">固定电话</td>

        <td colspan="1" align="center">操作</td>
        <!--<td align="center">查看记录</td>-->

    </tr>
    <tr>
        <td align="center"><?php echo ($z["user_id"]); ?></td>
        <td align="center" bgcolor="#7fffd4"><a href="/mucaiwang/index.php/Admin/Buy/showCom/com_id/<?php echo ($z["com_id"]); ?>"><?php echo ($info["com_name"]); ?></a>
        </td>
        <td align="center"><?php echo ($z["user_email"]); ?></td>
        <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_true_name"]); ?></td>
        <td align="center"><?php echo ($z["user_job"]); ?></td>
        <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_phone"]); ?></td>
        <td align="center"><?php echo ($z["user_qq"]); ?></td>
        <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_fixed_phone"]); ?></td>
        <td align="center"><a href="">发送邮件</a></td>
    </tr>

    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>