<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>index.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL?>public.css" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL?>index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
</head>
<body>
	<div id="top">
		<div class="menu">
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
			<a href="#">选择按钮</a>
		</div>
		<div class="exit">
			<a href="<?php echo U('Admin/Index/outLogin');?>" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
		<?php if(is_array($auth)): foreach($auth as $key=>$q): if(is_array($authA)): foreach($authA as $key=>$k): if($k["pid"]==$q["id"]): ?><dt><?php echo ($k["title"]); ?></dt>
					<?php if(is_array($authB)): foreach($authB as $key=>$u): if($u["pid"]==$k["id"]): ?><dd><a href="<?php echo U($q["name"].'/'.$k["name"].'/'.$u["name"]);?>"><?php echo ($u['title']); ?></a></dd><?php endif; endforeach; endif; endif; endforeach; endif; endforeach; endif; ?>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe"></iframe>
	</div>
</body>
</html>