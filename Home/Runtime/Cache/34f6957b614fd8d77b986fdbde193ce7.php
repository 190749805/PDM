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
<script type="text/javascript" src="__PUBLIC__/Js/two.js"></script>
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

<script src="__PUBLIC__/Js/limitLogin.js"></script>
<div class="center">
    <br/>
    <h2>限制用户登陆：</h2>
    <br/>
    <form action="__URL__/setLoginTime" method="POST">
        <button id="btn-tj">提交</button>
        <br/><br/><br/>
    <p class="name">管 理 员:
        <select name="gly">
            <?php if(is_array($gly)): $i = 0; $__LIST__ = $gly;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gly): $mod = ($i % 2 );++$i; echo ($gly); endforeach; endif; else: echo "" ;endif; ?>
        </select>年
    <select name="glm">
        <?php if(is_array($glm)): $i = 0; $__LIST__ = $glm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$glm): $mod = ($i % 2 );++$i; echo ($glm); endforeach; endif; else: echo "" ;endif; ?>
    </select>月
    <select name="gld">
        <?php if(is_array($gld)): $i = 0; $__LIST__ = $gld;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gld): $mod = ($i % 2 );++$i; echo ($gld); endforeach; endif; else: echo "" ;endif; ?>
    </select>日</p>
<br/><br/><br/><br/>
    <p class="name">普通用户:
        <select name="pty">
            <?php if(is_array($pty)): $i = 0; $__LIST__ = $pty;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pty): $mod = ($i % 2 );++$i; echo ($pty); endforeach; endif; else: echo "" ;endif; ?>
        </select>年
        <select name="ptm">
            <?php if(is_array($ptm)): $i = 0; $__LIST__ = $ptm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ptm): $mod = ($i % 2 );++$i; echo ($ptm); endforeach; endif; else: echo "" ;endif; ?>
        </select>月
        <select name="ptd">
            <?php if(is_array($ptd)): $i = 0; $__LIST__ = $ptd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ptd): $mod = ($i % 2 );++$i; echo ($ptd); endforeach; endif; else: echo "" ;endif; ?>
        </select>日</p>
    </form>
    <br/><br/><br/>
</div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</body>
</html>