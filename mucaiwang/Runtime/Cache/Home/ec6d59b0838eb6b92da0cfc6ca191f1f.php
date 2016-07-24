<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>global.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_URL?>purchase.css"/>

      <script src="<?php echo HOME_JS_URL?>jquery-1.9.1.min.js" type="text/javascript"></script>


    <!--分类-->
    <script src="<?php echo HOME_JS_URL?>class.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>class_min.js" type="text/javascript"></script>

    <!--城市-->
    <script src="<?php echo HOME_JS_URL?>Area.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>AreaData_min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo HOME_JS_URL?>laydate/laydate.js"></script>

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
                                    <td width="300" height="20">

                                        <script type="text/javascript">
                                            $(function (){
                                                initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '0', '0', '0');
                                            });

                                            //得到地区码
                                            function getAreaID(){
                                                var area = 0;
                                                if($("#seachdistrict").val() != "0"){
                                                    area = $("#seachdistrict").val();
                                                }else if ($("#seachcity").val() != "0"){
                                                    area = $("#seachcity").val();
                                                }else{
                                                    area = $("#seachprov").val();
                                                }
                                                return area;
                                            }

                                            //根据地区码查询地区名
                                            function getAreaNamebyID(areaID){
                                                var areaName = "";
                                                if(areaID.length == 2){
                                                    areaName = area_array[areaID];
                                                }else if(areaID.length == 4){
                                                    var index1 = areaID.substring(0, 2);
                                                    areaName = area_array[index1] + " " + sub_array[index1][areaID];
                                                }else if(areaID.length == 6){
                                                    var index1 = areaID.substring(0, 2);
                                                    var index2 = areaID.substring(0, 4);
                                                    areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
                                                }
                                                return areaName;
                                            }
                                        </script>
                                        <select   style=" height: 27px;width:100px"   id="seachprov" name="province" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                                        <select style=" height: 27px;width:100px" id="seachcity" name="city" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                                        <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict" hidden="hidden"></select></span>

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
                                        </script>


                                    </td>
                                </tr>

									<tr>
                                        <td align="right" align="right">分类：</td>
                                        <td>
                                            <script type="text/javascript">
                                                $(function (){
                                                    initComplexArea('pclass', 'class', 'seachdistrict', pclass_array, class_array, '0', '0', '0');
                                                });

                                                //得到地区码
                                                function getAreaID(){
                                                    var area = 0;
                                                    if($("#seachdistrict").val() != "0"){
                                                        area = $("#seachdistrict").val();
                                                    }else if ($("#class").val() != "0"){
                                                        area = $("#class").val();
                                                    }else{
                                                        area = $("#pclass").val();
                                                    }
                                                    return area;
                                                }

                                                //根据地区码查询地区名
                                                function getAreaNamebyID(areaID){
                                                    var areaName = "";
                                                    if(areaID.length == 2){
                                                        areaName = pclass_array[areaID];
                                                    }else if(areaID.length == 4){
                                                        var index1 = areaID.substring(0, 2);
                                                        areaName = pclass_array[index1] + " " + class_array[index1][areaID];
                                                    }else if(areaID.length == 6){
                                                        var index1 = areaID.substring(0, 2);
                                                        var index2 = areaID.substring(0, 4);
                                                        areaName = pclass_array[index1] + " " + class_array[index1][index2] + " " + sub_arr[index2][areaID];
                                                    }
                                                    return areaName;
                                                }
                                            </script>

                                            <select style=" height: 27px;width:100px" id="pclass" name="pclass" onChange="changeComplexProvince(this.value, class_array, 'class', 'seachdistrict');"></select>&nbsp;&nbsp;
                                            <select style=" height: 27px;width:100px" id="class" name="class" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                                            <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict" hidden="hidden"></select></span>


                                        </td>

                         			</tr>


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
                                    <td align="left" height="40"><input type="SUBMIT" value="提交"></td>
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