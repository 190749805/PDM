<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
		<link rel="stylesheet" href="__PUBLIC__/Css/bootstrap-theme.min.css">
		<!--[if IE]>
		<script>
			(function(){if(!/*@cc_on!@*/0)return;var e = "abbr,article,aside,audio,canvas,datalist,details,dialog,eventsource,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video".split(','),i=e.length;while(i--){document.createElement(e[i])}})()
		</script>
		<![endif]-->
		
		<script src="__PUBLIC__/Js/jquery1_x.js" type="text/javascript"></script>
		<script src="__PUBLIC__/Js/bootstrap.js" type="text/javascript"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/login.css">
	<title>用户登录</title>
	</head>
	<body>
		<div id="center">
			<div class="top">
			<img src="__PUBLIC__/Img/cuit.jpg" class="cuit"/>
			<img src="__PUBLIC__/Img/system.jpg" class="system"/>
		</div>	
		<div class="head">
			<p><?php echo '系统时间 ：'.date("Y")."年".date("m")."月".date("d")."日";echo date("l");?></p>
		</div>
		<hr/>
		<div class="head">
			<p>欢迎使用本系统</p>
			<ul>
				<li>
					<a href="#" id="bugreport">BUG报告</a>
				</li>
				<li>
					<a href="#" id="resetpass">找回密码</a>
				</li>
			</ul>
		</div>
		<hr/>
		<div id="loginform">
				<form method="post" action="__APP__/Login/login">
					<span class="info">用户名</span>
					<input type="text" name="username" id="username"/>
					<span class="info">密&nbsp;&nbsp;码</span>
					<input type="password" name="userpass" id="userpass"/>
					<input type="submit" id="submit"  value="登录"/>
					
				</form>
		</div>
		<hr/>
		<div class="note">
			<p>系统通知区域 <a href="#">更多&gt;&gt;</a></p>
			<hr/>
			<p id="note-info">
				找回密码与BUG报告功能尚无法使用。
				<br/><br/>
				请各位用户注意：晚上11点~第二天早上6点期间。系统可能会随时更新，请注意您的使用时间。
			</p>
		</div>
		<div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-<?php echo date('Y')?> 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
		</div>
		</div>
		</body>
</html>