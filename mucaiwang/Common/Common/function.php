<?php


//调取offer_buyer表的评论
function Offerdesc($user_id)
{

    //展示评论
    $user = M('Register_user')->select();
    //当你作为发布人时，别人对你的评价记录
    $Offerinfo = M('Offer_buyer')->where("offer_user_id= $user_id")->select();

    //当你作为求购人时，别人对你的评价记录
    $Buyerinfo = M('Offer_buyer')->where("buyer_id= $user_id")->select();//这是报价表（中间表）中
    //            $Buyinfo = M('Buy_register_user')->where("register_id= $user_id and success <2 ")->select();//这是求购表（中间表）中的相关信息


    //做法：分表调取，然后用一个二维数组整合到一起，在前台展示

    //调取offer_buyer对应的记录信息，把信誉度整合到一维数组
    //当你是发布人时
    foreach ($Offerinfo as $v) {//把buy_desc调出来

        foreach ($user as $d) {

            if ($d['user_id'] == $v['buyer_id']) {

                if ($v['buy_desc'] != NULL) {

                    $data[] =
                        array(

                            'user' => $d['user_name'],
                            'Desc' => $v['buy_desc'],
                        );

                }
            }

        }

    }

    foreach ($Buyerinfo as $vv) {//当你不是发布人的时候(buyer_id)


        foreach ($user as $d) {

            if ($d['user_id'] == $vv['offer_user_id']) {

                if ($vv['offer_buy_desc'] != null) {
                    $data[] =
                        array(

                            'user' => $d['user_name'],
                            'Desc' => $vv['offer_buy_desc'],//这是发布人对你的评价

                        );
                }
            }

        }

    }

    return $data;//返回二维数组

}

//这里是根据用户id取得其的评价
function remarkBuy($uid)
{
    //求购人id
    /*先找出中间表所有的记录，再逐个遍历所有记录，在每条记录中根据表单id在表单表中找出其对应的表单信息，再根据表单表中的
     * 发布者id，与传进来的求购人id进行判断，如果相同，则代表该条中间表数据是属于传进来那个求购人的，就可以将该条中间表数据
     * 的评论信息放在一个数组中储存起来，遍历结束，则该数组储存所有对该求购人的评论
     * */
    $buy = D('buy_register_user')->select();
    $remark1 = array();
    $remark1 = array();
    foreach ($buy as $v) {
        //根据表单id找到该表单，那里会有发布者id
        $info = D('buy')->where(array('pur_id' => $v['buy_id']))->find();//info就是该表单信息
        if ($uid == $info['pur_user_id']) {
            $rema['remark'] = $v['remarktobuy'];
            $off = D('register_user')->where(array('user_id' => $v['register_id']))->find();
            $rema['user'] = $off['user_true_name'];
            $remark1[] = $rema;
        }


        if ($v['register_id'] == $uid) {
            $rema['remark'] = $v['remarktooff'];
            $off = D('buy')->where(array('pur_id' => $v['buy_id']))->find();
            $rema['user'] = $off['pur_user_name'];
            $remark2[] = $rema;

        }


    }
    $remark = array_merge($remark1, $remark2);
    foreach ($remark as $v) {
        if ($v['remark'] != NULL) {
            $remarkAll[] = $v;
        }
    }

    return $remarkAll;
}


//传进用户id，返回该用户发布求购表单时和对别人的求购信息报价时收到的评价
function creditBuy($uid)
{
    //定义四个记录量初始值
    $scoreBuy = 0;
    $buyNum = 0;
    $scoreOff = 0;
    $offNum = 0;
    //查询成功次数
    $successNum = D('register_user')->where(array('user_id' => $uid))->field('user_trade')->find();

    //评分总分数，总条数
    /*1.该用户作为求购者被别人评价
     在中间表取得该条记录的表单id，在根据该表单id在求购表查询到该条表单的信息，在判断求购表中找出的该条记录的求购人id与
    传进来的id是否相同，如果相同，则代表该条记录是该用户发布的，我们需要取得此时中间表该条记录的对求购者的评分，用变量累加，
    可得作为求购者的总分数，利用标记累加，则可得总条数*/
    $buyer = D('buy_register_user')->where("success<2")->select();//取得中间表所有已评过分的记录
    foreach ($buyer as $v) {//$v['buy_id']是表单id
        $buy = D('buy')->where(array('pur_id' => $v['buy_id']))->find();//在求购表找到该条记录
        if ($buy['pur_user_id'] == $uid) {//判断该条表单信息是否该用户发布的
            $scoreBuy = $v['buy_score'] + $scoreBuy;//累加总分,已经取得该用户作为求购人时的总分
            $buyNum++;//累加次数，已经取得该用户作为求购人的被评分次数
        }
    }

    /*2.该用户作为报价人被别人评价
     * 直接根据用户id在中间表找到对报价人的评分
    * */
    $offer = D('buy_register_user')->where("register_id=$uid AND success<2")->select();//取得该用户作为报价人时的中间表信息
    foreach ($offer as $v) {
        $scoreOff = $scoreOff + $v['off_score'];//已取得该用户作为报价人的总分
        $offNum++;//已取得该用户作为求购人的被评分次数
    }
    $score = $scoreBuy + $scoreOff;
    $scoreNum = $buyNum + $offNum;
    $creditBuy = array(
        'uid' => $uid,//用户id
        'score' => $score,//用户两种情况总分数
        'scoreNum' => $scoreNum,//用户两种情况被评分的条数
        'successNum' => $successNum['user_trade'],//用户成功交易的条数
    );
    return $creditBuy;
}

//传进用户id，返回该用户发布报价表单时和对别人的报价信息求购时收到的评价
function offerNum($user_id)
{
    //取出对应交易总数,两种情况
    $Offercount = M('Offer_buyer')->where("offer_user_id=$user_id and success<2")->count();
    $Buyercount = M('Offer_buyer')->where("buyer_id=$user_id and success<2")->count();
    //最后记录总数，与user_id有关的记录
    $count = $Offercount + $Buyercount;
    //计算总分，用原生sql语句
    //        $Offerscore= M('Offer_buyer')->where("offer_user_id=$user_id")->;
    //        $Buyerscore = M('Offer_buyer')->where("buyer_id=$user_id")->
    $sql = "select offer_user_id,sum(buy_score) AS buy_score from  mucai_offer_buyer GROUP  BY offer_user_id ";
    $Offerinfo = M('Offer_buyer')->query($sql);
    foreach ($Offerinfo as $v) {
        if ($v['offer_user_id'] == "$user_id") {
            $Offerscore = $v['buy_score'];
        }
    }
    $s = "select buyer_id,sum(offer_score) AS offer_score from  mucai_offer_buyer GROUP  BY buyer_id ";
    $Buyinfo = M('Offer_buyer')->query($s);
    foreach ($Buyinfo as $vv) {

        if ($vv['buyer_id'] == "$user_id") {

            $Buyscore = $vv['offer_score'];

        }

    }

    //计算总分
    $user_score = $Buyscore + $Offerscore;


    //交易成功总数
    $user = M('Register_user')->where("user_id=$user_id")->find();

    //交易总数
    $user_trade = $user['user_trade'];
    $data = array(

        'user_id' => "$user_id",//对应的用户id
        'score' => "$user_score",//用户对应的评论总分
        'count' => "$count",//记录的总数
        'trade' => "$user_trade",//用户成功交易次数

    );
    return $data;
}

//计算信誉度
//公式：交易成功率*100*0.4+平均分*0.6
function creditCount($num, $score, $count)
{
    //成功率
    //        $s=$num/$count;
    $s = round(($num / $count) * 100, 2);//浮点数,结果四舍五入后赋给$s,精确到小数点后两位
    //       //平均分
    $avg = round($score / $count);//精确到小数点前几位
    //
    //        //信誉度
    $credit = round(($s * 0.4) + ($avg * 0.6), 2);
    $data = array(
        'credit' => "$credit",//信用度
        'sRate' => "$s",//成功率
        'avg' => "$avg",//平均分
    );
    //
    return $data;//返回数组
}

//调用creditCount，offerNum，creditBuy相关方法计算得出对应的信誉度还有成功率
function showcredit($user_id)
{
    //调用构造函数，返回的数据分别有 对应的用户id，用户对应的评论总分，记录的总数，用户成功交易次数,已而为一维数组的形式返回
    $off = offerNum($user_id);//调取用户offer_buyer表中相关数据
    $buy = creditBuy($user_id);//调取用户buy_register_user表中相关数据

    $count = $off['count'] + $buy['scoreNum'];//对应用户的评价总数(评价的记录条数)
    $score = $off['score'] + $buy['score'];//对应用户的全部评论总分
    $num = $off['trade'];//对应用户的全部交易成功次数

    //计算信誉度，是对应user_id的
    $credit = creditCount($num, $score, $count);

    return $credit;

}