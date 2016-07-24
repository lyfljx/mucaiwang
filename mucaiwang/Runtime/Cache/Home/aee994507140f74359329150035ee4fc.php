<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="/mucaiwang//index.php/Home/Offer/offerlist/offer_user_id/<?php echo (session('home_id')); ?>"><h4>返回</h4></a></div>


<!--只有后台审核发邮件之后才可以看得见-->

<?php if(is_array($buyinfo)): foreach($buyinfo as $k=>$vv): ?><!--因为register_user表与com表是一对一的关系，所以key也是一一对应的，通过k的比较来显示下面-->

    <fieldset>
        <legend><strong><?php echo ($vv["user_name"]); ?></strong></legend>
        <table width="60%" border="1px dashed" cellpadding="1" cellspacing="0">
            <!--这是一个四维数组-->
            <tr>
                <td align="center">求购人</td>
                <td align="center"><?php echo ($vv["user_name"]); ?></td>
            </tr>
            <tr>
                <td align="center">公司名称</td>
                <td align="center" bgcolor="#7fffd4"><a
                        href="/mucaiwang//index.php/Home/Offer/showCom/com_id/<?php echo ($vv["com_id"]); ?>">
                    <?php echo ($vv["com_name"]); ?></a></td>
            </tr>
            <tr>
                <td align="center">邮箱</td>
                <td align="center"><?php echo ($vv["user_email"]); ?></td>
            </tr>
            <tr>
                <td align="center">求购人</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_true_name"]); ?></td>
            </tr>
            <tr>
                <td align="center">职位</td>
                <td align="center"><?php echo ($vv["user_job"]); ?></td>
            </tr>
            <tr>
                <td align="center">电话</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_phone"]); ?></td>
            </tr>
            <tr>
                <td align="center">QQ</td>
                <td align="center"><?php echo ($vv["user_qq"]); ?></td>
            </tr>
            <tr>
                <td align="center">固定电话</td>
                <td align="center" bgcolor="#7fffd4"><?php echo ($vv["user_fixed_phone"]); ?></td>
            </tr>
            <tr>
                <td align="center">成功率：</td>
                <td align="center">
                    <?php if($vv['rate'] > 0): echo ($vv["rate"]); ?>%

                        <?php else: ?>
                        暂无<?php endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center">信誉度：</td>
                <td align="center">
                    <?php if($vv['credit'] > 0): echo ($vv["credit"]); ?>%

                        <?php else: ?>
                        暂无<?php endif; ?>
                </td>
            </tr>
            <tr>
                <td align="center">平均分：</td>
                <td align="center">
                    <?php if($vv['avg'] > 0): echo ($vv["avg"]); ?>

                        <?php else: ?>
                        暂无<?php endif; ?>
                </td>
            </tr>

            <tr>
                <td align="center">评论</td>
                <td align="center">
                    <a href="<?php echo U('Admin/Offer/showDesc',array(user_id =>$vv['user_id']));?>">查看</a>
                </td>
            </tr>

            <tr>
                <td colspan="20" style="text-align: center;">
                    <?php echo ($pagelist); ?>
                </td>
            </tr>
            <!--评论-->
            <div style="display: inline;float: right;width: 38%; height:267px;border: 1px solid beige">

                <h3>评论</h3>
                <?php if($vv['offer_buy_desc'] != null): ?><form action="/mucaiwang//index.php/Home/Desc/desc" method="post">
                    <input name="offer_id" type="hidden" value="<?php echo ($offer_id); ?>">
                    <input name="offer_buy_com_id" type="hidden" value="<?php echo ($vv["com_id"]); ?>">
                    <input name="buyer_id" type="hidden" value="<?php echo ($vv["user_id"]); ?>">
                    <input name="offer_buy_create_time" type="hidden" value="<?php echo time();?>">
                    <!--这是我的id-->
                    <input name="offer_user_id" type="hidden" value="<?php echo (session('home_id')); ?>">
                    <textarea cols="35" rows="5" name="offer_buy_desc" style="width: 363px; height: 138px;"></textarea><br/>

                    <br/>
                         <span style="float: left; font-size:12px;"> 评分:&nbsp;<select style="height: 20px;width: 100px" name="offer_score">

                            <option selected="selected" value="100">100</option>
                            <option value="95">95</option>
                            <option value="90">90</option>
                            <option value="85">85</option>
                            <option value="80">80</option>
                            <option value="75">75</option>
                            <option value="70">70</option>
                            <option value="65">65</option>
                            <option value="60">60</option>
                            <option value="55">55</option>
                            <option value="50">50</option>
                            <option value="45">45</option>
                            <option value="40">40</option>
                            <option value="35">35</option>
                            <option value="30">30</option>
                            <option value="25">25</option>
                            <option value="20">20</option>
                            <option value="15">15</option>
                            <option value="10">10</option>
                            <option value="5">5</option>

                        </select>
                             </span>

                    <input type="submit" value="提交" style="width: 14%;margin-left: 20px">


                <!--<iframe src="#" name="right" height="267px" width="100%">-->
                <!---->
                <!--</iframe>-->
               </form>
                    <?php else: ?>

                    <font style="font-size: 18px">&nbsp;&nbsp;&nbsp;已经评论</font><?php endif; ?>
            </div>
        </table>

    </fieldset><?php endforeach; endif; ?>

</body>
</html>