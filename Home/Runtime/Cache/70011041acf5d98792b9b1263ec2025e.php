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
<script src="__PUBLIC__/Js/Info/info10.js"></script>
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

<form action="__URL__/commit_info10" method="post">
<input type="hidden" value="<?php echo ($va[0]['id']); ?>" name="hidden"/>
<div class="center">	
<p class="title">个人著作</p>
<table class="info_table">
		<tr>
			<th>专著名称</th><th>出版时间</th><th>类别</th><th>出版社</th><th>本人承担部分</th>
			<th>情况说明</th><th>字数(千字)</th><th>操作</th>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
		<th><?php echo ($vo["mc"]); ?></th><th><?php echo ($vo["cbsj"]); ?></th><th><?php echo ($vo["lb"]); ?></th><th><?php echo ($vo["cbs"]); ?></th><th><?php echo ($vo["cdbf"]); ?></th>
		<th><?php echo ($vo["sm"]); ?></th><th><?php echo ($vo["num"]); ?></th>
		<th>
			<a href="__URL__/info10/id/<?php echo ($vo["id"]); ?>">修改</a>
			<a href="__URL__/delete_info10/id/<?php echo ($vo["id"]); ?>">删除</a>
		</th>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
<br/>
			<input class="btn save10"  type="submit" value="保存"/>
			<br/>
			<br/>
    <p class="name">著作有无情况<select name="qk">
        <?php if(is_array($ywqk)): $i = 0; $__LIST__ = $ywqk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ywqk): $mod = ($i % 2 );++$i; echo ($ywqk); endforeach; endif; else: echo "" ;endif; ?>
    </select></p>
	<p class="name hid">著作名称：<input id="mc" value="<?php echo ($va[0]['mc']); ?>" type="text" name="mc" />
	<b class="b-tishi" id="b-mc"></b>
	</p>
	<p class="name hid">出版时间:
		<select name="cbsjy">
			<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($yeara)): $i = 0; $__LIST__ = $yeara;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yeara): $mod = ($i % 2 );++$i; echo ($yeara); endforeach; endif; else: echo "" ;endif; ?>
		</select>年
		<select name="cbsjm">
			<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($montha)): $i = 0; $__LIST__ = $montha;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$montha): $mod = ($i % 2 );++$i; echo ($montha); endforeach; endif; else: echo "" ;endif; ?>
		</select>月
	</p>
	<p class="name hid">类别：<select name="slb">
		<?php if(is_array($lb)): $i = 0; $__LIST__ = $lb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lb): $mod = ($i % 2 );++$i; echo ($lb); endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($lba)): $i = 0; $__LIST__ = $lba;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lba): $mod = ($i % 2 );++$i; echo ($lba); endforeach; endif; else: echo "" ;endif; ?>
	</select></p>
	<p class="name hid">出版社：<input id=	"cbs" value="<?php echo ($va[0]['cbs']); ?>" type="text" name="cbs"/>
	<b class="b-tishi" id="b-cbs"></b>
	</p>
	<p class="name hid">本人承担部分：<select name="scdbf">
		<?php if(is_array($cdbf)): $i = 0; $__LIST__ = $cdbf;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cdbf): $mod = ($i % 2 );++$i; echo ($cdbf); endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($cdbfa)): $i = 0; $__LIST__ = $cdbfa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cdbfa): $mod = ($i % 2 );++$i; echo ($cdbfa); endforeach; endif; else: echo "" ;endif; ?>
		</select>
		<input type="text"  value="<?php echo ($qitacdbf); ?>" name="qita" />
	</p>
	
	<p class="name hid">情况说明(例:编写XX章，XX字)：<b class="b-tishi" id="b-sm"></b><br/>
        编写<input id="sm" value="<?php echo ($va[0]['sm']); ?>" type="text" name="sm"/>
        章，共<input type="text" name="num" size="5" value="<?php echo ($va[0]['num']); ?>">千字

	<b class="b-tishi" id="b-num"></b>
	</p>
	<?php if($va[0]['id'] == null): ?><p class="name"><button class="btn save10 hid">增加</button></p>
	<?php else: ?><p class="name"><button class="btn save10">修改</button></p><?php endif; ?>
	<div class="daohang">
			<input type="button" onclick="window.location.href='__URL__/info9'" class="btn" value="上一页">
				<?php $__FOR_START_14128__=1;$__FOR_END_14128__=17;for($i=$__FOR_START_14128__;$i < $__FOR_END_14128__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
			<input type="button" onclick="window.location.href='__URL__/info11'" class="btn" value="下一页">
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