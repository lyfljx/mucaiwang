<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>报价</title>
    <!--产地-->
    <script src="<?php echo ADMIN_JS_URL?>jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo HOME_JS_URL?>laydate.js"></script>
    <script src="<?php echo HOME_JS_URL?>Area.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>AreaData_min.js" type="text/javascript"></script>
    <!--分类-->
    <script src="<?php echo HOME_JS_URL?>class.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>class_min.js" type="text/javascript"></script>

</head>
<body>
<h2>报价</h2>
<form action="<?php echo U('Home/Offer/offer_order');?>" method="post"
      enctype="multipart/form-data">
    <!--<form action="/mucaiwang//index.php/Home/User/userInfo/user_id/1" method="post">-->
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time" value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id" value="<?php echo (session('home_id')); ?>">

        <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
            <td align="right">用户名称：&nbsp;</td>
            <td><input type="text" name="user_name" placeholder="" required="required" value="<?php echo ($v["user_name"]); ?>"/></td>

        </tr>
        <tr>
            <td align="right">邮箱：&nbsp;</td>
            <td><input type="text" name="offer_p_size" placeholder="" required="required" value="<?php echo ($v["user_email"]); ?>"/></td>

        </tr>
        <tr>
            <td align="right">真实名字：&nbsp;</td>
            <td><input type="text" name="offer_price" placeholder="" value="面议" value="<?php echo ($v["user_true_name"]); ?>"/></td>
        </tr>
        <tr>
            <td align="right">分类：&nbsp;</td>
            <td>
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
                <!--<input type="text" name="offer_origin_place" placeholder="广东深圳" required="required"/>-->
                <!--<select id="pclass" name="pclass" onChange="changeComplexProvince(this.value, class_array, 'class', 'seachdistrict');">-->
                   <select>
                 <option selected="selected"><?php echo ($v["prov_name"]); ?></option>

                </select>&nbsp;&nbsp;
                <select id="class" name="class"
                        onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"
                                                     hidden="hidden"></select></span>
            </td>
        </tr>
        <tr>
            <td align="right">产地：&nbsp;</td>
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
            <td><select id="seachprov" name="seachprov"
                        onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;&nbsp;
                <select id="seachcity" name="homecity"
                        onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;&nbsp;
                <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"
                                                     hidden="hidden"></select></span>
            </td>
            <!--<td><input type="text" name="offer_pro_class" placeholder="" required="required"/></td>-->
        </tr>
        <tr>
            <td align="right">产品描述：&nbsp;</td>
            <td><textarea name="offer_description" value=""></textarea></td>

        </tr>
        <tr>
            <td align="right">产品描述：&nbsp;</td>
            <td><textarea name="offer_description" value=""></textarea></td>

        </tr>
        <tr>
            <td align="right">产品描述：&nbsp;</td>
            <td><textarea name="offer_description" value=""></textarea></td>

        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="确定"/></td>
        </tr><?php endforeach; endif; ?>
    </table>
</form>
</body>
</html>