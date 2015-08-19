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
<script src="__PUBLIC__/Js/Info/info7.js"></script>
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
<form action="__URL__/commit_info7" method="post">
	<input type="hidden" name="hidden" value="<?php echo ($va[0]['id']); ?>"/>
	<p class="title">任现职以来教学奖惩情况</p>
	<table class="info_table">
		<tr>
			<th>情况</th><th>时间</th><th>名称或事宜</th><th>单位或地点</th>
			<th>获奖级别</th><th>获奖等级</th><th>排名</th><th>荣誉称号</th><th>备注</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<th><?php echo ($vo["status"]); ?></th><th><?php echo ($vo["time"]); ?></th><th><?php echo ($vo["mcsy"]); ?></th><th><?php echo ($vo["dd"]); ?></th>
			<th><?php echo ($vo["jb"]); ?></th><th><?php echo ($vo["dj"]); ?></th><th><?php echo ($vo["pm"]); ?></th><th><?php echo ($vo["ch"]); ?></th><th><?php echo ($vo["bz"]); ?></th><th>
			<a href="__URL__/info7/id/<?php echo ($vo["id"]); ?>">修改</a>
			<a href="__URL__/delete_info7/id/<?php echo ($vo["id"]); ?>">删除</a>
			</th>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<br/>
			<input class="btn save7"  type="submit" value="保存"/>
			<br/>
			<br/>
	<p class="name">情况:<select name="status" name="status" id="status">
		<?php if(is_array($qk)): $i = 0; $__LIST__ = $qk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qk): $mod = ($i % 2 );++$i; echo ($qk); endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($qka)): $i = 0; $__LIST__ = $qka;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$qka): $mod = ($i % 2 );++$i; echo ($qka); endforeach; endif; else: echo "" ;endif; ?>
		</select></p>
	<span id="span-hjqk">
	<p class="name">时间:
		<select name="timey">
			<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($yeara)): $i = 0; $__LIST__ = $yeara;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yeara): $mod = ($i % 2 );++$i; echo ($yeara); endforeach; endif; else: echo "" ;endif; ?>
		</select>年
		<select name="timem">
			<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($montha)): $i = 0; $__LIST__ = $montha;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$montha): $mod = ($i % 2 );++$i; echo ($montha); endforeach; endif; else: echo "" ;endif; ?>
		</select>月
	</p>
	<p class="name">名称或者事宜:<br/><textarea class="text-kk ry"  id="mcsy" name="mcsy"><?php echo ($va[0]['mcsy']); ?></textarea>
	<b class="b-tishi" id="b-mcsy"></b>
	</p>
	<p class="name">单位或者地点:<br/><textarea class="text-kk ry"  id="dd" name="dd"><?php echo ($va[0]['dd']); ?></textarea>
		<b class="b-tishi" id="b-dd"></b>
	</p>
	<div id="hjqk">
		<p class="name jy">获奖级别:<select class="ry" name="jb">
            <?php if(is_array($jb)): $i = 0; $__LIST__ = $jb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jb): $mod = ($i % 2 );++$i; echo ($jb); endforeach; endif; else: echo "" ;endif; ?>
		</select>
		</p>
        <p class="name jy">获奖等级:<select class="ry" name="dj">
            <?php if(is_array($hjdj)): $i = 0; $__LIST__ = $hjdj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hjdj): $mod = ($i % 2 );++$i; echo ($hjdj); endforeach; endif; else: echo "" ;endif; ?>
        </select>
        </p>
		<p class="name jy">排名:<input id="pm" class="ry" type="text" value="<?php echo ($va[0]['pm']); ?>" name="pm">
		<b class="b-tishi" id="b-pm"></b>
		</p>
		<p class="name jy">荣誉(简述 如:所撰写的论文，获中国国际经济技术合作促进会优秀论文奖):<textarea id="ch" type="text"  class="text-kk"  name="ch"><?php echo ($va[0]['ch']); ?></textarea>
		<b class="b-tishi" id="b-ch"></b>
		</p>
		<p class="name">备注:<br/><textarea class="ry text-kk"  name="bz" id="bz"><?php echo ($va[0]['bz']); ?></textarea>
		<b class="b-tishi" id="b-bz"></b>
		</p>
	</div>
	<?php if($va[0]['id'] == null): ?><p class="name"><button  class="btn save7">增加</button></p>
	<?php else: ?><p class="name"><button  class="btn save7">修改</button></p><?php endif; ?>
	</span>

	<div class="daohang">
			<input type="button" onclick="window.location.href='__URL__/info6'" class="btn" value="上一页">
				<?php $__FOR_START_21302__=1;$__FOR_END_21302__=17;for($i=$__FOR_START_21302__;$i < $__FOR_END_21302__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
			<input type="button" onclick="window.location.href='__URL__/info8'" class="btn" value="下一页">
		</div>
		<br/>

</div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</body>
</html>