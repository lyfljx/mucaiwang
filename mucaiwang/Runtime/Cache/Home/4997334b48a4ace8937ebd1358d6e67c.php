<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link type="text/css" rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>css.css" /> 
<link type="text/css" rel="stylesheet" href="<?php echo (HOME_CSS_URL); ?>news.css" /> 
<link href="<?php echo (HOME_CSS_URL); ?>global2.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>global.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>shen-he.css"/>
<style>
/*重定义链接颜色*/
a {color:#666;
	text-decoration:none;}
a:hover {color:#A53158;
	text-decoration:underline;
	}
.nav a{text-decoration:none;}
.nav-t a { color:#FFF}
</style>

<script type="text/javascript" src="http://style.chinatimber.org/global/js/global.js"></script>
</head>

<body>

  <div id="header">
    
  </div>
  <div id="search"> 
     <div><a href="#"><img src="<?php echo (HOME_IMG_URL); ?>logo.png"/></a></div>
     <div class="logo-title"><span>权威·专业·专著</span></div>
     <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/><input type="submit" name="" value="搜索" class="submit"/></p>
  </div>
    
  <div id="nav">
    <ul>
			<li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
			<li><a href="#">木材商城</a></li>
			<li><a href="<?php echo U('Home/Index/allBuy');?>">求购</a></li>
			<li><a href="#">报价</a></li>
	        <li><a href="<?php echo U('Home/Index/allNew');?>">新闻</a></li>
        <li><a href="<?php echo U('Home/Index/allAlert');?>">快讯</a></li>
			<li><a href="#">行情</a></li>
			<li><a href="#">联系我们</a></li>
    </ul>
  </div>

<div class="space1"></div>
<div id="head_bg">

</div>

<div class="space1"></div>

<script type="text/javascript">
document.getElementById("nav-item10").className="selcurrent"; 
changesclass("s-item5");
</script>

<div class="space1"></div>


<div class="space1"></div>
<div class="content">
	<div class="c1 border9">
		<div class="list_title"> 木材要闻</div>
		<div class="list_list">
			
<ul>
				
				<!-- <li>·<a href="56131.html" target="_blank">2014年11月兴业木材市场人造板行情总结</a>&nbsp;<span class="colorgray">2014/12/5</span></li> -->

			<?php if(is_array($new)): foreach($new as $key=>$v): ?><li>·<a href="<?php echo U('Home/Index/showNew',array('nid'=>$v['id']));?>" target="_blank"><?php echo ($v["title"]); ?></a>&nbsp;<span class="colorgray"><?php echo (date('y-m-d H:i:s',$v["time"])); ?></span></li><?php endforeach; endif; ?>
			</ul>
			<div class="page">
			<?php echo ($pagelist); ?>
	</div><font color="999999">
			
		</font></div><font color="999999">

	</font></div><font color="999999">

</font></div><font color="999999">
<div class="foot_bg">
<div class="space1"></div>
<div class="space1"></div>
<div class="foot_line"></div>
<div class="foot">
	<div class="foot_title"><a href="/about/about.asp" title="关于我们">关于我们</a> | <a href="/about/gg.asp" title="广告服务">广告服务</a> | <a href="/about/bank.asp" title="银行汇款">银行汇款</a> | <a href="/about/help.asp" title="会员帮助">会员帮助</a> | <a href="/about/tel.asp" title="联系我们">联系我们</a> | <a href="/about/guest.asp" title="访客留言">访客留言</a> | <a href="/about/m.asp" title="免责声明">免责声明</a> | <a href="/about/f.asp" title="服务条款">服务条款</a> | <a href="/about/d.asp" title="网站地图">网站地图</a></div>
	<div class="foot_copy">版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved </div>
	<div class="foot_beian">增值电信业务经营许可证：<a href="/about/icp.asp" target="_blank">粤B2-20100348</a> ICP备案：<a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备14005127号</a><span style="display:none"><!--统计开始--><script src="/stat.js" type="text/javascript"></script><script src="http://s23.cnzz.com/stat.php?id=729492&amp;web_id=729492" type="text/javascript" charset="gb2312"></script><script src="http://c.cnzz.com/core.php?web_id=729492&amp;t=z" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=729492" target="_blank" title="站长统计">站长统计</a>
<script src=" http://hm.baidu.com/h.js?9452a609e8dd962ad62fec90ef567a4c" type="text/javascript"></script><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" id="HolmesIcon1465295823" height="20" width="20"><param name="movie" value="http://eiv.baidu.com/hmt/icon/13.swf"><param name="flashvars" value="s=http://tongji.baidu.com/hm-web/welcome/ico?s=9452a609e8dd962ad62fec90ef567a4c"><param name="allowscriptaccess" value="always"><embed class="cxckgrcpfmeblveehvhw" type="application/x-shockwave-flash" name="HolmesIcon1465295823" src="http://eiv.baidu.com/hmt/icon/13.swf" flashvars="s=http://tongji.baidu.com/hm-web/welcome/ico?s=9452a609e8dd962ad62fec90ef567a4c" allowscriptaccess="always" height="20" width="20"></object><!--统计结束--></span></div>
	<div class="foot_kefu">会员客服QQ:<a target="blank" href="tencent://message/?uin=2095243485&amp;Site=www.chinatimber.org&amp;Menu=yes"><img src="/image/icon_qqonline.gif" alt="点击联系" border="0"></a>&nbsp;&nbsp;广告合作QQ:<a target="blank" href="tencent://message/?uin=914056606&amp;Site=www.chinatimber.org&amp;Menu=yes"><img src="/image/icon_qqonline.gif" alt="点击联系" border="0"></a>&nbsp;&nbsp;中国木材网QQ群：<a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=8a543ced3a31cf8e2cdb159be4d40bbd761a6ec27a5cade61232bcae665efaca"><img src="/image/qqgroup.png" alt="中国木材网QQ群" title="中国木材网QQ群" border="0"></a></div>
	<div class="foot_icp"><a href="http://210.76.65.188/" rel="nofollow"><img src="/style/global/img/waicon.gif" border="0" height="48" width="40"></a> <a href="http://210.76.65.188/" rel="nofollow"><img src="/style/global/img/gt.gif" border="0" height="48" width="40"></a></div>
</div>	
</div>


</font></body></html>