<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>公司信息</title>
</head>
<body>
<h2>公司信息</h2>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>">
        <tr>
            <td align="left">公司名称：&nbsp;</td>
			<td><?php echo ($com["com_name"]); ?></td>
        </tr>
        <tr>
            <td align="left">公司属性：&nbsp;</td>
            <td><?php echo ($com["com_attribute"]); ?></td>
        </tr>
        <tr>
            <td align="left">所属行业：&nbsp;</td>
            <td><?php echo ($com["com_trade"]); ?></td>
        </tr>
        <tr>
            <td align="left">经营地址：&nbsp;</td>
            <td><?php echo ($com["com_address"]); ?></td>
        </tr>
        <tr>
            <td align="left">主要经营产品：&nbsp;</td>
            <td><?php echo ($com["com_main_pro"]); ?></td>
        </tr>
        <tr>
            <td align="left">所属市场：&nbsp;</td>
            <td><?php echo ($com["com_owned_market"]); ?></td>
        </tr>


        <tr>
            <td align="left">公司网址：&nbsp;</td>
            <td><?php echo ($com["com_url"]); ?></td>
        </tr>
        <tr>
            <td align="left">注册时间：&nbsp;</td>
            <td><?php echo (date('Y-m-d',$com["com_create_time"])); ?></td>
        </tr>




    </table>
</body>
</html>