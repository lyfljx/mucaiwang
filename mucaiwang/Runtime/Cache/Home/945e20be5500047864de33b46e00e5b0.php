<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>

    <link rel="stylesheet" href="<?php  echo ADMIN_CSS_URL?>jquery.inputbox.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>purchase.css"/>


    <!--分类-->
    <script src="<?php echo ADMIN_JS_URL?>jquery.js" type="text/javascript"></script>


    <!--城市-->
    <!--<script src="<?php echo HOME_JS_URL?>jquery-1.7.min.js" type="text/javascript"></script>-->
    <script src="<?php echo HOME_JS_URL?>Area.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>AreaData_min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo HOME_JS_URL?>laydate.js"></script>

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
        <li><a href="<?php echo U('Index/index');?>">首页</a></li>
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
        <td valign="middle" colspan="3"> 现在位置：<a href="">首页</a> &gt; <a href="">报价</a> &gt; 木材报价</td>
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
                        <span>木材报价</span></td>
                </tr>
                <tr>
                    <td valign="top" align="ceneter" class="border">

                        <form action="<?php echo U('Home/Offer/offer_order');?>" method="post"
                              enctype="multipart/form-data">
                            <table style="line-height: 27px" width="80%">
                                <!--做隐藏域，传递用户id，方便在后台展示-->
                                <input type="hidden" class="size" name="offer_user_id"
                                       value="<?php echo (session('home_id')); ?>"/>
                                <input type="hidden" class="size" name="offer_create_time"
                                       value="<?php echo time(); ?>"/>
                                <!--<input type="hidden" class="size" name="offer_id"-->
                                <!--value="<?php echo ($offerS["offer_id"]); ?>"/>-->
                                <style type="text/css">

                                    .input input {

                                        height: 20px;

                                    }
                                </style>

                                <div style="width: 800px;height:500px;">

                                    <!--<tr>-->
                                    <!--<td width="300" height="20" align="right">产品名称：</td>-->
                                    <!--<td width="300" height="20"><input type="text" class="size"-->
                                    <!--name="offer_pro_name" required="required"/>-->
                                    <!--</td>-->
                                    <!--</tr>-->

                                    <div class="input" style="height: 30px;margin-top: 60px;padding:3px ">

                                        <span style="margin-left:240px; ">产品名称:</span>

                                        <span><input type="text" name="offer_pro_name" required="required"/></span>


                                    </div>
                                    <div class="input" style="height: 30px;padding:3px ">

                                        <span style="margin-left:240px; ">产品价格:</span>

                                        <span><input type="text" name="offer_price" required="required"/></span>


                                    </div>
                                    <div class="input" style="height: 30px;padding:3px ">

                                        <span style="margin-left:240px; ">产品规格:</span>

                                        <span><input type="text" name="offer_p_size" required="required"/></span>


                                    </div>
                                    <!--<div class="input" style="height: 30px;padding:3px ">-->

                                    <!--<span style="margin-left:261px; ">分类：</span>-->

                                    <!--<span><input type="text" name=""/></span>-->


                                    <!--</div>-->

                                    <!--<div class="input" style="height: 30px;padding:3px ">-->

                                    <!--<span style="margin-left:261px; ">产地：</span>-->

                                    <!--<span><input type="text" name="offer_origin_place" required="required"/></span>-->


                                    <!--</div>-->
                                    <!--城市-->
                                    <script type="text/javascript">
                                        $(function () {
                                            initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '0', '0', '0');
                                        });

                                        //得到地区码
                                        function getAreaID() {
                                            var area = 0;
                                            if ($("#seachdistrict").val() != "0") {
                                                area = $("#seachdistrict").val();
                                            } else if ($("#seachcity").val() != "0") {
                                                area = $("#seachcity").val();
                                            } else {
                                                area = $("#seachprov").val();
                                            }
                                            return area;
                                        }

                                        //根据地区码查询地区名
                                        function getAreaNamebyID(areaID) {
                                            var areaName = "";
                                            if (areaID.length == 2) {
                                                areaName = area_array[areaID];
                                            } else if (areaID.length == 4) {
                                                var index1 = areaID.substring(0, 2);
                                                areaName = area_array[index1] + " " + sub_array[index1][areaID];
                                            } else if (areaID.length == 6) {
                                                var index1 = areaID.substring(0, 2);
                                                var index2 = areaID.substring(0, 4);
                                                areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
                                            }
                                            return areaName;
                                        }
                                    </script>
                                    <div class="input" style="height: 25px;padding:3px ">


                                        <span style="margin-left:240px; ">报价地点:</span>
                                        <select style="height:20px;width: 80px" id="seachprov" name="seachprov"
                                                onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;
                                        <select style="height:20px;width: 80px" id="seachcity" name="homecity"
                                                onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;
                                        <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"
                                                                             hidden="hidden"></select></span>


                                        <!--<span><input type="text" name="offer"/></span>-->


                                    </div>
                                    <script type="text/javascript">
                                        $(function () {
                                            initComplexArea('pclass', 'class', 'seachdistrict', pclass_array, class_array, '0', '0', '0');
                                        });

                                        //得到地区码
                                        function getAreaID() {
                                            var area = 0;
                                            if ($("#seachdistrict").val() != "0") {
                                                area = $("#seachdistrict").val();
                                            } else if ($("#class").val() != "0") {
                                                area = $("#class").val();
                                            } else {
                                                area = $("#pclass").val();
                                            }
                                            return area;
                                        }

                                        //function showAreaID() {
                                        //	//地区码
                                        //	var areaID = getAreaID();
                                        //	//地区名
                                        //	var areaName = getAreaNamebyID(areaID) ;
                                        //	alert("您选择的地区码：" + areaID + "      地区名：" + areaName);
                                        //}

                                        //根据地区码查询地区名
                                        function getAreaNamebyID(areaID) {
                                            var areaName = "";
                                            if (areaID.length == 2) {
                                                areaName = pclass_array[areaID];
                                            } else if (areaID.length == 4) {
                                                var index1 = areaID.substring(0, 2);
                                                areaName = pclass_array[index1] + " " + class_array[index1][areaID];
                                            } else if (areaID.length == 6) {
                                                var index1 = areaID.substring(0, 2);
                                                var index2 = areaID.substring(0, 4);
                                                areaName = pclass_array[index1] + " " + class_array[index1][index2] + " " + sub_arr[index2][areaID];
                                            }
                                            return areaName;
                                        }
                                    </script>
                                    <div class="input" style="height: 25px;padding:3px ">
                                        <span style="margin-left:240px; ">分类:</span>&nbsp;&nbsp;
                                        <!--<span style="margin-left:262px;display: inline-block;margin-top: 6px ">分类：</span>-->
                                        <!--<div id="test1" style="margin-right:230px;display: inline-block;">-->

                                        <!--<input type="text" name="offer_origin_place" placeholder="广东深圳" required="required"/>-->
                                        <select style="height:20px;width: 80px" id="pclass" name="pclass"
                                                onChange="changeComplexProvince(this.value, class_array, 'class', 'seachdistrict');"></select>&nbsp;
                                        <select style="height:20px;width: 80px" id="class" name="class"
                                                onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                                        <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"
                                                                             hidden="hidden"></select></span>


                                        <!--<input type="hidden" class="pclass" value="010000"/>-->
                                        <!--<input type="hidden" class="class" value="010100"/>-->
                                        <!--<input type="hidden" class="area" value="010101"/>-->
                                        <!--<div name="pclass" type="selectbox" style="z-index:2;">-->
                                        <!--<div class="opts"></div>-->
                                        <!--</div>-->
                                        <!--<div name="class" type="selectbox" style="z-index:2;">-->
                                        <!--<div class="opts"></div>-->
                                        <!--</div>-->

                                        <!--<div name="area" type="selectbox" style="z-index:2;"><div class="opts"></div></div>-->
                                    </div>
                                    <!--</div>-->

                                    <div class="input" style="height: 30px;padding:3px ">

                                        <span style="margin-left:240px; ">截止时间:</span>

                                        <span><input id="hello" class="laydate-icon" name="offer_cut_time"
                                                     type="text" required="required"></td>
            <script>
                laydate({
                    elem: '#hello', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
                    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
                });
            </script></span>


                                    </div>


                                    <div class="input" style="padding:3px ">
                                        <div style="margin-left:230px;display: inline-block ">产品图片：</div>
                                        <span style="margin-top: 30px"><input type="file" id="url1" value="选择图片"
                                                                              name="pro_album" style="height: 30px"/>
                                      </span>

                                        <!--<input type="file" name="pro_album" style="height: 27px"/>-->


                                    </div>


                                    <div class="input" style="padding:3px ">
                                        <div style="margin-left:240px;display: inline-block;float: left">产品描述:</div>
                                            <span style="margin-top: 30px"><textarea rows="5" cols="20"
                                                                                     name="offer_description"></textarea></span>


                                    </div>


                                    <div class="input" style="height: 40px;margin: 50px;padding:3px ">
                                        <span style="margin-left:240px; "><input type="submit" value="提交"></span>
                                        <span style="padding:30px; "><input type="reset" value="重新输入"
                                                                            required="required"/></span>


                                    </div>
                                    <!--<td align="right" height="40"><input type="submit" value="提交"></td>-->
                                    <!--<td class="td-down"><input type="reset" value="重新输入" required="required"/></td>-->


                                </div>

                                </div>

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


<!--分类-->
<script src="<?php echo HOME_JS_URL?>class.js" type="text/javascript"></script>
<script src="<?php echo HOME_JS_URL?>class_min.js" type="text/javascript"></script>

</body>
</html>