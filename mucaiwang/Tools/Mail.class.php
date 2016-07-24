<?php
/**
 * 邮件发送函数
 */
namespace  Tools;
use  Vendor\PHPMailer;
use Vendor\Smtp;
class  Mail
{


    function sendMail($to, $title, $content)
    {

//// 配置邮件发送服务器
//        'MAIL_HOST' =>'smtp.163.com',//smtp服务器的名称
//	'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
//	'MAIL_USERNAME' =>'15875068462@163.com',//你的邮箱名
//	'MAIL_FROM' =>'15875068462@163.com',//发件人地址
//	'MAIL_FROMNAME'=>'聚丰集团',//发件人姓名
//	'MAIL_PASSWORD' =>'#abc13659722808',//邮箱密码
//	'MAIL_CHARSET' =>'utf-8',//设置邮件编码
//	'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件


         include ('PHPMailerAutoload.php');
//        include ('phpmailer.class.php');
        $mail = new PHPMailer(); //实例化
        $mail->IsSMTP(); // 启用SMTP
        $mail->Host = 'smtp.163.com'; //smtp服务器的名称（这里以QQ邮箱为例）
        $mail->SMTPAuth = TRUE; //启用smtp认证
        $mail->Username = '15875068462'; //你的邮箱名
        $mail->Password = '#abc13659722808'; //邮箱密码
        $mail->From = '15875068462@163.com'; //发件人地址（也就是你的邮箱地址）
        $mail->FromName = '聚丰集团'; //发件人姓名
        $mail->AddAddress($to, "尊敬的客户");
        $mail->WordWrap = 50; //设置每行字符长度
        $mail->IsHTML(TRUE); // 是否HTML格式邮件
        $mail->CharSet = 'utf-8'; //设置邮件编码
        $mail->Subject = $title; //邮件主题
        $mail->Body = $content; //邮件内容
        $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
        return ($mail->Send());
    }


}