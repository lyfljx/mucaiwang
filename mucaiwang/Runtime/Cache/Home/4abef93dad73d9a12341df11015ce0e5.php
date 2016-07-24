<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <title>添加产品</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <link href="<?php echo HOME_CSS_URL?>mine.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo ADMIN_CSS_URL?>jquery.inputbox.css" type="text/css"/>

    <!--<script src="<?php echo ADMIN_JS_URL?>jquery.js" type="text/javascript"></script>-->
    <script src="<?php echo HOME_JS_URL?>jquery-1.7.min.js" type="text/javascript"></script>
    <!--分类-->
    <script src="<?php echo HOME_JS_URL?>class.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>class_min.js" type="text/javascript"></script>
    <!--城市-->
    <script src="<?php echo HOME_JS_URL?>Area.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>AreaData_min.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo HOME_JS_URL?>laydate.js"></script>
    <!--编辑器-->
    <script charset="utf-8" src="<?php echo HOME_JS_URL?>kindeditor/kindeditor.js"></script>
    　　　<script charset="utf-8" src="<?php echo HOME_JS_URL?>kindeditor/lang/zh_CN.js"></script>
    　　　<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('#editor_id');
    });
    var options = {
        cssPath : '/css/index.css',
        filterMode : true
    };
    var editor = K.create('textarea[name="content"]', options);
</script>
</head>
<body>
<div class="div_head">
			<span>
                <span style="float:left">当前位置是：产品管理-》添加产品信息</span>
			<span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none"
                       href="/mucaiwang//index.php/Home/Pro/showlist/pro_user_id/<?php echo (session('home_id')); ?>">【返回】</a>
                </span>
			</span>
</div>
<div></div>

<div style="font-size: 13px;margin: 10px 5px">
    <form action="/mucaiwang//index.php/Home/Pro/tianjia" method="post" enctype="multipart/form-data">
        <table  name="list"  border="1" width="70%" class="table_a" cellpadding="3" cellspacing="0" bgcolor="#cccccc">
            <input type="hidden" name="pro_create_time" value="<?php echo time(); ?>"/>
            <input type="hidden" name="com_id" value="<?php echo ($com["com_id"]); ?>"/>
            <tr>
                <td>产品名称</td>
                <td><input type="text" name="pro_name"/></td>
            </tr>
            <tr>
                <td>产品规格</td>
                <td><input type="text" name="pro_style"/></td>
            </tr>

            <tr>
            <tr>
                <td>产品价格</td>
                <td><input type="text" name="pro_unitprice"/></td>
            </tr>
            
            <tr>
                <td>生产地：</td>
                <td>
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
                <select   style=" height: 27px;width:100px"   id="seachprov" name="prov" onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                <select style=" height: 27px;width:100px" id="seachcity" name="city" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict" hidden="hidden"></select></span>

                <!--<td><input type="text" name="pro_local_area" /></td>-->
                </td>
            </tr>

            <tr>
                <td>产品图片</td>
                <td><input type="file" name="pro_album"/><span>注释：请上传500*500格式的图片</span></td>
            </tr>
            <tr>

                <td>分类</td>
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
                <td>
                    <select style=" height: 27px;width:100px" id="pclass" name="pclass" onChange="changeComplexProvince(this.value, class_array, 'class', 'seachdistrict');"></select>&nbsp;&nbsp;
                    <select style=" height: 27px;width:100px" id="class" name="class" onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                    <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict" hidden="hidden"></select></span>

<!--</div>-->

                        <!--<div name="area" type="selectbox" style="z-index:2;"><div class="opts"></div></div>-->
                    <!--</div>-->
                </td>
            </tr>
            <tr>
                <td>截止时间</td>
                <!--<td><input type="text" name="pro_cut_time" value="2006-2-9"/></td>-->


                <td><input id="hello" class="laydate-icon" name="pro_cut_time"
                                                     type="text"></td>
            <script>
                laydate({
                    elem: '#hello', //目标元素。由于laydate.js封装了一个轻量级的选择器引擎，因此elem还允许你传入class、tag但必须按照这种方式 '#id .class'
                    event: 'focus' //响应事件。如果没有传入event，则按照默认的click
                });
            </script>
            </tr>
            <tr>
                <td>商品详细描述</td>
                <td>
                    <!--<textarea name="pro_desc" style="width: 559px; height: 203px;font-size: 14px"></textarea>-->
                    <textarea id="editor_id" name="pro_desc" style="width:700px;height:300px;"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="添加">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>

</html>