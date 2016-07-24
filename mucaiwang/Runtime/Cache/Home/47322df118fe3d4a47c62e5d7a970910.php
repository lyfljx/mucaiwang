<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo (CSS_URL); ?>index.css" />
</head>
<body>
<div id="header">
	<img src="<?php echo (IMG_URL); ?>16.jpg" width="980px" height="200px">
</div>
<div id="search">
  <p class="arch"><input type="text" name="" value="请输入内容：" id="" class="text"/>
  <input type="submit" name="" value="搜索" class="submit"/></p>
</div>
    
  <div id="nav">
   <ul>
    <li><a href="#">首页</a></li>
    <li><a href="#">木材商城</a></li>
    <li><a href="#">求购</a></li>
    <li><a href="#">报价</a></li>
    <li><a href="#">资讯</a></li>
    <li><a href="#">行情</a></li>
    <li><a href="#">联系我们</a></li>
    </ul>
    </div>
<div id="buy">
        <div class="title">
          <h1><a href="#" title="木材求购">木材求购</a></h1>
          <h1><a href="#" title="木材报价">木材报价</a></h1>
         </div>
  <div class="list">
  <ul>

     <li>[求购]<a href="#" title="花旗松原木">花旗松原木</a></li>
     <li>[求购]<a href="#" title="杉原木">杉原木 </a></li>
     <li>[求购]<a href="#" title="杉木,红椿木,柏木">杉木,红椿木,柏木</a></li>
     <li>[求购]<a href="#" title="桦木小料，薄板！">桦木小料，薄板！</a></li>
     <li>[求购]<a href="#" title="东北桦木板材，方子木">东北桦木板材，方子木</a></li>
     <li>[求购]<a href="#" title="常年收购密度板废料边角料">常年收购密度板废料边角料</a></li>
     <li>[求购]<a href="#" title="密度板厂家具模具工艺品厂的密度纤维板边角废料">密度板厂家具模具工艺品厂的密度纤维板边角废料</a></li>
     <li>[求购]<a href="#" title="进口国产闲置木工机械">进口国产闲置木工机械</a></li>
     <li>[求购]<a href="#" title="梓木半成品">梓木半成品</a></li>
     <li>[求购]<a href="#" title="长期求购密度板下脚料、家具厂密度板下脚料">长期求购密度板下脚料、家具厂密度板下脚料</a></li>
     <li>[求购]<a href="#" title="桦木中板">桦木中板</a></li>
     <li>[求购]<a href="#" title="实木门">实木门</a></li>
     <li>[求购]<a href="#" title="木菜板">木菜板</a></li>
     <li>[求购]<a href="#" title="天津二手木托盘">天津二手木托盘</a></li>
     <li>[求购]<a href="#" title="各种板材，包装箱，床板，锹把，木棒，竹片，竹板">各种板材，包装箱，床板，锹把，木棒，竹片，竹板</a></li>
     <li>[求购]<a href="#" title="柏木（原木）">柏木（原木）</a></li>
     <li>[求购]<a href="#" title="老榆木房梁">老榆木房梁</a></li>
     <li>[求购]<a href="#" title="山纹水曲柳木皮">山纹水曲柳木皮</a></li>
     <li>[求购]<a href="#" title="杨木原木">杨木原木</a></li>
     <li>[求购]<a href="#" title="杨木">杨木</a></li>
 </ul>
  </div>
</div>
<div id="body">
    <div id="smallnav">
     <ul>
       <li><a href="#" title="木业要闻">木业要闻</a></li>
       <li><a href="#" title="商业数据">商业数据</a></li>
       <li><a href="#" title="木材推荐">木材推荐</a></li>
      <li><a href="#" title="木材种类">木材种类</a></li>
     </ul>
    </div>
  <div id="content">
       <div id="top-title"><h1><a href="#">市场新动向：木材的新世界道路</h1></a></div>
       <div class="market">
        <?php if(is_array($new)): foreach($new as $key=>$v): ?><dl>
          <dd>• <a href="<?php echo U('Home/Index/showNew',array('nid'=>$v['id']));?>" ><?php echo ($v['title']); ?></a></dd>
         </dl><?php endforeach; endif; ?>
          <dl>
          <dd><?php echo ($page); ?></dd>
          </dl>
        </div>
          <div id="left-news">
           <div class="redwood_pic"><a href="#" title="小赞市场血檀红木迎来热卖"><img src="<?php echo (IMG_URL); ?>12.jpg"    width="245px" height="200px"></a>
              <br/>
              <a href="#" title="小赞市场血檀红木迎来热卖">小赞市场血檀红木迎来热卖</a>
           </div>
           <div class="special">
              <ul>
                <li class="special-title">木业专题</li>
                <li>【<a href="#" title="红木产业（2015发布）">红木产业（2015发布）</a>】</li>
                <li>【<a href="#" title="2013-2014我国人造板发展情况">2013-2014我国人造板发展情况</a>】</li>
                <li>【<a href="#" title="第八届中国人造板发展论坛">第八届中国人造板发展论坛</a>】</li>
                <li>【<a href="#" title="012-2013对华胶合板反倾销国家盘点">2012-2013对华胶合板反倾销国家盘点</a>】</li>
                <li>【<a href="#" title="欧盟木材法规">欧盟木材法规</a>】</li>
                <li>【<a href="#" title="美国对华硬木胶合板“双反">美国对华硬木胶合板“双反</a>】</li>
                <li>【<a href="#" title="木材缺陷限度及平等规则">木材缺陷限度及平等规则</a>】</li>
              </ul>
          </div>
        </div>
  </div>
</div>
<div id="news">
  <p class="news-title"><a href="#" title="快讯">快讯</a></p><span class="more"><a href="#">更多 >></a></span>  <ul>
              <li><span>2016/3/31</span><br/><a href="#" title="南康家具在广东三大国际家具展中斩获颇丰">南康家具在广东三大国际家具展中斩获颇丰</li>
              <li><span>2015/11/17</span><br/><a href="#" title="东方兴业城荣获“中国特级木材市场”等三项荣誉称号">东方兴业城荣获“中国特级木材市场”等三项荣誉称号</a></li>
              <li><span>2015/7/7</span><br/><a href="#" title="从马斯洛需求层次理论看木材专业市场的服务">从马斯洛需求层次理论看木材专业市场的服务</a></li>
              <li><span>2015/9/21</span><br/><a href="#" title="委内瑞拉侨领考察东方兴业城">     委内瑞拉侨领考察东方兴业城></a></li>
              <li><span>2015/8/3</span><br/><a href="#" title="2015年7月东方兴业城人造板市场行情总结">2015年7月东方兴业城人造板市场行情总结</a></li>
              <li><span>2015/8/3</span><br/><a href="#" title="2015年7月东方兴业城木枋市场行情总结">2015年7月东方兴业城木枋市场行情总结</a></li>
        </ul>
</div>
<div id="footer">
 尾部
 </div>
</body>
</html>