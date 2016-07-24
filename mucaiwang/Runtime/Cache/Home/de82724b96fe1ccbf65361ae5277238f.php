<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>产品描述</h3>
<div><a href="/mucaiwang/index.php/Home/Offer/myBuy/buyer_id/<?php echo (session('home_id')); ?>">返回</a></div>
<textarea cols="80" rows="20" readonly="readonly" style="font-size: 16px"><?php echo ($desc["offer_description"]); ?></textarea>


</body>
</html>