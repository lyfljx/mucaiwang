<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<!--action="/mucaiwang/index.php/Admin/Offer/add"-->
<form action="/mucaiwang/index.php/Admin/Offer/sendMail" method="post" enctype="multipart/form-data">
    邮箱：<input  type="text" id="mail" name="mail"/>
    姓名：<input  type="text" id="name" name="name"/>
    标题：<input  type="text" id="title" name="title"/>
    内容<input  type="text" id="content" name="content"/>
    <!--<input  type="text" id="content" name="content"/>-->
    <input class="button" type="submit" value="发送" style="margin: 0 auto;display: block;"/>
</form>

</body>
</html>