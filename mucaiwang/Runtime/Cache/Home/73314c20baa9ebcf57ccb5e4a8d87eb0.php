<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>注册</title>

    <link type="text/css" rel="stylesheet" href=" <?php echo HOME_CSS_URL; ?>reset.css">
    <link type="text/css" rel="stylesheet" href=" <?php  echo HOME_CSS_URL; ?>register.css">

    <script src="<?php echo HOME_JS_URL?>jquery.js" type="text/javascript"></script>


    <!--城市-->
    <!--<script src="<?php echo HOME_JS_URL?>jquery-1.7.min.js" type="text/javascript"></script>-->
    <script src="<?php echo HOME_JS_URL?>Area.js" type="text/javascript"></script>
    <script src="<?php echo HOME_JS_URL?>AreaData_min.js" type="text/javascript"></script>

    <!--[if IE 6]>
<!--<script type="text/javascript" src="js/DD_belatedPNG_0.0.8a-min.js"></script>-->
    <!--<script type="text/javascript" src="js/ie6Fixpng.js"></script>-->
    <!-- [endif] -->
</head>
<!--命名要规范-->

<body>
<!--头部每一个模块用一个div来表示-->
<div class="headerBar">
    <div class="logoBar red_logo">
        <div class="comWidth">
            <div class="logo fl">
                <a href="#"><img src="<?php echo HOME_IMG_URL;?>logo.png" alt="中国木材网"></a>
            </div>
            <h3 class="welcome_title">欢迎注册</h3>
        </div>
    </div>
</div>

<div class="regBox">
    <div class="login_cont">
        <form class="registerform" id="signupForm" method="post" enctype="multipart/form-data" action=" /mucaiwang/index.php/Home/User/register.html">
            <ul class="login" style="line-height: 20px;">

                <!--<li>-->
                <!--<span class="reg_item"><i>*</i><label for="user_name">用户名：</label></span>
                 <span>
                class="reg_info"><?php echo $errorinfo['user_name']?></span>

                <!--<div class="input_item">-->
                <!--<input type="text" name="user_name" id="user_name" placeholder="请输入用户名"-->
                <!--class="login_input user_icon">-->
                <!--</div>-->
                <!--&lt;!&ndash;class有有两个别名分别是login_input user_icon&ndash;&gt;-->
                <!--</li>-->
                <!---->

                <li>

                    <span class="reg_item">昵称：</span>
                    <!--<span  class="reg_info">-->
                           <!--<?php echo $errorinfo['user_name']?>-->
                       <!--</span>-->
                    <div class="input_item">
                        <input type="text" value="" name="user_name" class="login_input " datatype="s6-18" nullmsg="请输入您的昵称！"
                               errormsg="昵称至少6个字符,最多18个字符！"/>
                    </div>
                    <!--<span class="reg_info">-->

                       <span>
                    	<div class="Validform_checktip"></div>
                        <div class="info">昵称至少6个字符,最多18个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
			              </span>
                </li>


                <li>

                    <span class="reg_item">密码：</span>
                    <div class="input_item">
                        <input type="password" value="" name="user_password" class="login_input" plugin="passwordStrength" datatype="*6-18" nullmsg="请输入密码！" errormsg="密码至少6个字符,最多18个字符！"/></div>
                    <!--<span class="reg_info">-->
                          <span>
                    	<div class="Validform_checktip"></div>
                        <div class="passwordStrength" style="display:none;"><b>密码强度：</b> <span>弱</span><span>中</span><span class="last">强</span></div>
                        <div class="info">密码至少6个字符,最多18个字符<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
                          </span>
                </li>


                <li>

                    <span class="reg_item">确认密码：</span>
                    <div class="input_item">
                        <input type="password" value="" name="password2" class="login_input" recheck="user_password"
                               datatype="*6-18" nullmsg="请确认密码！" errormsg="两次输入的密码不一致！"/></div>
                    <!--<span class="reg_info">-->
                          <span>
                    	<div class="Validform_checktip"></div>
                    	<div class="info">请确认您的密码<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                        </span>
                </li>


                <!--<li>-->

                <!--<span class="reg_item"><i>*</i><label for="user_password">密码：</label></span><span-->
                <!--class="reg_info"><?php echo $errorinfo['user_password'] ?></span>-->
                <!--<div class="input_item">-->
                <!--<input type="password" id="user_password" name="user_password" class="login_input ">-->

                <!--</div>-->

                <!--</li>-->
                <!--<li>-->
                <!--<span class="reg_item"><i>*</i><label for="password2">确认密码：</label></span><span-->
                <!--class="reg_info"><?php echo $errorinfo['password2'] ?></span>-->
                <!--<div class="input_item">-->
                <!--<input type="password" id="password2" name="password2" placeholder="请输入正确密码"-->
                <!--class="login_input ">-->

                <!--</div>-->
                <!--</li>-->
                <!--placeholder="请输入合法邮箱"-->
                <li>
                    <span class="reg_item"><i>*</i><label for="user_email">电子邮箱：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['user_email']?></span>-->
                    <div class="input_item">
                        <input type="email" id="user_email" name="user_email"
                               class="login_input " nullmsg="请输入您的邮箱地址！"
                               errormsg="邮箱地址格式不对！" datatype="e">

                    </div>
                      <span>
                    	<div class="Validform_checktip"></div>
                        <div class="info">请输入格式正确的邮箱地址<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span></div>
			              </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="user_true_name">真实姓名：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['user_true_name']?></span>-->
                    <div class="input_item">
                        <input type="text" name="user_true_name" id="user_true_name" class="login_input "
                               nullmsg="请输入您的真实姓名！"
                               errormsg="不能为空！" datatype="*">

                    </div>
                     <span>
                    	<div class="Validform_checktip"></div>
                        <div class="info">请输入你的真实姓名<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
			              </span>
                </li>

                <!--<li>-->
                <!--<span class="reg_item"><i>*</i><label for=" ">性别：</label></span><span style="color: red"><?php  ?></span>-->
                <!--&lt;!&ndash;<input type="hidden"  name="user_sex" value="" >&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="radio"  name="sex1" value="1" id=""> <label for="">男</label>&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="radio"   name="sex2" value="2" id=""> <label for="">女</label>&ndash;&gt;-->
                <!--&lt;!&ndash;<input type="radio"  name="sex3" value="3"  id=""> <label for="">保密</label>&ndash;&gt;-->

                <!--</div>-->
                <!--</li>   -->
                <li>
                    <span class="reg_item"><i>*</i><label for="user_job">您的职位：</label></span><span
                        class="reg_info"><?php echo $errorinfo['user_job']?></span>
                    <div class="input_item">
                        <input type="text" name="user_job" id="user_job" class="login_input " nullmsg="请输入您的职位名称！"
                               errormsg="不能为空！" datatype="*">

                    </div>
                    <div class="Validform_checktip"></div>
                    <div class="info">请输入您的职位名称！<span class="dec"><s class="dec1">&#9670;</s><s class="dec2">&#9670;</s></span>
                    </div>
                </li>


                <li>

                    <span class="reg_item">手机号码：</span>
                    <div class="input_item">
                        <input type="text" value="" name="user_phone" class="login_input" datatype="m" nullmsg="请输入您的手机号码！"
                               errormsg="请输入正确的手机号码！"/>
                    </div>
                    <!--<span class="reg_info">-->
                          <span>
                    	<div class="Validform_checktip"></div>
                   <div class="info">请输入您的11位数的手机号码<span class="dec"><s class="dec1">&#9670;</s><s
                           class="dec2">&#9670;</s></span></div>
		              </span>
                </li>


                <!--<li>-->
                <!--<span class="reg_item"><i>*</i><label for="user_phone">手机：</label></span><span-->
                <!--class="reg_info"><?php echo $errorinfo['user_phone']?></span>-->
                <!--<div class="input_item">-->
                <!--<input type="text" name="user_phone" id="user_phone" placeholder="请输入11位的手机号"-->
                <!--class="login_input ">-->

                <!--</div>-->
                <!--</li>-->
                <li>
                    <span class="reg_item"><i>*</i><label for="user_fixed_phone">固定电话：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['user_fixed_phone']?></span>-->

                    <div class="input_item">
                        <!--placeholder="格式:区号-电话号码，如:0769-85814488"-->
                        <input type="text" name="user_fixed_phone" id="user_fixed_phone"
                               class="login_input " datatype="*" nullmsg="请输入您的固定电话！"
                               errormsg="请输入您的固定电话！">

                    </div>
                      <span>
                    	<div class="Validform_checktip"></div>
                   <div class="info">格式:区号-电话号码，如:0769-85814488<span class="dec"><s class="dec1">&#9670;</s><s
                           class="dec2">&#9670;</s></span></div>
		              </span>
                </li>

                <li>
                    <span class="reg_item"><i>*</i><label for="portraiture">传真：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['portraiture']?></span>-->

                    <div class="input_item">
                        <!--placeholder="格式：区号-传真号码，如：0769-85814488"-->
                        <input type="text" name="portraiture" id="portraiture"
                               class="login_input " datatype="*" nullmsg="请输入您的传真！"
                               errormsg="请输入您的传真！">

                    </div>
                     <span>
                    	<div class="Validform_checktip"></div>
                   <div class="info">区号-传真号码，如：0769-85814488<span class="dec"><s class="dec1">&#9670;</s><s
                           class="dec2">&#9670;</s></span></div>
		              </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="user_qq">QQ：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['user_qq']?></span>-->
                    <div class="input_item">
                        <input type="text" name="user_qq" id="user_qq" placeholder="请输入QQ" class="login_input"
                               datatype="n6-16" nullmsg="请输入您的QQ！"
                               errormsg="请输入您的QQ！">

                    </div>
                      <span>
                    	<div class="Validform_checktip"></div>
                   <div class="info">请输入位数为11的QQ号码<span class="dec"><s class="dec1">&#9670;</s><s
                           class="dec2">&#9670;</s></span></div>
		              </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="com_name">公司名称：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['com_name']?></span>-->

                    <div class="input_item">
                        <input type="text" name="com_name" id="com_name"  class="login_input "
                               datatype="*" nullmsg="请输入合法公司名称！"
                               errormsg="请输入合法公司名称！">
                    </div>
                      <span>
                    	<div class="Validform_checktip"></div>
                   <div class="info">格式：省份+市名+公司名称<span class="dec"><s class="dec1">&#9670;</s><s
                           class="dec2">&#9670;</s></span></div>
		              </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="seachprov">公司所在地：</label></span>
                    <!--城市-->
                    <script type="text/javascript">
                        $(function () {
                            initComplexArea('seachprov', 'seachcity', 'seachdistrict', area_array, sub_array, '0', '0', '0');
                        });

                        //得到地区码
                        function getAreaID() {
                            var area = 0;
                            if ($("#seachdistrict").val() != "0") {
                                area = $("#seachdistrict").val();
                            } else if ($("#seachcity").val() != "0") {
                                area = $("#seachcity").val();
                            } else {
                                area = $("#seachprov").val();
                            }
                            return area;
                        }

                        //根据地区码查询地区名
                        function getAreaNamebyID(areaID) {
                            var areaName = "";
                            if (areaID.length == 2) {
                                areaName = area_array[areaID];
                            } else if (areaID.length == 4) {
                                var index1 = areaID.substring(0, 2);
                                areaName = area_array[index1] + " " + sub_array[index1][areaID];
                            } else if (areaID.length == 6) {
                                var index1 = areaID.substring(0, 2);
                                var index2 = areaID.substring(0, 4);
                                areaName = area_array[index1] + " " + sub_array[index1][index2] + " " + sub_arr[index2][areaID];
                            }
                            return areaName;
                        }
                    </script>

                    <select style="height:20px;width: 80px" id="seachprov" name="province"
                            onChange="changeComplexProvince(this.value, sub_array, 'seachcity', 'seachdistrict');"></select>&nbsp;
                    <select style="height:20px;width: 80px" id="seachcity" name="city"
                            onChange="changeCity(this.value,'seachdistrict','seachdistrict');"></select>&nbsp;
                                        <span id="seachdistrict_div"><select id="seachdistrict" name="seachdistrict"
                                                                             hidden="hidden"></select></span>

                    <!--<input type="text" name="com_area" id="com_area" placeholder="格式：省份-城市" class="login_input ">-->
                    <!--<span class="reg_info"><?php echo $errorinfo['com_area']?></span>-->

                </li>

                <li>
                    <span class="reg_item"><i>*</i><label for="com_trade">所属行业：</label></span>

                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['com_trade']?></span>-->
                    <div style="width: 90px;float: left;text-align: right;">

                        <select name="com_trade" id="com_trade" datatype="*" nullmsg="请选择所属行业！" errormsg="请选择所属行业！">
                            <option value="" selected="selected">--请选择--</option>
                            <?php if(is_array($com_trade)): foreach($com_trade as $key=>$v): ?><option value="<?php echo ($v["trade_id"]); ?>"><?php echo ($v["com_trade"]); ?></option><?php endforeach; endif; ?>

                        </select>

                    </div>
                    <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请选择您所属行业<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>

                <li>
                    <!-- 无需验证 -->
                    <span class="reg_item"><i>*</i>公司属性:</span>
                    <div style="width: 90px;float: left;text-align: right;">
                        <select name="com_attribute" datatype="*" nullmsg="请选择公司属性！" errormsg="请选择公司属性！">

                            <option value="">--请选择--</option>
                            <?php if(is_array($com_attribute)): foreach($com_attribute as $key=>$v): ?><option value="<?php echo ($v["com_attribute_id"]); ?>">


                                    <?php echo ($v["com_attribute"]); ?>


                                </option><?php endforeach; endif; ?>
                        </select>
                    </div>
                         <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请选择您公司属性<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>
                <!--<li>-->
                <!--<span class="reg_item"><i>*</i><label for="com_address">公司所在地：</label></span>-->
                <!--<span style="color: red;font-size:16px;line-height:23px;padding:13px;"><?php echo $errorinfo['com_attribute']?></span>-->
                <!--<div class="input_item"style="display: inline-block;">-->

                <!--<input type="text" name="com_address" placeholder="请输入合法公司名称" class="login_input "><span style="color: red"><?php ?></span>-->

                <!--</div>-->
                <!--</li>-->

                <li>
                    <span class="reg_item"><i>*</i><label for="com_address">主营地址：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['com_address']?></span>-->
                    <div class="input_item">
                        <input type="text" name="com_address" placeholder="" id="com_address" class="login_input "
                               datatype="*" nullmsg="请输入您的主营地址！"
                               errormsg="请填写格式正确的地址">

                    </div>
                     <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请填写格式正确的地址<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="com_main_pro"> 主营产品：</label>
                        </span>
                    <!--<span>-->
                    <!--class="reg_info"><?php echo $errorinfo['com_main_pro']?></span>-->
                    <div class="input_item">
                        <input type="text" name="com_main_pro" id="com_main_pro" placeholder="" class="login_input "
                               datatype="*" nullmsg="请输入您的主营产品！"
                               errormsg="请输入您的主营产品！">

                    </div>
                     <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请填写至少一样主营产品<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>
                <li>
                    <span class="reg_item"><i>*</i><label for="com_owned_market">主营市场：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['com_owned_market']?></span>-->
                    <div class="input_item">
                        <select name="com_owned_market" id="com_owned_market" datatype="*" nullmsg="请选择您的主营市场！"
                                errormsg="请选择您的主营市场！">
                            <option value="">请选择市场</option>
                            <?php if(is_array($com_market)): foreach($com_market as $key=>$v): ?><option value="<?php echo ($v["market_id"]); ?>">

                                    <?php echo ($v["com_owned_market"]); ?>
                                </option><?php endforeach; endif; ?>
                        </select>
                    </div>
                     <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请选择您的主营市场！<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>

                <li>
                    <span class="reg_item"><i>*</i><label for="com_url">公司网址：</label></span>
                    <!--<span-->
                    <!--class="reg_info"><?php echo $errorinfo['com_url']?></span>-->

                    <div class="input_item">
                        <input type="url" name="com_url" id="com_url" placeholder="" class="login_input " datatype="url"
                               nullmsg="请输入贵公司的公司网址！"
                               errormsg="请输入正确的公司网址">

                    </div>
                     <span>

                       <div class="Validform_checktip"></div>
                        <div class="info">请输入正确的公司网址<span class="dec"><s class="dec1">&#9670;</s><s
                                class="dec2">&#9670;</s></span></div>
                   </span>
                </li>

                <li>
                    <span class="reg_item"><i>*</i><label for="verify">输入验证码：</label></span>

                    <!--<?php echo $errorinfo['verify']?>-->
                    <!--验证码的错误信息-->
                <!--</span>-->

                    <div class="input_item" style="width: 100px;">
                        <input type="text" name="verify" id="verify" placeholder="请输入验证码" class="login_input "
                              nullmsg="请输入验证码！" datatype="" errormsg="" required="required">

                    </div>

                     <span>

                          <div class="Validform_checktip"></div>
                           <div class="info">请输入位数为1的验证码<span class="dec"><s class="dec1">&#9670;</s><s
                             class="dec2">&#9670;</s></span></div>


                   </span>

                      <span class="Get_verify"><img alt="验证码图" src=" /mucaiwang/index.php/Home/User/VerifyImg"
                              onclick="this.src=' /mucaiwang/index.php/Home/User/VerifyImg/'+Math.random()">
                     </span>


                </li>
                <!-- <li><span class="reg_item"><i>*</i>头像：</span><div class="input_item"><input type="file"  name="myFace" ></div></li>-->
                <!-- <li class="autoLogin"><span class="reg_item">&nbsp;</span><input type="checkbox" id="t1" class="checked"><label for="t1">我同意什么什么条款</label>

                </li> -->
                <li>
                    <!--<span class="reg_item">&nbsp;</span>-->

                    <button style="border:none;width:270px;height:35px;outline:none;padding: 0px;margin-left:150px"><img
                            src="<?php echo HOME_IMG_URL;?>reg.jpg" alt=""/></button>
                </li>

            </ul>
        </form>
    </div>
</div>

<div class="hr_25"></div>
<!--<div class="footer">-->
<!-- 	<p><a href="#">慕课简介</a><i>|</i><a href="#">慕课公告</a><i>|</i> <a href="#">招纳贤士</a><i>|</i><a href="#">联系我们</a><i>|</i>客服热线：400-675-1234</p> -->
<!-- 	<p>Copyright &copy; 2006 - 2014 慕课版权所有&nbsp;&nbsp;&nbsp;京ICP备09037834号&nbsp;&nbsp;&nbsp;京ICP证B1034-8373号&nbsp;&nbsp;&nbsp;某市公安局XX分局备案编号：123456789123</p> -->
<!-- 	<p class="web"><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a><a href="#"><img src="images/webLogo.jpg" alt="logo"></a></p> -->
<!-- </div> -->
<!--这是表单验证插件配置-->
<!--<script type="text/javascript" src="<?php  echo HOME_JS_URL; ?>jquery-1.9.1.min.js"></script>-->
<script type="text/javascript" src="<?php  echo HOME_JS_URL; ?>Validform_v5.3.2_min.js"></script>

<script type="text/javascript" src="<?php  echo HOME_JS_URL; ?>passwordStrength-min.js"></script>

<script type="text/javascript">
    $(function () {
        //$(".registerform").Validform();  //就这一行代码！;
        var getInfoObj = function () {
            return $(this).parents("div").next().find(".info");
        }
        $("[datatype]").focusin(function () {
            if (this.timeout) {
                clearTimeout(this.timeout);
            }
            var infoObj = getInfoObj.call(this);
            if (infoObj.siblings(".Validform_right").length != 0) {
                return;
            }
            infoObj.show().siblings().hide();
        }).focusout(function () {
            var infoObj = getInfoObj.call(this);
            this.timeout = setTimeout(function () {
                infoObj.hide().siblings(".Validform_wrong,.Validform_loading").show();
            }, 0);
        });
        $(".registerform").Validform({
            tiptype: 2,
            usePlugin: {
                passwordstrength: {
                    minLen: 6,
                    maxLen: 18,
                    trigger: function (obj, error) {
                        if (error) {
                            obj.parent().next().find(".passwordStrength").hide().siblings(".info").show();
                        } else {
                            obj.removeClass("Validform_error").parent().next().find(".passwordStrength").show().siblings().hide();
                        }
                    }
                }
            }
        });
    })
</script>
</body>

</html>