<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table  border="1px solid " cellpadding="2" cellspacing="0" >
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">父分类</td>
        <td align="center">子分类</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <td align="center">求购地点</td>
        <td align="center">求购用户</td>
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <td align="center">是否过期</td>

        <td colspan="2" align="center">操作</td>

    </tr>
      <?php if(is_array($buy)): foreach($buy as $key=>$v): ?><tr>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pur_id"]); ?></td>
           <td align="center"><?php echo ($v["pur_good_rname"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pclass"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["class"]); ?></td>
           <td align="center"><?php echo ($v["pur_good_price"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pur_good_rsize"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["province"]); echo ($v["city"]); ?></td>
           <td align="center"><a href="<?php echo U('Admin/Buy/buyUser',array('uid'=>$v['pur_user_id']));?>"><?php echo ($v["pur_user_name"]); ?></a></td>
           <td><textarea cols="20"><?php echo ($v["pur_description"]); ?></textarea></td>
           <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["release_time"]);?></td>
           <td align="center"><?php echo ($v["effective_time"]); ?></td>
           <td align="center"> <?php if($v["outdate"]==0): ?>未过期<?php endif; ?>
           <?php if($v["outdate"]==1): ?>已过期<?php endif; ?></td>
           <td align="center">&nbsp;<a href="<?php echo U('Admin/Buy/audit',array('pur_id'=>$v['pur_id'],'user_id'=>$v['pur_user_id'],'audit'=>1));?>">允许发布</a>&nbsp;&nbsp;<a href="<?php echo U('Admin/Buy/audit',array('pur_id'=>$v['pur_id'],'user_id'=>$v['pur_user_id'],'audit'=>0));?>">拒绝发布</a>&nbsp;&nbsp;</td>
           
          </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>


<!-- <!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_CSS_URL); ?>public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>表单序号</th>
			<th>用户ID</th>
			<th>用户名称</th>
			<th>审核状态</th>
			<th>表单详情</th>
		</tr>
		
		 <?php if(is_array($buy)): foreach($buy as $key=>$v): ?><tr>
		 		<td><?php echo ($v["pur_id"]); ?></td>
		 		<td><?php echo ($v["pur_user_id"]); ?></td>
		 		<td><?php echo ($v["pur_user_name"]); ?></td>
		 		<td><?php if($v["audit"]==0): ?>未审核<?php endif; ?>
		 		<?php if($v["audit"]==1): ?>已审核通过<?php endif; ?>
		 		<?php if($v["audit"]==2): ?>已审核未通过<?php endif; ?></td>
		 		<td><a href="<?php echo U('Admin/Buy/index',array('pur_id'=>$v['pur_id'],'user_id'=>$v['pur_user_id']));?>">点此查看表单详情</a></td>
		 	</tr><?php endforeach; endif; ?>
		
	</table>
</body>
</html>
 -->