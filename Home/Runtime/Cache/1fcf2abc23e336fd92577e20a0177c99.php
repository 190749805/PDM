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
<script type="text/javascript" src="__PUBLIC__/Js/four.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/check.js"></script>
<style type="text/css">
	.center{
		font-size:12px;
	}
</style>
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
		<br/>
		<div class="row">
			<div class="col-md-2">
				<p id="time">&nbsp;&nbsp;&nbsp;当前日期:<?php date_default_timezone_set('PRC'); echo date('Y:m:d');?></?php></p>
			</div>
		</div>
		<br/><br/>
		<div class="row">
			<div class="col-md-3" style="text-align:left;">
				<p class="info">
					信息选取(简表)&nbsp;&nbsp;&nbsp;&nbsp;
				</p>
				<br/><br/>
			</div>
			<div class="col-md-9">
			</div>	
		</div>
		<div class="row">
			
			<div class="col-md-11">
				<table border="1" cellspacing="0" style="margin-left:10%;">
					<tr>
						<form action="__URL__/zgxl" method="post">
						<td style="text-align:center;">最高学历（学位）及<br/>毕业（授位）时间、学校、专业</td>
						<td style="text-align:center;">
							<select name="zgxl">
							<?php if(is_array($xw)): $i = 0; $__LIST__ = $xw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xw): $mod = ($i % 2 );++$i;?><option value="<?php echo ($xw["sxzy"]); ?>(<?php echo ($xw["xw"]); ?>) <?php echo ($xw["swsj"]); ?> <?php echo ($xw["byxx"]); ?> <?php echo ($xw["szyx"]); ?>"><?php echo ($xw["sxzy"]); ?>(<?php echo ($xw["xw"]); ?>) <?php echo ($xw["swsj"]); ?> <?php echo ($xw["byxx"]); ?> <?php echo ($xw["szyx"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['0']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/cjxl" method="post">
						<td style="text-align:center;">下一级学历（学位）及<br/>毕业（授位）时间、学校、专业</td>
						<td style="text-align:center;">
							<select name="xyjxl">
							<?php if(is_array($xw2)): $i = 0; $__LIST__ = $xw2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xw2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($xw2["sxzy"]); ?>(<?php echo ($xw2["xw"]); ?>) <?php echo ($xw2["swsj"]); ?> <?php echo ($xw2["byxx"]); ?> <?php echo ($xw2["szyx"]); ?>"><?php echo ($xw2["sxzy"]); ?>(<?php echo ($xw2["xw"]); ?>) <?php echo ($xw2["swsj"]); ?> <?php echo ($xw2["byxx"]); ?> <?php echo ($xw2["szyx"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['1']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/xstt" method="post">
						<td style="text-align:center;">参加何种学术团体及职务</td>
						<td style="text-align:left;">
							<table width="100%">
								<tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">学术团体</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">职务</td>
								</tr>
								<tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php if(is_array($xszw)): $i = 0; $__LIST__ = $xszw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xszw): $mod = ($i % 2 );++$i;?><input type="checkbox" name="xstt[]" value="<?php echo ($xszw); ?>"/><br/><?php endforeach; endif; else: echo "" ;endif; ?>
									</td>
									<td style="text-align:left;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php if(is_array($xstt)): $i = 0; $__LIST__ = $xstt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xstt): $mod = ($i % 2 );++$i; echo ($xstt); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
									</td>
									<td style="text-align:left;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php if(is_array($ttzw)): $i = 0; $__LIST__ = $ttzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ttzw): $mod = ($i % 2 );++$i; echo ($ttzw); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
									</td>
								</tr>
						
								
							</table>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['2']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/rych" method="post">
						<td style="text-align:center;">何时荣获荣誉称号</td>
						<td style="text-align:left;">
							<?php if(is_array($jfinfo)): $i = 0; $__LIST__ = $jfinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jfinfo): $mod = ($i % 2 );++$i;?><input name="rych[]" type="checkbox" value="<?php echo ($jfinfo["time"]); ?> <?php echo ($jfinfo["ch"]); ?>"/><?php echo ($jfinfo["time"]); ?> <?php echo ($jfinfo["ch"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['3']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/gzjljx" method="post">
						<td style="text-align:center;">主要业务工作简历、主要进修简历</td>
						<td style="text-align:left;">
							<?php if(is_array($xlinfo)): $i = 0; $__LIST__ = $xlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xlinfo): $mod = ($i % 2 );++$i;?><input name="gzjljx[]" type="checkbox" value="<?php echo ($xlinfo["id"]); ?>"/><?php echo ($xlinfo["kssj"]); ?>-<?php echo ($xlinfo["jssj"]); ?> <?php echo ($xlinfo["hd"]); ?> <?php echo ($xlinfo["bm"]); ?> <?php echo ($xlinfo["zy"]); ?> <?php echo ($xlinfo["rzxx"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if(is_array($jxinfo)): $i = 0; $__LIST__ = $jxinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jxinfo): $mod = ($i % 2 );++$i;?><input name="jxinfo[]" type="checkbox" value="<?php echo ($jxinfo["id"]); ?>" /><?php echo ($jxinfo["kssj"]); ?>-<?php echo ($jxinfo["jssj"]); ?> <?php echo ($jxinfo["xx"]); ?>(<?php echo ($jxinfo["lb"]); ?>)<br/><?php endforeach; endif; else: echo "" ;endif; ?>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/>
							工作简历
							<br/>
							<?php echo ($sbdatatishi['4']); ?>
							<br/>
							进修简历
							<br/>
							<?php echo ($sbdatatishi['5']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/rkxx" method="post">
						<td style="text-align:center;">任课</td>
						<td>
							<table width="100%">
								<tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">时间</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">学生人数</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">课程名称</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">学时</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">备注</td>
								</tr>
								<?php if(is_array($rkinfo)): $i = 0; $__LIST__ = $rkinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rkinfo): $mod = ($i % 2 );++$i;?><tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="rkxx[]" type="checkbox" value="<?php echo ($rkinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($rkinfo["kssj"]); ?>-<?php echo ($rkinfo["jssj"]); ?></td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($rkinfo["xsrs"]); ?></td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($rkinfo["mcrw"]); ?></td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($rkinfo["zxss"]); ?></td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($rkinfo["bz"]); ?></td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
							
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['6']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/byll" method="post">
						<td style="text-align:center;">指导毕业论文</td>
						<td>
							<table width="100%">
								<tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">时间</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">学生人数</td>
									
								</tr>
								<?php if(is_array($bysjinfo)): $i = 0; $__LIST__ = $bysjinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bysjinfo): $mod = ($i % 2 );++$i;?><tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="byll[]" type="checkbox" value="<?php echo ($bysjinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($bysjinfo["kssj"]); ?>-<?php echo ($bysjinfo["jssj"]); ?></td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;"><?php echo ($bysjinfo["xsrs"]); ?></td>
									
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>	
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['7']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/jclz" method="post">
						<td style="text-align:center;">教材,论著</td>
						<td>
							<table width="100%">
								<tr>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">名称</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">出版社</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">出版时间</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">承担部分</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">情况说明</th>
								</tr>
							
							<?php if(is_array($jcinfo)): $i = 0; $__LIST__ = $jcinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jcinfo): $mod = ($i % 2 );++$i;?><tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="jc[]" type="checkbox" value="<?php echo ($jcinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($jcinfo["mc"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($jcinfo["cbs"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($jcinfo["cbsj"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($jcinfo["cdbf"]); ?>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										 编写<?php echo ($jcinfo["qksm"]); ?>章 共<?php echo ($jcinfo["num"]); ?>千字
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							
							<?php if(is_array($zzlinfo)): $i = 0; $__LIST__ = $zzlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zzlinfo): $mod = ($i % 2 );++$i;?><tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="lz[]" type="checkbox" value="<?php echo ($zzlinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($zzlinfo["mc"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($zzlinfo["cbs"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($zzlinfo["cbsj"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($zzlinfo["cdbf"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										编写<?php echo ($zzlinfo["sm"]); ?>章 共<?php echo ($zzlinfo["num"]); ?>千字
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							
							</table>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/>
							<span>教材</span>
							<br/><?php echo ($sbdatatishi['8']); ?>
							<br/>
							<span>论著</span>
							<br/><?php echo ($sbdatatishi['9']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/lw" method="post">
						<td style="text-align:center;">论文</td>
						<td>
							<table width="100%">
								<tr>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">论文标题</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">刊物名称</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">发表时间</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">刊物级别</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">本人排名</th>
								</tr>
								<?php if(is_array($fblwlinfo)): $i = 0; $__LIST__ = $fblwlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fblwlinfo): $mod = ($i % 2 );++$i;?><tr>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="lw[]" type="checkbox" value="<?php echo ($fblwlinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fblwlinfo["title"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fblwlinfo["slmc"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fblwlinfo["time"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fblwlinfo["jb"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fblwlinfo["pm"]); ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/><?php echo ($sbdatatishi['10']); ?>
						</td>
						</form>
					</tr>
					<tr>
						<form action="__URL__/xmhjzl" method="post">
						<td style="text-align:center;">科研项目、获奖情况、专利发明</td>
						<td>
							<table width="100%">
								<tr>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">选择</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">名称</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">项目编号</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">项目来源</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">级别</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">起止时间</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">结题/在研</th>
									<th style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">本人排名</th>
								</tr>
								<?php if(is_array($kyxminfo)): $i = 0; $__LIST__ = $kyxminfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyxminfo): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="kyxm[]" type="checkbox" value="<?php echo ($kyxminfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["kyxm"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["bh"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["xmly"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["xmjb"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["qzsj"]); ?>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["wcqk"]); ?>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyxminfo["pm"]); ?>
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								<?php if(is_array($kyhjinfo)): $i = 0; $__LIST__ = $kyhjinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyhjinfo): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="kyhj[]" type="checkbox" value="<?php echo ($kyhjinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyhjinfo["cg"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyhjinfo["dw"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyhjinfo["mc"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($kyhjinfo["sj"]); ?>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
								<?php if(is_array($fmzlinfo)): $i = 0; $__LIST__ = $fmzlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fmzlinfo): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<input name="fmzl[]" type="checkbox" value="<?php echo ($fmzlinfo["id"]); ?>"/>
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fmzlinfo["mc"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fmzlinfo["lx"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										<?php echo ($fmzlinfo["tgsj"]); ?> 
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
									<td style="text-align:center;border-right:1px solid #000;border-bottom:1px solid #000;">
										
									</td>
								</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							</table>
						</td>
						<td>
							<button class="btn" type="submit">保存</button>
							<br/>
							<span>科研项目</span>
							<br/><?php echo ($sbdatatishi['11']); ?>
							<br/>
							<span>获奖情况</span>
							<br/><?php echo ($sbdatatishi['12']); ?>
							<br/>
							<span>专利发明</span>
							<br/><?php echo ($sbdatatishi['13']); ?>
						</td>
						</form>
					</tr>
				</table>
			</div>	
		</div>
	</div>
		
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>		
</body>
</html>