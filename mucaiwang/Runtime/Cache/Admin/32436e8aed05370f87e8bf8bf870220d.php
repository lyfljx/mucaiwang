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
			<th>新闻标题</th>
			<th>操作</th>
		</tr>
		
		 <?php if(is_array($new)): foreach($new as $key=>$v): ?><tr>
		 		<td><?php echo ($v["id"]); ?></td>
		 		<td><?php echo ($v["title"]); ?></td>
		 		<td>
		 			<a href="<?php echo U('Admin/News/delNew',array('nid'=>$v['id']));?>">删除</a>
		 			<a href="<?php echo U('Admin/News/altNew',array('nid'=>$v['id']));?>">修改</a>
		 		</td>
		 	</tr><?php endforeach; endif; ?>
		
	</table>
</body>
</html>