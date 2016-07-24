<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <script type="text/javascript" src="<?php echo HOME_JS_URL ?>list.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL ?>index.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL ?>global.css"/>

</head>
<body>
<div id="header">

</div>
<div id="search">
    <div><a href=""><img src="<?php echo HOME_IMG_URL?>logo.png"/></a></div>
    <div class="logo-title"><span>权威·专业·专著</span></div>
    <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/>
        <input type="submit" name="" value="搜索" class="submit"/></p>
</div>
<?php if($user["user_id"]== 0): ?><a href="<?php echo U('Home/User/login');?>" title="登录">登录</a>
    <?php else: ?>
    当前用户：<?php echo ($user["user_name"]); ?>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Comuser/index');?>">用户管理页面</a>
    <a href="<?php echo U('Home/User/outLogin');?>" title="退出登录">退出登录</a><?php endif; ?>
<a href="<?php echo U('Home/User/register');?>" title="注册">注册</a>

<div id="nav">
    <ul>
        <li><a href="#">首页</a></li>
        <li><a href="#">木材商城</a></li>
        <li><a href="<?php echo U('Home/Index/allBuy');?>">求购</a></li>
        <li><a href="#">报价</a></li>
        <li><a href="<?php echo U('Home/Index/allNew');?>">新闻</a></li>
        <li><a href="<?php echo U('Home/Index/allAlert');?>">快讯</a></li>
        <li><a href="#">行情</a></li>
        <li><a href="#">联系我们</a></li>
    </ul>
</div>
<div id="buy">
    <div id="title">
        <ul>
            <li><a href="#" title="木材求购" onmouseover="list_1_change()">木材求购</a></li>
            <li><a href="#" title="木材报价" onmouseover="list_2_change()">木材报价</a></li>
        </ul>
    </div>
    <div class="list" id="list_1">
        <ul>
            <?php if(is_array($purchase)): foreach($purchase as $key=>$u): ?><li><span>[求购]</span><a href="<?php echo U('Home/Index/showPur',array('pur_id'=>$u['pur_id']));?>" title="<?php echo ($u['pur_good_rname']); ?>"><?php echo ($u['pur_good_rname']); ?></a></li><?php endforeach; endif; ?>
        </ul>
         <a href="<?php echo U('Home/Index/allBuy');?>">更多</a>
          <a href="<?php echo U('Home/Buy/wantBuy');?>">我要求购</a>
    </div>
  
    <div class="list" id="list_2">

        <ul>
            <?php if(is_array($info)): foreach($info as $key=>$v): ?><li><span>[报价]</span><a href="/mucaiwang/index.php/Home/Index/listOffer/offer_id/<?php echo ($v["offer_id"]); ?>/buyer_id/<?php echo (session('home_id')); ?>" title="花旗松原木"><?php echo ($v["offer_description"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
        <a href="<?php echo U('Home/Index/moreOffer');?>">更多</a>
        <a href="<?php echo U('Home/Offer/offer_order');?>">我要报价</a>
    </div>
</div>
<div id="body">
    <!-- <div id="smallnav">
        <ul>
            <li><a href="#" title="木业要闻">木业要闻</a></li>
            <li><a href="#" title="商业数据">商业数据</a></li>
            <li><a href="#" title="木材推荐">木材推荐</a></li>
            <li><a href="#" title="木材种类">木材种类</a></li>
        </ul>
    </div> -->
   
    <div id="content">
     <p id="news">
    	<a href="<?php echo U('Home/Index/allNew');?>" title="新闻" class="news-title">新闻</a> <span class="more"><a href="<?php echo U('Home/Index/allNew');?>">更多 >></a></span>
    </p>
        <div id="top-title"><h1><a href="<?php echo U('Home/Index/showNew',array('nid'=>$newTop['id']));?>"><?php echo ($newTop["title"]); ?></a></h1></div>
        <div class="market">
            <dl>
                <?php if(is_array($newJpg)): foreach($newJpg as $key=>$v): ?><dl>
                        <dd>• <a href="<?php echo U('Home/Index/showNew',array('nid'=>$v['id']));?>" ><?php echo ($v['title']); ?></a></dd>
                    </dl><?php endforeach; endif; ?>
            </dl>
        </div>
        <div id="left-news">
        <?php if(is_array($newTwo)): foreach($newTwo as $key=>$v): ?><div class="redwood_pic"><a href="<?php echo U('Home/Index/showNew',array('nid'=>$v['id']));?>" title="<?php echo ($v['title']); ?>"><img src="<?php echo ($v['img']); ?>" width="250" height="180"></a>
                <p class="pic-name"><a href="<?php echo U('Home/Index/showNew',array('nid'=>$v['id']));?>" title="<?php echo ($v['title']); ?>"><?php echo ($v['title']); ?></a></p>
            </div><?php endforeach; endif; ?>

        </div>
    </div>
</div>
<div id="news">
    <a href="<?php echo U('Home/Index/allAlert');?>" title="快讯" class="news-title">快讯</a> <span class="more"><a href="<?php echo U('Home/Index/allAlert');?>">更多 >></a></span>
    <ul>
    	<?php if(is_array($alert)): foreach($alert as $key=>$v): ?><li><span><?php echo (date('y-m-d H:i:s',$v["time"])); ?></span><br/><a href="<?php echo U('Home/Index/showAlert',array('nid'=>$v['id']));?>" title="<?php echo ($v['title']); ?>"><?php echo ($v["title"]); ?></a></li><?php endforeach; endif; ?>
    </ul>
</div>
<div id="footer">
    <div>
        <p><a href="">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="">会员帮助</a>|<a href="">联系我们</a>|<a
                href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
        <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
        <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
    </div>
</div>
</body>
</html>