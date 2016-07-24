<?php
/**
* 邮件发送函数
*/

function sendMail($to, $title, $content) {

//    Vendor('SMTP');
//    vendor('PHPMailer');
    vendor('PHPMailer.class#stmp');

    vendor('PHPMailer.class#phpmailer');
    Vendor('PHPMailer.PHPMailerAutoload');
$mail = new PHPMailer(); //实例化
$mail->IsSMTP(); // 启用SMTP
$mail->Host=C('MAIL_HOST'); //smtp服务器的名称（这里以QQ邮箱为例）
$mail->SMTPAuth = C('MAIL_SMTPAUTH'); //启用smtp认证
$mail->Username = C('MAIL_USERNAME'); //你的邮箱名
$mail->Password = C('MAIL_PASSWORD') ; //邮箱密码
$mail->From = C('MAIL_FROM'); //发件人地址（也就是你的邮箱地址）
$mail->FromName = C('MAIL_FROMNAME'); //发件人姓名
$mail->AddAddress($to,"尊敬的客户");//收件人的地址和姓名
$mail->WordWrap = 50; //设置每行字符长度
//这是采用加密时才会配置的选项
//$mail->Port = 25;
    $mail->SMTPSecure ='';
    if (C('SMTP_PORT') == 465)
     $mail->SMTPSecure = 'ssl';                                              // 使用安全协议

// SMTP 服务器
    $mail->Port = C('SMTP_PORT');                                         // SMTP服务器的端口号
//$mail->SMTPSecure ='';
$mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
$mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
$mail->Subject =$title; //邮件主题
$mail->Body = $content; //邮件内容
$mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
//return($mail->Send());


    $result = $mail->send();

    if($result){
        echo '发送成功';
    }else{
        echo $mail->ErrorInfo;
    }


}

// C('MAIL_PORT');
// //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
//$mail->SMTPDebug = 3;