<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>审核-报价</title>
</head>
<body>
<h3>报价</h3>
<table  border="1px solid " cellpadding="2" cellspacing="0" >
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">分类</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <td align="center">报价人</td>
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <td align="center">审核状态</td>
        <td align="center">是否过期</td>

        <td colspan="2" align="center">操作</td>

    </tr>
      <?php if(is_array($info)): foreach($info as $key=>$v): ?><tr>

           <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_id"]); ?></td>
           <td align="center"><?php echo ($v["offer_pro_name"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_pro_class"]); ?></td>
           <td align="center"><?php echo ($v["offer_price"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_p_size"]); ?></td>
           <td align="center"><a href="/mucaiwang/index.php/Admin/Check/offer_user/offer_user_id/<?php echo ($v["offer_user_id"]); ?>"><?php echo ($v["offer_user_name"]); ?></a></td>
           <td><textarea cols="20"><?php echo ($v["offer_description"]); ?></textarea></td>
           <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["offer_create_time"]);?></td>
           <td align="center"><?php echo date('Y-m-d',$v['offer_cut_time']);?></td>
           <td align="center"><?php echo ($v["offer_check"]); ?></td>
           <td align="center"><?php echo ($v["offer_status"]); ?></td>
           <td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Check/check/offer_id/<?php echo ($v["offer_id"]); ?>"><img src="<?php echo ADMIN_IMG_URL ?>2.jpg"/></a>&nbsp;&nbsp;</td>
           <!--<td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Check/check_delete"><img src="<?php echo ADMIN_IMG_URL ?>4.jpg"/></a>&nbsp;&nbsp;</td>-->

           <!--点下确认键之后，确定发送邮件-->
            <!--<td align="center">&nbsp;&nbsp;<a href="">发送邮件</a>>&nbsp;&nbsp;</td>-->

          </tr><?php endforeach; endif; ?>
    <!--<tr>-->
        <!--<td colspan="20" style="text-align: center;">-->
            <!--<?php echo ($pagelist); ?>-->
        <!--</td>-->
    <!--</tr>-->

</table>

</body>
</html>