<?php
/*这里是后台首页控制器
 * */
namespace Admin\Controller;
use Think\Controller;
//use Org\Util\Rbac;
Class IndexController extends CommonController{


    //这里是后台首页方法
    public function index(){
        //以下是判断该用户是否拥有哪些权限
        //从session里取得用户的id和用户名
        $uid = $_SESSION['uid'];
        $uname = $_SESSION['username'];
        //根据id找出该用户的全部信息
        $info = new \Model\UserModel();
        $user = $info->where(array('id'=>$uid))->relation(true)->find();
        //如果用户名是超级管理员，就让他拥有全部权限
        if($uname=='admin'){
            $access[] = D('node')->where(array('level'=>1))->select();
            $accessA[] = D('node')->where(array('level'=>2))->select();
            $accessB[] = D('node')->where(array('level'=>3))->select();
        }
        //从该用户信息中取出当前用户所属角色id
        foreach ($user['role'] as $v){
            $rid[]= $v['id'];
        }
        //取出该角色所拥有的权限，并将全部权限分为3个等级
        foreach ($rid as $m){
            $aid= D('access')->field('node_id')->where(array('role_id'=>$m,'level'=>1))->select();
            $aidA= D('access')->field('node_id')->where(array('role_id'=>$m,'level'=>2))->select();
            $aidB= D('access')->field('node_id')->where(array('role_id'=>$m,'level'=>3))->select();
        }
        //将3个等级的权限id分别整合为二维数组
        foreach ($aid as $n){
            $access_id[] =$n['node_id'];
        }
        foreach ($aidA as $n){
            $accessA_id[] =$n['node_id'];
        }
        foreach ($aidB as $n){
            $accessB_id[] =$n['node_id'];
        }
        //根据33个等级的权限id分别取出3个等级的权限所有信息
        foreach ($access_id as $k){
            $access[] = D('node')->where(array('id'=>$k))->select();
        }
        foreach ($accessA_id as $k){
            $accessA[] = D('node')->where(array('id'=>$k))->select();
        }
        foreach ($accessB_id as $q){
            $accessB[] = D('node')->where(array('id'=>$q))->select();
        }
        //将取出的3个等级的权限信息分别整合为一维数组
        foreach ($access as $k){
            foreach ($k as $a){
                $auth[]=$a;
            }
        }
        foreach ($accessA as $k){
            foreach ($k as $a){
                $authA[]=$a;
            }
        }
        foreach ($accessB as $k){
            foreach ($k as $b){
                $authB[]=$b;
            }
        }
        //将权限信息分配到模板
        $this->auth = $auth;
        $this->authA = $authA;
        $this->authB = $authB;
        $this->display();
    }


    //这里是退出登录
    public function outLogin(){

        //清除后台登录用户的session信息
        unset($_SESSION['uid']);
        unset($_SESSION['username']);
        unset($_SESSION['logintime']);
        unset($_SESSION['loginip']);
        unset($_SESSION['superadmin']);
        $this->redirect('Admin/Login/index');
    }
}

?>