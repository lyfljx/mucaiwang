<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>global.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo (HOME_CSS_URL); ?>shen-he.css"/>

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


  <table width="980" cellpadding="0" cellspacing="0">
        <tr class="title-bg"><td width="20" height="25"></td><td valign="middle"  colspan="3"> 现在位置：<a href="">首页</a> &gt; <a href="">求购</a> &gt; <?php echo ($pur["pur_good_rname"]); ?></td></tr>
  </table>
  <table width="756" height="470" cellpadding="0" cellspacing="0"  align="center">
      <tr>               
        <td width="756" height="30" valign="middle" align="center" colspan="2"  class="sell-title">
          <span><?php echo ($pur["pur_good_rname"]); ?>行情</span></td>
      </tr>
      <tr><td width="450" valign="top">
            <table height="300" cellpadding="0" cellspacing="0">
              <tr><td width="150" height="10" colspan="2"></td></tr>
              <tr bgcolor="#f7f7f7"><td width="200" height="15" align="right">求购产品名称：</td><td width="280"><?php echo ($pur["pur_good_rname"]); ?></td></tr>
              <tr><td height="15" align="right">类别：</td><td align="left"><?php echo ($pclass); echo ($class); ?></td></tr>
              <tr bgcolor="#f7f7f7"><td height="15" align="right">规格：</td><td> <?php if($uid!=0): echo ($pur["pur_good_rsize"]); endif; if($uid==0): ?>请<a href="<?php echo U('Home/User/login');?>">  登录  </a>后查看<?php endif; ?></td></tr>
              <tr bgcolor="#f7f7f7"><td height="15" align="right">价格：</td><td>[ <span class="phone"><?php if($uid!=0): echo ($pur["pur_good_price"]); endif; if($uid==0): ?>请<a href="<?php echo U('Home/User/login');?>">  登录  </a>后查看<?php endif; ?></span> ]</td></tr>
              <tr><td height="23" align="right">求购地点：</td><td><?php echo ($place); ?></td></tr>  
              <tr bgcolor="#f7f7f7"><td height="15" align="right">求购公司：</td><td><?php if($uid!=0): echo ($com["com_name"]); endif; if($uid==0): ?>请<a href="<?php echo U('Home/User/login');?>">  登录  </a>后查看<?php endif; ?></td></tr>
              <tr><td height="15" align="right">发布日期：</td><td><?php echo (date('Y-m-d',$pur["release_time"])); ?></td></tr>
              <tr bgcolor="#f7f7f7"><td height="15" align="right">截止时间：</td><td><?php echo ($pur["effective_time"]); ?></td></tr> 
       	
       		  <tr>
                    <td height="15" align="right" valign="top">描述：</td>
                    <td width="280" height="60"><textarea  cols="40" rows="10" readonly="readonly"><?php echo ($pur["pur_description"]); ?></textarea></td>
              </tr>
              
              

  <form action="<?php echo U('Home/Buy/buyoff');?>" method="post">
	<?php if($uid==0): ?><tr bgcolor="#f7f7f7"><td width="170" height="15"><td width="170" height="15">请<a href="<?php echo U('Home/User/login');?>">  登录  </a>后报价</td></td></tr>
		<tr bgcolor="#f7f7f7"><td width="170" height="15" ><td width="170" height="15" ><img src="<?php echo HOME_IMG_URL?>2.gif" ail="报价"/>&nbsp;</td></td></tr>
	<?php else: ?>
		<?php if($uid==$pur['pur_user_id']): ?><tr bgcolor="#f7f7f7" ><td> <td height="15" align="middle"><a href="<?php echo U('Home/Comuser/index');?>">查看我的更多表单</a></td></td></tr>
		<?php else: ?>
			 <?php switch($index): case "1": ?><tr bgcolor="#f7f7f7"><td><td height="15">已经报价</td></td></tr><?php break;?>
        		<?php case "0": ?><td><input type="hidden" name="oid" value="<?php echo ($uid); ?>"></td>
					<td><input type="hidden" name="pid" value="<?php echo ($pur['pur_id']); ?>"></td>
					<tr bgcolor="#f7f7f7"><td height="15" align="right">你的价格：</td><td><input type="text" name="yourPrice"/></td></tr>
					<tr> <td height="15" align="right"><input type="submit" value="报价"></input></td></tr><?php break; endswitch; endif; endif; ?>
</form> 
         
               
  
              
              
              
            </table></td>
            <td valign="top" align="center">
              <table>
              <?php if($pur['jpg']==1): ?><tr><td width="250" height="190" ><img src="<?php echo HOME_IMG_URL?>buy/<?php echo (date("Ymd",$pur['release_time'])); ?>/<?php echo ($pur['pur_id']); ?>.jpg" width="250" height="190"></td><tr>
              <?php else: ?>
              	 	<tr><td width="250" height="190" ><img src="<?php echo HOME_IMG_URL?>buy/0.jpg",###}/<?php echo ($pur['pur_id']); ?>.jpg" width="250" height="190"></td><tr><?php endif; ?>
              <tr><td align="center"><?php echo ($pur["pur_good_rname"]); ?></td></tr>
              </table></td></tr>
  </table>



  <div id="footer">
      <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
       <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
       <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
  </div>
</body>
</html>