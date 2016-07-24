<?php /* Smarty version Smarty-3.1.6, created on 2016-05-14 22:57:56
         compiled from "D:/php/code/mucaiwang/Admin/View\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:881857373c489c4e25-26265941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a1d0968e35d91e907ea4735515bc0110b617775' => 
    array (
      0 => 'D:/php/code/mucaiwang/Admin/View\\Index\\index.html',
      1 => 1463237868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '881857373c489c4e25-26265941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57373c48a61e8',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57373c48a61e8')) {function content_57373c48a61e8($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="<?php echo @ADMIN_JS_URL;?>
jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo @ADMIN_JS_URL;?>
index.js"></script>
<link rel="stylesheet" href="<?php echo @ADMIN_CSS_URL;?>
public.css" />
<link rel="stylesheet" href="<?php echo @ADMIN_CSS_URL;?>
index.css" />
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
			<a href="{ :U('Admin/Index/outLogin') }" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
			<dt>Rbac权限管理</dt>
			<dd><a href="{ :U('Admin/Rbac/addRole') }">添加角色</a></dd>
			<dd><a href="{ :U('Admin/Rbac/role') }">角色列表</a></dd>
			<dd><a href="{ :U('Admin/Rbac/addNode') }">添加节点</a></dd>
			<dd><a href="{ :U('Admin/Rbac/node') }">节点列表</a></dd>
			<dd><a href="{ :U('Admin/Rbac/addUser') }">添加管理员</a></dd>
			<dd><a href="{ :U('Admin/Rbac/user') }">管理员列表</a></dd>
			<dd><a href="{ :U('Admin/Rbac/company') }">企业列表</a></dd>
		</dl>
		<dl>
			<dt>新闻快讯</dt>
			<dd><a href="{ :U('Admin/News/release') }">发布新闻</a></dd>
			<dd><a href="{ :U('Admin/News/newList') }">新闻管理</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
		</dl>
		<dl>
			<dt>功能标题</dt>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
			<dd><a href="#">功能标题</a></dd>
		</dl>
	</div>
	<div id="right">
		<iframe name="iframe" src="#"></iframe>
	</div>
</body>
</html><?php }} ?>