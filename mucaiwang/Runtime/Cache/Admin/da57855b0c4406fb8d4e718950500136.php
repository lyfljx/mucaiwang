<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="/mucaiwang/index.php/Admin/Offer/offerlist"><h4>返回</h4></a></div>

<form>
    <fieldset>
        <legend><strong><?php echo ($z["user_name"]); ?></strong></legend>
        <table width="60%" border="1px dashed" cellpadding="1" cellspacing="0" style="line-height: 25px">

            <tr>
                <td align="center">报价人人</td>
                <td align="center"><?php echo ($z["user_name"]); ?></td>
            </tr>
            <tr>
                <td align="center">公司</td>

                <td align="center" bgcolor="#7fffd4"><a href="/mucaiwang/index.php/Admin/Offer/showCom/com_id/<?php echo ($z["com_id"]); ?>"><?php echo ($info["com_name"]); ?></a>
                </td>

            </tr>
            <tr>
                <td align="center">邮箱</td>
                <td align="center"><?php echo ($z["user_email"]); ?></td>
            </tr>
            <tr>
                <td align="center">报价人</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_true_name"]); ?></td>
            </tr>
            <tr>
                <td align="center">职位</td>
                <td align="center"><?php echo ($z["user_job"]); ?></td>
            </tr>
            <tr>
                <td align="center">电话</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_phone"]); ?></td>
            </tr>

            <tr>
                <td align="center">QQ</td>
                <td align="center"><?php echo ($z["user_qq"]); ?></td>
            </tr>
            <tr>
                <td align="center">固定电话</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_fixed_phone"]); ?></td>
            </tr>

            <tr>
                <td align="center">信誉度</td>
                <td align="center">
                    <?php if($credit['credit'] > 0 ): echo ($credit["credit"]); ?>%

                        <?php else: ?>

                        暂无<?php endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center">成功率</td>
                <td align="center">
                    <?php if($credit['sRate'] > 0): echo ($credit["sRate"]); ?>%

                        <?php else: ?>

                        暂无<?php endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center">平均分：</td>
                <td align="center">
                    <?php if($credit['avg'] > 0): echo ($credit["avg"]); ?>

                        <?php else: ?>

                        暂无<?php endif; ?>
                </td>
            </tr>


            <tr>
                <td align="center">评论</td>
                <td align="center" bgcolor="#7fffd4">

                    <a href="<?php echo U('Admin/Offer/showDesc',array(user_id=> $z['user_id']));?>">查看评论</a>

                </td>
            </tr>


            <div style="display: inline;float: right;width: 38%; height:267px;border: 1px solid beige">

            </div>
        </table>
    </fieldset>
</form>

</body>
</html>