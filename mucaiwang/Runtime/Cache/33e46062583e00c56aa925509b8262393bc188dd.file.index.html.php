<?php /* Smarty version Smarty-3.1.6, created on 2016-05-14 22:58:38
         compiled from "D:/php/code/mucaiwang/Admin/View\Login\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1542857373ca1a79fb6-84000917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '33e46062583e00c56aa925509b8262393bc188dd' => 
    array (
      0 => 'D:/php/code/mucaiwang/Admin/View\\Login\\index.html',
      1 => 1463237911,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1542857373ca1a79fb6-84000917',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_57373ca1b025b',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57373ca1b025b')) {function content_57373ca1b025b($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<link rel="stylesheet" href="<?php echo @ADMIN_CSS_URL;?>
login.css" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
		<script type="text/javascript" src="<?php echo @ADMIN_JS_URL;?>
jquery-1.7.2.min.js"></script>
		<script type = "text/javascript">
			var verifyURL = '{ :U("Admin/Login/verify",'','') }';
		</script>
		<script type="text/javascript" src="<?php echo @ADMIN_JS_URL;?>
login.js"></script>
	</head>
	<body>
		<div id="top">

		</div>
		<div class="login">	
			<form action="{ :U('Admin/Login/login') }" method="post" id="login">
			<div class="title">
				 登录后台
			</div>
			<table border="1" width="100%">
				<tr>
					<th>管理员帐号:</th>
					<td>
						<input type="username" name="username" class="len250"/>
					</td>
				</tr>
				<tr>
					<th>密码:</th>
					<td>
						<input type="password" class="len250" name="password"/>
					</td>
				</tr>
				<tr>
					<th>验证码:</th>
					<td>
				 		<input type="code" class="len250" name="code"/> <img src="{ :U('Admin/Login/verify') }" id="code"/> <a href="javascript:void(change_code(this));">看不清</a>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="padding-left:160px;"> <input type="submit" class="submit" value="登录"/></td>
				</tr>
			</table>
		</form>
	</div>
	</body>
</html><?php }} ?>