<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>评论</title>

    <link href="<?php echo ADMIN_CSS_URL ?>style.css" type="text/css" rel="stylesheet">

</head>
<body>

<div id="container">
    <div class="timeline_container">
        <div class="timeline">
            <div class="plus"></div>
            <div class="plus2"></div>
        </div>
    </div>
    <?php if(is_array($data)): foreach($data as $key=>$vv): ?><div class="item">
            <h3><span class="fl">用户：<?php echo ($vv["user_name"]); ?></span></h3>
            <!--<span class="fr" style="font-size: 14px;"><?php echo ($vv["desc"]); ?></span>-->
            <p class="con" style="font-size: 14px;"><?php echo ($vv["desc"]); ?></p>
        </div><?php endforeach; endif; ?>
    <!--<div class="item">-->
    <!--<h3><span class="fl">柳州</span><span class="fr">IP：221.7.207***&nbsp;&nbsp;&nbsp;&nbsp;2013-02-21 08:39:32</span></h3>-->
    <!--<p class="con">很有创意</p>-->
    <!--<h4><b>Reply：</b>管理员尚未回复</h4>-->
    <!--</div>-->

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_URL ?>smohan.blog.plug.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#container').masonry({itemSelector: '.item'});

        function Arrow_Points() {
            var s = $("#container").find(".item");
            $.each(s, function (i, obj) {
                var posLeft = $(obj).css("left");
                if (posLeft == "0px") {
                    html = "<span class='rightcorner'></span>";
                    $(obj).prepend(html);
                } else {
                    html = "<span class='leftcorner'></span>";
                    $(obj).prepend(html);
                }
            });
        }

        Arrow_Points();

    });
</script>
</body>
</html>