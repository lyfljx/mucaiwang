<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

	<head>
		<title>修改商品</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<link href="<?php echo ADMIN_CSS_URL?>mine.css" type="text/css" rel="stylesheet">
	</head>

	<body>

		<div class="div_head">
			<span>
                <span style="float:left">当前位置是：商品管理-》修改商品信息</span>
			<span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/mucaiwang/index.php/Admin/Pro/showlist">【返回】</a>
                </span>
			</span>
		</div>
		<div></div>

		<div style="font-size: 13px;margin: 10px 5px">
			<form action="/mucaiwang/index.php/Admin/Pro/xiugai/pro_id/31" method="post" enctype="multipart/form-data">
				<!--因为要用到save()方法来指定要修改的数据，      		
            	所以要用id值来指定是哪一条数据，提交时会连同修改记录提交过去-->
				<input type="hidden" name="pro_id" value="<?php echo ($info["pro_id"]); ?>" />
				<table border="1" width="100%" class="table_a">
					<tr>
						<td>产品名称</td>
						<td><input type="text" name="pro_name" value="<?php echo ($info["pro_name"]); ?>" /></td>
					</tr>
					<tr>
						<td>产品规格</td>
						<td><input type="text" name="pro_style" value="<?php echo ($info["pro_style"]); ?>" /></td>
					</tr>

					<tr>

						<td>产品生产地</td>
						<td><input type="text" name="pro_grow_area" value="<?php echo ($info["pro_grow_area"]); ?>" /></td>
					</tr>
					<tr>
						<td>产品所在地</td>
						<td><input type="text" name="pro_local_area" value="<?php echo ($info["pro_local_area"]); ?>" /></td>
					</tr>
					<tr>
						<td>商品详细描述</td>
						<td>
							<textarea name="pro_desc" /><?php echo ($info["pro_desc"]); ?></textarea>
						</td>
					</tr>

					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="修改" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>

</html>