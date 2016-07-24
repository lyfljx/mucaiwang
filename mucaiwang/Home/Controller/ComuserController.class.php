<?php
namespace Home\Controller;

use Think\Controller;

class ComuserController extends CommonController
{
    //企业用户登录页面
    function index()
    {
        $uid = $_SESSION['home_id'];
        $this->uid = $uid;
        $this->display();

    }


}
