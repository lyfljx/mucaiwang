<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--<h5>>>>我的求购</h5>-->
<!--<div><a href="/mucaiwang//index.php/Home/Offer/offerlist/offer_user_id/<?php echo (session('home_id')); ?>"><h4>返回</h4></a></div>-->
<table width="100%" border="1px dashed" cellpadding="2" cellspacing="0">
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">分类</td>
        <td align="center">分类</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <td align="center">报价人</td>
        <!--<td align="center">求购人</td>-->
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <!--<td align="center">审核状态</td>-->
        <td align="center">是否过期</td>

        <!--<td colspan="1" align="center">操作</td>-->
        <!--<td align="center">查看记录</td>-->

    </tr>
    <?php if(is_array($offerInfo)): foreach($offerInfo as $key=>$v): ?><!--//整数之间的比较，时间戳就是一个int类型整数-->
        <?php if(is_array($classinfo)): foreach($classinfo as $key=>$vv): if($v['offer_id'] == $vv['offer_id']): ?><tr>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_id"]); ?></td>
                    <td align="center"><?php echo ($v["offer_pro_name"]); ?></td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($vv["pro_pclass"]); ?></td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($vv["pro_class"]); ?></td>
                    <td align="center"><?php echo ($v["offer_price"]); ?></td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_p_size"]); ?></td>

                    <td align="center">
                        <?php if($email[$v['offer_id']] == 1): ?><a href="/mucaiwang//index.php/Home/Offer/lookUser/offer_user_id/<?php echo ($v["offer_user_id"]); ?>/offer_id/<?php echo ($v["offer_id"]); ?>"><?php echo ($v["user_name"]); ?></a>

                            <?php elseif($email[$v['offer_id']] == 2): ?>
                            未审核

                            <?php else: ?>
                            未审核<?php endif; ?>
                    </td>
                    <!--<td align="center"><a href="/mucaiwang//index.php/Home/Offer/buyList/offer_id/<?php echo ($v["offer_id"]); ?>">查看</a></td>-->
                    <!--<td align="center"><textarea cols="20"><?php echo ($v["offer_description"]); ?></textarea></td>-->

                    <td align="center">
                        <?php if($v['offer_description'] != null): ?><a href="<?php echo U('offerDesc',array(offer_id => $v['offer_id']));?>">查看</a>

                            <?php else: ?>

                            暂无<?php endif; ?>

                    </td>
                    <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["offer_create_time"]);?></td>
                    <td align="center"><?php echo date('Y-m-d',$v['offer_cut_time']);?></td>
                    <!--<td align="center"><?php echo ($v["offer_check"]); ?></td>-->
                    <!--<td align="center">-->
                        <!--<?php if($v["offer_check"]==0): ?>未审核<?php endif; ?>-->
                        <!--<?php if($v["offer_check"]==1): ?>已审核通过<?php endif; ?>-->
                        <!--<?php if($v["offer_check"]==2): ?>已审核未通过<?php endif; ?>-->
                    <!--</td>-->
                    <td align="center">

                        <?php if( NOW_TIME < $v['offer_cut_time']): ?>未过期<?php endif; ?>
                        <?php if( NOW_TIME > $v['offer_cut_time']): ?>已过期<?php endif; ?>
                        <!--<?php if($v["offer_status"] == 1 ): ?>未过期<?php endif; ?>-->
                        <!--<?php if($v["offer_status"] == 0 ): ?>已过期<?php endif; ?>-->
                        <!--<?php if($v['offer_cut_time'] < NOW_TIME ){ echo 1; }else{echo 1;}?>-->
                    </td>
                    <!--<td align="center">&nbsp;<a href="/mucaiwang//index.php/Home/Offer/alterOffer/offer_id/<?php echo ($v["offer_id"]); ?>">修改</a>&nbsp;&nbsp;</td>-->

                </tr><?php endif; endforeach; endif; endforeach; endif; ?>

    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>