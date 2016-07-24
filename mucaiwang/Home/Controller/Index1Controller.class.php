<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{


    //前台首页
    public function index(){


        //判断用户是否已登录，以显示相关信息
        $uid=$_SESSION['home_id'];
        if($uid){
            $user = D('register_user')->where(array('user_id'=>$uid))->find();
        }else{
            $user=array(
                'user_id'=>0,
            );
        }
        $this->user = $user;


        //从数据库查出所有已通过审核的求购信息并分配到模板
        $purchase = D('buy')->where(array('audit'=>1,'outdate'=>0))->select();
        $this->purchase = $purchase;

        //取出第一条数据并分配到模板
        $newTop = D('new')->order('time desc')->find();
        $this->newTop = $newTop;
        $time = $newTop['time'];

        //newAll是除第一条外的全部，newTwo是显示图片的两条，newJpg是除第一条和显示图片两条的其他
        $newAll = D('new')->where("time<$time")->order('time desc')->select();
        $show = 1;
        $index = 1;
        foreach ($newAll as $v){
            $id = $v['id'];
            $time=date("Ymd",$v['time']);
            if(is_file( "./Admin/Public/img/new/$time/$id.jpg")){
                if($index<=2){
                    $newTwo[]=$v;
                    $index++;
                }else{
                    if($show<=18){
                        $newJpg[] = $v;
                        $show++;
                    }
                }
            }else{
                if($show<=19){
                    $newJpg[] = $v;
                    $show++;
                }
            }
        }

        $this->newTwo  = $newTwo;
        $this->newJpg = $newJpg;
        /*	p($newTwo);
            die;*/


        //从数据库取出8条快讯资料并分配到模板
        $alert = D('alert')->order('time desc')->limit(8)->select();
        $this->alert = $alert;

        //前台报价标题展示
        //对报价表单实例化一个对象，调用报价数据
        $offer=M('Offer');
        $info=$offer->where("offer_check=1")->order('offer_create_time desc')->select();
        $this->assign('info',$info);


        //die;
        $this->display();
    }



    //新闻展示
    public function showNew(){
        $nid = I('nid','',intval);
        $new = M('new')->where(array('id'=>$nid))->find();
        //$new['textarea']=nl2br($new['textarea']);

        $new['textarea']=str_replace("  ", "&nbsp", $new['textarea']);
        /*p($new);
        die;*/
        $id = $new['id'];
        $time=date("Ymd",$new['time']);
        if(is_file( "./Admin/Public/img/new/$time/$id.jpg")){
            $new['jpg']=1;
        }else{
            $new['jpg']=0;
        }
        /*p($new);
        die;*/
        $this->new = $new;
        $this->display();
    }



    //这里显示求购信息具体信息
    public function showPur(){
        $pur_id = I('pur_id','',intval);//表单id
        $pur = D('buy')->where(array('pur_id'=>$pur_id))->find();//找到该表单
        $pclass =D('pro_pclass')->where(array('pro_pclass_id'=>$pur['pclass_id']))->find();
        $uid = $_SESSION['home_id'];
        $cid = D('register_user')->where(array('user_id'=>$pur['pur_user_id']))->find();
        $com = D('com')->where(array('com_id'=>$cid['com_id']))->find();
        if(D('buy_register_user')->where(array('buy_id'=>$pur_id,'register_id'=>$uid))->select()){
            $index=1;
        }else{
            $index=0;
        }
        /*p($pclass);
        die;*/
        /*echo $uid;
        echo $pur['pur_user_id'];
        die;*/
        /*echo $index;
        die;*/
        $time = date("Ymd",$pur['release_time']);
        $id=$pur['pur_id'];
        if(is_file( "./Home/Public/img/buy/$time/$id.jpg")){
            $pur['jpg']=1;
        }else{
            $pur['jpg']=0;
        }

        $this->index = $index;
        $this->com = $com;
        $this->pclass = $pclass['pro_pclass'];
        $this->uid = $uid;
        $this->pur=$pur;
        $this->display();
    }

    //这里是求购更多列表
    public function allBuy(){
        $buy = D('buy')->where(array('audit'=>1,'outdate'=>0))->select();
        $this->buy = $buy;
        $this->display();
    }


    //快讯展示
    public function showAlert(){
        $nid = I('nid','',intval);
        $alert = M('alert')->where(array('id'=>$nid))->find();
        //$new['textarea']=nl2br($new['textarea']);

        $alert['textarea']=str_replace("  ", "&nbsp", $alert['textarea']);
        /*p($new);
        die;*/
        $id = $alert['id'];
        $time=date("Ymd",$alert['time']);
        if(is_file( "./Admin/Public/img/alert/$time/$id.jpg")){
            $alert['jpg']=1;
        }else{
            $alert['jpg']=0;
        }
        /*p($alert);
        die;*/
        $this->alert = $alert;
        $this->display();
    }


    //所有快讯信息
    public function allAlert(){
        $alert= new \Model\OfferModel();
        //1.获得总记录数
        $total = M('alert')->count();
        //每页显示的条数
        $per = 8;
        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);


        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2,3, 4, 5, 6, 7, 8));

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_alert  order by time desc " . $pag_obj->limit;

        $alert = $alert->query($sql);

        $this->alert = $alert;
        $this->display();
    }

    //所有新闻信息
    public function allNew(){
        $new= new \Model\OfferModel();
        //1.获得总记录数
        $total = M('new')->count();
        //每页显示的条数
        $per = 8;
        //2,实例化分页对象
        $pag_obj = new \Tools\Page($total, $per);


        //4.获取页码列表
        $pagelist = $pag_obj->fpage(array(2,3, 4, 5, 6, 7, 8));

        //把获取的信息赋给模板显示,在父类model中配置好的方法
        $this->assign('pagelist', $pagelist);

        //3.自定义sql语句，获取每页记录信息,别忘了desc后面有“空格”,调出状态为1的产品。
        $sql = "select * from mucai_new  order by time desc " . $pag_obj->limit;

        $new = $new->query($sql);
        /*p($new);
        die;*/
        $this->new = $new;
        $this->display();
    }


    //前台表单详细信息,这个变量的命名，必须和传过来的名称是同一个
    function listOffer($offer_id, $buyer_id)
    {

        M('Offer_buyer')->create();
        $info1 = M('Offer_buyer')->field('offer_id,buyer_id')->select();
        foreach ($info1 as $v) {

            $data[] = $v['offer_id'];
            $data1[] = $v['buyer_id'];
        }

        $z = (in_array($offer_id, $data) && in_array($buyer_id, $data1));
        $listoffer = M('Offer');
        $info = $listoffer->where("offer_id ='$offer_id'")->find();
        $this->assign('z', $z);
        $this->assign('info', $info);
        $this->display();

    }


    //更多报价列表
    function moreOffer()
    {

        $listOffer = new \Model\OfferModel();

        $info = $listOffer->where("offer_check= 1")->select();

        if ($info) {


            $this->assign('info', $info);

        }


        $this->display();


    }


      //前台产品展示
    function showPro()
    {
        //调取全部的产品信息还有对应的公司信息
        $info = M('Pro')->select();
        $com_name = M('Com')->select();

        //对产品表公司id和公司表中id进行对比，把对应的com_name加进产品表中，到前台进行遍历
        foreach ($info as $vv) {
            foreach ($com_name as $v) {
                if ($vv['com_id'] == $v['com_id']) {

                    $vv['com_name'] = $v['com_name'];

                    $d[] = $vv;
                }
            }
        }

        $this->assign('d', $d);
        $this->display();

    }

}