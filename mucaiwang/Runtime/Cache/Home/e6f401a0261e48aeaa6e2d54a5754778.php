<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form>
<td height="28" bgcolor="#EFEFEF" align="center">
<td height="24" bgcolor="#FFFFFF" align="left">
    <script src="<?php echo HOME_JS_URL ?>test.js"></script>
    <select onchange="changelocation2(document.form.prov.options[document.form.prov.selectedIndex].value)" name="prov">
        <option value="1">北京</option>
        <option value="2">天津</option>
        <option value="3">河北</option>
        <option value="4">山西</option>
        <option value="5">内蒙古</option>
        <option value="6">辽宁</option>
        <option value="7">吉林</option>
        <option value="8">黑龙江</option>
        <option value="9">上海</option>
        <option selected="" value="10">江苏</option>
        <option value="11">浙江</option>
        <option value="12">安徽</option>
        <option value="13">福建</option>
        <option value="14">江西</option>
        <option value="15">山东</option>
        <option value="16">河南</option>
        <option value="17">湖北</option>
        <option value="18">湖南</option>
        <option value="19">广东</option>
        <option value="20">广西</option>
        <option value="21">海南</option>
        <option value="22">重庆</option>
        <option value="23">四川</option>
        <option value="24">贵州</option>
        <option value="25">云南</option>
        <option value="26">西藏</option>
        <option value="27">陕西</option>
        <option value="28">甘肃</option>
        <option value="29">青海</option>
        <option value="30">宁夏</option>
        <option value="31">新疆</option>
        <option value="32">台湾</option>
        <option value="33">香港</option>
        <option value="34">澳门</option>
        <option value="35">其它</option>
    </select>
    <select name="city">
       
    </select>
</form>
</body>
</html>