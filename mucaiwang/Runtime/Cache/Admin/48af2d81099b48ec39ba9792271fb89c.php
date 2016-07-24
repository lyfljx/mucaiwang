<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>审核-报价</title>
</head>
<body>

<div style="boder:1px solid "><h4><a href="/mucaiwang/index.php/Admin/Offer/looklist">查看已审核</a></h4></div>
<table width="100%" border="1px solid " cellpadding="2" cellspacing="0" class="list">

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

        <td colspan="2" align="center">操作</td>


    </tr>


    <?php if(is_array($Offerinfo)): foreach($Offerinfo as $k=>$v): if(is_array($user_name)): foreach($user_name as $kk=>$vv): if($v['offer_check'] == 0 ): if($v['offer_user_id'] == $vv['user_id']): ?><!--当offer_user_id与user_id相等时，才会输出对应的变量-->
                    <tr>

                        <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_id"]); ?></td>
                        <td align="center"><?php echo ($v["offer_pro_name"]); ?></td>
                        <?php if(is_array($class)): foreach($class as $key=>$vvv): if($v['offer_id'] == $vvv['offer_id']): ?><td align="center" bgcolor="#7fffd4"><?php echo ($vvv["pro_pclass"]); ?></td>
                                <td align="center" bgcolor="#7fffd4"><?php echo ($vvv["pro_class"]); ?></td><?php endif; endforeach; endif; ?>

                        <td align="center"><?php echo ($v["offer_price"]); ?></td>
                        <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_p_size"]); ?></td>
                        <td align="center"><a href="/mucaiwang/index.php/Admin/Offer/lookuser/offer_user_id/<?php echo ($v["offer_user_id"]); ?>"><?php echo ($vv["user_name"]); ?></a>
                        </td>
                        <td align="center">
                            <?php if(in_array($v['offer_id'],$data) != 0): ?><a href="<?php echo U('Admin/Offer/buyList',array('offer_id'=>$v['offer_id']));?>">查看</a>
                                <?php else: ?>
                                暂无<?php endif; ?>

                        </td>
                        <td align="center">
                            <?php if($v['offer_description'] != null): ?><a href="<?php echo U('offerDesc',array(offer_id => $v['offer_id']));?>">查看</a>


                                <?php else: ?>

                                暂无<?php endif; ?>

                        </td>


                        <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["offer_create_time"]);?></td>
                        <td align="center"><?php echo date('Y-m-d',$v['offer_cut_time']);?></td>
                        <td align="center">
                            <?php if($v["offer_check"]==0): ?>未审核<?php endif; ?>
                            <?php if($v["offer_check"]==1): ?>已审核通过<?php endif; ?>
                            <?php if($v["offer_check"]==2): ?>已审核未通过<?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if($v["offer_status"] == 1 ): ?>未过期<?php endif; ?>
                            <?php if($v["offer_status"] == 2 ): ?>已过期<?php endif; ?>
                        </td>
                        <td align="center"><a href="/mucaiwang/index.php/Admin/Offer/check/offer_id/<?php echo ($v["offer_id"]); ?>/offer_check/1">允许发布</a>
                        </td>
                        <!--<td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Offer/check/offer_id/<?php echo ($v["offer_id"]); ?>/offer_check/1"><img src="<?php echo ADMIN_IMG_URL ?>2.jpg"/></a>&nbsp;&nbsp;</td>-->
                        <td align="center"><a href="/mucaiwang/index.php/Admin/Offer/check/offer_id/<?php echo ($v["offer_id"]); ?>/offer_check/2">拒绝发布</a>
                        </td>

                        <!--<td align="center">&nbsp;<a href="/mucaiwang/index.php/Admin/Offer/check_delete"><img src="<?php echo ADMIN_IMG_URL ?>4.jpg"/></a>&nbsp;&nbsp;</td>-->

                        <!--点下确认键之后，确定发送邮件-->
                        <!--<td align="center">&nbsp;&nbsp;<a href="">发送邮件</a>>&nbsp;&nbsp;</td>-->

                    </tr><?php endif; endif; endforeach; endif; endforeach; endif; ?>

    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>