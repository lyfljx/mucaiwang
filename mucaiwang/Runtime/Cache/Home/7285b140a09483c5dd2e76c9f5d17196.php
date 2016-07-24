<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <title>会员列表</title>

    <link href="<?php echo HOME_CSS_URL?>mine.css" type="text/css" rel="stylesheet"/>
</head>

<body>

<div class="div_head">
			<span>
                <span style="float: left;">当前位置是：商品管理-》商品列表</span>
			<span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/mucaiwang//index.php/Home/Pro/tianjia" target='_self'>【添加商品】</a>
                </span>
			</span>
</div>
<div></div>
<div class="div_search">
			<span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit"/>
                </form>
            </span>
</div>
<div style="font-size: 13px; margin: 10px 5px;">
    <!--bgcolor="#cccccc"-->
    <table class="table_a" border="1" width="100%" cellpadding="1" cellspacing="0">
        <tbody>
        <!--background-color: #cccccc-->
        <tr style="font-weight: bold;" bgcolor="#cccccc">
            <td>序号</td>
            <td>公司id</td>
            <td>子分类id</td>
            <td>父分类id</td>
            <td>产品名称</td>
            <td>单价</td>
            <td>产品描述</td>
            <td>图片</td>
            <td>产地</td>
            <td>更新时间</td>
            <td>截止时间</td>
            <td>是否过期</td>


            <td align="center" colspan="2">操作</td>
        </tr>

        <?php if(is_array($info2)): foreach($info2 as $key=>$v): ?><tr id="product1">
                <!--<?php echo ($v["goods_id"]); ?>{*$v@iteration从1开始的序号*}-->
                <!--id要小写，不要大写，因为数据返回来的ID换成了小写-->
                <td><a href="#"> <?php echo ($v["pro_id"]); ?> </a></td>
                <td><?php echo ($v["com_id"]); ?></td>
                <td><?php echo ($v["pro_class"]); ?></td>
                <td><?php echo ($v["pro_pclass"]); ?></td>
                <td><?php echo ($v["pro_name"]); ?></td>
                <td><?php echo ($v["pro_unitprice"]); ?></td>
                <td align="center">
                    <?php if($v['pro_desc'] != null): ?><a href="/mucaiwang//index.php/Home/Pro/desc/pro_id/<?php echo ($v["pro_id"]); ?>">查看</a>
                    <?php else: ?>
                        暂无<?php endif; ?>
                </td>
                <!--<td align="center"><textarea rows="0" cols="0" readonly="readonly"><?php echo ($v["pro_desc"]); ?></textarea></td>-->
                <td>

                    <?php if($v['pro_albumpath'] != null): ?><a href="/mucaiwang//index.php/Home/Pro/image/pro_id/<?php echo ($v["pro_id"]); ?>">查看</a>
                        <?php else: ?>
                        暂无<?php endif; ?>
                </td>
                <!--<td><img src="{SILE_URL/$v['pro_salbumpath']}" height="100" width="100"></td>-->
                <td><?php echo ($v["prov"]); echo ($v["city"]); ?></td>
                <td><?php echo date("Y-m-d",$v['pro_create_time']); ?></td>
                <td><?php echo date("Y-m-d",$v['pro_cut_time']); ?></td>
                <td>
                    <?php if($v['pro_cut_time'] > time()): ?>未过期<?php endif; ?>
                    <?php if($v['pro_cut_time'] < time()): ?>已过期<?php endif; ?>
                </td>

                <!--<td><?php echo ($v["pro_grade"]); ?></td>-->
                <!--<img src="<?php echo HOME_IMG_URL?>d1.jpg">-->
                <td><a href="/mucaiwang//index.php/Home/Pro/xiugai/pro_id/<?php echo ($v["pro_id"]); ?>">修改</a>
                </td>
                <td><a href="/mucaiwang//index.php/Home/Pro/delete/pro_id/<?php echo ($v["pro_id"]); ?>"
                       onclick="javascript:if(confirm('确定要删除此信息吗？')) {return true;}return false;">
                    删除</a></td>
                <!--<img src="<?php echo HOME_IMG_URL?>x1.jpg">-->
            </tr><?php endforeach; endif; ?>


        <tr>
            <td colspan="20" style="text-align: center;">
                <?php echo ($pagelist); ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>

</html>