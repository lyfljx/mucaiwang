<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加分类</title>
</head>
<body>
<h3>添加父分类</h3>
<form action="/mucaiwang/index.php/Admin/Pro/addcate.html" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <!--//添加父分类-->
        <input type="hidden" name="uid" value="<?php echo (session('uid')); ?>"/>
        <tr>
            <td align="right">父分类</td>

            <td><input type="text" name="pro_pclass" placeholder=""/></td>

        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="添加分类"/></td>
        </tr>
    </table>
</form>
<!--//添加子分类表单-->
<h3>添加子分类</h3>
<form action="/mucaiwang/index.php/Admin/Pro/addcate.html" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
        <tr>
            <td align="right">父分类</td>

            <td>
                <select name="pro_pclass_id">
                    <option value="" selected="selected">---请选择---</option>
                    <?php if(is_array($pclass)): foreach($pclass as $key=>$v): ?><option value=" <?php echo ($v["pro_pclass_id"]); ?>">
                            <?php echo ($v["pro_pclass"]); ?>
                        </option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">子分类</td>
            <td><input type="text" name="pro_class" placeholder=""/></td>

        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="添加分类"/></td>
        </tr>

    </table>
</form>
</body>
</html>