<?php
namespace Home\Controller;

use Think\Controller;

class BuyController extends CommonController
{
    //这里是当前用户的求购表单显示页面
    public function showBuy(){
        $offer = new \Model\OfferModel('buy');
        //1.获得总记录数
        //$total = $offer->count();
        $total = M('buy')->where(array('pur_user_id'=>$_SESSION['home_id']))->count();
        //是数据辅助方法，max(),min(),sum()
        $per = 8;
        //每页显示的条树
        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);



        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2,3, 4, 5, 6, 7, 8));
        //对象调用select方法，返回一个二维数组
        //	   $info= $pro->order('pro_id desc')->select();

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);


        /*判断表单是否过期*/
        $buy = D('buy')->select();
        foreach ($buy as $v){
            $outdate = strtotime($v['effective_time']);
            if($outdate<=time()){
                $v['outdate']=1;
                D('buy')->where(array('pur_id'=>$v['pur_id']))->save($v);
            }
        }
        //从数据库查找全部的求购信息
        //$buy = D('purchase_info')->select();
        $id = $_SESSION['home_id'];
        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_buy where  pur_user_id= '+$id+' order by effective_time desc " . $pag_obj->limit;
        //调用魔术方法
        $buy = $offer->query($sql);


        /*判断表单是否过期*/
        //$buy = D('buy')->select();
        foreach ($buy as $v){
            $outdate = strtotime($v['effective_time']);
            if($outdate<=time()){
                $v['outdate']=1;
                D('buy')->where(array('pur_id'=>$v['pur_id']))->save($v);
            }else{
                $v['outdate']=0;
                D('buy')->where(array('pur_id'=>$v['pur_id']))->save($v);
            }
        }
        /*p($buy);
        die;*/
        $this->buy = $buy;
        $this->display();
    }

    //这里是对求购信息进行报价的信息收集方法
    public function buyOff(){

        //收集该求购表单报价人的ID
        $oid = I('oid','',intval);
        //收集该求购表单的id
        $pid = I('pid','',intval);
        //收集对方报上来的价格
        //$yourPrice = I('yourPrice','',intval);
        $yourPrice = $_POST['yourPrice'];
        //让该表单的off2字段变为1，代表有人报价
        $off = D('buy')->where(array('pur_id'=>$pid))->find();
        $off['off2']=1;
        D('buy')->where(array('pur_id'=>$pid))->save($off);
        $buy = array(
            'buy_id'=>$pid,
            'register_id'=>$oid,
            'offerprice'=>$yourPrice,
        );
        //echo $oid."#".$pid."#".$yourPrice;
        /*	p($buy);
            die;*/
        if(D('buy_register_user')->add($buy)){
            $this->success('报价成功',U('Home/Index/showPur',array('pur_id',$pid)));
        }else{
            $this->error('报价失败');
        }

    }
    //这里是修改报价订单
    public function altBuy(){
        $pid = I('pid','',intval);
        $buy = D('buy')->where(array('pur_id'=>$pid))->find();
        /*p($buy);
        die;*/
        $this->buy = $buy;
        $this->display();
    }

    //这里是修改报价表单处理方法
    public function altBuyHandle(){
        $pid = I('pid','',intval);
        if(D('buy')->where(array('pur_id'=>$pid))->save($_POST)){
            $this->success('修改表单成功',U('Home/Buy/showBuy'));
        }else{
            $this->error('修改表单失败');
        }
    }

    //这里是查看报价人信息方法
    public function offer(){
        $pid = I('pid','',intval);
        //从关联表中取出求购表单的id和其对应的报价人id
        $info = new \Model\BuyModel();
        $buy = $info->where(array('pur_id'=>$pid))->field('audit',true)->relation(true)->find();//关联表调不

        $reg = $buy['register_user'];
        foreach ($reg as $v){
            $com = D('com')->where(array('com_id'=>$v['com_id']))->find();
            $v['com_name'] = $com['com_name'];
            $register[] = $v;
        }
        /*p($buy['register_user']);*/
        //此处从中间表取出发邮件状态再将其整合进pur
        foreach ($register as $v){
            $off = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$v['user_id']))->find();//找到中间表的该条记录
            $v['off']=$off['off'];
            $v['offerPrice']=$off['offerprice'];
            $v['remarktooff']=$off['remarktooff'];
            $v['off_score']=$off['off_score'];
            $v['success']=$off['success'];
            
            //creditBuy方法，传进用户id，返回用户id,发布求购表单时、对别人信息进行报价时的总分数，评分总条数，成功交易次数
            //offerNum方法，传进用户id,返回用户id，发布报价表单时、对别人信息进行求购时的总分数，评分总条数，成功交易次数
            $buy = creditBuy($v['user_id']);
            $off = offerNum($v['user_id']);
            $score = ($buy['score']+$off['score'])/($buy['scoreNum']+$off['count']);//计算用户平均分
            $successNum = $buy['successNum'];//计算用户成功交易次数
            $allNum = $buy['scoreNum']+$off['count'];//计算用户交易总数
            $successRate = $successNum/$allNum;//计算用户交易成功比率
            $cre = $successRate*100*0.4+$score*0.6;//计算信用度
            	
            //echo '成功次数'.$successNum.'交易总数'.$allNum.'成功比率'.$successRate.'平均分'.$score;
            $v['score']=round($score,2);
            $v['successRate']=round($successRate*100,2);
            $v['cre']=round($cre,2);
            
            $regis[]=$v;
        }

       /* p($regis);
        die;*/
        $this->pid = $pid;
        $this->register = $regis;
        $this->display();
    }

    //这里查看公司信息
    public function com(){
        $cid = I('cid','',intval);
        $com = D('com')->where(array('com_id'=>$cid))->find();
        $this->com = $com;
        $this->display();
    }

    //这里是我的报价方法
    public function myOffer(){
        $uid = I('uid','',intval);
        //取得关联的全部信息
        $info = new \Model\BuyModel();
        $buy = $info->field('audit',true)->relation(true)->select();

        //此循环取得该用户对应所报价的求购表单信息
        $n=0;
        foreach ($buy as $v){
            foreach ($v['register_user'] as $u){
                if($u['user_id']==$uid && $n==0){//已找到该用户，下面取出他们的上一级
                    $buy_id = D('buy_register_user')->where(array('register_id'=>$u['user_id']))->field('buy_id')->select();//已取得对应表单的id
                    //$pur= D('buy')->where(array('pur_id'=>$v['pur_id']))->field('register_user',true)->select();
                    foreach ($buy_id as $m){
                        $pur[] = D('buy')->where(array('pur_id'=>$m['buy_id']))->find();
                        //echo $m['buy_id'];//这是中间表的buy_id,也就是buy表的id
                        $n=1;
                    }
                }
            }
        }
        //此处从中间表取出发邮件状态再将其整合进pur
        foreach ($pur as $v){
            $off = D('buy_register_user')->where(array('buy_id'=>$v['pur_id'],'register_id'=>$uid))->find();//找到中间表的该条记录
            $v['off']=$off['off'];
            $purchase[]=$v;
        }
        /*p($purchase);
        die;*/
        $this->pur = $purchase;
        $this->display();
    }

    //这里是我的报价里的查看求购人信息方法
    public function buyer(){
        //pid是表单id，uid是求购人的id，oid（即本人）id
        $pid = I('pid','',intval);
        $uid = I('uid','',intval);
        $oid = $_SESSION['home_id'];
        $buyer = D('register_user')->where(array('user_id'=>$uid))->find();
        $com = D('com')->where(array('com_id'=>$buyer['com_id']))->find();
  
        $buy = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$oid))->find();
        $this->buy = $buy;
        $this->pid = $pid;
  	
        
        //creditBuy方法，传进用户id，返回用户id,发布求购表单时、对别人信息进行报价时的总分数，评分总条数，成功交易次数
        //offerNum方法，传进用户id,返回用户id，发布报价表单时、对别人信息进行求购时的总分数，评分总条数，成功交易次数
        $buy1 = creditBuy($uid);
        $off = offerNum($uid);
        $score = ($buy1['score']+$off['score'])/($buy1['scoreNum']+$off['count']);//计算用户平均分
        $successNum = $buy1['successNum'];//计算用户成功交易次数
        $allNum = $buy1['scoreNum']+$off['count'];//计算用户交易总数
        $successRate = $successNum/$allNum;//计算用户交易成功比率
         $cre = $successRate*100*0.4+$score*0.6;//计算信用度

         $this->cre = round($cre,2);
         $this->successRate = round($successRate,2);
         $this->score = round($score,2);
        
        $this->uid=$uid;
        $this->oid = $oid;
        $this->buyer = $buyer;
        $this->com = $com;
        $this->display();
    }


    //运用关联模型,前台求购
    function buy1($offer_id, $home_id){
        $buy = M('Offer_buyer');

        //关联写入
        if (($offer_id && $home_id) == true) {

            $data = array(
                'offer_id' => "$offer_id",
                'buyer_id' => "$home_id"
            );
            $z = $buy->add($data);
        } else {
            $this->error('求购未成功！！');
        }
        if ($z) {

            $this->success('求购成功！！');

        }

        // $this->display();

    }

    //这里是求购表单方法

    //求购表单页面
    public function wantBuy(){

        //添加分配分类信息
        $pclass = D('pro_pclass')->select();
        $class = D('pro_class')->select();
        /*p($pclass);
            p($class);
        die;*/
        $this->pclass = $pclass;
        $this->class = $class;
        $this->display();
    }

    //这里是求购表单提交
    public function wantBuyHandle(){

        //取得当前用户的真实姓名
        $uid=$_SESSION['home_id'];
        $name = D('register_user')->where(array('user_id'=>$uid))->field('user_true_name')->find();
        //重组地址信息
        $pur_place = $_POST['province'].$_POST['city'];
        //重组求购表单所需要的信息
        $buy = array(
            'pur_user_id'=>$_SESSION['home_id'],//用户id
            'pur_good_rname'=>$_POST['pur_good_rname'],//产品名称
            'pur_good_rnumber'=>$_POST['pur_good_rnumber'],//产品数量
            'pur_good_rsize'=>$_POST['pur_good_rsize'],//产品规格
            'pur_good_price'=>$_POST['pur_good_price'],//产品单价
            'pur_description'=>$_POST['pur_description'],//产品描述
            'release_time'=>time(),//创建时间
            'effective_time'=>$_POST['effective_time'],//截止时间
            'pur_user_name'=>$name['user_true_name'],//用户真实姓名
            'pur_province'=>$_POST['province'],//求购省份id
        	'pur_city'=>$_POST['city'],//求购省份id
            'class_id'=>$_POST['class'],//子分类id
            'pclass_id'=>$_POST['pclass'],//父分类id
        );
        $buy = D('buy')->add($buy);


        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Home/Public/img/buy/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->saveExt = 'jpg';
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        // 开启子目录保存 并以日期（格式为Ymd）为子目录
        $upload->autoSub = true;
        $upload->subName = array('date','Ymd');
        //更改名称
        $upload->saveName = $buy;
        // 上传文件
        $info   =   $upload->upload();
        //将重组后的信息存进数据库
        if($buy){
            $this->success("提交求购表单成功",U("Home/Index/index"));
        }else{
            $this->error("提交求购表单失败");
        }
    }

    //这里提交求购人对报价人的评价
    public function remarkToOff(){
        $buy = D('buy_register_user')->where(array('buy_id'=>$_POST['pid'],'register_id'=>$_POST['uid']))->find();
        $buy['remarktooff']=$_POST['remarktooff'];
        $buy['off_score']=$_POST['score'];//更新对报价人的评分
        //判断双方写入的交易状态是否相同
       	/*if($buy['user_trade']!=2 && $_POST['trade']!=$buy['buy_trade']){
       		$this->error('交易状态与对方不一致',U('Home/Buy/offer',array('pid'=>$_POST['pid'])));
       	}else {
       		$buy['user_trade']=$_POST['trade'];//更新交易状态
       	}*/
        /*p($buy);
        die;*/
        if(D('buy_register_user')->where(array('buy_id'=>$_POST['pid'],'register_id'=>$_POST['uid']))->save($buy)){
            $this->success('评价成功',U('Home/Buy/offer'));
        }else{
            $this->error('评价失败');
        }
    }
    //这里提交报价人对求购人的评价
    public function remarkToBuy(){
    	
    	//$_POST['trade']是成功次数，$_POST['score']是评分
		$uid = I('uid','',intval);//要评价的用户id
		
		/*更新求购人交易成功次数*/
		$buyer = D('register_user')->where(array('user_id'=>$uid))->find();//从用户表找出求购用户以便把成功次数存进
		if($_POST['trade']==1){
			$buyer['user_trade']++;
			D('register_user')->where(array('user_id'=>$uid))->save($buyer);//更新数据
		}
		/*更新报价人交易成功次数*/
		$offer = D('register_user')->where(array('user_id'=>$_SESSION['home_id']))->find();//从用户表找出报价用户以便把成功次数存进
		if($_POST['trade']==1){
			$offer['user_trade']++;
			D('register_user')->where(array('user_id'=>$_SESSION['home_id']))->save($offer);//更新数据
		}
		
		//判断双方写入的交易状态是否相同
		/*if($buy['user_trade']!=2 && $_POST['trade']!=$buy['user_trade']){
			$this->error('交易状态与对方不一致',U('Home/Buy/buyer',array('pid'=>$_POST['pid'],'uid'=>$uid)));
		}else {
			$buy['user_trade']=$_POST['trade'];//更新交易状态
		}*/
		
        $buy = D('buy_register_user')->where(array('buy_id'=>$_POST['pid'],'register_id'=>$_SESSION['home_id']))->find();
        $buy['remarktobuy']=$_POST['remarktobuy'];
        $buy['buy_score']=$_POST['score'];//更新对求购用户的评分
        $buy['success']=$_POST['trade'];//更新该交易状态
        //echo '$pid'.$_POST['pid'].'$uid'.$_POST['uid'];
        //p($_POST);
        /*p($buy);
        die;*/
        if(D('buy_register_user')->where(array('buy_id'=>$_POST['pid'],'register_id'=>$_SESSION['home_id']))->save($buy)){
            $this->success('评价成功',U('Home/Buy/offer'));
        }else{
            $this->error('评价失败');
        }
    }





    //运用关联模型,前台求购
    function buy($offer_id)
    {

//		dump($_POST);
//		exit;
        $home_id = I('post.offer_buyer_id');
        //逻辑：收集表单信息写进数据表offer_buyer{求购的详细信息}和表offer_buy{}
        $buy = M('Offer_buyer');


        if (!empty($_POST)) {
            //关联写入offer_buyer表
            if (($offer_id && $home_id) == true) {

                M('Offer_buy')->create();
//			dump(M('Offer_buy')->create());
//			exit;
//			M('Offer_buy')->offer_buy_create_time=I('post.offer_buy_create_time');
//			M('Offer_buy')->offer_id=I('offer_id');
                M('Offer_buy')->offer_buy_pro_cut_time = strtotime($_POST['offer_buy_pro_cut_time']);

                $data = array(
                    'offer_id' => "$offer_id",
                    'buyer_id' => "$home_id"
                );

                $zz = M('Offer_buy')->add();
                $z = $buy->add($data);
            } else {
                $this->error('求购未成功！！');
            }
            if (($z && $zz) == true) {

                $this->success('求购成功！！');

            }
        } else {
            $this->error('表单提交失败');
        }


    }


    //前台求购表单展示
    function buy_order1($offer_id)
    {
        //实例化一个offer对象，调用数据表中数据
        $offer = new \Model\OfferModel();
        $user = new \Model\Register_userModel();
        //分类显示
//		$pclass= M('Pro_pclass')->select();
//		$class=M('Pro_class')->select();
        $offerS = $offer->where("offer_id=$offer_id")->find();
//		$this->assign('pclass',$pclass);
//		$this->assign('class',$class);
        $this->assign('offerS', $offerS);
        //	dump($pclass);
        //	exit;
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


    //前台求购（对报价表单）

    function buy_order2($offer_id, $buyer_id)
    {


        M('Offer_buyer')->create();
        $info = M('Offer_buyer')->field('offer_id,buyer_id')->select();
        foreach ($info as $v) {

            $data[] = $v['offer_id'];
            $data1[] = $v['buyer_id'];
            $data3[] = $v['offer_user_id'];

        }
        $z = (in_array($offer_id, $data) && in_array($buyer_id, $data1));
        $this->assign('z', $z);


        if (!empty($_POST)) {

            if (in_array(session('home_id'), $data3) == true) {

                $this->error('自身求购失败！！');

            } else {
                if (M('Offer_buyer')->add()) {

                    $this->success('求购成功！！');

                }
            }


        } else {
            $this->display();
        }


    }


    //前台求购（对报价表单）

    function buy_order()
    {


        if (!empty($_POST)) {
            M('Offer_buyer')->create();
            $offer_id=I('post.offer_id');
            $buyer_id=I('post.buyer_id');
            //当前用户的id

                $z=session('home_id');
            $info = M('Offer')->where("offer_user_id = $z")->select();
         $buyinfo = M('Register_user')->where("user_id = $buyer_id")->field('com_id')->find();

            foreach ($info as $v) {

                $data3[] = $v['offer_id'];
            }
//dump(in_array(session('home_id'), $data3));
//            exit;
//            dump($data3);
//            exit;
            //判断自己求购的表单是否为自己的报价表单号，若是就不是就可以求购
            if (in_array($offer_id, $data3)) {

                   $this->error('不能向己方求购！');

            } else {
                     M('Offer_buyer')->create();
                M('Offer_buyer')->offer_buy_com_id= $buyinfo['com_id'];
                if (M('Offer_buyer')->add())

                    $this->success('求购成功！！');
            }

        } else {
            $this->display();
        }


    }
    
    //这里是根据用户id取得其的评价
    public function remark(){
    	//求购人id
    	$uid = I('uid','',intval);
    	$remark = remarkBuy($uid);
    	$this->remark = $remark;
    	$this->display();
    }
    

}

