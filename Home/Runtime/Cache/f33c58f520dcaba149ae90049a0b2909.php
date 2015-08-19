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
<script type="text/javascript" src="__PUBLIC__/Js/three.js"></script>
<?php  echo '<script language="javascript">
			if(screen.width > "1024"){
				$("<link>").attr({ rel: "stylesheet",
					type: "text/css",
					href: "/PDM/Public/Css/info_1366.css"
				}).appendTo("head");
			}
			if(screen.width <= "1024"){
				$("<link>").attr({ rel: "stylesheet",
					type: "text/css",
					href: "/PDM/Public/Css/info_1024.css"
				}).appendTo("head");
			}
			</script>'; ?>
<link rel="stylesheet" href="__PUBLIC__/Css/jquery-ui-1.10.0.custom.css">
<script src="__PUBLIC__/Js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery.cityselect.js"></script>

	<title>用户中心</title>

	</head>
	<body>
		
		<div id="show-right">&gt;&gt;</div>
		<div id="leftnva">
			<?php if(is_array($operate)): $i = 0; $__LIST__ = $operate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$operate): $mod = ($i % 2 );++$i;?><div class="show-info" id="hide">&lt;&lt;</div>
						<p class="option-info">系统首页</p>
					
						<?php echo ($operate["index"]); ?>
						<?php echo ($operate["changepass"]); ?>
						<?php echo ($operate["select_user"]); ?>
						<?php echo ($operate["apply"]); ?>
						<?php echo ($operate["add"]); ?>
						<?php echo ($operate["add_admin"]); ?>
						<?php echo ($operate["changchmod"]); ?>
                        <?php echo ($operate["chmod_user"]); ?>
						<?php echo ($operate["up_user"]); ?>
						<?php echo ($operate["viewLoginTime"]); ?>
						<?php echo ($operate["userexit"]); ?>
					
						<p class="option-info">审核相关</p>
					
						<?php echo ($operate["audit_user"]); ?>
						<?php echo ($operate["audit_two_user"]); ?>
						<?php echo ($operate["auditThreeUser"]); ?>
						<?php echo ($operate["audit_result"]); ?>

						<p class="option-info">信息填写</p>
					
						<?php echo ($operate["tishi"]); ?>
                        <?php echo ($operate["example"]); ?>
						<?php echo ($operate["info1"]); ?>
					
						<p class="option-info">预览打印</p>
				
					
						<?php echo ($operate["check"]); ?>
						<?php echo ($operate["preview"]); ?>
						<?php echo ($operate["printpdf"]); endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<div class="top">
					<img src="__PUBLIC__/Img/cuit.jpg" class="cuit"/>
			<img src="__PUBLIC__/Img/system.jpg" class="system"/>
		</div>
		<script>
			$(function(){
				var strCookie=document.cookie;
				var tempNavStatus;
				var arrCookie = strCookie.split("; ");
				for(var i=0;i<arrCookie.length;i++){ 
					var arr=arrCookie[i].split("="); 
					//找到名称为userId的cookie，并返回它的值 
					if("tempNavStatus" == arr[0]){ 
						tempNavStatus = arr[1]; 
						break; 
					} 
				}
				if(tempNavStatus == '000'){
					$('#leftnva').hide();
					$('#show-right').css('display','block');
				}
				if(tempNavStatus == '111'){
					$('#leftnva').show();
					$('#show-right').css('display','none');
				}
			})
			$(function(){
				$('#hide').click(function(){
					$('#leftnva').hide();
					$('#show-right').css('display','block');
					document.cookie="tempNavStatus=000";
				})
			})
			$(function(){
				$('#show-right').click(function(){
					$('#leftnva').show();
					$('#show-right').css('display','none');
					document.cookie="tempNavStatus=111";	
				})
			})
		</script>

<div class="center">
	<table style="width:790px;">
		<tr>
			<td style="text-align:center;font-weight:bold;font-size:24px;">填   表   及  装  订  说   明</td>
		</tr>
		<tr>
			<td>
				<p style="padding-left: 140px;text-align: left;line-height: 2em;letter-spacing: 0.3em;padding-top: 50px;">
					1、本表适用于高等学校教师职务任职资格的申报。&nbsp;&nbsp;第1至8页由本人填写，<br/>&nbsp;&nbsp;&nbsp;由教师所在学院（系）、学校审核。第9页至13页，分别由相应组织填写。<br/>&nbsp;&nbsp;&nbsp;“专家鉴定意见表” 装订在第8页至9页之间。
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="padding-left: 140px;text-align: left;line-height: 2em;letter-spacing: 0.3em;">
					2、填写内容要具体、真实，字迹要端正、清楚。本人签名一律用钢笔或毛笔，<br/>&nbsp;&nbsp;&nbsp;&nbsp;其他签名可用签名章。
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="padding-left: 140px;text-align: left;line-height: 2em;letter-spacing: 0.3em;">
					3、本人提交的以下材料，在封面与第1页之间按顺序装订：<br/>
					&nbsp;&nbsp;	1)职称申报诚信承诺书;<br/>
					&nbsp;&nbsp;	2) 高等学校教师资格证书复印件 ;<br/>
					&nbsp;&nbsp;	3) 职称外语考试合格证或外语考试成绩确认单复印件（含免试（降低等<br/>级）证明）;<br/>
					&nbsp;&nbsp;	4) 职称计算机应用能力等级考试合格证复印件”（含免试（降低等级）<br/>证明）<br/>
					&nbsp;&nbsp;	5) 学历学位证书复印件;<br/>
					&nbsp;&nbsp;	6) 现任专业技术职务任职资格证明材料复印件（证书或资格文件,含确<br/>认前相关材料）。<br/>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<p style="padding-left: 140px;text-align: left;line-height: 2em;letter-spacing: 0.3em;">
					4、如填写内容较多，可另加附页。填写内容含糊不清、字迹潦草难以辨认、<br/>&nbsp;&nbsp;&nbsp;材料不符合要求、手续不全者，不予受理。
				</p>
			</td>
		</tr>
	</table>
</div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>		
</body>
</html>