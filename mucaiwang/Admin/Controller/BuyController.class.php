<?php

namespace Admin\Controller;
use Think\Controller;
Class BuyController extends CommonController{

	//这里是求购信息展示页面
	/*public function index(){
		//从表单传来的数据中取得求购信息id和用户id
		 $pur_id = I('pur_id','',intval);
		 $user_id = I('user_id','',intval);
		 //根据取得的求购信息id在求购信息表中查找所点击的求购信息
		 $pur = D('purchase_info')->where(array('pur_ID'=>$pur_id))->find();
		 //根据取得的用户id在用户信息表查找该求购信息的发布者信息
		 $user = D('register_user')->where(array('user_id'=>$user_id))->find();
		 //将查到的求购信息和用户信息分配到表单
		 $this->pur = $pur;
		 $this->user = $user;
		$this->display();
	}*/

	//这里是未发布的求购信息列表
	public function buyList(){

		$offer = new \Model\OfferModel();
		//1.获得总记录数
		//$total = $offer->count();
		$total = M('buy')->where(array('audit'=>0))->count();
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
			}else{
				$v['outdate']=0;
				D('buy')->where(array('pur_id'=>$v['pur_id']))->save($v);
			}
		}
		//从数据库查找全部的求购信息
		//$buy = D('purchase_info')->select();

		//3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
		$sql = "select * from mucai_buy where audit = 0 order by effective_time desc " . $pag_obj->limit;
		//调用魔术方法
		$buy = $offer->query($sql);
		foreach ($buy as $v){
		/*	$pclass = D('pro_pclass')->field('pro_pclass')->where(array('pro_pclass_id'=>$v['pclass_id']))->find();
			$v['pclass']=$pclass['pro_pclass'];
			$class = D('pro_class')->field('pro_class')->where(array('pro_class_id'=>$v['class_id']))->find();
			$v['class']=$class['pro_class'];
			*/
			//新加关联模型
			/*$listoffer = new \Model\BuyModel();
			$id = $v['pur_id'];
			$info = $listoffer->where("buy_id=$id")->relation(true)->find(1);//用关联模型调出对应人的公司名字还有分类
			*/
			
			$info = new \Model\BuyModel();
			$place = $info->where(array('pur_id'=>$v['pur_id']))->field('audit',true)->relation(true)->find();//关联表调不
			
			$v['province']=$place['prov_name'];
			$v['city']=$place['city_name'];
			$v['pclass']=$place['pro_pclass'];
			$v['class']=$place['pro_class'];

			$buy2[]=$v;
		}
		$this->buy = $buy2;
		$this->display();
	}
	//这里是审核表单提交
	public function audit(){
		$uid = I('uid','',intval);
		$user_id = I('user_id','',intval);
		$pur_id = I('pur_id','',intval);
		$audit = I('audit','',intval);
		//从数据库查出审核的求购信息
		$pur = D('buy')->where(array('pur_id'=>$pur_id))->find();
		//令已通过审核的表单信息标记字段等于1或2
		if($audit==1){//如果通过审核
			$pur['audit'] = 1;
			if(D('buy')->where(array('pur_id'=>$pur_id))->save($pur)){
				$this->success('已允许发布',U('Admin/Buy/buyList'));
			}else{
				$this->error('审核失败');
			}
		}
		if($audit==0){//如果不通过审核
			$pur['audit'] = 2;
			if(D('buy')->where(array('pur_id'=>$pur_id))->save($pur)){
				$this->success('已拒绝发布',U('Admin/Buy/buyList'));
			}else{
				$this->error('审核失败');
			}
		}
	}

	//这里是查看求购用户信息
	public function buyUser(){
		$uid = I('uid','',intval);//求购用户id
		$user = D('register_user')->where(array('user_id'=>$uid))->find();//求购用户全部信息
		$com = D('com')->where(array('com_id'=>$user['com_id']))->find();
		
		//creditBuy方法，传进用户id，返回用户id,发布求购表单时、对别人信息进行报价时的总分数，评分总条数，成功交易次数
		//offerNum方法，传进用户id,返回用户id，发布报价表单时、对别人信息进行求购时的总分数，评分总条数，成功交易次数
		$buy = creditBuy($uid);
		$off = offerNum($uid);
		$score = ($buy['score']+$off['score'])/($buy['scoreNum']+$off['count']);//计算用户平均分
		$successNum = $buy['successNum'];//计算用户成功交易次数
		$allNum = $buy['scoreNum']+$off['count'];//计算用户交易总数
		$successRate = $successNum/$allNum;//计算用户交易比率
		$cre = $successRate*100*0.4+$score*0.6;//计算信用度
		//echo '成功次数'.$successNum.'交易总数'.$allNum.'成功比率'.$successRate.'平均分'.$score;
		
		$creadit = array(
			'successRate'=>round($successRate*100,2),
			'score'=>round($score,2),
			'cre'=>round($cre,2),
		);
		$this->creadit = $creadit;
	//die;
		$this->com = $com;
		$this->user = $user;
		$this->display();
	}

	//这里是已发布的求购信息列表
	public function buyList2(){

	
		$offer = new \Model\OfferModel();
		//1.获得总记录数
		//$total = $offer->count();
		$total = M('buy')->where(array('audit'=>1))->count();
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

		//3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
		$sql = "select * from mucai_buy where audit = 1 order by off2 desc,release_time asc " . $pag_obj->limit;
		
		/*找出全部需要显示的求购信息，对其进行遍历，取得每张表单的id，再到中间表去找到该表单对应的全部信息，遍历这些信息，判断off字段
		 * 是否为0，如果有，则令标志为0，并跳出对该表单信息的遍历，否则遍历到底，标志默认为1*/
		
		
		//调用魔术方法
		$buy = $offer->query($sql);
		foreach ($buy as $v){
			
			$buyUser = D('buy_register_user')->where(array('buy_id'=>$v['pur_id']))->select();//这是该张表单在中间表的全部信息
			foreach($buyUser as $u){//u是该张表单对应的其中一条数据
				if($u['off']==0){//如果有未审核的报价人，就令off2为2
					$v['off2']=2;
					break;
				}else{
					if($v['off2']==2){
						$v['off2']=1;
					}
				}
			}

			D('buy')->where(array('pur_id'=>$v['pur_id']))->save($v);
			
			/*$pclass = D('pro_pclass')->field('pro_pclass')->where(array('pro_pclass_id'=>$v['pclass_id']))->find();
			$v['pclass']=$pclass['pro_pclass'];
			$class = D('pro_class')->field('pro_class')->where(array('pro_class_id'=>$v['class_id']))->find();
			$v['class']=$class['pro_class'];*/
			
			$info = new \Model\BuyModel();
			$place = $info->where(array('pur_id'=>$v['pur_id']))->field('audit',true)->relation(true)->find();//关联表调不
				
			$v['province']=$place['prov_name'];
			$v['city']=$place['city_name'];
			$v['pclass']=$place['pro_pclass'];
			$v['class']=$place['pro_class'];
				

			$buy2[]=$v;
		}

		/*p($buy2);
		die;*/
		$this->buy = $buy2;
		$this->display();
	}

	//这里是查看报价人信息方法
	public function offer(){
		$pid = I('pid','',intval);

		//从关联表中取出求购表单的id和其对应的报价人id
		$info = new \Model\BuyModel();
		$buy = $info->where(array('pur_id'=>$pid))->field('audit',true)->relation(true)->find();//关联表调不
		
		//报价人id
		$reg = $buy['register_user'];
		//取出该报价人对该表单报的价钱
		//$offerPrice = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$reg))->find();
		foreach ($reg as $v){
			$com = D('com')->where(array('com_id'=>$v['com_id']))->find();
			$v['com_name'] = $com['com_name'];
			$register[] = $v;
		}

		foreach ($register as $v){
			$off = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$v['user_id']))->find();
			$v['off']=$off['off'];
			$v['offerPrice']=$off['offerprice'];
			
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
			$regis[] = $v;
		}
		/*p($regis);
		//echo '$pid'.$pid.'$reg'.$reg.'$offerprice'.$offerPrice;
		die;*/
		$this->pid = $pid;
		$this->audit2 = $buy['audit2'];
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


	//这里是通过审核并发送邮件方法
	public function emailBuy(){

		//需要发送：收信人的email，主题（江门木材网），内容（尊敬的**用户，已有企业对你发布的求购**信息进行了报价，请登录江门木材网进行查看对方信息）
		//需要取到求购者的信息，求购的表单
		$audit2 = I('audit2','',intval);
		$pid = I('pid','',intval);//取到该求购表单的id
		$good = D('buy')->where(array('pur_id'=>$pid))->find();//取得求购商品的全部信息
		$good['audit2']=$audit2;
		$au = D('buy')->where(array('pur_id'=>$pid))->save($good);

		$goodName =  $good['pur_good_rname'];//取到求购商品的名字
		$buyName = $good['pur_user_name'];//取得求购用户的名字
		$buyId = $good['pur_user_id'];//取得求购用户的id
		$buy = D('register_user')->where(array('user_id'=>$buyId))->find();
		$emailBuy = $buy['user_email'];//取得求购用户的邮箱


		//需要发送：收信人email，主题（江门木材网），内容（尊敬的**用户，你对**求购信息的报价已通过审核，请登录江门木材网进行查看对方信息）
		//需要取到报价人email，报价人姓名
		$offId = I('offId','',intval);//取得报价用户的id
		$offer = D('register_user')->where(array('user_id'=>$offId))->find();//取得报价用户的全部信息
		$emailOff = $offer['user_email'];//取得报价用户的邮箱
		$offName = $offer['user_true_name'];//取得报价用户的姓名

		//取到该报价用户对表单报的价格
		$offerPrice = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$offId))->find();
		
		if($audit2==1){
			$toBuy = sendMailBuy($emailBuy,'江门木材网','尊敬的'.$buyName.'用户，已有企业对你发布的求购'.$goodName.'信息报了'.$offerPrice['offerprice'].'的价格，请登录江门木材网进行查看对方信息,交易后可到');//发送邮件到求购者邮箱
			$toOff = sendMailBuy($emailOff,'江门木材网','尊敬的'.$offName.'用户，你对'.$goodName.'求购信息的报价已通过审核，请登录江门木材网进行查看对方信息');//发送邮件到求购者邮箱
			
			if($toBuy && $toOff){
				$this->success('已通过审核并发送邮件成功',U('Admin/Buy/buyList2'));
				//让该表单的off字段变为1，代表通过审核
				$off = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$offId))->find();
				$off['off']=1;
				D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$offId))->save($off);
				//让该表单的audit2字段变为1，代表有人报价并通过审核
				$off2 = D('buy')->where(array('pur_id'=>$pid))->find();
				$off2['audit2']=1;
				D('buy')->where(array('pur_id'=>$pid))->save($off2);

			}else{
				$this->error('审核失败');
				/*echo '$offName'.$offName.'$goodName'.$goodName;
				die;*/
			}
		}
		if($audit2==2){
			$toOff = sendMailBuy($emailOff,'江门木材网','很抱歉，尊敬的'.$offName.'用户，你对'.$goodName.'求购信息的报价没有通过审核');//发送邮件到求购者邮箱

			if($toOff){
				$this->success('发送邮件成功',U('Admin/Buy/buyList2'));
				//让该表单的off字段变为2，代表没有通过审核
				$off = D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$offId))->find();
				$off['off']=2;
				D('buy_register_user')->where(array('buy_id'=>$pid,'register_id'=>$offId))->save($off);
				//让该表单的audit2字段变为1，代表有人报价并通过审核
				/*$off2 = D('buy')->where(array('pur_id'=>$pid))->find();
				$off2['audit2']=2;
				D('buy')->where(array('pur_id'=>$pid))->save($off2);*/
			}else{
				$this->error('审核失败');
			}
		}

	}
	
	//这里是根据用户id取得其的评价
	public function remark(){

		$uid = I('uid','',intval);
		
		$remark = remarkBuy($uid);
		//$remarkOff = Offerdesc($uid);
	/*	p($remark);
		die;*/
		$this->remark = $remark;
		$this->display();
	}
	
	//这里是根据用户id取得其作为报价人的评价
	/*public function remarkToOff(){
		 $uid=I('uid','',intval);
		 $buy = D('buy_register_user')->select();
		 foreach ($buy as $v){
		 	if($v['register_id']==$uid){
		 		$rema['remark'] =  $v['remarktooff'];
		 		$off = D('buy')->where(array('pur_id'=>$v['buy_id']))->find();
		 		$rema['buy'] =$off['pur_user_name'] ;
		 		$remark[]=$rema;
		 	
		 	}
		 }
		$this->remark = $remark;
		$this->display();
	}*/
}


?>