<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table border="1" cellpadding="1" cellspacing="0">
<tr>
    <td align="center">缩略图</td>
    <td align="center"> 大图片</td>


</tr>



    <tr>
    <td><img src="<?php echo SILE_URL; echo ($z["pro_salbumpath"]); ?>" width="200" height="200"></td>
    <td><img src="<?php echo SILE_URL; echo ($z["pro_albumpath"]); ?>" width="450" height="450" ></td>

</tr>

</table>



</body>