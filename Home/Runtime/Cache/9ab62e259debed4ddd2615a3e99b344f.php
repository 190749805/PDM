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
<script src="__PUBLIC__/Js/Info/info16.js"></script>
<script src="__PUBLIC__/Js/Info/total.js"></script>
<css href="__PUBLIC__/Css/info.css"></css>
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

<form action="__URL__/commit_info16" method="post">
<div class="center">
<br/>
<input class="btn save16" type="submit" value="保存">
<br/><br/>
<input type="button" onclick="window.location.href='__URL__/delete_info16/id/<?php echo ($list['id']); ?>'" class="btn" value="删除">
	
			
			<p class="name">个人总结(任现职以来的思想政治表现，教学、科学研究等工作的能力及履行职责的情况、成绩等
				<b class="b-tishi" id="b-brzj"></b>
				<p class="name">
				<textarea class="text-kk st<?php echo ($contl['grzj']); ?>"  name="grzj" id="brzj"><?php echo ($list['brzj']); ?></textarea></p>

			<p class="name">教学任务概述:
				<b class="b-tishi" id="b-rwgs"></b><br/>
				(例:任现职以来，主讲《计算机应用基础》、《外贸英语》等2门本科课程，共986学时，学生听课人数770人，
				学生评教均为“优秀”；共指导学生毕业论文24人，有3人获得优秀毕业论文，年平均授课学时超过学校要求的工作量。)
                <br/><textarea class="text-kk st<?php echo ($contl['jxrwzs']); ?>"  id="rwgs" name="rwgs"><?php echo ($list['rwgs']); ?></textarea>
	
			<p class="name">获奖情况综述:
				<b class="b-tishi" id="b-hjzs"></b>
				<br/>
				(例:1.2012年，负责组织新生入学专业教育讲座，获院内评比一等奖)
				<textarea class="text-kk st<?php echo ($contl['hjzs']); ?>" id="hjzs"  name="hjzs"><?php echo ($list['hjzs']); ?></textarea></p>	

			<p class="name">教学管理、教学改革工作综述:
				<b class="b-tishi" id="b-jxggzs"></b>
				<br/>
				任现职以来，分管网络安全教研室日常教学管理工作，积极推进2012信息对抗专业人才培养方案的调整与完善工作，
				参与2012年教育教学一体化改革项目（获校级一等奖），组织本专业毕业论文答辩，围绕网络安全专业建设主线，
				鼓励创新课程教学，协助上级推进教学质量提升和专业建设
				<br/><textarea class="text-kk st<?php echo ($contl['jxggzs']); ?>" id="jxggzs"  name="gggz"><?php echo ($list['gggz']); ?></textarea>
			</p>

			<p class="name">指导研究生情况：
				<b class="b-tishi" id="b-zdyjs"></b>
				<br/>
				<textarea class="text-kk st<?php echo ($contl['zdyjs']); ?>" id="zdyjs" name="zdyjs"><?php echo ($list['zdyjs']); ?></textarea>
			</p>
			<p class="name">指导教师进修提高情况：
				<b class="b-tishi" id="b-zdjstg"></b>
				<br/>
				<textarea class="text-kk st<?php echo ($contl['zdjs']); ?>" id="zdjstg" name="zdjstg"><?php echo ($list['zdjstg']); ?></textarea>
			</p>
			<p class="name">对实验室建设的贡献：
				<b class="b-tishi" id="b-sysgx"></b>
				<br/>
				<textarea class="text-kk st<?php echo ($contl['sysgx']); ?>" id="sysgx" name="sysgx"><?php echo ($list['sysgx']); ?></textarea>
			</p>
			<p class="name">外语程度：
				<b class="b-tishi" id="b-wycd"></b>
				<br/>
				<textarea class="text-kk st<?php echo ($contl['wycd']); ?>" id="wycd" name="wycd"><?php echo ($list['wycd']); ?></textarea>
			</p>
			<p class="name">计算机应用水平：
				<b class="b-tishi" id="b-jsjsp"></b>
				<br/>
				<textarea class="text-kk st<?php echo ($contl['jsjsp']); ?>" id="jsjsp" name="jsjsp"><?php echo ($list['jsjsp']); ?></textarea>
			</p>
	
			<p class="name">主要论文、著作综述：
				<b class="b-tishi" id="b-lwzzzs"></b><br/>
				(例:任现职以来，出版教材2部，论著3部。其中一部教材为“十·五”国家规划教材)
				<br/><textarea class="text-kk st<?php echo ($contl['lwzzzs']); ?>" id="lwzzzs" name="zpzs"><?php echo ($list['zpzs']); ?></textarea>
			</p>
	
			<p class="name">科研项目及获奖情况综述:
				<b class="b-tishi" id="b-kyhjzs"></b>
				<br/>
				(例:主持省级科研项目一项，主持院级科研项目一项，承担省级教改项目两项，
				参与省级精品课程建设两门，获四川省教学成果奖二等奖两项)
				<br/><textarea class="text-kk  st<?php echo ($contl['kyhjzs']); ?>" id="kyhjzs" name="xmzs"><?php echo ($list['xmzs']); ?></textarea>
			</p>
	<div class="daohang">
			<input type="button" onclick="window.location.href='__URL__/info15'" class="btn" value="上一页">
				<?php $__FOR_START_1396__=1;$__FOR_END_1396__=17;for($i=$__FOR_START_1396__;$i < $__FOR_END_1396__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
			<input type="button" id="change_to_audit" class="btn" value="提交审核">
		</div>
		<br/>
</div>
</form>

			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</body>
</html>