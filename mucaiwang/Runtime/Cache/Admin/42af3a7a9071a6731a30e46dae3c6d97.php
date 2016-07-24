<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php if(is_array($remark)): foreach($remark as $key=>$v): ?><p>用户：<?php echo ($v['user']); ?></p><p><?php echo ($v['remark']); ?></p><?php endforeach; endif; ?>
</body>
</html>