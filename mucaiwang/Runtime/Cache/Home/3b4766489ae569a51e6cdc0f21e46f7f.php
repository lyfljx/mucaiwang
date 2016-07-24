<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link rel="stylesheet" type="text/css" href="<?php echo HOME_CSS_URL?>showPro.css"/>

</head>
<body>
  <div class="nav">
    <span class="nav-top"><a href="">收藏本店 |</a>
    <a href="" style="color:purple">中国木材网</a></span>
    <a href=""><img src="<?php echo HOME_IMG_URL?>logo.jpg"></a>
    <ul>
      <li><a href="">联系我们</a></li>
      <li><a href="">信息反馈</a></li>
      <li><a href="">诚信档案</a></li>
      <li><a href="">公司动态</a></li>
      <li><a href="">人才招聘</a></li>
      <li><a href="">产品展厅</a></li>
      <li><a href="">公司介绍</a></li>
      <li><a href="">首页</a></li>
    </ul>
    <div class="nav-pic">
      <a href="">江门华港木业有限公司</a>
    </div>
  </div>
  <!-- 头部结束 -->
  <div class="content">
    <div class="left">
    </div>
    <div class="right">
      <table cellpadding="0" cellspacing="0">
        <tr class="tab-title">
        <td width="90" height="25">产品展示</td><td width="510"></td>
        </tr>
        <tr><td width="715" height="15" colspan="3"></td></tr>
      </table>
      <table cellpadding="0" cellspacing="0">
        <tr>
          <td width="325" height="20">
          产品名称：<span height="25" style="font-size:20px;color:#003399"><?php echo ($info["pro_name"]); ?></span></br>
          公 司 名：<?php echo $info['Com']['com_name']?></br>
          分    类：<?php echo ($info["pro_pclass"]); ?> >> <?php echo ($info["pro_class"]); ?></br>
          产品单价：<span style="color:red;font-weight:bold"><?php echo ($info["pro_unitprice"]); ?></span></br>
          <div class="price">
           请<a href="<?php echo U('Home/user/login');?>"><font color="blue">&nbsp;登录&nbsp;</font></a>
           后 询 价
            <div style="padding-top:8px;">
             <a href=""><img width="100" height="26" border="0" src="<?php echo HOME_IMG_URL?>btn_inquiry.gif"/></a>
            </div>
           </div>
          规    格：<?php echo ($info["pro_style"]); ?></br>
          <!--等    级：E0           </br>-->
          产    地：<?php echo ($info["pro_grow_area"]); ?> </br>
          更新时间：<?php echo date('Y-m-d',$info['pro_create_time']) ?></br>
          所在地点： <?php echo ($info["pro_local_area"]); ?></br>
          </td>
          <td width="40"></td>
          <td width="340">
            <table>
              <tr><td width="340" height="40"></td></tr>
              <tr><td width="340" height="300" align="center" style="border:1px solid #cccccc"><a href=""><img src="<?php echo SILE_URL; echo ($info["pro_albumpath"]); ?>" width="300" height="280"></a></td></tr>
            </table>
            </td>
        </tr>
      </table>
      <!-- 产品展示结束 -->
      <div class="introducing">
        <p class="intro-title">产品介绍</p>
        <p><?php echo ($info["pro_desc"]); ?></p>
        <!--<p>1：选自中国适宜杉木生长气候条件的南岭地区。采用具有30年树龄以上的中、大径杉木，材质性能稳定，原始木纹完美呈现。杉木中所含香杉木醇对人体有消除疲劳、舒解压力的保健作用。</p>-->
        <!--<p>2：使用新型水性高分子异氰酸酯胶，环保等级达到国家高标准EO级。它属非甲醛系列，彻底远离了甲醛、笨等有害物质对人体的危害，同时保留住天然的原木香味，故非常适用儿童房专修。</p>-->
        <!--<p>3：采用国际先进的全自动机拼生产线，经过28道工序精制而成，保证内在的芯条全部都是标准规格的实木而且胶合强度完全达到国家标准。</p>-->
        <!--<p>4：专用技术烘干，含水率严格控制在国标范围内，板材平整不变形。采用优质一级桉木做中板。确保板面平整大方，成板结构层次分明。</p>-->
      </div>
    </div> 
  </div>
  <div class="foot">
    <span class="foot-pic"><img src="<?php echo HOME_IMG_URL?>logo2.gif"></span>
    <span class="foot-list"><a href="">公司介绍</a> | <a href="">人才招聘</a> | <a href="">档案管理</a> | <a href="">联系我们</a></br>
      <span>Copyright chinatimber.org All Rights Reserved.</span>
    </span>
 </div>


</body>
</html>