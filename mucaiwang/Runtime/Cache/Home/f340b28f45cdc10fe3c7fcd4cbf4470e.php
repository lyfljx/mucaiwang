<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--<div><a href=""><h4>返回</h4></a></div>-->
<table width="100%" border="1px dashed" cellpadding="2" cellspacing="0">
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">分类1</td>
        <td align="center">分类2</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <!--<td align="center">报价人</td>-->
        <td align="center">求购人</td>
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <td align="center">审核状态</td>
        <td align="center">是否过期</td>
        <td colspan="1" align="center">操作</td>
        <!--<td align="center">查看记录</td>-->
    </tr>
    <!--//整数之间的比较，时间戳就是一个int类型整数-->
    <?php if(is_array($Offerinfo)): foreach($Offerinfo as $key=>$v): if(is_array($offerClass)): foreach($offerClass as $key=>$vv): ?><!--遍历得到对应的分类-->
            <?php if($vv['offer_id'] == $v['offer_id']): if( $v['offer_check'] != 0 ): ?><tr>
                        <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_id"]); ?></td>
                        <td align="center"><?php echo ($v["offer_pro_name"]); ?></td>
                        <td align="center" bgcolor="#7fffd4"><?php echo ($vv["pro_pclass"]); ?></td>
                        <td align="center" bgcolor="#7fffd4"><?php echo ($vv["pro_class"]); ?></td>
                        <td align="center"><?php echo ($v["offer_price"]); ?></td>
                        <td align="center" bgcolor="#7fffd4"><?php echo ($v["offer_p_size"]); ?></td>
                        <!--<td align="center"> 报价人-->
                        <!--<a href="/mucaiwang//index.php/Home/Offer/lookUser/offer_user_id/<?php echo ($v["offer_user_id"]); ?>/offer_id/<?php echo ($v["offer_id"]); ?>"><?php echo ($user["user_name"]); ?></a>-->
                        <!--&lt;!&ndash;<a href="/mucaiwang//index.php/Home/Offer/lookUser/offer_user_id/<?php echo ($v["offer_user_id"]); ?>"><?php echo ($user["user_name"]); ?></a>&ndash;&gt;-->

                        <!--</td>-->
                        <td align="center">
                            <?php if(in_array($v['offer_id'],$data) == 0): ?>暂无<?php endif; ?>
                            <?php if(in_array($v['offer_id'],$data) != 0): ?><a href="/mucaiwang//index.php/Home/Offer/buyList/offer_id/<?php echo ($v["offer_id"]); ?>">查看</a><?php endif; ?>
                        </td>

                        <td align="center">
                            <?php if($v['offer_description'] != null): ?><a href="<?php echo U('offerDesc',array(offer_id => $v['offer_id']));?>">查看</a>

                                <?php else: ?>

                                暂无<?php endif; ?>

                        </td>
                        <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["offer_create_time"]);?></td>
                        <td align="center"><?php echo date('Y-m-d',$v['offer_cut_time']);?></td>
                        <!--<td align="center"><?php echo ($v["offer_check"]); ?></td>-->
                        <td align="center">
                            <?php if($v["offer_check"]==0): ?>未审核<?php endif; ?>
                            <?php if($v["offer_check"]==1): ?>已审核通过<?php endif; ?>
                            <?php if($v["offer_check"]==2): ?>已审核未通过<?php endif; ?>
                        </td>
                        <td align="center">
                            <!--<?php if($v['offer_cut_time'] < NOW_TIME ){ echo 1; }else{echo 0;}?>-->
                            <?php if($v["offer_status"] == 1 ): ?>未过期<?php endif; ?>
                            <?php if($v["offer_status"] == 2 ): ?>已过期<?php endif; ?>
                            <!--<?php if($v['offer_cut_time'] != NOW_TIME ): ?>1<?php endif; ?>-->
                        </td>
                        <td align="center">&nbsp;<a href="/mucaiwang//index.php/Home/Offer/alterOffer/offer_id/<?php echo ($v["offer_id"]); ?>">修改</a>&nbsp;&nbsp;
                        </td>
                        <!--点下确认键之后，确定发送邮件-->
                        <!--<td align="center">&nbsp;&nbsp;<a href="">发送邮件</a>>&nbsp;&nbsp;</td>-->
                        <!--<td align="center"><a href="/mucaiwang//index.php/Home/Offer/lookOffer/offer_user_id/<?php echo (session('home_id')); ?>">查看过期记录</a> </td>-->
                    </tr><?php endif; endif; endforeach; endif; endforeach; endif; ?>
    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>