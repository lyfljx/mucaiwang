<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<!-- 这里是添加节点的页面，该表单交给addnodehandle处理 -->
</head>
<body>
	<form action="<?php echo U('Admin/Rbac/altNodeHandle');?>" method="post">
		<table class="table">
			<tr>
				<th colspan='2'>修改节点</th>
			</tr> 
			<tr>
				<td align="right"><?php echo ($type); ?>名称:</td>
				<td>
					<input type="text" name="name" value='<?php echo ($node["name"]); ?>'/>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo ($type); ?>描述:</td>
				<td>
					<input type="text" name="title" value="<?php echo ($node['title']); ?>"/>
				</td>
			</tr>
			<tr>
				<td align="right">是否开启</td>
				<td>
					<input type="radio" name="status" value='1' checked="checked"/>&nbsp;开启&nbsp;
					<input type="radio" name="status" value="0"/>&nbsp;关闭
				</td>
			</tr>
			<tr>
				<td align="right">排序</td>
				<td>
					<input type="text" name='sort' value='1'/>
				</td>
			</tr>
			<tr>
				<td colspan='2' align="center">
					<input type="hidden" name="id" value='<?php echo ($node["id"]); ?>'/>
					<input type="hidden" name="pid" value='<?php echo ($pid); ?>'/>
					 <input type="hidden" name="level" value='<?php echo ($level); ?>'/>
					 <input type="submit"  value='保存添加'/>
					 </td>
			</tr>
		</table>
	
	</form>
</body>
</html>