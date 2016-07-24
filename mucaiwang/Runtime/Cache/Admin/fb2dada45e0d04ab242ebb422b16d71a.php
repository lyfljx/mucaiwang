<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="/mucaiwang/index.php/Admin/Offer/looklist"><h4>返回</h4></a></div>
<?php if(is_array($buyinfo)): foreach($buyinfo as $kk=>$vv): ?><form>
        <fieldset>
            <legend><strong><?php echo ($vv["user_name"]); ?></strong></legend>
            <table width="60%" border="1px dashed" cellpadding="1" cellspacing="0" style="line-height: 20px">

                <!--这是一个四维数组-->
                <tr>
                    <td align="center">求购人</td>
                    <td align="center"><?php echo ($vv["user_name"]); ?></td>
                </tr>
                <tr>
                    <td align="center">公司名称</td>

                    <td align="center" bgcolor="#7fffd4"><a
                            href="/mucaiwang/index.php/Admin/Offer/showCom/com_id/<?php echo ($vv["com_id"]); ?>"><?php echo ($vv["com_name"]); ?></a></td>

                </tr>
                <tr>
                    <td align="center">邮箱</td>
                    <td align="center"><?php echo ($vv["user_email"]); ?></td>
                </tr>
                <tr>
                    <td align="center">求购人</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_true_name"]); ?></td>
                </tr>
                <tr>
                    <td align="center">职位</td>
                    <td align="center"><?php echo ($vv["user_job"]); ?></td>
                </tr>
                <tr>
                    <td align="center">电话</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_phone"]); ?></td>
                </tr>
                <tr>
                    <td align="center">邮件状态</td>
                    <?php if(is_array($offerinfo)): foreach($offerinfo as $key=>$v): if($v['buyer_id'] == $vv['user_id']): ?><td align="center">

                                <?php if($v['email'] == 0): ?>未发邮件

                                    <?php elseif($v['email'] == 2): ?>
                                    未通过

                                    <?php else: ?>
                                    已发邮件<?php endif; ?>
                                <!--<?php if($v['email'] != 1): ?>未发邮件<?php endif; ?>-->

                            </td><?php endif; endforeach; endif; ?>
                </tr>
                <tr>
                    <td align="center">QQ</td>
                    <td align="center"><?php echo ($vv["user_qq"]); ?></td>
                </tr>
                <tr>
                    <td align="center">固定电话</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_fixed_phone"]); ?></td>
                </tr>
                <tr>
                    <td align="center">报价：</td>
                    <td align="center">
                        <?php if($vv['price'] != null): echo ($vv["price"]); ?>
                            <?php else: ?>

                            暂无<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center">成功率：</td>
                    <td align="center">
                        <?php if($vv['rate'] > 0): echo ($vv["rate"]); ?>%

                            <?php else: ?>
                            暂无<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center">信誉度：</td>
                    <td align="center">
                        <?php if($vv['credit'] > 0): echo ($vv["credit"]); ?>%

                            <?php else: ?>
                            暂无<?php endif; ?>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td align="center">平均分：</td>
                    <td align="center">
                        <?php if($vv['avg'] > 0): echo ($vv["avg"]); ?>

                            <?php else: ?>
                            暂无<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center">操作</td>
                    <td align="center">

                        <a
                                href="/mucaiwang/index.php/Admin/Offer/sendMailer/offer_id/<?php echo ($offer_id); ?>/buyer_id/<?php echo ($vv["user_id"]); ?>/status/1">发送邮件</a>
                        <a
                                href="/mucaiwang/index.php/Admin/Offer/sendMailer/offer_id/<?php echo ($offer_id); ?>/buyer_id/<?php echo ($vv["user_id"]); ?>/status/0">未通过</a>

                    </td>
                </tr>
                <tr>
                    <td align="center">评论：</td>
                    <!--<td align="center"><a href="/mucaiwang/index.php/Admin/Offer/showDesc/buyer_id/<?php echo ($v["buyer_id"]); ?>">查看评论</a></td>-->
                    <td align="center"><a href="/mucaiwang/index.php/Admin/Offer/showDesc/user_id/<?php echo ($v["buyer_id"]); ?>">查看评论</a></td>

                </tr>


                <!--<tr>-->
                <!--<td colspan="20" style="text-align: center;">-->
                <!--<?php echo ($pagelist); ?>-->
                <!--</td>-->
                <!--</tr>-->
                <div style="display: inline;float: right;width: 38%; height:267px;border: 1px solid beige">

                </div>
            </table>
        </fieldset>
    </form>

    <!--<td align="center"></td>-->
    <!--<td align="center" bgcolor="#7fffd4"><a href="/mucaiwang/index.php/Admin/Com_desc/desc/offer_id/<?php echo ($offer_id); ?>">查看评价</a></td>-->
    <!--</tr>--><?php endforeach; endif; ?>
</body>
</html>