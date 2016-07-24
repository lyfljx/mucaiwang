<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报价人信息</title>
</head>
<body>
<h2>报价人信息</h2>
<?php if(is_array($register)): foreach($register as $key=>$v): ?><table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

     <!--    <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>"> -->
        <tr>
            <td align="left">用户登录名：&nbsp;</td>
			<td><?php echo ($v["user_name"]); ?></td>
        </tr>
        <tr>
            <td align="left">真实姓名：&nbsp;</td>
            <td><?php echo ($v["user_true_name"]); ?></td>
        </tr>
        <tr>
            <td align="left">公司：&nbsp;</td>
            <td><a href="<?php echo U('Admin/Buy/com',array('cid'=>$v['com_id']));?>"><?php echo ($v["com_name"]); ?></a></td>
        </tr>
        <tr>
            <td align="left">邮箱：&nbsp;</td>
            <td><?php echo ($v["user_email"]); ?></td>
        </tr>
        <tr>
            <td align="left">职位：&nbsp;</td>
            <td><?php echo ($v["user_job"]); ?></td>
        </tr>
        <tr>
            <td align="left">电话：&nbsp;</td>
            <td><?php echo ($v["user_fixed_phone"]); ?></td>
        </tr>


        <tr>
            <td align="left">手机：&nbsp;</td>
            <td><?php echo ($v["user_phone"]); ?></td>
        </tr>
        <tr>
            <td align="left">传真：&nbsp;</td>
            <td><?php echo ($v["portraiture"]); ?></td>
        </tr>

        <tr>
            <td align="left">qq：&nbsp;</td>
            <td><?php echo ($v["user_qq"]); ?></td>
        </tr>
        <tr>
        	 <td align="left">信用度：&nbsp;</td>
            <td><?php echo ($v['cre']); ?></td>
        </tr>
        
         <tr>
        	 <td align="left">交易成功率：&nbsp;</td>
            <td><?php echo ($v['successRate']); ?>%</td>
        </tr>

  		<tr>
        	 <td align="left">评分：&nbsp;</td>
            <td><?php echo ($v['score']); ?></td>
        </tr>
        
          <tr>
            <td align="left">他的报价：&nbsp;</td>
            <td><?php echo ($v["offerPrice"]); ?></td>
        </tr>
        <tr>
            <td align="left"><a href="<?php echo U('Admin/Buy/remark',array('uid'=>$v['user_id']));?>">查看评论</a></td>
        </tr>
 		<tr>
            <td align="left">审核状态：&nbsp;</td>
            <td><?php if($v['off']==1): ?>已通过审核<?php endif; if($v['off']==0): ?>未审核<?php endif; if($v['off']==2): ?>审核不通过<?php endif; ?></td>
        </tr>
        <tr>
         <td align="left">操作：&nbsp;</td>
         <td> <?php if($v['off']==0): ?><a href="<?php echo U('Admin/Buy/emailBuy',array('audit2'=>1,'pid'=>$pid,'offId'=>$v['user_id']));?>">通过审核</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/Buy/emailBuy',array('audit2'=>2,'pid'=>$pid,'offId'=>$v['user_id']));?>">不通过审核</a><?php endif; ?></td>
	</tr>    
    </table>
    <br/><br/><br/><hr/><?php endforeach; endif; ?>
</body>
</html>