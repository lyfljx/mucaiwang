<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<!-- 这里引进css文件 -->
<link rel="stylesheet" href="<?php echo (ADMIN_CSS_URL); ?>public.css"/>
</head>
<body>

	<form action="<?php echo U('Admin/News/releaseHandle');?>" method="post">
		<table class="table">
			<tr>
				<th colspan="2">发布新闻</th>
			</tr>
			<tr>
				<td align="right">新闻标题:</td>
				<td>
					<input type="text" name='title'/>
				</td>
			</tr>
			<tr>
				<td align="right">新闻内容:</td>
				<td>
					<textarea rows="20" cols="50" name="textarea"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
				<input type="submit" value='发布新闻'/>
				</td>
			</tr>
		</table>
	</form>

</body>
</html>