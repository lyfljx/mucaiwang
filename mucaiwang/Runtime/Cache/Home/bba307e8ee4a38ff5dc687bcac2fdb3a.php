<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>purchase.css"/>
    <script type="text/javascript">

        // 获取某个时间格式的时间戳
        var stringTime = "2014-07-10 10:21:12";
        var timestamp2 = Date.parse(new Date(stringTime));
        timestamp2 = timestamp2 / 1000;
        //2014-07-10 10:21:12的时间戳为：1404958872
        console.log(stringTime + "的时间戳为：" + timestamp2);

    </script>
</head>
<body>
<div id="header">

</div>
<div id="search">
    <div><a href="#"><img src="<?php echo ADMIN_IMG_URL?>logo.png"/></a></div>
    <div class="logo-title"><span>权威·专业·专著</span></div>
    <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/><input type="submit" name=""
                                                                                         value="搜索" class="submit"/></p>
</div>

<div id="nav">
    <ul>
        <li><a href="#">首页</a></li>
        <li><a href="#">木材商城</a></li>
        <li><a href="#">求购</a></li>
        <li><a href="#">报价</a></li>
        <li><a href="#">资讯</a></li>
        <li><a href="#">行情</a></li>
        <li><a href="#">联系我们</a></li>
    </ul>
</div>

<table width="980" cellpadding="0" cellspacing="0">
    <tr class="title-bg">
        <td width="20" height="25"></td>
        <td valign="middle" colspan="3"> 现在位置：<a href="">首页</a> &gt; <a href="">求购</a> &gt; 木材求购</td>
        <td valign="right">当前用户：<?php echo (session('home_name')); ?> &nbsp;&nbsp; <a
                href="<?php echo SILE_URL ?>/index.php/Admin/User/logout"
                onclick="if (confirm('确定要退出吗？')) return true; else return false;"
                target="_top">退出</a> &nbsp;&nbsp; <a href="<?php echo U('Home/User/login');?>">登录</a></td>

    </tr>

</table>
<table width="980" height="470" cellpadding="0" cellspacing="0">
    <tr>
        <td width="112">
            <table>
                <tr>
                    <td width="120" height="470"></td>
                </tr>
            </table>
        </td>
        <td width="756">
            <table width="756" height="470" cellpadding="0" cellspacing="0" align="center">
                <tr>
                    <td width="756" height="30" valign="middle" align="center" class="sell-title">
                        <span>木材求购</span></td>
                </tr>
                <tr>
                    <td valign="top" align="ceneter" class="border">
                        <form action="/mucaiwang//index.php/Home/Buy/buy" method="post" enctype="multipart/form-data">
                            <table style="line-height: 27px">
                                <!--做隐藏域，传递用户id，方便在后台展示-->
                                <input type="hidden" class="size" name="offer_user_id"
                                       value="<?php echo (session('home_id')); ?>"/>
                                <input type="hidden" class="size" name="offer_create_time"
                                       value="<?php echo time(); ?>"/>

                                <tr>
                                    <td width="300" height="20" align="right">产品名称：</td>
                                    <td width="300" height="20"><input type="text" class="size" name="offer_pro_name"
                                                                       required="required"/></td>
                                </tr>
                                <tr>
                                    <td align="right">产品价格:</td>
                                    <td><input type="text" class="size" name="offer_price" 
                                               required="required"/></td>

                                </tr>
                                <tr>
                                    <td align="right">产品规格：</td>
                                    <td><input type="text" class="size" name="offer_p_size" required="required"/></td>
                                </tr>
                                <tr>
                                    <td align="right">分类：&nbsp;</td>
                                    <td><input type="text" name="offer_pro_class" placeholder="" required="required"/>
                                    </td>

                                </tr>

                                <tr>
                                    <td align="right">产地：</td>
                                    <td><input type="text" class="size" name="offer_origin_place" required="required"/>
                                    </td>
                                </tr>
                                <!--<tr>-->
                                <!--<td align="right">父分类：</td>-->
                                <!--<td>-->
                                <!--<select>-->
                                <!--<option value="0" selected="selected">请选择</option>-->
                                <!--<?php if(is_array($pclass)): foreach($pclass as $key=>$v): ?>-->
                                <!--<option  name="pro_pclass">-->
                                <!--<?php echo ($v["pro_pclass"]); ?>-->
                                <!--</option>-->
                                <!--<?php endforeach; endif; ?>-->
                                <!--</select>-->
                                <!--</td>-->
                                <!--</tr>-->
                                <!--<tr>-->
                                <!--<td align="right">子分类：</td>-->
                                <!--<td><select>-->
                                <!--<option value="0" selected="selected">请选择</option>-->
                                <!--<?php if(is_array($class)): foreach($class as $key=>$vv): ?>-->
                                <!--<option  name="pro_class">-->
                                <!--<?php echo ($vv["pro_class"]); ?>-->
                                <!--</option>-->
                                <!--<?php endforeach; endif; ?>-->
                                <!--</select>-->
                                <!--</td>-->
                                <!--</tr>-->

                                <!--<tr>-->
                                <!--<td align="right">邮箱：</td>-->
                                <!--<td><input type="text" class="size" name="offer_user_name" placeholder="请输入正确的邮箱"-->
                                <!--required="required"/></td>-->

                                <!--</tr>-->
                                <!--<tr>-->
                                    <!--<td align="right">公司名称：</td>-->
                                    <!--<td><input type="text" class="size" name="offer_com" placeholder="请输入正确的公司名称"-->
                                               <!--required="required"/></td>-->

                                <!--</tr>-->
                                <!--<tr><td align="right">创建时间：</td><td><input type="text" class="size" name=""/></td></tr>-->
                                <tr>
                                    <td align="right">截止时间：</td>
                                    <td><input type="text" class="size" name="offer_cut_time" placeholder="如：2006-01-01"
                                               required="required"/></td>

                                </tr>
                                <tr>
                                    <td align="right" valign="top">产品详细描述：</td>
                                    <td height="40"><textarea rows="10" cols="10" class="big" name="offer_description"
                                                              required="required"/> </textarea></td>

                                </tr>
                                <tr>
                                    <td align="right" height="40"></td>
                                    <td align="left" height="40"><a href="/mucaiwang//index.php/Home/Buy/buy/offer_id/<?php echo ($info["offer_id"]); ?>/home_id/<?php echo (session('home_id')); ?>"><img src="<?php echo HOME_IMG_URL?>37.jpg" ail="求购"/>&nbsp;</a></td>

                                    <!--<td align="right" height="40"><input type="submit" value="提交"></td>-->
                                    <!--<td class="td-down"><input type="reset" value="重新输入" required="required"/></td>-->
                                </tr>
                            </table>
                        </form>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>


</div>

<div id="footer">
    <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a
            href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
    <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
    <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
</div>
</body>
</html>