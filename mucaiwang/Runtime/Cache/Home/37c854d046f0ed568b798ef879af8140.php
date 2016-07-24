<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL?>shen-he.css"/>

</head>
<body>
<div id="header">

</div>
<div id="search">
    <div><a href="#"><img src="<?php echo HOME_IMG_URL ?>logo.png"/></a></div>
    <div class="logo-title"><span>权威·专业·专著</span></div>
    <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/><input type="submit" name=""
                                                                                         value="搜索" class="submit"/></p>
</div>

<div id="nav">
    <ul>
        <li><a href="/mucaiwang//index.php/Home/Index/index">首页</a></li>
        <li><a href="#">木材商城</a></li>
        <li><a href="#">求购</a></li>
        <li><a href="#">报价</a></li>
        <li><a href="<?php echo U('Home/Index/allNew');?>">新闻</a></li>
        <li><a href="<?php echo U('Home/Index/allAlert');?>">快讯</a></li>
        <li><a href="#">行情</a></li>
        <li><a href="#">联系我们</a></li>
    </ul>
</div>


<table width="980" cellpadding="0" cellspacing="0">
    <tr class="title-bg"></td>
        <td height="25" valign="middle" colspan="3"></td>
    </tr>
</table>
<table width="100%" height="470" cellpadding="0" cellspacing="0" align="center">
    <tr>
        <td width="756" height="30" valign="middle" align="center" colspan="2" class="sell-title">
            <span><?php echo ($info["offer_pro_name"]); ?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            当前用户：<?php echo (session('home_name')); ?>&nbsp;&nbsp;
            <a href="/mucaiwang//index.php/Home/User/outLogin" onclick="if (confirm('确定要退出吗？')) return true; else return false;"
               target="_top">退出</a> &nbsp;&nbsp;&nbsp;<a href="/mucaiwang//index.php/Home/User/login">登录</a>
        </td>
        <!--<a  href="<?php echo SILE_URL ?>/index.php/Home/User/logout" onclick="if (confirm('确定要退出吗？')) return true; else return false;"-->
        <!--target="_top">退出系统</a>&nbsp;<a href="/mucaiwang//index.php/Home/User/login">登录</a> </td>-->
    </tr>
    <tr style="line-height: 13px;">
        <td valign="top" style="width: 560px;">
            <table height="300" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="150" height="10" colspan="2"></td>
                </tr>

                <tr>
                    <td width="170" height="15" align="right">产品名称：</td>
                    <td width="280"><?php echo ($info["offer_pro_name"]); ?></td>
                </tr>

                <tr>
                    <td height="15" align="right">类别：</td>
                    <td align="left"><?php echo ($info["pro_pclass"]); ?> > > <?php echo ($info["pro_class"]); ?> </td>
                </tr>
                <tr>
                    <td height="15" align="right">规格：</td>
                    <td><?php echo ($info["offer_p_size"]); ?></td>

                </tr>
                <!--<tr>-->
                <!--<td height="15" align="right">等级：</td>-->
                <!--<td><?php echo ($v[""]); ?></td>-->
                <!--</tr>-->
                <tr>
                    <td height="15" align="right">产地：</td>
                    <td><?php echo ($info["prov_name"]); ?> >>> <?php echo ($info["city_name"]); ?></td>
                </tr>
                <tr>
                    <td height="25" align="right">价格：</td>
                    <td>
                        <?php if(session('home_id') != 0 ): echo ($info["offer_price"]); endif; ?>
                        <?php if(session('home_id') == 0 ): ?><a href="<?php echo U('Home/User/login');?>"><h3>请登录</h3></a><?php endif; ?>
                    </td>

                </tr>
                <tr bgcolor="#f7f7f7">

                    <td height="25" align="right"></td>
                    <td>
                        <?php if(session('home_id') == 0 ): ?><span style="font-size: 15px">登陆后可以求购！！<img
                                src="<?php echo HOME_IMG_URL?>baojia_bigicon.gif" alt="求购按钮"></span><?php endif; ?>
                        <?php if(session('home_id') != 0): if($z != true): ?><form action="<?php echo U('Home/Buy/buy_order');?>" method="post">

                                <!--<form action="<?php echo U('Home/Buy/buy_order',array('offer_id' => $info['offer_id']));?>"-->

                                <!--做隐藏域，传递报价人的id还有表单id-->
                                <input type="hidden" name="offer_id" value="<?php echo ($info["offer_id"]); ?>"/>
                                <input type="hidden" name="buyer_id" value="<?php echo (session('home_id')); ?>"/>
                                <input type="hidden" name="offer_buy_create_time" value="<?php echo time() ?>"/>
                                <input type="hidden" name="offer_user_id" value="<?php echo ($info["offer_user_id"]); ?>"/>
                                <span style="font-size: 15px">报价：</span><input type="text" name="offer_buy_price"
                                                                               style="height: 23px"/>
                                <input type="submit" value="求购"/>
                            </form><?php endif; endif; ?>


                        <?php if($z == true): ?>已求购<?php endif; ?>
                    </td>
                </tr>
                <!--<tr>-->
                <!--<td align="center">-->
                <!--<span style="float: right"><form action="">价格：<input type="text" name=""/></form></span>-->
                <!--</td>-->
                <!--<td><span><a href="#"><img src="" alt=""/></a></span></td>-->


                <!--</tr>-->

                <tr>
                    <td height="15" align="right">公司名称：</td>
                    <td>
                        <?php if(session('home_id') != 0 ): echo ($info["com_name"]); endif; ?>
                        <?php if( session('home_id') == 0 ): ?><a href="/mucaiwang//index.php/Home/Comuser/index"><h3>请登录</h3></a><?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td height="15" align="right">创建日期：</td>
                    <td><?php echo date('Y-m-d',$info['offer_create_time']);?></td>
                </tr>
                <tr>
                    <td height="15" align="right">截止时间：</td>
                    <td><?php echo date('Y-m-d',$info['offer_cut_time']);?></td>
                </tr>

            </table>

        <td style="display: inline-block;padding:10px;"><img src="<?php echo HOME_IMG_URL?>p385331.jpg" width="250"
                                                             height="190"></td>

        <!--<tr><td align="center">上等紫红桃木</td></tr>-->
        </td>

    </tr>
    <tr style="display: inline-block;padding: 20px">
        <td height="15" align="right" valign="top">描述：</td>
        <td width="400" height="138"><textarea rows="10" cols="50" name="offer_description" readonly="true"><?php echo ($info["offer_description"]); ?></textarea>
        </td>
    </tr>

    <td valign="top" align="center">
        <!--<a href="/mucaiwang//index.php/Home/Buy/buy/offer_id/<?php echo ($info["offer_id"]); ?>/home_id/<?php echo (session('home_id')); ?>"><img src="<?php echo HOME_IMG_URL?>1.jpg" ail="求购"/>&nbsp;</a>-->
        <!--<a href="/mucaiwang//index.php/Home/Buy/buy_order/offer_id/<?php echo ($info["offer_id"]); ?>"><img src="<?php echo HOME_IMG_URL?>1.jpg" ail="求购"/>&nbsp;</a>-->


    </td>

    </tr>

</table>


<div id="footer">
    <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a
            href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
    <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
    <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
</div>
</body>
</html>