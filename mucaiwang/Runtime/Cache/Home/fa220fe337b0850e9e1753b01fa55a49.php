<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL ?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL ?>lie-biao.css"/>


</head>
<body>
<div id="header">

</div>
<div id="search">
    <div><a href="#"><img src="image/logo.png"/></a></div>
    <div class="logo-title"><span>权威·专业·专著</span></div>
    <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/><input type="submit" name="" value="搜索" class="submit"/></p>
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

<table width="756" height="600" cellpadding="0" cellspacing="0">
    <tr>
        <td width="756" height="15" valign="top">
            <table width="756" height="15" cellpadding="0" cellspacing="0"  align="center" class="fon-color">
                <tr>
                    <td width="70" height="15" valign="middle" align="center" bgcolor="#073f26"><span><a href="">发布供应</a></span>
                    </td>
                    <td width="10"></td>
                    <td width="70" bgcolor="#073f26" align="center"><span><a href="">发布求购</a></span></td>
                    <td width="606"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td width="756" height="15" valign="top" >
            <div class="tit-down">
                <table width="756" height="15" cellpadding="0" cellspacing="0" align="center">
                    <tr class="title-bg">
                        <td width="380" height="15" align="center">
                            求购信息/公司名称
                        </td>
                            <td width="170" align="center">求购地点</td>
                        <td width="120" align="center">价格(元)</td>
                        <td width="100" align="center">联系方式</td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td width="756" valign="top">


            <?php if(is_array($d)): foreach($d as $key=>$v): ?><div class="border">
                    <table width="100%" cellpadding="0" cellspacing="0">


                        <tr>
                          <td width="132" height="80"><img src="<?php echo HOME_IMG_URL?>0.gif"></td>
                            <td width="320" height="117" valign="middle" >
                                <span class="t-color">[求购]</span><a href="/mucaiwang/index.php/Home/Index/listoffer/offer_id/<?php echo ($v["offer_id"]); ?>"><span class="t-name"><?php echo ($v["pro_name"]); ?></span></a>&nbsp;&nbsp;&nbsp;<span class="t-color"><?php echo date('Y-m-d',$v['pro_create_time'])?></span>
                                <br/>
                                <span class="t-intro">[说明]<?php  echo substr( "$v[pro_desc]", 0,135);?>....</span>
                                <br/>
                                <br/>

                                <div class="t-intro">[发布者]<?php echo ($v["com_name"]); ?>
                                </div>
                            </td>
                            <td width="130" align="left"><span class="address">[<?php echo ($v["prov_name"]); echo ($v["city_name"]); ?>]</span></td>
                            <td width="180" align="center"><?php echo ($v["pro_unitprice"]); ?><br/><br/><span class="t-price"><a href="/mucaiwang/index.php/Home/Index/listoffer/offer_id/<?php echo ($v["offer_id"]); ?>"><img src="<?php echo HOME_IMG_URL ?>baojia_bigicon.gif" alt="" /></a></span></td>
                            <td width="106" align="center"><span class="address"></span></td>
                        </tr>

                    </table>
                </div><?php endforeach; endif; ?>

        </td>
    </tr>
    <style type="text/css">

        .prev {

            float: right;
            border: 1px solid #999;
            cursor: pointer;
            text-align: center;
            width: 60px;
            height: 30px;
            margin: 0 4px;
            line-height: 29px;
        }
        .num {
            float: right;
            border: 1px solid #999;
            cursor: pointer;
            text-align: center;
            width: 22px;
            height: 30px;
            margin: 0 4px;
            line-height: 29px;
        }
        .current {


            float: right;
            border: 1px solid #999;
            cursor: pointer;
            text-align: center;
            width: 22px;
            height: 30px;
            line-height: 29px;
        }
        .next {

            float: right;
            border: 1px solid #999;
            cursor: pointer;
            text-align: center;
            width: 60px;
            height: 30px;
            line-height: 10px;
            line-height: 29px;

        }

    </style>
    <br/>
    <br/>
    <tr>
        <td align="center">

            <?php echo ($page); ?>

        </td>

    </tr>

</table>

<div id="footer">
    <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
    <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
    <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
</div>
</body>
</html>