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
<script type="text/javascript" src="__PUBLIC__/Js/Info/info1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/three.js"></script>
<script src="__PUBLIC__/Data/city.js"></script>
<script src="__PUBLIC__/Js/Info/total.js"></script>
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
				<form action="__URL__/commit_info1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="hidden" value="<?php echo ($list[0]['zplj']); ?>"/>
					<br/>
					<?php if($list[0]['zplj'] == null): ?><button class="btn save1"  type="submit">保存</button>
					<?php else: ?><button class="btn save1"  type="submit">修改</button><?php endif; ?>
					<br/>
					<br/>
					<input type="button" onclick="window.location.href='__URL__/delete_info1/id/<?php echo ($list[0]['id']); ?>'" class="btn" value="删除">
					<div class="photo"><img class="img-photo" src="<?php echo ($list[0]['zplj']); ?>" /></div>
					<p class="name">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：
						<input class="name_value  st<?php echo ($contl['name']); ?>" type="text" name="name" id="input-name" value="<?php echo ($list[0]['name']); ?>"><b class="b-tishi" id="b-name"></b></p>
					<p class="name">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：
						<select class="name_value  st<?php echo ($contl['sex']); ?>" name="sex" id="sex">
							<?php if(is_array($sex)): $i = 0; $__LIST__ = $sex;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sex): $mod = ($i % 2 );++$i; echo ($sex); endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</p>
					<p class="name">拟 聘 职 务：
						<select class="name_value  st<?php echo ($contl['npzw']); ?>" name="npzw" id="npzw">
							<?php if(is_array($npzw)): $i = 0; $__LIST__ = $npzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$npzw): $mod = ($i % 2 );++$i; echo ($npzw); endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</p>
					
					<!-- <p class="name">部&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;门：
						
						<select class="name_value  st<?php echo ($contl['bm']); ?>" name="bm" id="bm">
							<?php if(is_array($bms)): $i = 0; $__LIST__ = $bms;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bm): $mod = ($i % 2 );++$i; echo ($bm); endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</p> -->
					
					<p class="name">出 身 年 月：
						<select class="name_value  st<?php echo ($contl['csny']); ?>" name="csny">
							<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?> 
						</select>
						年
						<select class="month  st<?php echo ($contl['csny']); ?>" name="csnm">
							<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?> 
						</select>
						月
					</P>
					
					<p class="name">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族：
						<select class="name_value  st<?php echo ($contl['mz']); ?>"  name="mz" id="mz">
							<?php if(is_array($mz)): $i = 0; $__LIST__ = $mz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mz): $mod = ($i % 2 );++$i; echo ($mz); endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</p>
					<p class="name">身 份 证 号：
						<input class="name_value  st<?php echo ($contl['sfzh']); ?>" type="text" value="<?php echo ($list[0]['sfzh']); ?>" name="sfzh" />
						<b id="b-sfzh" class="b-tishi"></b>
					</p>
					<input type="hidden" value="<?php echo ($list[0]['jg']); ?>" id="input-jg" />
					<p class="name">籍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;贯：
					
						<select class="name_value  st<?php echo ($contl['jg']); ?>"  name="prov" id="jg">
						
						</select>
						<select class="name_value  st<?php echo ($contl['jg']); ?>" name="city" id="city">
						
						</select>
					</p>
					
					<p class="name">上传照片(<span style="color:red">不超过5M</span>)：<br/>
					<label id="lf" for="tupian" class="btn btn-primary">选择图片</label>
					
						<input value="" class="name_value  st<?php echo ($contl['zplj']); ?>" id="tupian"  type="file" name="zplj" />
					<span id="p-id"></span></p>
					
					<div class="daohang">
						<input type="button" onclick="window.location.href='__URL__/info1'" class="btn" value="上一页">
						<?php $__FOR_START_4088__=1;$__FOR_END_4088__=17;for($i=$__FOR_START_4088__;$i < $__FOR_END_4088__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
						<input type="button" onclick="window.location.href='__URL__/info2'" class="btn" value="下一页">
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