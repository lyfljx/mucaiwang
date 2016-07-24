<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div><a href="/mucaiwang//index.php/Home/Offer/myBuy/buyer_id/<?php echo (session('home_id')); ?>"><h4>返回</h4></a></div>



        <fieldset>
            <legend><strong><?php echo ($z["user_true_name"]); ?></strong></legend>
            <table width="60%" border="1px dashed" cellpadding="1" cellspacing="0">

                <!--这是一个四维数组-->
                <tr>
                    <td align="center">报价人</td>
                    <td align="center"><?php echo ($z["user_true_name"]); ?></td>
                </tr>
                <tr>
                    <td align="center">公司名称</td>

                    <td align="center" bgcolor="#7fffd4"><a
                            href="/mucaiwang//index.php/Home/Offer/showCom/com_id/<?php echo ($z["com_id"]); ?>"><?php echo ($info["com_name"]); ?></a></td>

                </tr>
                <tr>
                    <td align="center">邮箱</td>
                    <td align="center"><?php echo ($z["user_email"]); ?></td>
                </tr>
                <!--<tr>-->
                    <!--<td align="center">求购人</td>-->
                    <!--<td align="center" bgcolor="#7fffd4"><?php echo ($z["user_true_name"]); ?></td>-->
                <!--</tr>-->
                <tr>
                    <td align="center">职位</td>
                    <td align="center"><?php echo ($z["user_job"]); ?></td>
                </tr>
                <tr>
                    <td align="center">电话</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_phone"]); ?></td>
                </tr>

                <tr>
                    <td align="center">QQ</td>
                    <td align="center"><?php echo ($z["user_qq"]); ?></td>
                </tr>
                <tr>
                    <td align="center">固定电话</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($z["user_fixed_phone"]); ?></td>
                </tr>
                <tr>
                    <td align="center">传真</td>
                    <td align="center" bgcolor="#7fffd4"><?php echo ($z["portraiture"]); ?></td>
                </tr>
                <tr>
                    <td align="center">成功率</td>
                    <td align="center" bgcolor="#7fffd4">
                        <?php if($credit['sRate'] > 0 ): echo ($credit["sRate"]); ?>%

                        <?php else: ?>
                            暂无<?php endif; ?>
                    </td>
                </tr>
                <tr>
                    <td align="center">信誉度</td>
                    <td align="center" bgcolor="#7fffd4">

                        <?php if($credit['credit'] > 0 ): echo ($credit["credit"]); ?>%
                        <?php else: ?>
                        暂无<?php endif; ?>

                    </td>
                </tr>
                <tr>
                    <td align="center">评论：</td>
                    <td align="center">


                        <a href="<?php echo U('Admin/Offer/showDesc',array(user_id=> $z['user_id']));?>">查看</a>

                    </td>
                </tr>


                <!--<tr>-->
                <!--<td colspan="20" style="text-align: center;">-->
                <!--<?php echo ($pagelist); ?>-->
                <!--</td>-->
                <!--</tr>-->
                <div style="display: inline;float: right;width: 38%; height:267px;border: 1px solid beige">
                    <h3>评论</h3>

                    <?php if($desc['buy_desc'] == null): ?><form action="/mucaiwang//index.php/Home/Desc/buyDesc" method="post">
                        <input name="offer_id" type="hidden" value="<?php echo ($offer_id); ?>">
                        <!--<input name="offer_buy_com_id" type="hidden" value="<?php echo ($v["com_id"]); ?>">-->
                        <input name="offer_user_id" type="hidden" value="<?php echo ($offer_user_id); ?>">
                        <input name="offer_buy_create_time" type="hidden" value="<?php echo time();?>">
                        <!--这是我的id-->
                        <input name="buyer_id" type="hidden" value="<?php echo (session('home_id')); ?>">
                        <textarea cols="35" rows="5" name="buy_desc" style="width: 363px; height: 138px;"></textarea><br/>

                        <br/>
                         <span style="float: left; font-size:12px;"> 评分:&nbsp;<select style="height: 20px;width: 100px" name="buy_score">

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
                  <span style="float: left; font-size:12px;"> &nbsp;交易情况:&nbsp;<select style="height: 20px;width: 100px" name="offer_trade">


                            <option selected="selected" value="1">交易成功</option>
                            <option value="0">交易失败</option>

                        </select>
                             </span>
                        <!--<input type="submit" value="提交" style="width: 14%;height: 40%;margin-right:100px">-->
                        <input type="submit" value="提交" style="width: 14%;margin-left: 20px">




                        <!--<iframe src="#" name="right" height="267px" width="100%">-->
                        <!---->
                        <!--</iframe>-->
                    </form>

                        <?php else: ?>

                        已经评论<?php endif; ?>
                </div>
            </table>
        </fieldset>

    <!--<td align="center"></td>-->
    <!--<td align="center" bgcolor="#7fffd4"><a href="/mucaiwang//index.php/Home/Com_desc/desc/offer_id/<?php echo ($offer_id); ?>">查看评价</a></td>-->
    <!--</tr>-->

</body>
</html>