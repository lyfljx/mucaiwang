<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>产品描述</h3>
<div><a href="/mucaiwang//index.php/Home/Pro/showlist/pro_user_id/<?php echo ($info["pro_user_id"]); ?>">返回</a></div>
<textarea cols="80" rows="20" readonly="readonly"><?php echo ($info["pro_desc"]); ?></textarea>


</body>
</html>