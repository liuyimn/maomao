<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>大脸猫二手商城-密码找回</title>
</head>
<body>
	<h3>大脸猫二手商城-密码找回</h3>
	尊敬的：{{$res->username}} 您好<br/>
	<p>您的密码已经丢失，请求找回请点击下面链接</p>
	<ul>
		<li><a href="{{ url('/home/link') }}/{{ $res->remember_token }}">找回密码</a></li>
	</ul>
	<p>感谢您一直以来的支持：万分感谢</p>
	<p>本邮件由系统自动发送，请勿直接回复！</p>
	<p>感谢您的访问，祝您使用愉快!</p>
</body>
</html>