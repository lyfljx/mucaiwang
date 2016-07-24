<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>审核-报价</title>
</head>
<body>
<div><a href="/mucaiwang/index.php/Admin/Offer/looklist"><h4>返回</h4></a></div>
<table width="100%" border="1px solid " cellpadding="2" cellspacing="0">
    <!--查看已审核的订单-->
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">分类1</td>
        <td align="center">分类2</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <td align="center">报价人</td>
        <td align="center">求购人</td>
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <td align="center">审核状态</td>
        <td align="center">是否过期</td>

        <!--<td colspan="2" align="center">操作</td>-->

    </tr>

    <?php if(is_array($info)): foreach($info as $k=>$v): if(is_array($user)): foreach($user as $key=>$vv): ?><!--//这样更加确定了对应的表单里面的名称是注册表中的名称-->
            <?php if( $v['offer_user_id'] == $vv['user_id']): ?><tr>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_id"]); ?></td>
                    <td align="center"><?php echo ($v["offer_pro_name"]); ?></td>
                    <!--遍历数组取得对应offer_id的分类-->
                    <?php if(is_array($class)): foreach($class as $key=>$vvv): if($vvv['offer_id'] == $v['offer_id']): ?><td align="center" bgcolor="#7fffd4"><?php echo ($vvv["pro_pclass"]); ?></td>
                            <td align="center" bgcolor="#7fffd4"><?php echo ($vvv["pro_class"]); ?></td><?php endif; endforeach; endif; ?>

                    <td align="center"><?php echo ($v["offer_price"]); ?></td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_p_size"]); ?></td>
                    <td align="center"><a
                            href="/mucaiwang/index.php/Admin/Offer/lookuser/offer_user_id/<?php echo ($v["offer_user_id"]); ?>"><?php echo ($vv["user_name"]); ?></a></td>
                    <!--每一次的循环中，其实$v['offer_id']在$data数组中遍历了全部的元素，有就会输出true，没有就会输出false-->
                    <td align="center">
                        <?php if(in_array($v['offer_id'],$data) == 0): ?>暂无<?php endif; ?>
                        <?php if(in_array($v['offer_id'],$data) != 0): ?><a
                                href="/mucaiwang/index.php/Admin/Offer/buyList/offer_id/<?php echo ($v["offer_id"]); ?>">查看</a><?php endif; ?>
                    </td>

                    <td align="center">
                        <?php if($v['offer_description'] != null): ?><a href="<?php echo U('offerDesc',array(offer_id => $v['offer_id']));?>">查看</a>


                            <?php else: ?>

                            暂无<?php endif; ?>

                    </td>


                    <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["offer_create_time"]);?></td>
                    <td align="center"><?php echo date('Y-m-d',$v['offer_cut_time']);?></td>
                    <td align="center">
                        <?php if($v["offer_check"]==1): ?>已审核通过<?php endif; ?>
                    </td>

                    <td align="center">
                        <?php if($v["offer_status"] == 1 ): ?>未过期<?php endif; ?>
                        <?php if($v["offer_status"] == 2 ): ?>已过期<?php endif; ?>
                    </td>
                    <!--<td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Offer/check/offer_id/<?php echo ($v["offer_id"]); ?>">发送邮件</a>&nbsp;&nbsp;</td>-->
                    <!--<td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Offer/check_delete"><img src="<?php echo ADMIN_IMG_URL ?>4.jpg"/></a>&nbsp;&nbsp;</td>-->

                    <!--点下确认键之后，确定发送邮件-->
                    <!--<td align="center">&nbsp;&nbsp;<a href="">发送邮件</a>>&nbsp;&nbsp;</td>-->
                    <!--<img src="<?php echo ADMIN_IMG_URL ?>2.jpg"/>--><?php endif; ?>
            </tr><?php endforeach; endif; endforeach; endif; ?>
    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>