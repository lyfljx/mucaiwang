<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报价</title>
</head>
<body>
<h2>报价</h2>
<form action="/mucaiwang/index.php/Admin/Offer/addoffer.html" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>">
        <tr>
            <td align="right">产品名字：&nbsp;</td>
            <td><input type="text" name="offer_pro_name" placeholder="" required="required"/></td>

        </tr>
        <tr>
            <td align="right">产品规格：&nbsp;</td>
            <td><input type="text" name="offer_p_size" placeholder="" required="required"/></td>

        </tr>
        <tr>
            <td align="right">产品价格：&nbsp;</td>
            <td><input type="text" name="offer_price" placeholder="" value="面议"/></td>

        </tr>
        <tr>
            <td align="right">报价人：&nbsp;</td>
            <td><input type="text" name="offer_user_name" placeholder="请输入真实姓名" required="required"/></td>

        </tr>
        <tr>
            <td align="right">公司名称：&nbsp;</td>
            <td><input type="text" name="offer_com" placeholder="请输入正确的公司名称" required="required"/></td>

        </tr>
        <tr>
            <td align="right">截止时间：&nbsp;</td>
            <td><input type="text" name="offer_cut_time" placeholder="格式：2006-01-09" required="required"/></td>

        </tr>


        <tr>
            <td align="right">产地：&nbsp;</td>
            <td><input type="text" name="offer_origin_place" placeholder="广东深圳" required="required"/></td>

        </tr>
        <tr>
            <td align="right">分类：&nbsp;</td>
            <td><input type="text" name="offer_pro_class" placeholder="" required="required"/></td>

        </tr>

        <tr>
            <td align="right">产品描述：&nbsp;</td>
            <td><textarea name="offer_description"></textarea></td>

        </tr>


        <tr>
            <td colspan="2" align="center"><input type="submit"  value="报价"/></td>
        </tr>

    </table>
</form>
</body>
</html>