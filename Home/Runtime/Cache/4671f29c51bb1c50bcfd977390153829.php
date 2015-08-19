<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<link rel="stylesheet" href="__PUBLIC__/Css/printpdf.css" media="print" />
		<script src="__PUBLIC__/Js/jquery1_x.js" type="text/javascript"></script>
		<script src="__PUBLIC__/Js/jquery.jqprint-0.3.js" type="text/javascript"></script>
		<style type="text/css">
			body{
				-webkit-transform:scale(0.75);
				margin:-100px -100px -100px -130px;
			}
			.content{
				font-size:12px;
			}
			.title_center{
				text-align:center;
			}
			.title_left{
				text-align:left;
			}
			.title_right{
				text-align:right;
			}
		</style>
	</head>
	<body>
		<p style="font-size:1em;text-align:center;letter-spacing: 0.23em;font-weight:900;margin: 0px 0px 5px 60px;width: 1100px;">四川省高等学校申报评审高级专业技术职务人员情况简表</p>	
		<table border="0" width="1100px;" cellspacing="0">
			<tr>
				<td><p style="text-align:left;font-size:12px;">学科组：</p></td>
				<td style="width:270px;"><p style="width:240px;font-size:12px;text-align:left;-webkit-transform: scale(0.77);margin-left: -35px"><?php echo ($infoinfo['0']['xnxkz']); ?></p></td>
				<td><p style="text-align:right;font-size:12px;">学科：</p></td>
				<td><p style="width:160px;text-align:left;font-size:12px;"><?php echo ($infoinfo['0']['xk']); ?></p></td>
				<td><p style="text-align:right;font-size:12px;">专业：</p></td>
				<td><p style="width:240px;text-align:left;font-size:12px;"><?php echo ($infoinfo['0']['xcszy']); ?></p></td>
				<td><p style="font-size:12px;">学&nbsp;&nbsp;&nbsp;&nbsp;校（单位）公章 &nbsp;&nbsp;&nbsp; 年 &nbsp;&nbsp; 月 &nbsp;&nbsp; 日</p></td>
			</tr>
		</table>
		<table border="1" cellspacing="0" width="1260px;">
			<tr>
				<td class="title_center" style="width:63px;height:20px;"><p class="content">姓 名</p></td>
				<td class="title_center" style="width:63px"><p class="content"><?php echo ($userinfo['0']['name']); ?></p></td>
				<td class="title_center" style="width:50px"><p class="content">性 别</p></td>
				<td class="title_center" style="width:60px"><p class="content"><?php echo ($userinfo['0']['sex']); ?></p></td>
				<td class="title_left" style="width:45px"><p class="content">&nbsp;出生<br/>&nbsp;年月</p></td>
				<td class="title_center" style="width:55px"><p class="content"><?php echo ($userinfo['0']['csny']); ?></p></td>
				<td class="title_center" style="width:45px"><p class="content">民 族</p></td>
				<td class="title_center" style="width:45px"><p class="content"><?php echo ($userinfo['0']['mz']); ?></p></td>
				<td class="title_left" style="width:45px"><p class="content">&nbsp;政治<br/>&nbsp;面貌</p></td>
				<td class="title_center" style="width:55px"><p class="content"><?php echo ($infoinfo['0']['cjdp']); ?></p></td>
				<td rowspan="8" style="width:65px;text-align:left;padding:0px;"><p style="-webkit-transform:scale(0.87);font-size:10px;padding:12px;padding: 12px 0px 0px 16px;">任<br/>
现</br>
职</br>
以</br>
来</br>
发</br>
表及</br>
的承</br>
主担</br>
要的</br>
科科</br>
研研</br>
论项</br>
文目</br>
︵和</br>
著获</br>
︶奖</br>
、情</br>
社况</br>
会</br>
服</br>
务</br>
主</br>
要</br>
成</br>
绩</br>
</td>
				<td colspan="13" rowspan="8" style="vertical-align: top;">
					<p class="content">
						<b>一.主要论文、论著：</b><br/>
						<b>（一）</b><br/>
					</p>
						<table style="margin-top: -10px;">
							<?php if(is_array($jcinfo)): $i = 0; $__LIST__ = $jcinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jcinfo): $mod = ($i % 2 );++$i;?><tr>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($jcinfo["id"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($jcinfo["mc"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($jcinfo["lb"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($jcinfo["cbsj"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($jcinfo["cdbf"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">编写<?php echo ($jcinfo["qksm"]); ?>章 共<?php echo ($jcinfo["num"]); ?>千字</p></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if(is_array($zzlinfo)): $i = 0; $__LIST__ = $zzlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zzlinfo): $mod = ($i % 2 );++$i;?><tr>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($zzlinfo["id"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($zzlinfo["mc"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($zzlinfo["lb"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($zzlinfo["cbsj"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($zzlinfo["cdbf"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">编写<?php echo ($zzlinfo["sm"]); ?>章 共<?php echo ($zzlinfo["num"]); ?>千字</p></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						<br/>
						<p class="content" style="margin-top:-10px;"><b>（二）</b> <?php echo ($lwzzzs); ?></p><br/>
						<br/>
						<table style="margin-top: -45px;margin-left:-15px;">
							<tr>
								<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);">论文题目</p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">刊物名称</p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">发表时间</p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">刊物级别</p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);">本人排名</p></td>
							</tr>
							<?php if(is_array($lwinfo)): $i = 0; $__LIST__ = $lwinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lwinfo): $mod = ($i % 2 );++$i;?><tr>
								<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($lwinfo["id"]); ?> <?php echo ($lwinfo["title"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($lwinfo["slmc"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($lwinfo["time"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($lwinfo["jb"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($lwinfo["pm"]); ?></p></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						<br/>
					<p class="content" style="margin-top:-15px;">
						<b>二、科研项目及获奖</b> <?php echo ($kyhjzs); ?><br/>
					</p>
					<br/>
					<table style="margin-left:-15px;margin-top:-30px;">
						<tr>
							<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);">科研项目、获奖情况、专利发明</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">项目编号</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">项目来源</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">级别</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">起止时间</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">结题/在研</p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);">本人排名</p></td>
						</tr>
						<?php if(is_array($kyxminfo)): $i = 0; $__LIST__ = $kyxminfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyxminfo): $mod = ($i % 2 );++$i;?><tr>
							<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["id"]); ?> <?php echo ($kyxminfo["kyxm"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["bh"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["xmly"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["xmjb"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["qzsj"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["wcqk"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyxminfo["pm"]); ?></p></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($kyhjinfo)): $i = 0; $__LIST__ = $kyhjinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyhjinfo): $mod = ($i % 2 );++$i;?><tr>
							<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyhjinfo["id"]); ?> <?php echo ($kyhjinfo["cg"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyhjinfo["dw"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyhjinfo["jb"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($kyhjinfo["sj"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($fmzlinfo)): $i = 0; $__LIST__ = $fmzlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fmzlinfo): $mod = ($i % 2 );++$i;?><tr>
							<td style="width:200px;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($fmzlinfo["id"]); ?> <?php echo ($fmzlinfo["mc"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($fmzlinfo["lx"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($fmzlinfo["zlh"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($fmzlinfo["tgsj"]); ?></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
							<td><p class="content" style="-webkit-transform: scale(0.75);"></p></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
				</td>
			</tr>
			
			<tr>
				<td style="text-align:center;height:20px;" colspan="3"><p class="content">最高学历（学位）及<br/>毕业（授位）时间、学校、专业</p></td>
				<td colspan="7"><p class="content" style="-webkit-transform: scale(0.75);">
								<?php if(is_array($zgxl)): $i = 0; $__LIST__ = $zgxl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zgxl): $mod = ($i % 2 );++$i; echo ($zgxl); endforeach; endif; else: echo "" ;endif; ?>
								</p></td>
				
			</tr>
			<tr>
				<td style="text-align:center;height:20px;" colspan="3"><p class="content">下一级学历（学位）及<br/>毕业（授位）时间、学校、专业</p></td>
				<td colspan="7"><p class="content" style="-webkit-transform: scale(0.75);">
								<?php if(is_array($xyjxl)): $i = 0; $__LIST__ = $xyjxl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xyjxl): $mod = ($i % 2 );++$i; echo ($xyjxl); endforeach; endif; else: echo "" ;endif; ?></p></td>
				
			</tr>
			<tr>
				<td style="text-align:center;height:32px;"><p class="content">参加工作<br/>时&nbsp;&nbsp;&nbsp;&nbsp;间</p></td>
				<td style="text-align:center;"><p class="content"><?php echo ($infoinfo['0']['cjgzsj']); ?></p></td>
				<td colspan="2" style="text-align:center"><P class="content">工作部门及<br/>党政职务</P></td>
				<td colspan="2" style="text-align:center"><P class="content" style="-webkit-transform: scale(0.75);"><?php echo ($userinfo['0']['bm']); ?> <?php echo ($infoinfo['0']['drdzzw']); ?></P></td>
				<td colspan="2" style="text-align:center"><P class="content">现专业技术<br/>职务及时间</P></td>
				<td colspan="2" style="text-align:center"><P class="content" style="-webkit-transform: scale(0.75);"><?php echo ($infoinfo['0']['xrjszw']); ?></P></td>
				
			</tr>
			<tr>
				<td style="text-align:center;height:32px;"><p class="content">现从事专<br/>业及专长</p></td>
				<td colspan="5" style="text-align:left;"><p class="content"><?php echo ($infoinfo['0']['xcszy']); ?> <?php echo ($infoinfo['0']['xcszc']); ?></p></td>
				<td colspan="2" style="text-align:center;"><p class="content">拟评审专业<br/>职 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</p></td>
				<td colspan="2" style="text-align:center;"><p class="content"><?php echo ($userinfo['0']['npzw']); ?></p></td>
				
			</tr>
			<tr>
				<td style="height:45px;text-align:center;"><p class="content">参加何种<br/>学术团体<br/>及职务</p></td>
				<td colspan="5" style="text-align:left;"><p class="content" style="-webkit-transform: scale(0.75);margin-left:-40px;"><?php if(is_array($xstt)): $i = 0; $__LIST__ = $xstt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xstt): $mod = ($i % 2 );++$i; echo ($xstt); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?></p></td>
				<td colspan="2" style="text-align:center;"><p class="content">主&nbsp;&nbsp;&nbsp;&nbsp;要<br/>社会兼职</p></td>
				<td colspan="2" style="text-align:left;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($infoinfo['0']['shjz']); ?></p></td>
				
			</tr>
			<tr>
				<td style="height:40px;text-align:center;"><p class="content">何时荣获<br/>荣誉称号</p></td>
				<td colspan="9" style="text-align:left;"><p class="content" style="-webkit-transform: scale(0.75);margin-left: -67px;"><?php if(is_array($rych)): $i = 0; $__LIST__ = $rych;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rych): $mod = ($i % 2 );++$i; echo ($rych); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?></p></td>
			</tr>
			<tr>
				<td style="height:80px;text-align:center;"><p class="content">主要业务<br/>工作简<br/>历、主要<br/>进修简历</p></td>
				<td colspan="9" style="text-align:left;">
															<table>
																<?php if(is_array($xljl)): $i = 0; $__LIST__ = $xljl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xljl): $mod = ($i % 2 );++$i;?><tr>
																	<td style="width:120px;"><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($xljl["kssj"]); ?> <?php echo ($xljl["jssj"]); ?></p></td>
																	<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($xljl["hd"]); ?> <?php echo ($xljl["bm"]); ?> <?php echo ($xljl["rzxx"]); ?></p></td>
																</tr><?php endforeach; endif; else: echo "" ;endif; ?>
																<?php if(is_array($gnwjxinfo)): $i = 0; $__LIST__ = $gnwjxinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gnwjxinfo): $mod = ($i % 2 );++$i;?><tr>
																	<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($gnwjxinfo["kssj"]); ?> <?php echo ($gnwjxinfo["jssj"]); ?></p></td>
																	<td><p class="content" style="-webkit-transform: scale(0.75);"><?php echo ($gnwjxinfo["xx"]); ?>(<?php echo ($gnwjxinfo["lb"]); ?>)</p></td>
																</tr><?php endforeach; endif; else: echo "" ;endif; ?>
															</table>
														</td>
			</tr>
			<tr>
				<td rowspan="11" style="height:440px;text-align:left;padding:18px;"><p class="content">&nbsp;<br/>&nbsp;<br/>任<br/>现<br/>职<br/>以成<br/>来情<br/>承况<br/>担︵<br/>的含<br/>教教<br/>学学<br/>、业<br/>实务<br/>验工<br/>等作<br/>业获<br/>务奖<br/>工︶<br/>作<br/>及<br/>完<br/></p></td>
				<td rowspan="8" colspan="9" style="text-align:left;font-size:6px;vertical-align: top;">
					<p class="content"><b>一、教学授课及毕业论文 </b><br/>
						<p class="content" style="-webkit-transform: scale(0.67);line-height: 1em;margin-left: -108px;margin-right: -108px;margin-top: -18px;"><?php echo ($jxrwinfo); ?></p>
						
						<p class="content" style="-webkit-transform: scale(0.67);margin-left: -90px;line-height: 0.9em;margin-top: -14px;">1、任课：</p><br/>
						<table style="margin-top: -30px;">
							<tr>
								<td style="vertical-align: top;">
									<table>
										<?php if(is_array($rktitle)): $i = 0; $__LIST__ = $rktitle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rktitle): $mod = ($i % 2 );++$i;?><tr>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">时间</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">课程名称</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">学时</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 0px;line-height: 0.9em;">备注</p></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										<?php if(is_array($rkinfo)): $i = 0; $__LIST__ = $rkinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rkinfo): $mod = ($i % 2 );++$i;?><tr>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo["kssj"]); ?> <?php echo ($rkinfo["jssj"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo["mcrw"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo["zxss"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 0px;line-height: 0.9em;"><?php echo ($rkinfo["bz"]); ?></p></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
										<?php if(is_array($rkinfo1)): $i = 0; $__LIST__ = $rkinfo1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rkinfo1): $mod = ($i % 2 );++$i;?><tr>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo1["kssj"]); ?> <?php echo ($rkinfo1["jssj"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo1["mcrw"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo1["zxss"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 0px;line-height: 0.9em;"><?php echo ($rkinfo1["bz"]); ?></p></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									</table>
								</td>
								<?php if(is_array($onerk)): $i = 0; $__LIST__ = $onerk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$onerk): $mod = ($i % 2 );++$i;?><td style="vertical-align: top;">
									<table>
										<tr>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">时间</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">课程名称</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">学时</p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 0px;line-height: 0.9em;">备注</p></td>
										</tr>
										<?php if(is_array($rkinfo2)): $i = 0; $__LIST__ = $rkinfo2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rkinfo2): $mod = ($i % 2 );++$i;?><tr>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo2["kssj"]); ?> <?php echo ($rkinfo2["jssj"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo2["mcrw"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($rkinfo2["zxss"]); ?></p></td>
											<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 0px;line-height: 0.9em;"><?php echo ($rkinfo2["bz"]); ?></p></td>
										</tr><?php endforeach; endif; else: echo "" ;endif; ?>
									</table>
								</td><?php endforeach; endif; else: echo "" ;endif; ?>
							</tr>
						</table>
						
						<p class="content" style="-webkit-transform: scale(0.67);margin-left: -90px;line-height: 0.9em;margin-top: -5px;">2 指导毕业论文：</p><br/>
						<table style="margin-top: -25px;">
							<?php if(is_array($bysjtitle)): $i = 0; $__LIST__ = $bysjtitle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bysjtitle): $mod = ($i % 2 );++$i;?><tr>
								<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;">时间</p></td>
								<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 18px;line-height: 0.9em;">人数</p></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if(is_array($bysjinfo)): $i = 0; $__LIST__ = $bysjinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bysjinfo): $mod = ($i % 2 );++$i;?><tr>
								<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: -18px;line-height: 0.9em;"><?php echo ($bysjinfo["kssj"]); ?> <?php echo ($bysjinfo["jssj"]); ?></p></td>
								<td><p class="content" style="-webkit-transform: scale(0.67);margin-left: 18px;line-height: 0.9em;"><?php echo ($bysjinfo["xsrs"]); ?></p></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</table>
						<p class="content" style="-webkit-transform: scale(0.67);margin-left: -90px;line-height: 1em;margin-top: -2px;">3、其他：</p>
						<p class="content" style="margin-top:-5px;"><b>二、教学管理、教学改革工作 </b><br/></p>
						<p class="content" style="-webkit-transform: scale(0.67);line-height: 1em;margin-left: -108px;margin-right: -108px;margin-top: -18px;"><?php echo ($jgrwzs); ?></p>
							<p class="content" style="margin-top:-12px;"><b>三、教学获奖情况 </b><br/></p>
						<p class="content" style="-webkit-transform: scale(0.67);line-height: 1em;margin-left: -108px;margin-right: -108px;margin-top: -18px;"><?php echo ($jxhjzs); ?></p>
					</p>
				</td>
				<td colspan="6" style="height: 30px;"><p class="content" style="text-align:center;">任现职以来师德师风总体评价 </p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;">优秀</p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;"></p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;">良好</p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;"></p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;">合格</p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;"></p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;">不合格</p></td>
				<td style="width: 40px;"><p class="content" style="text-align:center;"></p></td>
			</tr>
			<tr>
				<td colspan="6" style="height: 30px;"><p class="content">&nbsp;任现职以来有无弄虚作假、抄袭、剽窃等学术失范或学术<br/>&nbsp;不端等违反师德规范的行为（若有，请简要描述）</p></td>
				<td colspan="8"></td>
			</tr>
			<tr>
				<td rowspan="2"><p class="content">&nbsp;任现职以<br/>&nbsp;来年度考<br/>&nbsp;核各等次<br/>&nbsp;次数</p></td>
				<td style="height: 30px;"><p class="content" style="text-align:center;">优秀</p></td>
				<td><p class="content" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
				<td><p class="content" style="text-align:center;">基本合格</p></td>
				<td><p class="content" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;</p></td>
				<td rowspan="2"><p class="content" style="text-align:center;">答辩<br/>结论</p></td>
				<td rowspan="2"><p class="content" style="text-align:center;"></p></td>
				<td rowspan="2" colspan="2"><p class="content" style="text-align:center;">外语考试（确<br/>认）语种、级<br/>别、时间及<br/>成绩</p></td>
				<td rowspan="2"><p class="content" style="text-align:center;">英语<br/><?php echo ($ksinfo['0']['yyjb']); ?><br/><?php echo ($ksinfo['0']['yysj']); ?><br/><?php echo ($ksinfo['0']['yycj']); ?></p></td>
				<td rowspan="2"><p class="content" style="text-align:center;">计算机考试<br/>级别、时间<br/>及成绩</p></td>
				<td rowspan="2"><p class="content" style="text-align:center;"><?php echo ($ksinfo['0']['jsjjb']); ?><br/><?php echo ($ksinfo['0']['jsjsj']); ?><br/><?php echo ($ksinfo['0']['jsjcj']); ?></p></td>
				<td rowspan="2"><p class="content" style="text-align:center;">公示<br/>情况</p></td>
				<td rowspan="2"><p class="content" style="text-align:center;"></p></td>
			</tr>
			<tr>
				<td style="height: 30px;text-align:center;"><p class="content">合格</p></td>
				<td style="height: 30px;text-align:center;"><p class="content"></p></td>
				<td style="height: 30px;text-align:center;"><p class="content">不合格</p></td>
				<td style="height: 30px;text-align:center;"><p class="content"></p></td>
				
			</tr>
			<tr>
				<td rowspan="2"><p class="content" style="text-align:center;">同行专家<br/>意 见</p></td>
				<td colspan="13" style="height: 36px;"><p class="content">专家一：<br/><br/></p></td>
			</tr>
			<tr>
				<td colspan="13" style="height: 36px;"><p class="content">专家二：<br/><br/></p></td>
			</tr>
			
			<tr>
				<td style="height:70px;"><p class="content" style="text-align:center;">校学科组<br/>意见及表<br/>决结果</p></td>
				<td colspan="5" style="text-align:center;"><p class="content">组 长:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;日<br/><br/>应到 人,实到 人,同意 人,反对 人,弃权 人。</p></td>
				<td colspan="2"><p class="content" style="text-align:center;">校评委会意见及<br/>表决结果</p></td>
				<td colspan="6" style="text-align:center;"><p class="content">主任委员：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;月&nbsp;&nbsp;日<br/><br/>应到 人,实到 人,同意 人,反对 人,弃权 人。</p></td>
			</tr>
			<tr>
				<td style="height:60px;"><p class="content" style="text-align:center;">省学科组<br/>意见及表<br/>决结果</p></td>
				<td colspan="13"><p class="content" style="text-align:left;line-height:1.0em;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;组 长： 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日<br/><br/>应到&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，实到&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，同意&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，反对&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，弃权&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人。</p>
				</td>
			</tr>
			<tr>
				<td rowspan="3" colspan="3" style="height:60px;">
					<p class="content" style="text-align:center;">教育教学质量<br/>总体评价</p>
				</td>
				<td style="height: 30px;" colspan="2"></td>
				<td><p class="content" style="text-align:center;">优秀</p></td>
				<td><p class="content" style="text-align:center;">良好</p></td>
				<td><p class="content" style="text-align:center;">合格</p></td>
				<td><p class="content" style="text-align:center;">不合格</p></td>
				<td rowspan="3"><p class="content" style="text-align:center;">省评委<br/>会意见</p></td>
				<td colspan="13" rowspan="3"><p class="content" style="text-align:left;line-height:1.0em;">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主任委员： 
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日<br/><br/>应到&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，实到&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，同意&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，反对&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人，弃权&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;人。</p></td>
			</tr>
			<tr>
				<td style="height: 30px;" colspan="2">
					<p class="content" style="text-align:center;">学生评价</p>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				
			</tr>
			<tr>
				<td style="height: 30px;" colspan="2">
					<p class="content" style="text-align:center;">同行评价</p>
				</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				
			</tr>
		</table>
		<script type="text/javascript">
			alert('预览时请选择横向，取消页眉，页脚，页码');
			window.print();   	
		</script>
	</body>
</html>