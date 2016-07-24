<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户信息</title>
</head>
<body>
<h2>用户信息</h2>
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>">
        <tr>
            <td align="left">用户登录名：&nbsp;</td>
			<td><?php echo ($user["user_name"]); ?></td>
        </tr>
        <tr>
            <td align="left">真实姓名：&nbsp;</td>
            <td><?php echo ($user["user_true_name"]); ?></td>
        </tr>
        <tr>
            <td align="left">公司：&nbsp;</td>
            <td><a href="<?php echo U('Admin/Buy/com',array('cid'=>$com['com_id']));?>"><?php echo ($com["com_name"]); ?></a></td>
        </tr>
        <tr>
            <td align="left">邮箱：&nbsp;</td>
            <td><?php echo ($user["user_email"]); ?></td>
        </tr>
        <tr>
            <td align="left">职位：&nbsp;</td>
            <td><?php echo ($user["user_job"]); ?></td>
        </tr>
        <tr>
            <td align="left">电话：&nbsp;</td>
            <td><?php echo ($user["user_fixed_phone"]); ?></td>
        </tr>


        <tr>
            <td align="left">手机：&nbsp;</td>
            <td><?php echo ($user["user_phone"]); ?></td>
        </tr>
        <tr>
            <td align="left">传真：&nbsp;</td>
            <td><?php echo ($user["portraiture"]); ?></td>
        </tr>

        <tr>
            <td align="left">qq：&nbsp;</td>
            <td><?php echo ($user["user_qq"]); ?></td>
        </tr>
         <tr>
        	 <td align="left">信用度：&nbsp;</td>
            <td><?php echo ($creadit['cre']); ?></td>
        </tr>
        <tr>
        	 <td align="left">交易成功率：&nbsp;</td>
            <td><?php echo ($creadit['successRate']); ?>%</td>
        </tr>

  		<tr>
        	 <td align="left">评分：&nbsp;</td>
            <td><?php echo ($creadit['score']); ?></td>
        </tr>

        <tr>
            <td align="left"><a href="<?php echo U('Admin/Buy/remark',array('uid'=>$user['user_id']));?>">查看评论</a></td>
        </tr>

    </table>
</body>
</html>