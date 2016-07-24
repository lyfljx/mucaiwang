<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="<?php echo (ADMIN_CSS_URL); ?>public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>用户名称</th>
			<th>上一次登录时间</th>
			<th>上一次登录IP</th>
			<th>锁定状态</th>
			<th>用户所属组别</th>
			<th>操作</th>
		</tr>
		
		 <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
		 		<td><?php echo ($v["id"]); ?></td>
		 		<td><?php echo ($v["username"]); ?></td>
		 		<td><?php echo (date('y-m-d H:m',$v["logintime"])); ?></td>
		 		<td><?php echo ($v["loginip"]); ?></td>
		 		<td>
		 			<?php if($v["lock"]): ?>锁定<?php endif; ?>
		 		</td>
		 		<td>
		 		<?php if($v["username"]=="admin"): ?>超级管理员
		 		<?php else: ?>
		 			<ul>
		 				<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$value): ?><li><?php echo ($value["name"]); ?>(<?php echo ($value["remark"]); ?>)</li><?php endforeach; endif; ?>
		 			</ul><?php endif; ?>
		 		</td>
		 		<td>
		 			<a href="<?php echo U('Admin/Rbac/lock',array('uid'=>$v['id']));?>">锁定</a>
		 			<a href="<?php echo U('Admin/Rbac/outlock',array('uid'=>$v['id']));?>">解除锁定</a>
		 		</td>
		 	</tr><?php endforeach; endif; ?>
		
	</table>
</body>
</html>