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
<script src="__PUBLIC__/Js/Info/info3.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/three.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Info/total.js"></script>
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
	<p class="title">学历及社会经历</p>
		<table class="info_table">
			<tr>
				<th>开始时间</th><th>结束时间</th><th>何地</th><th>院系/部门</th><th>专业/经历</th><th>任职或学习</th>
				<th>修业年限</th><th>学历</th><th>证明人</th><th>操作</th>	
			</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<th><?php echo ($vo["kssj"]); ?></th><th><?php echo ($vo["jssj"]); ?></th><th><?php echo ($vo["hd"]); ?></th><th><?php echo ($vo["bm"]); ?></th><th><?php echo ($vo["zy"]); ?></th>
				<th><?php echo ($vo["rzxx"]); ?></th><th><?php echo ($vo["xynx"]); ?></th><th><?php echo ($vo["xl"]); ?></th><th><?php echo ($vo["zmr"]); ?></th>
				<th><a href="__URL__/info3/id/<?php echo ($vo["id"]); ?>">修改</a>
					<a href="__URL__/delete_info3/id/<?php echo ($vo["id"]); ?>">删除</a>
				</th>	
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
			<form action="__URL__/commit_info3" method="post">
			<input type="hidden" name="hidden" value="<?php echo ($list1[0]['id']); ?>" />
				<br/>
					<input class="btn save3"  type="submit" class="save3" value="保存"/>
					<br/>
					<br/>
				<p class="name">开始时间:
					<select name="kssjy" id="kssjy">
						<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($yeara)): $i = 0; $__LIST__ = $yeara;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yeara): $mod = ($i % 2 );++$i; echo ($yeara); endforeach; endif; else: echo "" ;endif; ?>
					</select>年
					<select name="kssjm" id="kssjm">
						<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($montha)): $i = 0; $__LIST__ = $montha;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$montha): $mod = ($i % 2 );++$i; echo ($montha); endforeach; endif; else: echo "" ;endif; ?>
					</select>月
				结束时间:
					<select name="jssjy" id="jssjy">
						<?php if(is_array($year1)): $i = 0; $__LIST__ = $year1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year1): $mod = ($i % 2 );++$i; echo ($year1); endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($yearb)): $i = 0; $__LIST__ = $yearb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yearb): $mod = ($i % 2 );++$i; echo ($yearb); endforeach; endif; else: echo "" ;endif; ?>
					</select>
                    <span id="span-m">年
					<select name="jssjm" id="jssjm">
						<?php if(is_array($month1)): $i = 0; $__LIST__ = $month1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month1): $mod = ($i % 2 );++$i; echo ($month1); endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($monthb)): $i = 0; $__LIST__ = $monthb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$monthb): $mod = ($i % 2 );++$i; echo ($monthb); endforeach; endif; else: echo "" ;endif; ?>
					</select>月
                    </span>
				</p>
				<p class="name">何地(或何学校、或何单位):<input type="text" value="<?php echo ($list1[0]['hd']); ?>" name="hd" id="hd"/>
				<b class="b-tishi" id="b-hd"></b></p>
				<p class="name">院系（部门）:<input type="text" name="bm" value="<?php echo ($list1[0]['bm']); ?>" id="bm"/><b class="b-tishi" id="b-bm"></b></p>
				<p class="name">专业（经历）:<input type="text" value="<?php echo ($list1[0]['zy']); ?>" name="zy" id="zy"/><b class="b-tishi" id="b-zy"></b></p>
				<p class="name">任职或者学习:
					<select name="rzxx" id="rzxx">
						<?php if(is_array($rzxx)): $i = 0; $__LIST__ = $rzxx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rzxx): $mod = ($i % 2 );++$i; echo ($rzxx); endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($rzxxa)): $i = 0; $__LIST__ = $rzxxa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rzxxa): $mod = ($i % 2 );++$i; echo ($rzxxa); endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</p>
				<div id="div-xuexi">
				<p class="name" id="p-nxxl">修业年限:
					<select name="select-rzxx" id="select-rzxx">
								<?php if(is_array($xynx)): $i = 0; $__LIST__ = $xynx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xynx): $mod = ($i % 2 );++$i; echo ($xynx); endforeach; endif; else: echo "" ;endif; ?>
								<?php if(is_array($xynxa)): $i = 0; $__LIST__ = $xynxa;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xynxa): $mod = ($i % 2 );++$i; echo ($xynxa); endforeach; endif; else: echo "" ;endif; ?>
					</select>年   
					学历:<select name="select-xl" id="select-xl">
							<?php if(is_array($xueli)): $i = 0; $__LIST__ = $xueli;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xueli): $mod = ($i % 2 );++$i; echo ($xueli); endforeach; endif; else: echo "" ;endif; ?>
							<?php if(is_array($xuelia)): $i = 0; $__LIST__ = $xuelia;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xuelia): $mod = ($i % 2 );++$i; echo ($xuelia); endforeach; endif; else: echo "" ;endif; ?>
						</select>
				</p>
				</div>
				<p class="name">证明人:<input type="text" name="zmr" id="zmr" value="<?php echo ($list1[0]['zmr']); ?>"/><b class="b-tishi" id="b-zmr"></b></p>
				<?php if($list1[0]['id'] == null): ?><p class="name"><button class="btn save3">增加</button></p>
				<?php else: ?><p class="name"><button class="btn save3">修改</button></p><?php endif; ?>
				
				<div class="daohang">
						<input type="button" onclick="window.location.href='__URL__/info2'" class="btn" value="上一页">
						<?php $__FOR_START_22110__=1;$__FOR_END_22110__=17;for($i=$__FOR_START_22110__;$i < $__FOR_END_22110__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
						<input type="button" onclick="window.location.href='__URL__/info4'" class="btn" value="下一页">
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