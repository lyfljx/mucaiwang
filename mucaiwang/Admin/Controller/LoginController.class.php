<?php
/*
 * 后台登录控制器
 * */
namespace Admin\Controller;

use Think\Controller;
use Think\Verify;
use Org\Util\Rbac;

Class LoginController extends Controller
{

    //后台登录首页
    public function index()
    {

        //一、实例化模型对象
        //1.使用userModel模型
        //实例化普通model对象
        //$user = new \Model\UserModel();//命名空间方式实例化对象
        //dump($user);

        //2.实例化父类model对象，同时操作指定的数据表
        //$user = D('user');

        //二、数据查询
        //	$user = D('user');
        // 1.全部查询
        //$info = $user->select();
        //2.根据主键查询
        //$info = $user->select(1);
        //3.根据主键范围查询
        //$info = $user->select("1,3,5,6");

        //select返回二位数组
        //获得的信息传递给模板
        //	$this->assign('info',$info);


        //常用方法
        //1)限制查询条件
        //$user->where('id>3 and ....');sql语句where的语句都可以
        //2)限制查询字段
        //$user ->field('id,username');
        //3)限制查询条数
        //$user ->limit(4);
        //4)排序
        //$user->order('id desc');
        //5)分组查询
        //$goods->group('goods_brand_id'):
        //
        $this->display();

    }

    //登录表单提交
    Public function login()
    {

        //验证是否从表单提交过来
        /*if(!$_POST){
            _404('不是从表单提交过来');
        }*/

        //验证码是否正确
        if (!empty($_POST)) {
            $vry = new \Think\Verify();

        }
        if (!$vry->check($_POST['code'])) {
            $this->error('验证码错误');
        }

        //用户名和密码验证
        $username = I('username');
        $password = I('password', '', 'md5');
        $user = D('user')->where(array('username' => $username))->find();
        if (!$user || $password != $user['password']) {

            $this->error('用户名或密码错误');

        }
        //用户是否被锁定
        if ($user['lock']) {
            $this->error('用户被锁定');
        }

        //更新登录时间和登录ip
        $data = array(
            'id' => $user['id'],
            'logintime' => time(),
            'loginip' => get_client_ip(),
        );
        //储存session
        session('uid', $user['id']);
        session('username', $user['username']);
        session('logintime', date('Y-m-d H:i:s'), $user['logintime']);
        session('loginip', $user['loginip']);

        D('user')->save($data);

        if ($user['username'] == C('RBAC_SUPERADMIN')) {
            session(C('ADMIN_AUTH_KEY'), true);
        }
        RBAC::saveAccessList();
        /*p($_SESSION);
         p($access);
         die;*/
        // $this->display('Index/index');
        $this->redirect('Admin/Index/index');

    }


    //导入验证码
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


}

