<?php

namespace Home\Controller;

use Think\Controller;

//后台相关方法
class OfferController extends Controller
{

    //前台求购
    function buy()
    {


        //实例化一个offer对象，调用数据表中数据
        $offer = new \Model\OfferModel();
        $user = new \Model\Register_userModel();
//        $class1 = new \Model\Pro_pclassModel();
//        $class2 = new \Model\Pro_classModel();
//        $pclass = $class1->select();
//        $class = $class2->select();
//

        if (!empty($_POST)) {
            $_POST['offer_cut_time'] = strtotime($_POST['offer_cut_time']);
            $z = $offer->create();
            $id = session('home_id');
            $info = $user->where("user_id=$id")->find();
            $offer->offer_com_id = $info['com_id'];
//            dump($z);
//            exit;

            if ($z) {

                if ($offer->add()) {

//                     $this->redirect('offer','','3','数据写入成功');
                    $this->success('报价成功！', U('offer'));
                }
            }

        } else {


            $this->display();
        }

    }

    //在后台添加报价信息，发布到前台，并且写入到数据库中
    function addoffer()
    {
        $offer = M('Offer');
        if (!empty($_POST)) {
            //两个逻辑：展示-收集,写入数据库
            //收集数据
//            $_POST['offer_description']="<p>".$_POST['offer_description']."</p>";
            $_POST['offer_cut_time'] = strtotime($_POST['offer_cut_time']);
            $z = $offer->create();
            if ($z) {
                if ($offer->add()) {

                    $this->success('报价成功！', U('addoffer'));
                }
                return false;

            } else {
                $this->error('填写的信息格式有误！', U('Offer/addoffer'));
            }

        }
//      else {
//
//            $this->redirect('addoffer', '报价失败！！');
//        }
        $this->assign('info', $z);
        $this->display();

    }

    //报价列表
    function offerlist1()
    {
//        实例化一个对象，调用报价订单
        $offer = new \Model\OfferModel();
        $info = $offer->where()->select();
        //看能不能用switch语句
        if ($info) {

            $this->assign('info', $info);

        }

        $this->display();

    }

    //订单列表
    function offerlist($offer_user_id)
    {
        $offer = new \Model\OfferModel();
        $offer_id = M('Offer_buyer')->select();
        $user = M('Register_user')->where("user_id=$offer_user_id")->find();
        //获取分类
        $offerClass = $offer->relation(true)->select();
        //获取对应的表单id
        foreach ($offer_id as $v) {

            $data[] = $v['offer_id'];

        }
        //1.获得总记录数
        $total = $offer->where("offer_user_id = $offer_user_id")->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 15;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_offer  WHERE offer_user_id = '$offer_user_id' order by offer_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $info = $offer->query($sql);

        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();
        //审核是否过期
            foreach ($info as $vv) {

                if ($vv['offer_status'] == 1) {//判断对应的字段是是否为1
                    if (NOW_TIME > $vv['offer_cut_time']) {

                        $vv['offer_status'] = 2;

                        $offer->save($vv);

                    }

                    $Offerinfo[] = $vv;

                } else {

                    $Offerinfo[] = $vv;//若offer_status不为1，则直接赋给数组$Offerinfo
                }
            }

            $this->assign('Offerinfo', $Offerinfo);
            $this->assign('data', $data);
            $this->assign('user', $user);
            $this->assign('offerClass', $offerClass);

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);
//        $offer=D('Offer');
//        $info=$offer->order("offer_create_time desc" )->select();
//        打印数组
        $this->display();
    }

    //调取报价用户信息，传递一个id值，这里是自己报价的报价人
    function lookUser($offer_user_id, $offer_id)
    {
        $com = M('Com');
        $offer_user = M('Register_user');//调用用户表
        $desc=M('Offer_buyer')->where("offer_user_id=$offer_user_id and offer_id=$offer_id")->field('offer_id,buy_desc')->find();

//        调用与报价人有关的用户信息
        $z = $offer_user->where("user_id='$offer_user_id'")->field(
                          'user_true_name,
                          com_id,
                          user_id,
                        user_job,
                        user_phone,
                        user_fixed_phone,
                        user_fixed_phone,
                        user_email,
                        user_name,
                        portraiture,
                        user_qq')->find();

        $info = $com->find($z['com_id']);//报价人的公司信息
        
        //计算报价人的信誉度和成功率
        $credit = showcredit($z['user_id']);
        if (($z && $info) == true) {

            $this->assign('z', $z);//报价人的用户信息
            $this->assign('info', $info);//报价人的公司信息
            $this->assign('offer_id', $offer_id);//表单id
            $this->assign('offer_user_id', $offer_user_id);//报价人id
            $this->assign('credit', $credit);//信誉度，成功率
            $this->assign('desc', $desc);//查看是否已经评论
        } else {

            $this->error('没有记录！！');
        }


        $this->display();
    }

    //查看过期记录
    function lookOffer($offer_user_id)
    {
        //查看offer_buyer表是否有求购人id
        $offer = new \Model\OfferModel();
        $OfferClass = $offer->relation(true)->select();
        $offer_id = M('Offer_buyer')->select();
        $user = M('Register_user')->where("user_id=$offer_user_id")->find();
        //遍历二维数组
        foreach ($offer_id as $v) {

            $data[] = $v['offer_id'];
        }
        $this->assign('data', $data);

        $lookOffer = M('Offer');
        //1.获得总记录数
        $total = $lookOffer->where("offer_user_id =$offer_user_id")->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 10;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_offer  WHERE offer_user_id = '$offer_user_id' order by offer_create_time desc " . $pag_obj->limit;
        //调用魔术方法
        $z = $lookOffer->query($sql);
//         dump($info);
//         exit;
        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();

        //审核是否过期

            foreach ($z as $vv) {

                if ($vv['offer_status'] == 1) {
                    if (NOW_TIME > $vv['offer_cut_time']) {

                        $vv['offer_status'] = 2;
                        $lookOffer->save($vv);
                        $info[] = $vv;
                    }

                } else {

                    $info[] = $vv;
                }
            }

            $this->assign('info', $info);

        $this->assign('pagelist', $pagelist);

        if ($z == true) {
            $this->assign('user', $user);

            $this->assign('OfferClass', $OfferClass);

        }
        $this->display();
    }

    //求购别人的东西，要展示对方的报价信息,要调用报价表的信息
    function myBuy($buyer_id)
    {
        $myBuy = new \Model\OfferModel();//实例化offer表调出与自己有关的的求购表单
        $buyId = M('Offer_buyer');
        $class = new \Model\OfferModel();
        $classinfo = $class->relation(true)->select();

        //1.获得总记录数
        $total = $buyId->where("buyer_id= $buyer_id")->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 10;
        //每页显示的条树

        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);

        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2, 3, 4, 5, 6, 7, 8));

        //获取自己作为求购人的相关记录，从offer_buyer表中
        $info = $buyId->where("buyer_id= $buyer_id")->select();

        //二维数组变为一维数组
        $data = array();
        foreach ($info as $v) {

            $data[] = $v['offer_id'];
            $data1[] = $v['offer_user_id'];
            $offer_id = $v['offer_id'];
            $email[$offer_id] = $v['email'];

        }
//        //把数组转换成以字符串的形式输出
        $d = implode(',', $data);
        $d1 = implode(',', $data1);
        //调用offer_id对应的报价表单信息
        $z = $myBuy->select($d);

        //调用offer_user_id对应的register_user表中的记录
        $user_name = M('Register_user')->select($d1);

        //通过用户表和报价表单的用户id来找到对应的报价人名字，然后存进$z中
        foreach ($z as $b) {
            foreach ($user_name as $bb) {
                if ($b['offer_user_id'] == $bb['user_id']) {

                    $b['user_name'] = $bb['user_true_name'];
                    $offerInfo[] = $b;
                }
            }
        }
        $this->assign('pagelist', $pagelist);
//        dump($offerInfo);
//        exit;
        if ($offerInfo == true) {
            $this->assign('offerInfo', $offerInfo);
            $this->assign('email', $email);
            $this->assign('classinfo', $classinfo);


        } else {
            $this->error('没有求购记录！');
        }
        $this->display();
    }

    //查看对应表单求购人信息,用中间列表
    function buyList1($offer_id)
    {
//逻辑：根据offer与register_user表的关联关系，调出用户表的信息，进而取得com_id,最后获得公司名称
        $offer = new  \Model\OfferModel();
        $comlist = new \Model\ComModel();
        //实例化offer_buyer表调出email值，到前台进行判断
        $mail = M('Offer_buyer')->where("offer_id=$offer_id")->field('email')->select();


        //用关联模型调出求购人相关数据，是一个四维数组
        $info = $offer->where("offer_id=$offer_id")->relation(true)->select();

        //遍历四位数组，取得com_id
        foreach ($info as $v) {
            foreach ($v as $vv) {
                foreach ($vv as $vvv) {

                    $data[] = $vvv['com_id'];//把数组中的com_id换成字符串

                }
            }
        }
        //判断数组中元素的个数，如果是只有一个元素，就不用装换成字符串
        if (count($data) == 1) {


            $c = $data[0];

        } else {

            $c = implode(',', $data);
        }
//        print_r($data);
//        exit;
//        exit;

        //做一个判断，判断offer_buyer表中是否有offer_id对应的记录，只要存在就可以执行下面的关联，
        //是为了保证能够得到求购人信息，防止发生没有buyer_id时也会调出企业信息

        if (M('Offer_buyer')->where("offer_id=$offer_id")->select()) {

            $com_name = $comlist->relation(true)->select("$c");

            //遍历二维数组$com_name,取得公司名字
            foreach ($com_name as $v) {

                $com_user[] = $v['user'];

            }
//            dump($com_user);
//            dump($com_name);
//            exit;

            //要经历三次遍历才可以把用户的信息遍历出来
            if (($info && $com_user) == true) {

                $this->assign('com_user', $com_user);
                $this->assign('com_name', $com_name);
                $this->assign('mail', $mail);
                $this->assign('offer_id', $offer_id);


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
        $num = M('Offer_buyer')->where("offer_id=$offer_id")->count();


        foreach ($offerinfo as $v) {
            if($num != 1){

                $data[] = $v['buyer_id'];
                $buyer_id = implode(',', $data);
                $price[] = array(//获取对应求购人的报价，id

                    'price' => $v['offer_buy_price'],
                    'buyer_id' => $v['buyer_id'],
                    'offer_buy_desc'=>$v['offer_buy_desc']//获取你作为报价人时对求购人的评价
                );

            }else{

                $buyer_id=$v['buyer_id'];
                $price[] = array(//获取对应求购人的报价，id
                    'price' => $v['offer_buy_price'],
                    'buyer_id' => $v['buyer_id'],
                    'offer_buy_desc'=>$v['offer_buy_desc']//获取你作为报价人时对求购人的评价
                );

            }
        }

         $com = M('Register_user')->select($buyer_id);

        foreach ($com as $vv) {
            if($num !=1){

                $d[] = $vv['com_id'];
                $com_id = implode(',', $d);
            }else{

                $com_id = $vv['com_id'];

            }
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
            $this->assign('cominfo', $cominfo);
            $this->assign('offer_id', $offer_id);

        } else {

            $this->error('未有人求购！！！');//回到本页面
        }
        $this->display();
    }

    //展示求购人和报价人的公司信息

    function showCom($com_id)
    {
        $com = NEW \Model\ComModel();
        //一维数组

        $info = $com->relation(true)->where("com_id= $com_id")->find();
        //打印到模板
        $this->assign('info', $info);
        $this->display();

    }

    //订单修改
    function alterOffer1($offer_id)
    {
        //调出对应的报价表单，然后进行修改，最后重新写入
        $info = M('Offer')->where("offer_id=$offer_id")->find();
        //调取分类
        //调取分类1
        $pclass = M('Pro_pclass')->where("pro_pclass_id={$info['pclass']}")->field('pro_pclass')->find();

        //调取分类2
        $class = M('Pro_class')->where("pro_class_id={$info['class']}")->field('pro_class')->find();

        if ($info) {

            $this->assign('info', $info);
            $this->assign('pclass', $pclass);
            $this->assign('class', $class);

        } else {

            $this->error('没有找到该表单信息！');
        }


        $this->display();
    }

     //订单修改
     function alterOffer($offer_id)
    {
        //调出对应的报价表单，然后进行修改，最后重新写入
        $info = M('Offer')->where("offer_id=$offer_id")->find();
//        //调取分类1
//        $pclass = M('Pro_pclass')->where("pro_pclass_id={$info['seachprov']}")->field('pro_pclass')->find();
//
//        //调取分类2
//        $class = M('Pro_class')->where("pro_class_id={$info['class']}")->field('pro_class')->find();
        //调取分类
        $this->assign('info', $info);

        if (!empty($_POST)) {

//            dump($_POST);
//            exit;
            if ($_FILES['pro_album']['error'] < 4) {
                //对上传图片进行配置
                $upload = new \Think\Upload();
                $upload->$upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
//                $upload->savePath  =  './Admin/Public/Uploadss/'; // 设置附件上传目录
                $upload->rootPath = './Admin/Public/';//保存根路径
//                $upload-> savePath = 'Uploadss/'; //保存路径
                $upload->savePath = 'Uploadss/'; //保存路径
                //如果没有设定savepath，就会自动生成一个文件夹，存储照片，
                //其实每次上传照片的时候都会创建一个文件夹，只是相同的文件夹合并了成了一个文件夹
                $upload->saveName = $_POST['offer_user_id'] . $_POST['offer_create_time']; //保存路径
                // 上传文件
                $info = $upload->upload();

            }
            M('Offer')->create();
            $prov = M('Prov')->where("prov_id={$_POST['seachprov']}")->find();
            $city = M('city')->where("city_id={$_POST['homecity']}")->find();
            M('Offer')->offer_origin_place = $prov['prov_name'] . $city['city_name'];
            M('Offer')->offer_cut_time = strtotime($_POST['offer_cut_time']);

            if (M('Offer')->save()) {

                $this->success('修改成功', U('offerlist'));
            }
        } else {

            $this->display();
        }


    }

      //前台报价
      function offer_order()
    {
        //实例化一个offer对象，调用数据表中数据
        $offer = new \Model\OfferModel();
        $user = new \Model\Register_userModel();

        if (!empty($_POST)) {

//            dump($_POST);
//            exit;

            //对上传图片进行配置
            $upload = new \Think\Upload();
            $upload->$upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
//                $upload->savePath  =  './Admin/Public/Uploadss/'; // 设置附件上传目录
            $upload->rootPath = './Admin/Public/';//保存根路径
//                $upload-> savePath = 'Uploadss/'; //保存路径
            $upload->savePath = 'Uploadss/'; //保存路径
            //如果没有设定savepath，就会自动生成一个文件夹，存储照片，
            //其实每次上传照片的时候都会创建一个文件夹，只是相同的文件夹合并了成了一个文件夹
            $upload->saveName = $_POST['offer_user_id'] . $_POST['offer_create_time']; //保存路径

            // 上传文件
            $info = $upload->upload();
//
//            if (!$info) {
//                       // 上传错误提示错误信息
//                $this->error($upload->getError());
//                } else {
//                       // 上传成功
//                $this->success('上传成功！');
//                }


            $_POST['offer_cut_time'] = strtotime($_POST['offer_cut_time']);
            $z = $offer->create();

            $id = session('home_id');

            if ($id) {
                $info = $user->where("user_id=$id")->find();
                $offer->offer_com_id = $info['com_id'];
                $offer->prov = $_POST['seachprov'] ;
                $offer->city = $_POST['homecity'];
//            dump($z);
//            exit;

                if ($z) {

                    if ($offer->add()) {

//                     $this->redirect('offer','','3','数据写入成功');
                        $this->success('报价成功！');
                    }
                }

            } else {

                $this->error('请先登录！', U('User/login'));

            }


        } else {


            $this->display();
        }

    }

      //调用求购人和报价人对应的评价信息
       function showDesc($offer_user_id)
    {

        $descInfo = M('Offer_buyer')->where("offer_user_id=$offer_user_id and buyer_id= $offer_user_id")->select();
        //取出对应报价人的id，也就是说评论人的id
        foreach ($descInfo as $v) {

            $data[] = $v['buyer_id'];
            $data[] = $v['_id'];
        }
        $com_id = new \Model\ComModel();
//        $z=implode(',', $data);
        $comInfo = $com_id->relation(true)->select();

//        dump($comInfo);
//        exit;

        $this->assign('descInfo', $descInfo);
        $this->assign('comInfo', $comInfo);
        $this->assign('data', $data);
        $this->display();

    }

      //报价订单描述
       function offerDesc($offer_id)
    {


        $info = M('Offer')->where("offer_id = $offer_id")->field('offer_description')->find();

        $this->desc = $info;

        $this->display();


    }

//
//这是用数据表操作的方法查询求购人信息
//查看对应表单的求购人信息
//    function buyList1($offer_id)
//    {
//        //实例化对象，调用对应的求购信息以获得求购人的信息
//        $buylist = M('Offer');
//        $buyer = M('Register_user');
//
//        $info = $buylist->where("$offer_id")->find();
//
//        $buy = $buyer->where(array( 'user_id'=> $info['offer_buyer_id']))->select();
//        if ($buy) {
//
//            $this->assign('buy', $buy);
//
//        } else {
//
//            $this->error('未有人求购');
//        }
//        $this->display();
//
//
//
//
//    }

}
