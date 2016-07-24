<?php
//引入类
require './PHPMailerAutoload.php';
//创建一个PHPMailer实例
$mail = new PHPMailer;
// 使用SMTP方式发送
$mail->IsSMTP();
//设置编码，否则发送中文乱码
$mail->CharSet ="UTF-8";
//需要发送邮件的主机IP，以下为QQ主机服务器
$mail->Host = "smtp.qq.com";
// 启用SMTP验证功能
$mail->SMTPAuth = true;
//发件人邮箱账号
$mail->Username = "test@qq.com";
//发件人邮箱密码
$mail->Password = "******";
//设置发送人信息(参数1：发送人邮箱，参数2：发送人名称)
$mail->setFrom('test@qq.com', '发件人名称');
//收件人邮箱----注意如果是群发，改点for循环添加收件人邮箱
$mail->addAddress('qq@qq.com', '收件人姓名');
//邮件主题，即标题
$mail->Subject = 'PHPMailer mail() test';
//邮件内容
$mail->Body = 'Hello,紫沐兜，经验分享，希望大家多多关照';
//邮件附件信息，可以省略
$mail->AltBody = '邮件附件信息';
//换行，每行超过多少字符自动换行
$mail->WordWrap = 50;
//是否发送HTML
//$mail->isHTML(true);
//发送邮件
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "发送成功!";
}
?>