<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>purchase.css"/>
      <script src="<?php echo ADMIN_JS_URL?>jquery.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_JS_URL?>jquery.inputbox.js" type="text/javascript"></script>
    <script src="<?php echo ADMIN_JS_URL?>jquery.ganged.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php  echo ADMIN_CSS_URL?>jquery.inputbox.css" type="text/css"/>

    <script type="text/javascript" src="<?php echo HOME_JS_URL?>laydate.js"></script>
    <script type="text/javascript">
        $(function () {
            var data = [
                '01:红木',
                '0101:紫檀木',
                '0102:花梨木',
                '0103:红酸枝木',
                '0104:条纹乌木',
                '0105:香枝木',
                '0106:黑酸枝木',
                '0107:鸡翅木',
                '0108:乌木',
                '0109:其他红木',

                '02:板材原木',
                '0201:国产木枋',
                '0202:进口木枋',
                '0203:刨光木',
                '0204:科技木',
                '0204:改性木',

                '03:木皮类',
                '0301:实木木皮',


            ];

            $('#test1').ganged({'data': data, 'width': 100, 'height': 30});
            $('#test2').ganged({'data': data});
        })
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
        <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
        <li><a href="#">木材商城</a></li>
        <li><a href="#">求购</a></li>
        <li><a href="#">报价</a></li>
        <li><a href="#">资讯</a></li>
        <li><a href="#">行情</a></li>
        <li><a href="#">联系我们</a></li>
    </ul>
</div>

<!--<table width="980" cellpadding="0" cellspacing="0">
    <tr class="title-bg">
        <td width="20" height="25"></td>
        <td valign="middle" colspan="3"> 现在位置：<a href="">首页</a> &gt; <a href="">求购</a> &gt; 木材求购</td>
        <td valign="right">当前用户：<?php echo (session('home_name')); ?> &nbsp;&nbsp; <a
                href="<?php echo SILE_URL ?>/index.php/Admin/User/logout"
                onclick="if (confirm('确定要退出吗？')) return true; else return false;"
                target="_top">退出</a> &nbsp;&nbsp; <a href="<?php echo U('Home/User/login');?>">登录</a></td>

    </tr>

</table>-->
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
                        <form action="<?php echo U('Home/Buy/wantBuyHandle');?>" method="post" enctype="multipart/form-data">
                            <table style="line-height: 27px" width="80%">
                                <tr>
                                    <td width="300" height="20" align="right">产品名称：</td>
                                    <td width="300" height="20"><input type="text" class="size" name="pur_good_rname"
                                                                       required="required"/></td>
                                </tr>
                                  <tr>
                                    <td width="300" height="20" align="right">产品规格：</td>
                                    <td width="300" height="20"><input type="text" class="size" name="pur_good_rsize"
                                                                       required="required"/></td>
                                </tr>
                               <tr>
                                    <td width="300" height="20" align="right">产品数量：</td>
                                    <td width="300" height="20"><input type="text" class="size" name="pur_good_rnumber"
                                                                       required="required"/></td>
                                </tr>
                              
                               <tr>
                                    <td width="300" height="20" align="right">求购地点：</td>
                                    <td width="300" height="20"> <select name="province"
                                                onchange="chinaChange(this,document.getElementById('city'));"
                                                style=" width:17%; height:25px;line-height:30px; ">
                                            <option value="">请选择省城</option>
                                            <option value="北京">

                                                北京
                                            </option>
                                            <option value="天津">
                                                天津
                                            </option>
                                            <option value="上海">
                                                上海
                                            </option>
                                            <option value="重庆">
                                                重庆
                                            </option>
                                            <option value="河北">
                                                河北
                                            </option>
                                            <option value="山西">
                                                山西
                                            </option>
                                            <option value="辽宁">
                                                辽宁
                                            </option>
                                            <option value="吉林">
                                                吉林
                                            </option>
                                            <option value="黑龙江">
                                                黑龙江
                                            </option>
                                            <option value="江苏">
                                                江苏
                                            </option>
                                            <option value="浙江">
                                                浙江
                                            </option>
                                            <option value="安徽">
                                                安徽
                                            </option>
                                            <option value="福建">
                                                福建
                                            </option>
                                            <option value="江西">
                                                江西
                                            </option>
                                            <option value="山东">
                                                山东
                                            </option>
                                            <option value="河南">
                                                河南
                                            </option>
                                            <option value="湖北">
                                                湖北
                                            </option>
                                            <option value="湖南">
                                                湖南
                                            </option>
                                            <option value="广东">
                                                广东
                                            </option>
                                            <option value="海南">
                                                海南
                                            </option>
                                            <option value="四川">
                                                四川
                                            </option>
                                            <option value="贵州">
                                                贵州
                                            </option>
                                            <option value="云南">
                                                云南
                                            </option>
                                            <option value="陕西">
                                                陕西
                                            </option>
                                            <option value="甘肃">
                                                甘肃
                                            </option>
                                            <option value="青海">
                                                青海
                                            </option>
                                            <option value="台湾">
                                                台湾
                                            </option>
                                            <option value="广西壮族自治区">
                                                广西壮族自治区
                                            </option>
                                            <option value="内蒙古自治区">
                                                内蒙古自治区
                                            </option>
                                            <option value="西藏自治区">
                                                西藏自治区
                                            </option>
                                            <option value="宁夏回族自治区">
                                                宁夏回族自治区
                                            </option>
                                            <option value="新疆维吾尔自治区">
                                                新疆维吾尔自治区
                                            </option>
                                            <option value="香港特别行政区">
                                                香港特别行政区
                                            </option>
                                            <option value="澳门特别行政区">
                                                澳门特别行政区
                                            </option>
                                        </select>
                                        <select name="city" id="city"
                                                style=" width:16%; height:25px;line-height:30px; ">
                                            <option value="">请选择城市</option>
                                        </select>
                                        <script src="<?php echo HOME_JS_URL?>联动下拉框.js"></script>
</td>
                                </tr>
                                <tr>
                                    <td align="right">产品单价:</td>
                                    <td><input type="text" class="size" name="pur_good_price"
                                               required="required"/></td>

                                </tr>
                                <tr>
                                    <td align="right" align="right">截止时间：</td>
                                    <td><input id="hello" class="laydate-icon" name="effective_time"
                                                     type="text" required="required"/>
            <script>
                laydate({
                    elem: '#hello', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
                    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
                });
            </script></td>
                                </tr>

									<tr>
                                        <td align="right" align="right">分类：</td>
                                        <td id="test1" >
                                            <input type="hidden" class="pclass" value="010000"/>
                                            <input type="hidden" class="class" value="010100"/>
                                            <input type="hidden" class="area" value="010101"/>
                                            <div name="pclass" type="selectbox" style="z-index:2;" />
                                                <div class="opts"></div>
                                            </div>
                                            <div name="class" type="selectbox" style="z-index:2;">
                                                <div class="opts"></div>
                                            </div>  
                                         </div>
                         			</tr>

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
                                    <td  valign="top" align="right">产品描述：</td>
                                    <td height="40"><textarea rows="10" cols="10" class="big" name="pur_description"
                                                              required="required"/> </textarea></td>

                                </tr>
                                
                                <tr>
                                <td align="right" align="right">上传图片</td>
                                <td><input type="file" name="photo" /></td>
                                </tr>
                                
                                <tr>
                                    <td align="right" height="40"></td>
                                    <!--<td align="left" height="40"><a href="/mucaiwang/index.php/Home/Buy/buy/offer_id/<?php echo ($offerS["offer_id"]); ?>/home_id/<?php echo (session('home_id')); ?>"><img src="<?php echo HOME_IMG_URL?>37.jpg" ail="求购"/>&nbsp;</a></td>-->
                                    <td align="left" height="40"><input type="SUBMIT" value="提交"></td>

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