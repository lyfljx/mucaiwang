<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>index.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css" />
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>index.css" />
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
       <tr><td><a href="<?php echo SILE_URL ?>/index.php/Home/User/logout"
                  onclick="if (confirm('确定要退出吗？')) return true; else return false;" target="_top">退出</a>
       </td></tr>
         <a href="#">当前用户：<?php echo (session('user_name')); ?></a>

        <a href="<?php echo SILE_URL?>/index.php/Home/Index/index" target="_blank">首页</a>
    </div>
</div>
<div id="left">
    <dl>
        <dt>产品管理</dt>
        <dd><a href="/mucaiwang/index.php/Admin/Pro/showlist" target="right">产品列表</a></dd>
        <dd><a href="/mucaiwang/index.php/Admin/Pro/tianjia" target="right">添加商品</a></dd>
        <dd><a href="/mucaiwang/index.php/Admin/Pro/addcate" target="right">添加分类</a></dd>
        <dd><a href="/mucaiwang/index.php/Admin/Pro/listcate" target="right">分类列表</a></dd>
        <dd><a href="/mucaiwang/index.php/Admin/Pro/xiugai" target="right">产品查询</a></dd>

    </dl>
    <dl>
        <dt>企业库</dt>
        <dd><a href="#" target="right">企业列表</a></dd>
        <dd><a href="#" target="right">添加企业</a></dd>

    </dl>
    <dl>
        <dt>审核订单</dt>
        <dd><a href="/mucaiwang/index.php/Admin/Check/check_offer" target="right">报价列表</a></dd>
        <!--<dd><a href="#" target="right">求购列表</a></dd>-->
        <dd><a href="/mucaiwang/index.php/Admin/Check/send_email" target="right">发送邮件</a></dd>

    </dl>
    <dl>
        <dt>产品报价</dt>
        <dd><a href="/mucaiwang/index.php/Admin/Offer/addoffer" target="right">报价</a></dd>
        <dd><a href="/mucaiwang/index.php/Admin/Offer/offerlist" target="right">查看报价订单</a></dd>

    </dl>
    <!--<dl>-->
        <!--<dt>产品求购</dt>-->
        <!--<dd><a href="#">求购</a></dd>-->
        <!--<dd><a href="#">查看求购订单</a></dd>-->

    <!--</dl>-->
</div>
<div id="right">
    <!--	//用frame框架来是实现分页-->
    <iframe name="right"></iframe>
    >
</div>
</body>
</html>