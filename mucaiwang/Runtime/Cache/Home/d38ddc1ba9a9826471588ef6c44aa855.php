<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报价人信息</title>
</head>
<body>
<h2>报价人信息</h2>
<?php if(is_array($register)): foreach($register as $key=>$v): if($v['off']==1): ?><table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>">
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
            <td><a href="<?php echo U('Home/Buy/com',array('cid'=>$v['com_id']));?>"><?php echo ($v["com_name"]); ?></a></td>
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
            <td><?php echo ($v["cre"]); ?></td>
        </tr>
        <tr>
            <td align="left">交易成功率：&nbsp;</td>
            <td><?php echo ($v["successRate"]); ?></td>
        </tr>
        <tr>
            <td align="left">评分：&nbsp;</td>
            <td><?php echo ($v["score"]); ?></td>
        </tr>
		<form action="<?php echo U('Home/Buy/remarkToOff');?>" method="post">
  				<?php if($v['remarktooff']==NULL): ?><tr>
       	   				<td align="left">给他的评分：</td>
       	   				<td>
       	   					<select name="score">
  								<option value="0 ">0</option>
  								<option value="5" >5</option>
  								<option value="10"  >10</option>
  								<option  value="15" >15</option>
  								<option  value="20" >20</option>
  								<option  value="25" >25</option>
  								<option  value="30" >30</option>
  								<option  value="35" >35</option>
  								<option  value="40" >40</option>
  								<option  value="45" >45</option>
  								<option  value="50" >50</option>
  								<option  value="55" >55</option>
  								<option  value="60" >60</option>
  								<option  value="65" >65</option>
  								<option  value="70" >70</option>
  								<option  value="75" >75</option>
  								<option  value="80" >80</option>
  								<option  value="85" >85</option>
  								<option  value="90" >90</option>
  								<option  value="95" >95</option>
  								<option  value="100" >100</option>
  							</select>
       	   				</td>
       	  			 </tr>
  					<tr>
  						<td align="left">对他评价：</td>
            			<td>
            				<textarea cols="20" name="remarktooff"></textarea>
            				<input type="hidden" name="uid" value="<?php echo ($v['user_id']); ?>"/>
            				<input type="hidden" name="pid" value="<?php echo ($pid); ?>"/>
            				<input type="submit"  value="提交评价"/>
            			</td>
            		</tr>
            	<?php else: ?>
            	<tr>
            			<td>交易是否成功：</td>
            			<td>
            				<?php if($v['success']==1): ?>交易成功<?php endif; ?>
            			</td>
            		</tr>
            	<tr>
         	   			<td align="left">我的评分:</td>
            			<td><?php echo ($v['off_score']); ?></td>
            		</tr>
            		<tr><td align="left">我的评价:</td>
            		<td><textarea  cols="20" readonly="readonly"><?php echo ($v['remarktooff']); ?></textarea></td></tr><?php endif; ?>
        </form>
         <tr><td><a href="<?php echo U('Home/buy/remark',array('uid'=>$v['user_id']));?>">查看关于该用户的全部评论</a></td></tr>
    </table><?php endif; endforeach; endif; ?>
</body>
</html>