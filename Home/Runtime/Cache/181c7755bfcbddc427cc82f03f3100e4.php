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
<script src="__PUBLIC__/Js/Info/info5.js"></script>
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

<div class="center">

<form action="__URL__/commit_info5" method="post">
	<input type="hidden" name="hidden" value="<?php echo ($va[0]['id']); ?>"/>
		<p class="title">国内外留学、进修的学校、时间和内容</p>
		
		<table class="info_table">
		<tr>
			<th>开始时间</th><th>结束时间</th><th>经历</th><th>类别</th><th>操作</th>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<th><?php echo ($vo["kssj"]); ?></th><th><?php echo ($vo["jssj"]); ?></th><th><?php echo ($vo["xx"]); ?></th><th><?php echo ($vo["lb"]); ?></th><th>
			<a href="__URL__/info5/id/<?php echo ($vo["id"]); ?>">修改</a>
			<a href="__URL__/delete_info5/id/<?php echo ($vo["id"]); ?>">删除</a>
		</th>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<br/>
		<input class="btn  save5"  type="submit" value="保存"/>
		<br/>
		<br/>
    <p class="name">进修情况：
        <select name="qk">
            <?php if(is_array($ywqk)): $i = 0; $__LIST__ = $ywqk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ywqk): $mod = ($i % 2 );++$i; echo ($ywqk); endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </p>
	<p class="name hid">开始时间:
		<select name="kssjy">
			<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($yeara)): $i = 0; $__LIST__ = $yeara;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yeara): $mod = ($i % 2 );++$i; echo ($yeara); endforeach; endif; else: echo "" ;endif; ?>
		</select>年
		<select name="kssjm">
			<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($montha)): $i = 0; $__LIST__ = $montha;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$montha): $mod = ($i % 2 );++$i; echo ($montha); endforeach; endif; else: echo "" ;endif; ?>
		</select>月
	结束时间:
		<select name="jssjy">
			<?php if(is_array($year1)): $i = 0; $__LIST__ = $year1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year1): $mod = ($i % 2 );++$i; echo ($year1); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($year1a)): $i = 0; $__LIST__ = $year1a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year1a): $mod = ($i % 2 );++$i; echo ($year1a); endforeach; endif; else: echo "" ;endif; ?>
		</select>
        <span id="span-m">年
		<select name="jssjm">
			<?php if(is_array($month1)): $i = 0; $__LIST__ = $month1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month1): $mod = ($i % 2 );++$i; echo ($month1); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($month1a)): $i = 0; $__LIST__ = $month1a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month1a): $mod = ($i % 2 );++$i; echo ($month1a); endforeach; endif; else: echo "" ;endif; ?>
		</select>月</span>
	</p>
	<p class="name hid">经历:<input type="text" id="xx" name="xx" value="<?php echo ($va[0]['xx']); ?>" />
	<b class="b-tishi" id="b-xx"></b>
	</p>
	<p class="name hid">类别:<select name="slb" id="slb">
		<?php if(is_array($lb)): $i = 0; $__LIST__ = $lb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lb): $mod = ($i % 2 );++$i; echo ($lb); endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($lba)): $i = 0; $__LIST__ = $lba;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lba): $mod = ($i % 2 );++$i; echo ($lba); endforeach; endif; else: echo "" ;endif; ?>
	</select></p>
	<?php if($va[0]['id'] == null): ?><p class="name"><button class="hid btn save5">增加</button></p>
	<?php else: ?><p class="name"><button class="btn save5">修改</button></p><?php endif; ?>
	<br/><br/><br/>
	<div class="daohang">
			<input type="button" onclick="window.location.href='__URL__/info4'" class="btn" value="上一页">
				<?php $__FOR_START_11509__=1;$__FOR_END_11509__=17;for($i=$__FOR_START_11509__;$i < $__FOR_END_11509__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
			<input type="button" onclick="window.location.href='__URL__/info6'" class="btn" value="下一页">
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