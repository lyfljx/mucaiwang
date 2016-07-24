<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL?>index.js"></script>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>public.css"/>
<link rel="stylesheet" href="<?php echo ADMIN_CSS_URL ?>index.css"/>
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
        <tr>
            <td><a href="<?php echo SILE_URL ?>/index.php/Home/User/outLogin"
                   onclick="if (confirm('确定要退出吗？')) return true; else return false;" target="_top">退出</a>
            </td>
        </tr>
        <a href="#">当前用户：<?php echo (session('home_name')); ?></a>

        <a href="<?php echo SILE_URL?>/index.php/Home/Index/index" target="_blank">首页</a>
    </div>
</div>
<div id="left">

    <dl>
        <dt>用户管理</dt>
        <dd><a href="/mucaiwang/index.php/Home/User/userInfo/user_id/<?php echo (session('home_id')); ?>" target="right">用户信息</a></dd>
        <dd><a href="/mucaiwang/index.php/Home/User/userpass/user_id/<?php echo (session('home_id')); ?>" target="right">修改密码</a></dd>
    </dl>
    <dl>
        <dt>产品管理</dt>
        <dd><a href="/mucaiwang/index.php/Home/Pro/showlist/pro_user_id/<?php echo (session('home_id')); ?>" target="right">产品列表</a></dd>
        <dd><a href="/mucaiwang/index.php/Home/Pro/tianjia" target="right">添加商品</a></dd>
        <dd><a href="/mucaiwang/index.php/Home/Pro/lookList/pro_user_id/<?php echo (session('home_id')); ?>" target="right">查看过期产品</a></dd>
          <!--<dd><a href="/mucaiwang/index.php/Home/Pro/proList" target="right">查看过期</a></dd>-->
        <!--<dd><a href="/mucaiwang/index.php/Home/Pro/xiugai" target="right">产品查询</a></dd>-->

    </dl>

    <dl>
        <dt>产品报价</dt>
        <dd><a href="/mucaiwang/index.php/Home/Offer/addoffer" target="right">报价</a></dd>
        <!--对别人的报价信息-->
        <dd><a href="/mucaiwang/index.php/Home/Offer/myBuy/buyer_id/<?php echo (session('home_id')); ?>" target="right">我的求购</a></dd>
        <dd><a href="/mucaiwang/index.php/Home/Offer/offerlist/offer_user_id/<?php echo (session('home_id')); ?>" target="right">查看报价订单</a></dd>
        <dd><a href="/mucaiwang/index.php/Home/Offer/lookOffer/offer_user_id/<?php echo (session('home_id')); ?>" target="right">查看过期订单</a></dd>

    </dl>
    <dl>
        <dt>产品求购</dt>
        <dd><a href="<?php echo U('Home/Buy/myOffer',array('uid'=>$uid));?>" target="right">我的报价</a></dd>
        <dd><a href="<?php echo U('Home/Buy/index');?>" target="right">求购</a></dd>
        <dd><a href="<?php echo U('Home/Buy/showBuy');?>" target="right">查看求购订单</a></dd>

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