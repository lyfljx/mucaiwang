<?php

//命名空间
namespace Home\Controller;

use Think\Controller;
use Think\Verify;

//header("content-type:text/html;charset=utf8");
class UserController extends Controller
{

    /* 登录 */
    function login()
    {

        $this->display();

    }

    Public function loginHandle()
    {

        //验证是否从表单提交过来
        /*if(!$_POST){
         _404('不是从表单提交过来');
        }*/

        //验证码是否正确
        if (!empty($_POST)) {
            $vry = new \Think\Verify();
            if (!$vry->check($_POST['code'])) {
                $this->error('验证码错误');
            }
        }

        //用户名和密码验证
        $username = I('username');
        $password = I('password', '', 'md5');
        $user = D('register_user')->where(array('user_name' => $username))->find();
        if (!$user || $password != $user['user_password']) {
            $this->error('用户名或密码错误');
        }


        //储存session
        session('home_id', $user['user_id']);
        session('home_name', $user['user_name']);

        $this->redirect('Home/Index/index');

    }

    /*注册*/
    function register()
    {

        //实例化一个对象，模型块Register_user,里面的参数是数据表的表名
        $com = new \Model\ComModel();
        $com_pro_class = new \Model\Com_pro_classModel();
        $register_user = new \Model\Register_userModel();
        //$register_user= D('register_user');
        //在页面展示企业库相关数据
        $com_class = $com_pro_class->select();
        $com_trade = M('Com_trade')->select();
        $com_market = M('Com_market')->select();
        $com_attribute = M('Com_attribute')->select();

        //提取com_pro_class中的分类，在模板中展示
        $this->assign('com_class', $com_class);
        //展示市场分类，公司属性，所属行业
        $this->assign('com_trade', $com_trade);
        $this->assign('com_market', $com_market);
        $this->assign('com_attribute', $com_attribute);

        $info = new \Model\ProvModel();

//        print_r($info->relation(true)->select());
//
//

        //注册
        //两个逻辑：收集表单，展示表单
        if (!empty($_POST)) {
//            dump($_POST);
//            exit;
            $vry = new \Think\Verify();
            if ($vry->check($_POST['verify'])) {
                //create方法收集表单post数据，并且触发父类model自动验证功能($_validate)，过滤非法字段，add（）也有这种功能，即不是数据表字段不给输入数据库
                $com_info = $com->create();
                $register = $register_user->create();
               if( $register_user->getError()){

                   $this->error('用户名已经存在！');

//                   $this->assign('errorinfo', $register_user->getError());

               }

                if ($com_info && $register) {

                    $shuju = array(

                        'com_name' => I('post.com_name'),
                        'com_attribute' => I('post.com_attribute'),
                        'com_trade' => I('post.com_trade'),
                        'com_address' => I('post.com_address'),
                        'com_main_pro' => I('post.com_main_pro'),
                        'com_owned_market' => I('post.com_owned_market'),
                        'com_url' => I('post.com_url'),
                        'com_create_time' => time(),
                        'com_city' => I('post.city'),
                        'com_prov' => I('post.province'),
                        'user' => array(

                            'user_name' => I('post.user_name'),
                            'user_password' => I('user_password', '', 'md5'),
                            'user_email' => I('post.user_email'),
                            'user_password2' => I('post.password2', '', 'md5'),
                            'user_true_name' => I('post.user_true_name'),
                            'user_job' => I('post.user_job'),
                            'user_phone' => I('post.user_phone'),
                            'user_fixed_phone' => I('post.user_fixed_phone'),
                            'portraiture' => I('post.portraiture'),
                            'user_qq' => I('post.user_qq'),
                            'user_create_time' => time(),
                        ),
                    );
                }
                //如果$shuju不为空
                if ($register) {
                    //不用建关联模型
                    if ($com->relation(true)->add($shuju)) {
                        //页面跳转，同时验证用户信息和企业信息，并同时写入数据表
                        $this->success('注册成功！');

                    }
//                        $this->error('注册失败，请重新注册！');
                }

//                else {// dump($register_user ->getError());//输出验证的错误信息
////
//                    $this->assign('errorinfo', $register_user->getError());
//                }

            } else {$this->error('请填写格式正确验证码', U('register'));}

        } else {$this->display();}
    }

     //这里是退出登录

    public function outLogin()
    {
        unset($_SESSION['home_id']);
        unset($_SESSION['home_name']);
        //session_destroy();
        $this->redirect('Home/Index/index');
    }

     //注册验证码
    function VerifyImg()
    {

        //配置参数
        $cfg = array(
            'fontSize' => 15,              // 验证码字体大小(px)
            'imageH' => 30,               // 验证码图片高度
            'imageW' => 100,               // 验证码图片宽度
            'length' => 1,               // 验证码位数
            'fontttf' => '5.ttf',              // 验证码字体，不设置随机获取
        );
        //实例化verify类
        //这里配置的参数会覆盖父类的操作
        $verify = new \Think\Verify($cfg); // 完全限定名称  方式

        $verify->entry();

    }

    //登录验证码
    Public function verify()
    {
        //给验证码做配置
        $cfg = array(

            'imageH' => 45,//图片高度
            'imageW' => 100,//图片宽度
            'fontSize' => 15,//字体大小
            'length' => 1,//验证码位数
            'fontttf' => '4.ttf',//验证码字体
        );
        //实例化Verity类
        $very = new Verify($cfg);
        //输出验证码
        $very->entry();

    }


    function test()
    {
        $this->display();
    }

    //用户基本信息浏览

    function  userInfo($user_id){//传进用户id

             $user= NEW \Model\Register_userModel();

          $info=$user->relation(true)->where("user_id=$user_id")->select();

           $this->user=$info;//模板展示
            $this->display();


    }


}
