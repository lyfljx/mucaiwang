<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>求购</title>
</head>
<body>
<h2>求购</h2>
<form action="<?php echo U('Home/Buy/buyHandle');?>" method="post">
    <table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">

        <td><input type="hidden" name="offer_create_time"value="<?php echo time();?>"></td>
        <input type="hidden" name="offer_user_id"value="<?php echo (session('user_id')); ?>">
        <tr>
            <td align="right">产品名字：&nbsp;</td>
            <td><input type="text" name="pur_good_rname" placeholder="" required="required"/></td>

        </tr>
        <tr>
            <td align="right">产品规格：&nbsp;</td>
            <td><input type="text" name="pur_good_rsize" placeholder="" required="required"/></td>

        </tr>
          <tr>
            <td align="right">产品数量：&nbsp;</td>
            <td><input type="text" name="pur_good_rnumber" placeholder="" required="required"/></td>

        </tr>
        <tr>
            <td align="right">产品单价：&nbsp;</td>
            <td><input type="text" name="pur_good_price" placeholder="" value="面议"/></td>

        </tr>

        <tr>
            <td align="right">截止时间：&nbsp;</td>
            <td><input type="text" name="effective_time" placeholder="格式：2006-01-09" required="required"/></td>

        </tr>


        <tr>
            <td align="right">求购地点：&nbsp;</td>
            <td><input type="text" name="pur_place" placeholder="广东深圳" required="required"/></td>

        </tr>
        <tr>
            <td align="right">分类：&nbsp;</td>
            <td><input type="text" name="pur_class" placeholder="" required="required"/></td>

        </tr>

        <tr>
            <td align="right">产品描述：&nbsp;</td>
            <td><textarea name="pur_description"></textarea></td>

        </tr>


        <tr>
            <td colspan="2" align="center"><input type="submit"  value="求购"/></td>
        </tr>

    </table>
</form>
</body>
</html>





</div>

  <div id="footer">
      <p><a href="#">关于我们</a> |<a href="">广告服务</a>| <a href="">银行汇款</a>| <a href="#">会员帮助</a>|<a href="">联系我们</a>|<a href="">访客留言</a>|<a href="">负责声明</a>|<a href="">服务条款</a>|<a href="">网络地图</a></p>
       <p>版权所有 中国木材网 Copyright©2015 chinatimber.org. All Rights Reserved</p>
       <p>增值电信业务经营许可证：粤B2-20100348 ICP备案：粤ICP备14005127号</p>
  </div>
</body>
</html>