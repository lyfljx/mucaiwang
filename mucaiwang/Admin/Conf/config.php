<?php
header("content-type:text/html;charset=utf8");
return array(

    /*'TMPL_PARSE_STRING' => array(
            '__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/Modules/Admin/Tpl/Public'
    ),*/
//'URL_HTML_SUFFIX' =>'',

    'RBAC_SUPERADMIN'=>'admin',				//超级管理员
    'ADMIN_AUTH_KEY'=>'superadmin',			//超级管理员识别号
    'USER_AUTH_ON'=>true,   				//是否开启验证
    'USER_AUTH_TYPE'=>1,					//验证类型（1：登录验证 2：时时验证）
    'USER_AUTH_KEY'=>'uid',					//用户认证识别号
    'NOT_AUTH_MODULE'=>'Index',					//无需验证的控制器
    'NOT_AUTH_ACTION'=>'access,addUserHandle,addNodeHandle,addRoleHandle,setAccess,releaseHandle,altNewHandle',					//无需验证的方法
    'RBAC_ROLE_TABLE'=>'mucai_role',		//角色表名称
    'RBAC_USER_TABLE'=>'mucai_role_user',	//角色与用户中间表
    'RBAC_ACCESS_TABLE'=>'mucai_access',	//权限表名称
    'RBAC_NODE_TABLE'=>'mucai_node',	//节点表名称


    // 配置邮件发送服务器,这里实现的是163邮箱发送邮件
    'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'15875068462@163.com',//你的邮箱名
    'MAIL_FROM' =>'15875068462@163.com',//发件人地址
    'MAIL_FROMNAME'=>'老任',//发件人姓名
    'MAIL_PASSWORD' =>'abc486898',//邮箱单独密码，授权密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件



    //下面实现qq邮箱发送邮件的配置
//
//        'THINK_EMAIL' => array(
//
//        'SMTP_HOST' => 'smtp.qq.com', //SMTP服务器
//
//        'SMTP_PORT' => '465', //SMTP服务器端口
//
//        'SMTP_USER' => '1051447847', //SMTP服务器用户名
//
//        'SMTP_PASS' => 'bofauvyjfjgwbbcb', //SMTP服务器密码
//
//        'FROM_EMAIL' => '1051447847@qq.com',
//
//        'FROM_NAME' => '老任', //发件人名称
//
//        'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
//
//        'REPLY_NAME' => '', //回复名称（留空则为发件人名称）
//
////        'SESSION_EXPIRE'=>'72',
//    ),



);
