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
<script src="__PUBLIC__/Js/Info/info9.js"></script>
<script src="__PUBLIC__/Js/Info/total.js"></script>
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

<form action="__URL__/commit_info9" method="post">
<div class="center">	
<p class="title">考试情况</p>
			<input class="btn save9" type="submit" value="保存"/>
			<br/>
			<br/>
	<p class="name"><strong>职称英语考试：</strong></p>
    <br/>
    <p class="name ks">英语成绩：<select name="yycj">
        <?php if(is_array($yycj)): $i = 0; $__LIST__ = $yycj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yycj): $mod = ($i % 2 );++$i; echo ($yycj); endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </p>
    <p class="name">免试原因:<select name="yyms">
        <?php if(is_array($yyms)): $i = 0; $__LIST__ = $yyms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yyms): $mod = ($i % 2 );++$i; echo ($yyms); endforeach; endif; else: echo "" ;endif; ?>
    </select></p>
    <span id="yy">
	<p class="name ks">英语考试级别：
		<select name="yyjb">
            <?php if(is_array($yyjb)): $i = 0; $__LIST__ = $yyjb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yyjb): $mod = ($i % 2 );++$i; echo ($yyjb); endforeach; endif; else: echo "" ;endif; ?>
		</select>
	</p>
	<p class="name yy">英语考试时间:
        <select name="yyy">
            <?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
        </select>年
        <select name="yym">
            <?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
        </select>月
    </p>
    </span>
    <br/>
    <br/>
    <br/>

    <p class="name"><strong>职称计算机考试：</strong></p>
    </br>
    <p class="name">计算机成绩：<select name="jsjcj">
        <?php if(is_array($jsjcj)): $i = 0; $__LIST__ = $jsjcj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jsjcj): $mod = ($i % 2 );++$i; echo ($jsjcj); endforeach; endif; else: echo "" ;endif; ?>
    </select>
    </p>
    <p class="name">免试原因:<select name="jsjms">
        <?php if(is_array($jsjms)): $i = 0; $__LIST__ = $jsjms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jsjms): $mod = ($i % 2 );++$i; echo ($jsjms); endforeach; endif; else: echo "" ;endif; ?>
    </select></p>
    <span id="jsj">
    <p class="name ks">计算机考试级别：
        <select name="jsjjb">
            <?php if(is_array($jsjjb)): $i = 0; $__LIST__ = $jsjjb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jsjjb): $mod = ($i % 2 );++$i; echo ($jsjjb); endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </p>
    <p class="name ks">计算机考试时间:
        <select name="jsjy">
            <?php if(is_array($year1)): $i = 0; $__LIST__ = $year1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year1): $mod = ($i % 2 );++$i; echo ($year1); endforeach; endif; else: echo "" ;endif; ?>
        </select>年
        <select name="jsjm">
            <?php if(is_array($month1)): $i = 0; $__LIST__ = $month1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month1): $mod = ($i % 2 );++$i; echo ($month1); endforeach; endif; else: echo "" ;endif; ?>
        </select>月
    </p>
	</span>
	<div class="daohang">
			<input type="button" onclick="window.location.href='__URL__/info8'" class="btn" value="上一页">
				<?php $__FOR_START_20706__=1;$__FOR_END_20706__=17;for($i=$__FOR_START_20706__;$i < $__FOR_END_20706__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
			<input type="button" onclick="window.location.href='__URL__/info10'" class="btn" value="下一页">
		</div>
		<br/>
	</form>
</div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</body>
</html>