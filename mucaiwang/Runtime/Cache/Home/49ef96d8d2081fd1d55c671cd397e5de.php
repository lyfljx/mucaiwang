<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报价</title>
</head>
<body>
<h2>公司</h2>
<form action="/mucaiwang//index.php/Home/Offer/showCom/com_id/1" method="post">
    <table width="70%" border="2" cellpadding="3" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time" value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id" value="<?php echo (session('user_id')); ?>">
        <tr>
            <td align="right">公司名字：&nbsp;</td>
            <td align="center"><?php echo ($info["com_name"]); ?></td>

        </tr>
        <tr>
            <td align="right">公司属性：&nbsp;</td>
            <td align="center"><?php echo ($info["attribute"]); ?></td>
        </tr>
        <tr>
            <td align="right">所属行业：&nbsp;</td>
            <td align="center"><?php echo ($info["trade"]); ?></td>
        </tr>
        <tr>
            <td align="right">经营地址：&nbsp;</td>
            <td align="center"><?php echo ($info["com_address"]); ?></td>
        </tr>
        <tr>
            <td align="right">主要产品：&nbsp;</td>
            <td align="center"><?php echo ($info["com_main_pro"]); ?></td>
        </tr>
        <tr>
            <td align="right">所属市场：&nbsp;</td>
            <td align="center"><?php echo ($info["market"]); ?></td>
        </tr>


        <tr>
            <td align="right">公司网址：&nbsp;</td>
            <td align="center"><?php echo ($info["com_url"]); ?></td>
        </tr>
        <tr>
            <td align="right">所在地：&nbsp;</td>
            <td align="center"><?php echo ($info["prov_name"]); ?>>><?php echo ($info["city_name"]); ?></td>
        </tr>
        <!--<tr>-->
        <!--<td align="right">产品描述：&nbsp;</td>-->
        <!--<td><?php echo ($info["com_name"]); ?></td>-->
        <!--</tr>-->

    </table>
</form>
</body>
</html>