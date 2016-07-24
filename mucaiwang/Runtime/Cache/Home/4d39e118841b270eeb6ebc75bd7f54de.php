<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL;?>index.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL;?>global.css"/>
    <script type="text/javascript" src="<?php echo HOME_JS_URL;?>list.js"></script>
</head>
<body>
  <div id="top-body">
  <div id="header">
  </div>
  <div id="search">
    <div><a href=""><img src="<?php echo HOME_IMG_URL;?>logo.png"/></a></div>
    <div class="logo-title"><span>权威·专业·专著</span></div>
    <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/>
    <input type="submit" name="" value="搜索" class="submit"/></p>
  </div>
      <?php if($user["user_id"]== 0): ?><a href="<?php echo U('Home/User/login');?>" title="登录">登录</a>
          <?php else: ?>
          当前用户：<?php echo ($user["user_name"]); ?>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Home/Comuser/index');?>">用户管理页面</a>
          <a href="<?php echo U('Home/User/outLogin');?>" title="退出登录">退出登录</a><?php endif; ?>
      <a href="<?php echo U('Home/User/register');?>" title="注册">注册</a>

    <div id="con">
     <ul>
      <li><a href="#">首页</a></li>
      <li><a href="<?php echo U('Home/Index/showPro');?>">木材商城</a></li>
      <li><a href="<?php echo U('Home/Index/allBuy');?>">求购</a></li>
      <li><a href="<?php echo U('Home/Index/moreOffer');?>">报价</a></li>
      <li><a href="<?php echo U('Home/Index/allNew');?>">新闻</a></li>
      <li><a href="<?php echo U('Home/Index/allAlert');?>">快讯</a></li>
      <li><a href="#">行情</a></li>
      <li><a href="#">联系我们</a></li>
      </ul>
      </div>
  <div id="buy">
    <div id="title">
        <ul>
          <li><a href="#" title="木材求购" onmouseover="list_1_change()" >木材求购</a></li>
          <li><a href="#" title="木材报价" onmouseover="list_2_change()">木材报价</a></li>
        </ul>
    </div>
    <div class="list" id="list_1">
      <ul class="list-more more"><li><a href="<?php echo U('Home/Index/allBuy');?>">更多求购》》</a></li></ul>
        <ul>
            <?php if(is_array($purchase)): foreach($purchase as $key=>$u): ?><li><span>[求购]</span><a href="<?php echo U('Home/Index/showPur',array('pur_id'=>$u['pur_id']));?>" title="<?php echo ($u['pur_good_rname']); ?>"><?php echo ($u['pur_good_rname']); ?></a></li><?php endforeach; endif; ?>
        </ul>
      <p><a href="<?php echo U('Home/Buy/wantBuy');?>"><input type="button" name="求购" value="我要求购"/></a><p>
    </div>
    <div class="list" id="list_2">
      <ul class="list-more more"><li><a href="<?php echo U('Home/Index/moreOffer');?>">更多报价》》</a></li></ul>
        <ul>
            <?php if(is_array($info)): foreach($info as $key=>$v): ?><li><span>[报价]</span><a href="/mucaiwang/index.php/Home/Index/listOffer/offer_id/<?php echo ($v["offer_id"]); ?>/buyer_id/<?php echo (session('home_id')); ?>" title="花旗松原木"><?php echo ($v["offer_description"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
      <p><a href="<?php echo U('Home/Offer/offer_order');?>"><input type="button" name="报价" value="我要报价"/></a><p>
    </div>
  </div>
  <div id="body">

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
</div>
<div class="ad-pic1">
  <div class="ad-left">
    <ul>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>dxwood.gif"></a></li>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>linken.gif"></a></a></li>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>shanghaihuagangwood.gif"></a></a></li>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>ps.gif"></a></li>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>fuhuawood.gif"></a></li>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>zhonglinmuye.gif"></a></li>
    </ul>
  </div>
  <div class="ad-right">
    <ul>
      <li><a href=""><img src="<?php echo HOME_IMG_URL;?>weimushangmao_big.gif"></a></li>
    </ul>
  </div>
</div>
<!--第二块内容开始--> 
    <!--价格行情开始-->
<div class="two-body">
  <div class="tw-left">
    <a href="" class="tw-title">价格行情</a>
      <span class="span-nav">
        <a href="" title="原木价格行情">原木</a>
        |
        <a href="" title="菜板木价格行情">菜板木</a>
        |      
        <a href="" title="人造木板价格行情">人造木板</a>
        |
        <a href="" title="湘潭木价格行情">湘潭木</a>
        |
        <a href="" title="紫檀木价格行情">紫檀木</a>
        |       
        <a href="" title="红村木价格行情">红村木</a>
        |
        <a href="" title="杉原木价格行情">杉原木</a>
        |
        <a href="" title="人造木板价格行情">人造木板</a>
        |
        <a href="" title="人造木板价格行情">人造木板</a>
      </span>
    <div class="tw-down-left" >
      <ul>
        <li>·<a href="">2016年4月18日桦木、椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
      </ul>
    </div>
    <div class="tw-down-right" >
      <ul>
        <li>·<a href="">桦木、椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日桦木椴木等木材价格行情</a></li>
        <li>·<a href="">2016年4月18日椴木等木材价格行情</a></li>
      </ul>
    </div>
  </div>
  <div class="tw-top-box">
    <a href="" class="tw-title">木材市场行情</a>
    <ul>
      <li>·<a href="">桦木、椴木等木材价格行情</a></li>
      <li>·<a href="">东方兴业城木材市场木材价格行情</a></li>
      <li>·<a href="">绥芬河口岸木材市场木材价格行情</a></li>
      <li>·<a href="">绥芬河口岸木材市场木材价格行情</a></li>
      <li>·<a href="">绥芬河口岸木材市场木材价格行情</a></li>
      <li>·<a href="">桦木、椴木等木材价格行情</a></li>
    </ul>
  </div>
  <div class="tw-down-box">
    <a href="" class="tw-title">各地行情</a>
    <ul>
      <li><a href="">广东</a></li>
      <li><a href="">山西</a></li>
      <li><a href="">安徽</a></li>
      <li><a href="">重庆</a></li>
      <li><a href="">北京</a></li>
      <li><a href="">上海</a></li>
      <li><a href="">江西</a></li>
      <li><a href="">河北</a></li>
      <li><a href="">四川</a></li>
      <li><a href="">内蒙</a></li>
      <li><a href="">吉林</a></li>
      <li><a href="">黑龙江</a></li>
      <li><a href="">福建</a></li>
      <li><a href="">甘肃</a></li>
      <li><a href="">浙江</a></li>
      <li><a href="">新疆</a></li>
      <li><a href="">云南</a></li>
      <li><a href="">贵州</a></li>
    </ul>
  </div>
</div>
  <!--价格行情结束-->
<div class="ad-pic1 ad-pic2">
     <img src="<?php echo HOME_IMG_URL;?>top_zs_s.jpg">
</div>
  <!--企业报价开始-->
<div class="two-down">
   <a href="" class="tw-title">企业报价</a><span class="more tw-more-title"><a href="">更多》》</a></span>
   <ul>
     <li><a href="">红木</a></li>
     <li><a href="">木皮</a></li>
     <li><a href="">人造木</a></li>
     <li><a href="">地板木</a></li>
     <li><a href="">门木</a></li>
     <li><a href="">木制品</a></li>
     <li><a href="">竹材</a></li>
     <li><a href="">五金化工</a></li>
     <li><a href="">木工机械</a></li>
     <li><a href="">板材原木</a></li>
  </ul>
  <div class="tw-table">
    <table cellpadding="0" cellspacing="0">
      <tr class="tw-tab-title">
        <td width="127" height="27" align="center">产品</td><td width="140" align="center">规格</td><td width="80" align="center">等级</td><td width="75" align="center">单价</td> <td width="56" align="center">单位</td><td width="60" align="center">产地</td><td width="238" align="center">报价企业</td><td width="70" align="center">日期</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">黑文字菓签9cm</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
      <tr>
        <td height="25"><a href="">木工机械高频拼板机</a></td><td>2600-1300-130mm</td><td>优等</td><td class="tab-price">1000</td><td>元/台</td><td>山东</td><td><a href="">青岛林海木工机械有限公司</a></td><td>4月19日</td>
      </tr>
    </table>
  </div> 
</div> 
<!--第二块内容结束-->
<div class="friend">
  <a href="" class="tw-title">友情链接</a>
    <ul>
      <li><a href="">中国超硬材料网</a></li>
      <li><a href="">中国超硬材料网</a></li>
      <li><a href="">中国材料网</a></li>
      <li><a href="">中国招标网材料网</a></li>
      <li><a href="">佛山二手房</a></li>
      <li><a href="">中国超硬材料网</a></li>
      <li><a href="">搜门网</a></li>
      <li><a href="">家具网</a></li>
      <li><a href="">叫卖网</a></li>
      <li><a href="">木材圈</a></li>
      <li><a href="">木业英才网</a></li>
      <li><a href="">中国木门网</a></li>
      <li><a href="">具人同行家具网</a></li>
      <li><a href="">上海房产网</a></li>
      <li><a href="">东方兴业网城</a></li>
      <li><a href="">宁波二手房</a></li>
      <li><a href="">家具</a></li>
    </ul>
</div>

<div id="footer">
  <div>
     <p><a href="">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="">会员帮助</a>|<a href="">联系我们</a>|<a href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
     <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
     <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
  </div>
 </div>
</body>
</html>