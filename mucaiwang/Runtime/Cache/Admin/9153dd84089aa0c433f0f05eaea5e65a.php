<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<table  border="1px solid " cellpadding="2" cellspacing="0" >
    <tr>
        <td align="center">订单序号</td>
        <td align="center">产品名字</td>
        <td align="center">分类</td>
        <td align="center">产品价格</td>
        <td align="center">产品规格</td>
        <td align="center">求购地点</td>
        <td align="center">求购用户</td>
        <td align="center">报价人</td>
        <td align="center">产品描述</td>
        <td align="center">创建时间</td>
        <td align="center">截止时间</td>
        <td align="center">是否过期</td>

    </tr>
      <?php if(is_array($buy)): foreach($buy as $key=>$v): ?><tr>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pur_id"]); ?></td>
           <td align="center"><?php echo ($v["pur_good_rname"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pclass"]); ?></td>
           <td align="center"><?php echo ($v["pur_good_price"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pur_good_rsize"]); ?></td>
           <td align="center" bgcolor="#7fffd4"><?php echo ($v["pur_place"]); ?></td>
           <td align="center"><a href="<?php echo U('Admin/Buy/buyUser',array('uid'=>$v['pur_user_id']));?>"><?php echo ($v["pur_user_name"]); ?></a></td>
           <td align="center"><a href="<?php echo U('Admin/Buy/offer',array('pid'=>$v['pur_id']));?>"><?php if($v['off2']==1): ?>查看<?php endif; if($v['off2']==2): ?>有新的报价人<?php endif; ?></a></td>
           <td><textarea cols="20"><?php echo ($v["pur_description"]); ?></textarea></td>
           <td align="center" bgcolor="#7fffd4"><?php echo date("Y-m-d",$v["release_time"]);?></td>
           <td align="center"><?php echo ($v["effective_time"]); ?></td>
           <td align="center"> <?php if($v["outdate"]==0): ?>未过期<?php endif; ?>
           <?php if($v["outdate"]==1): ?>已过期<?php endif; ?></td>
          </tr><?php endforeach; endif; ?>
    <tr>
        <td colspan="20" style="text-align: center;">
            <?php echo ($pagelist); ?>
        </td>
    </tr>

</table>

</body>
</html>