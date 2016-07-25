
<? 


date_default_timezone_set("PRC");
//ok的邮箱发送。 
include "smtp.class.php"; 
//$smtpserver = "SMTP.163.com";　//您的smtp服务器的地址 
$smtpserver="smtp.sina.com"; 
$port = 25; //smtp服务器的端口，一般是 25 
$smtpuser = "zhuwanxiong"; //您登录smtp服务器的用户名 
$smtppwd = "smileatlife2010"; //您登录smtp服务器的密码 
$mailtype = "TXT"; //邮件的类型，可选值是 TXT 或 HTML ,TXT 表示是纯文本的邮件,HTML 表示是 html格式的邮件 
$sender = "zhuwanxiong@sina.com"; 
//发件人,一般要与您登录smtp服务器的用户名($smtpuser)相同,否则可能会因为smtp服务器的设置导致发送失败 
$smtp = new smtp($smtpserver,$port,true,$smtpuser,$smtppwd,$sender); 
$smtp->debug = true; //是否开启调试,只在测试程序时使用，正式使用时请将此行注释 
//$to = "zhuwanxiong@gmail.com"; //收件人 
$subject = "最近在干什么？给你推荐几个视频"; 
$body = "难道C语言只能编写打印黑底白字的程序吗？NO！怎样使用C语言开发语音控制游戏？怎样用C语言监控QQ聊天记录？如何使用C语言开发3D游戏？大公司的C语言面试会问哪些问题？一切答案就在传智播客推出的C/C++高薪就业教程中！"; 

$tos = array(
	//'zhuwanxiong@hotmail.com',
	//'zhuwanxiong@126.com',
	'382286731@qq.com',
	//'272562302@qq.com',
	//'zhuwanxiong2015@gmail.com',
);

foreach($tos as $to){
	$send=$smtp->sendmail($to,$sender,$subject,$body,$mailtype); 
}


if($send==1){ 
echo "邮件发送成功"; 
}else{ 
echo "邮件发送失败<br/>"; 
echo "原因：".$this->smtp->logs; 
} 

?> 