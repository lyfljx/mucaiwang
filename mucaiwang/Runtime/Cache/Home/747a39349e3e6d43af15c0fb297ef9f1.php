<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title></title>
</head>
<body>
<form enctype="multipart/form-data" method="post" action="/mucaiwang//index.php/Home/Pro/kind">
    <table border="1px" cellpadding="2" cellspacing="">

        </tr>
        <tr>
            <td align="right" valign="top">文章描述</td>
            <td>
                <!-- KindEditor -->
                <!--<link rel="stylesheet" href="<?php echo HOME_JS_URL?>kindeditor/themes/default/default.css" />-->
                <link rel="stylesheet" href="<?php echo HOME_JS_URL?>kindeditor/themes/default/default.css"/>
                <link rel="stylesheet" href="<?php echo HOME_JS_URL?>kindeditor/plugins/code/prettify.css"/>
                <script charset="utf-8" src="<?php echo HOME_JS_URL?>kindeditor/kindeditor.js"></script>
                <script charset="utf-8" src="<?php echo HOME_JS_URL?>kindeditor/lang/zh_CN.js"></script>
                <script charset="utf-8" src="<?php echo HOME_JS_URL?>kindeditor/plugins/code/prettify.js"></script>
         




                    //批量上传

                <!-- /KindEditor -->
                <textarea id="content" name="content" style="width:780px;height:400px;" class="textArea"></textarea>
            </td>
        </tr>

        <tr>

            <td>dssdsadsadasd</td>

            <td>


                <div class="upload">
                    <p><input type="text" id="url1" value="" name="img"/> <input type="button" id="image1"
                                                                                 value="选择图片"/>（网络图片 + 本地上传）</p>

                    <!--<input class="ke-input-text" type="text" id="url" value="" readonly="readonly" />-->
                    <!--<input type="button" id="uploadButton" value="Upload" />-->
                </div>


            </td>

        </tr>
        <!--<tr>-->

            <!--<td>-->


                <!--<input type="button" id="J_selectImage" value="批量上传"/>-->

            <!--</td>-->
            <!--<td>-->
                <!--<div id="J_imageView"/></div>-->
            <!--</td>-->
        <!--</tr>-->

        <tr>

            <td>

                <input type="submit" value="提交"/>


            </td>


        </tr>


    </table>


</form>

</body>
</html>