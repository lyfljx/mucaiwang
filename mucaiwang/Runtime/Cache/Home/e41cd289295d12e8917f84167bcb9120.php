<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
 <link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL?>global.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL?>lie-biao.css"/> 
</head>
<body>
  <div id="header">
    
  </div>
  <div id="search"> 
     <div><a href="#"><img src="<?php echo HOME_IMG_URL?>logo.png"/></a></div>
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

<table width="756" height="600" cellpadding="0" cellspacing="0">
  <tr>
    <td width="756" height="15" valign="top">
      <table width="756" height="15" cellpadding="0" cellspacing="0"  align="center" class="fon-color">
        <tr>
          <td width="70" height="15" valign="middle" align="center" bgcolor="#073f26"><span><a href="">发布供应</a></span>
            </td> 
            <td width="10"></td>
            <td width="70" bgcolor="#073f26" align="center"><span><a href="<?php echo U('Home/Buy/wantBuy');?>">发布求购</a></span></td>
            <td width="606"></td> 
        </tr>
      </table> 
    </td>
  </tr>

  <tr>
    <td width="756" height="15" valign="top" >
    <div class="tit-down">
        <table width="756" height="15" cellpadding="0" cellspacing="0" align="center">
          <tr class="title-bg">
            <td width="470" height="15" align="center">
               求购信息/公司名称 
            </td>
            <td width="180" align="center">价格(元)</td>
            <td width="106" align="center">求购地点</td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
  <?php if(is_array($buy)): foreach($buy as $key=>$v): ?><tr>
    <td width="756" valign="top">
      <div class="border">
        <table width="100%" cellpadding="0" cellspacing="0">
          <tr>
            <td width="470" height="117" valign="middle" >
              <span class="t-color">[求购]</span><a href="<?php echo U('Home/Index/showPur',array('pur_id'=>$v['pur_id']));?>"><span class="t-name"><?php echo ($v["pur_good_rname"]); ?></span></a>&nbsp;&nbsp;&nbsp;<span class="t-color"><?php echo (date('y-m-d H:i:s',$v["release_time"])); ?></span><br/>
              <span class="t-intro">[说明]<?php echo ($v["pur_description"]); ?></span>
            </td>
            <td width="180" align="center"><?php echo ($v["pur_good_price"]); ?><br/><br/><span class="t-price"><a href="<?php echo U('Home/Index/showPur',array('pur_id'=>$v['pur_id']));?>">我要报价</a></span></td>
            <td width="106" align="center"><span class="address">[<?php echo ($v["pur_place"]); ?> ]</span></td>
          </tr>
        </table>
      </div>
    </td>
  </tr><?php endforeach; endif; ?>
</table>







</div>

  <div id="footer">
      <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
       <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
       <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
  </div>
</body>
</html>