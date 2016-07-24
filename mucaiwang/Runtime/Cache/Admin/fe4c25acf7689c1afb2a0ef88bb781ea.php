<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <title>添加产品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<?php echo ADMIN_CSS_URL?>mine.css" type="text/css" rel="stylesheet">
</head>

<body>

<div class="div_head">
			<span>
                <span style="float:left">当前位置是：产品管理-》添加产品信息</span>
			<span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/mucaiwang/index.php/Admin/Pro/showlist">【返回】</a>
                </span>
			</span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="/mucaiwang/index.php/Admin/Pro/tianjia" method="post" enctype="multipart/form-data">
        <table border="1" width="100%" class="table_a" bgcolor="#cccccc">
            <input type="hidden" name="pro_create_time" value= <?php echo time(); ?> />
            <tr>
                <td>产品名称</td>
                <td><input type="text" name="pro_name" /></td>
            </tr>
            <tr>
                <td>产品规格</td>
                <td><input type="text" name="pro_style" /></td>
            </tr>

            <tr>

                <td>产品生产地</td>
                <td><input type="text" name="pro_grow_area" /></td>
            </tr>
            <tr>
                <td>产品所在地</td>
                <td><input type="text" name="pro_local_area" /></td>
            </tr>
            <tr>
                <td>产品图片</td>
                <td><input type="file" name="pro_album" /></td>
            </tr>
            <tr>
                <td>截止时间</td>
                <td><input type="text" name="pro_cut_time" value="2006-2-9"/></td>
            </tr>
            <tr>
                <td>商品详细描述</td>
                <td>
                    <textarea name="pro_desc"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>

</html>