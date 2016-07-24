<?php

namespace Admin\Controller;

use MongoDB\Driver\Manager;
use Think\Controller;

//use Vendor\PHPMailer;
//审核员
class OfferController extends Controller
{

    //报价订单展现
    function offerlist1()
    {
        $show_offer = new \Model\OfferModel();
        $user = new \Model\Register_userModel();
        $user_name = $user->select();
        $info = $show_offer->order('offer_create_time desc')->select();
//        dump($user_name);
//        exit;
        $this->assign('info', $info);
        $this->assign('user_name', $user_name);
        $this->display();
    }

    //报价订单展现
    function offerlist()
    {
        //调用发布人的姓名
        $user = new \Model\Register_userModel();

        //实例化一个对象
        //实现分页效果
        $show_offer = new \Model\OfferModel();
        //取得对应表单的分类，用关联模型
        $class = $show_offer->relation(true)->select();

        //1.获得总记录数
        $total = $show_offer->where("offer_check= 0")->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 15;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_offer where  offer_check= 0 order by offer_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $info = $show_offer->query($sql);


        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);


        $offer_id = M('Offer_buyer')->select();

        foreach ($offer_id as $v) {

            $data[] = $v['offer_id'];//获取对应的表单号，判断是否被求购
        }

//        dump($user_name);
//        exit;

        foreach ($info as $vv) {

            if ($vv['offer_status'] == 1) {
                if (NOW_TIME > $vv['offer_cut_time']) {

                    $vv['offer_status'] = 2;
                    $show_offer->save($vv);

                }

                $Offerinfo[] = $vv;

            } else {

                $Offerinfo[] = $vv;

            }
        }

        $this->assign('Offerinfo', $Offerinfo);

        $user_name = $user->select();
        $this->assign('data', $data);
        $this->assign('class', $class);
        $this->assign('user_name', $user_name);
        $this->display();
    }


    //报价订单审核（按钮）
    function check($offer_id, $offer_check)
    {
        //两个逻辑：改变订单状态，自动发送邮件
        $check = new \Model\OfferModel();

        //实现逻辑：更改审核状态，重新把数据表记录更新，用户那边再次刷新页面时，状态也发生了改变
        $c = $check->where("offer_id='$offer_id'")->find();

        if ($c == true) {
            //更新审核状态，报价订单已经被审核
            $info = array(
                'offer_id' => $c['offer_id'],
                'offer_check' => "$offer_check"
            );

            if ($check->save($info)) {
                $this->success('已审核', U('Offerlist'));
            } else {

                $this->error('审核不成功', array('offer_id' => "$offer_id"), U('check'));
            }
        }
    }


    //审核之后发送邮件
    function sendMailer($offer_id, $buyer_id, $status)
    {
        //获取buyer_id对应的信息，进而获取邮箱
        $buymail = M('Register_user')->where("user_id= $buyer_id")->find();

        //获取报价表单中报价的产品名称

        $offerName = M('Offer')->where("offer_id=$offer_id")->find();
        $offerName = $offerName['offer_pro_name'];

        $offer = new \Model\OfferModel();
        //获取对应报价人的对应的信息
        $offermail = $offer->where("offer_id= $offer_id")->field('offer_user_id')->find();
        $z = $offermail['offer_user_id'];

        $offer_user_id = M('Register_user')->where("user_id= $z")->find();

//        dump($offer_user_id);
//        dump($buymail);
//
//        exit;
        //调取求购人的报价，根据offer_id还有buyer_id确定求购价格，然后编辑相关信息/
        $price = M('Offer_buyer')->where("offer_id= $offer_id and buyer_id=$buyer_id")->find();
        //获取价格
        $price = $price['offer_buy_price'];


        //报价人信息
        $name = $offer_user_id['user_email'];
        $title = "尊敬的" . $offer_user_id['user_true_name'];
        $content = "尊敬的" . $offer_user_id['user_true_name'] . "用户，已有企业对你发布的" . $offerName . "进行了求购，并报了" . $price . "的价格" . "请登录江门木材网进行查看对方信息";

        //求购人信息
        $title1 = "尊敬的" . $buymail['user_true_name'];
        $content1 = "尊敬的" . $buymail['user_true_name'] . "用户，你对" . $offerName . "报价信息的求购已通过审核，请登录江门木材网进行查看对方信息";
        $name1 = $buymail['user_true_name'];


        //这里进行一个判断，如果执行发送邮件操作，status值为1
        if ($status == 1) {
//            dump($status);
//            exit;

            if (SendMail($buymail['user_email'], $name1, $title1, $content1)) {


                if (SendMail($offer_user_id['user_email'], $name, $title, $content)) {
                    $data = array('email' => 1,);

                    M('Offer_buyer')->where("offer_id=$offer_id and buyer_id=$buyer_id")->save($data);//更新邮件状态

                    $this->success('发送成功！');
                } else {

                    $this->error('发送失败');
                }

            }


        } else {
            //如果status!=1,代表点击了不通过按钮   给求购人发送信息
            $name1 = $buymail['user_true_name'];
            $title1 = "尊敬的" . $offer_user_id['user_true_name'];
            $content1 = "尊敬的" . $offer_user_id['user_true_name'] . "用户，" . "很抱歉，" . "你对" . $offerName . "报价信息的求购没有通过审核";
            if (SendMail($buymail['user_email'], $name1, $title1, $content1)) {

                $data1 = array('email' => 2,);
//               dump($data1);
//               exit;
                M('Offer_buyer')->where("offer_id=$offer_id and buyer_id=$buyer_id")->save($data1);//更新邮件状态
                $this->success('发送成功！');
            }


        }


    }

//   查看已审核订单
    function looklist()
    {
        //调用发布人的姓名
        $user = M('Register_user')->select();
//        dump($user);
//        exit;
//            $user->select();

        //实例化一个对象
        //实现分页效果
        $show_offer = new \Model\OfferModel();
        //获取分类
        $class = $show_offer->relation(true)->select();

        //1.获得总记录数
        $total = $show_offer->where(" offer_check= 1")->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 15;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_offer where  offer_check= 1 order by offer_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $z = $show_offer->query($sql);

        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();
        //看是否有人求购，到offer_buyer表中去查看对应记录，如果返回是0，则没有求购人
        $offer_id = M('Offer_buyer')->select();

        foreach ($offer_id as $v) {

            $data[] = $v['offer_id'];
        }

//
//        //审核是否过期

        foreach ($z as $vv) {

            if ($vv['offer_status'] == 1) {
                if (NOW_TIME > $vv['offer_cut_time']) {

                    $vv['offer_status'] = 2;

                    $show_offer->save($vv);
                }

                $info[] = $vv;
            } else {

                $info[] = $vv;

            }
        }

        $this->assign('info', $info);//判断完后输出

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);
        $this->assign('data', $data);
        $this->assign('class', $class);
        $this->assign('user', $user);


        $this->display();

    }

    //查看报价用户信息(不是看到别人求购之后的报价，是自己要报的价)，
    //这里是后台，如果是看到别人求购在报价的，要显示求购人的相关信息
    //这里展示的是报价人的信息
    //调取报价用户信息，传递一个id值，显示自己的用户信息
    function lookUser($offer_user_id)
    {
        $com = M('Com');
        $offer_user = M('Register_user');
//        $d['user_id']= '$offer_user_id';

        $z = $offer_user->where("user_id='$offer_user_id'")
            ->field('user_true_name,com_id,  user_id,  user_job,  user_phone,user_fixed_phone,user_fixed_phone, user_name,  user_email,
                     portraiture,user_qq')->find();

        $info = $com->find($z['com_id']);//获取公司相关信息

        //计算个人的信誉度，成功率

        $uid = $z['user_id'];//获取个人id，取得相关信誉度


        //调用showcredit()方法，取得信誉度还有成功率，返回二维数组

        $credit = showcredit($uid);


        if (($z && $info) == true) {

            $this->assign('z', $z);
            $this->assign('info', $info);
            $this->assign('credit', $credit);
        } else {

            $this->error('没有用户信息！！');
        }


        $this->display();
    }


    //查看对应表单求购人信息,用中间列表
    function buyList1($offer_id)
    {
//逻辑：根据offer与register_user表的关联关系，调出用户表的信息，进而取得com_id,最后获得公司名称
        $offer = new  \Model\OfferModel();
        $comlist = new \Model\ComModel();

        //用关联模型调出求购人相关数据，是一个四维数组
        $info = $offer->where("offer_id=$offer_id")->relation(true)->select();
        $mail = M('Offer_buyer')->where("offer_id=$offer_id")->field('email')->select();
//        $mail = M('Offer_buyer')->where("offer_id=$offer_id")->select();
//        dump($mail);
//        exit;

        //遍历四位数组，取得com_id
        foreach ($info as $v) {
            foreach ($v as $vv) {
                foreach ($vv as $vvv) {

                    $data[] = $vvv['com_id'];//把数组中的com_id换成字符串

                }
            }
        }

        //做一个判断，判断offer_buyer表中是否有offer_id对应的记录，只要存在就可以执行下面的关联，
        //是为了保证能够得到求购人信息，防止发生没有buyer_id时也会调出企业信息

        if (M('Offer_buyer')->where("offer_id=$offer_id")->select()) {

            $com_name = $comlist->relation(true)->select(implode(',', $data));

            //遍历二维数组$com_name,取得公司名字
            foreach ($com_name as $v) {

                $com_user[] = $v['user'];

            }
            dump($com_user);
            dump($com_name);
            exit;
            //要经历三次遍历才可以把用户的信息遍历出来
            if (($info && $com_user) == true) {

                $this->assign('com_user', $com_user);
                $this->assign('com_name', $com_name);
                $this->assign('offer_id', $offer_id);//为了发送邮件，所以要获取offer_id
                $this->assign('mail', $mail);
            }

        } else {

            $this->error('未有人求购！！！');//回到本页面

        }
        $this->display();

    }

    //查看对应表单求购人信息,用中间列表
    function buyList($offer_id)
    {
        //逻辑：根据offer与register_user表的关联关系，调出用户表的信息，进而取得com_id,最后获得公司名称
        $comlist = new \Model\ComModel();
        $offerinfo = M('Offer_buyer')->where("offer_id=$offer_id")->select();

        foreach ($offerinfo as $v) {//获取求购人公司id

            $data[] = $v['offer_buy_com_id'];
            $com_id = implode(',', $data);
            $price[] = array(//获取对应求购人的报价，id

                'price' => $v['offer_buy_price'],
                'buyer_id' => $v['buyer_id'],
            );
        }
        $cominfo = $comlist->relation(true)->select($com_id);

        //获取求购人的信誉度还有成功率
        foreach ($cominfo as $vv) {
            $credit = showcredit($vv['user_id']);//调用方法计算的得出信用度还有成功率
            $vv['credit'] = $credit['credit'];
            $vv['rate'] = $credit['sRate'];
            $vv['avg'] = $credit['avg'];

            $buylist[] = $vv;

        }

        foreach ($buylist as $z) {//获取求购人的报价
            foreach ($price as $zz) {
                if ($zz['buyer_id'] == $z['user_id']) {

                    $z['price'] = $zz['price'];
                    $buyinfo[] = $z;
                }
            }
        }
        //用关联模型调出求购人相关数据，是一个四维数组
        if (M('Offer_buyer')->where("offer_id=$offer_id")->select()) {
            $this->assign('buyinfo', $buyinfo);//求购人相关信息
            $this->assign('offerinfo', $offerinfo);//获取邮箱状态
            $this->assign('offer_id', $offer_id);//获取表单id

        } else {
            $this->error('未有人求购！！！');//回到本页面
        }
        $this->display();
    }

    //展示求购人和报价人的公司信息

    function showCom($com_id)
    {
        $com = new \Model\ComModel();
        //一维数组
        $info = $com->where("com_id= $com_id")->relation(true)->find();

        //打印到模板
        $this->assign('info', $info);
        $this->display();

    }

//调用求购人和报价人对应的评价信息

    function showDesc($user_id)
    {
        //  逻辑:展示评论
        $offerdesc = Offerdesc($user_id);//查询offer_buyer表中与user_id相关的所有的评论(包括当你是发布者还有不是发布者的情况)
        $buydesc = remarkBuy($user_id);//查询buy_register_user表中与user_id相关的所有的评论

        //把所有评论遍历成一个二维数组
        foreach ($offerdesc as $v) {
            $data[] = array(
                'desc' => $v['Desc'],
                'user_name' => $v['user'],
            );
        }
        foreach ($buydesc as $vv) {
            $data[] = array(

                'desc' => $vv['remark'],
                'user_name' => $vv['user'],
            );
        }
        if ($data == null) {

            $this->error('暂无评论');

        } else {
            $this->assign('data', $data);//评论展示
            $this->display();
        }
    }

    //报价订单描述
    function offerDesc($offer_id)
    {


        $info = M('Offer')->where("offer_id = $offer_id")->field('offer_description')->find();

        $this->desc = $info;

        $this->display();


    }


}
