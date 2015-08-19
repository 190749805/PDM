<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>跳转提示</title>
<style type="text/css">
body{
	background: #2a5d84;
	margin: 0 auto;
	width: 970px;
	font-family: cursive;
	height: 100%;
}
input{
	border-radius:3px;
}
ul{
	list-style: none;
}
hr{
	border: 1px solid #ccc;
	margin:0px;
}
.center{
	background:#fff;
}
.top{
	
}
.cuit{
	width:66px;
	height:66px;
}
.system{
	position: absolute;
	top: 0px;
	height: 65px;
	width: 904px;
}
.head{
	background: #fff;
	color:#000;
	padding-top: 8px;
	padding-left:22px;
}
.note{
	background:#fff;
	height:500px;
	color:#c9302c;
	padding: 20px 0px 0px 90px;
	font-size:12px;
}
#foot{
	display: block;
	padding: 9.5px;
	font-size: 13px;
	line-height: 1.428571429;
	color: #fff;
	word-break: break-all;
	word-wrap: break-word;
	background-color: #333333;
	text-align:center;
}
</style>
</head>
<body>
<div class="center">
<div class="top">
			<img src="__PUBLIC__/Img/cuit.jpg" class="cuit"/>
			<img src="__PUBLIC__/Img/system.jpg"/ class="system">
		</div>	
	
		<div class="head">
			<p><?php echo '系统时间 ：'.date("Y")."年".date("m")."月".date("d")."日";echo date("l");?></p>
		</div>	
<div class="note">
<p>系统提示:</p>
<?php echo($message); ?>
<?php echo($error); ?>
<p class="detail"></p>
<p class="jump">
页面自动 <a id="href" href="<?php echo($jumpUrl); ?>">跳转</a> 等待时间： <b id="wait"><?php echo($waitSecond); ?></b>
</p>
</div>
<script type="text/javascript">
(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script>
<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-<?php echo date('Y')?> 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</div>
</body>
</html>