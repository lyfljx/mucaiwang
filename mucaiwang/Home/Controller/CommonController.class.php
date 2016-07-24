<?php

namespace Home\Controller;
use Think\Controller;
use Org\Util\Rbac;
//这里是判断是否已登录的函数，进入后台需要先运行该函数进行判断，只需让其他需要判断是否登录的控制器继承该类
Class CommonController extends Controller {
	
	//该函数是自动运行的函数，运行该类的使用方法之前都会先运行该方法
	Public function  _initialize(){
		if(!isset($_SESSION['home_id'])){
			$this->redirect('Home/User/Login');
		}
	}
}


?>