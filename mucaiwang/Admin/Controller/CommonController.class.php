<?php

namespace Admin\Controller;

use Think\Controller;
use Org\Util\Rbac;

//这里是判断是否已登录的函数，进入后台需要先运行该函数进行判断，只需让其他需要判断是否登录的控制器继承该类
Class CommonController extends Controller
{

    //该函数是自动运行的函数，运行该类的使用方法之前都会先运行该方法
    Public function _initialize()
    {
        if (!isset($_SESSION['uid'])) {
            $this->redirect('Admin/Login/index');
        }

        $notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) ||
            in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));

        if (C('USER_AUTH_ON') && !$notAuth) {
            //import('ORG.Util.RBAC');
            RBAC::AccessDecision() || $this->error('没有权限', U('Admin/Index/index'));//使用独立分组必须使用GROUP_NAME
        }
    }
}


?>