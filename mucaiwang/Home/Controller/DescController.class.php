<?php
namespace Home\Controller;

use Think\Controller;

//对公司的评论
class DescController extends Controller
{

    //发布人评论
    function desc()
    {
        //逻辑：收集评论信息，写进offer_buyer表中，用save()方法

        $user_com = new  \Model\Register_userModel();

        if (!empty($_POST)) {

//            dump($_POST);
//            exit;
            $com = $user_com->where("user_id={$_POST['offer_user_id']}")->find();
            $com_id = $com['com_id'];
            //构造数组数据更新到数据表中
            $data = array(

                'offer_buy_desc' => I('post.offer_buy_desc'),
                'offer_buy_com_id' => I('post.offer_buy_com_id'),
                'offer_com_id' => "$com_id",
                'offer_score' => I('post.offer_score'),

            );

            if (M('Offer_buyer')->where("offer_id ={$_POST['offer_id']} and
            buyer_id ={$_POST['buyer_id']}")->save($data)
            ) {

                $this->success('评论成功！！');
            } else {

                $this->error('不可重复评论！！');
            }

        }


    }


    //报价人评论
    function buyDesc()
    {


        if (!empty($_POST)) {
//
//        dump($_POST);
//            exit;

            if($_POST['offer_trade'] == 1 ){//判断是否交易成功

            $data = array(
                'buy_desc' => I('post.buy_desc'),
                'buy_score' => I('post.buy_score'),
                'success'=>I('post.offer_trade'),//表示交易是否成功，1表示成功，数据表默认失败,也可以当做交易成功次数，加到register_user表中

            );
                $Buycount= M('Register_user')->where("user_id={$_POST['buyer_id']}")->find();//获取对应buyer_id的交易成功总数
                $Offercount= M('Register_user')->where("user_id={$_POST['offer_user_id']}")->find();//获取对应offer_user_id的交易成功总数

                $buy= I('post.offer_trade') + $Buycount['user_trade'];//求购人交易成功次数累加
                $off= I('post.offer_trade') + $Offercount['user_trade'];//报价人交易成功次数累加

                  $Buy = array(
                     'user_trade' => "$buy",
                           );
                $Offer = array(
                    'user_trade' => "$off",
                );
//
                 M('Register_user')->where("user_id={$_POST['offer_user_id']}")->save($Buy);
                 M('Register_user')->where("user_id={$_POST['buyer_id']}")->save($Offer);
//                 dump($Offer);
//                  exit;

                //衔接$_POST['offer_trade'] == 1
                //用where方法来指定存储的id（具体的记录数）
                if(D('Offer_buyer')->where("offer_id ={$_POST['offer_id']} and  buyer_id ={$_POST['buyer_id']}")->save($data)){


                    $this->success('评价成功！！！');

                }

              }else{//当offer_trade为0时，不用调用register_user表的数据出来想加（为0时，相当交易失败，没必要再加了）


                   $data = array(//直接存评论和评分

                    'buy_desc' => I('post.buy_desc'),
                    'buy_score' => I('post.buy_score'),
                    'success'=>I('post.offer_trade'),//表示交易是否成功，1表示成功，数据表默认2,表示不确定是成功还是失败
                );


            if(D('Offer_buyer')->where("offer_id ={$_POST['offer_id']} and  buyer_id ={$_POST['buyer_id']}")->save($data)) {


                    $this->success('评论成功！！');

                }

            }

        }

    }



    





}