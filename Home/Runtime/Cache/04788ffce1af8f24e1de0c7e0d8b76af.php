<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
		<link rel="stylesheet" href="__PUBLIC__/Css/printpdf.css" media="print" />
		<script src="__PUBLIC__/Js/jquery1_x.js" type="text/javascript"></script>
		<script src="__PUBLIC__/Js/jquery.jqprint-0.3.js" type="text/javascript"></script>
		<style type="text/css">
			
		</style>
	</head>
	<body id="print-body">
		<p style="font-size:2.2em;margin-top:5cm;text-align:center;letter-spacing: -0.02em;font-weight:900;">高等学校教师职务任职资格申报表</p>
		<table align="center" style="margin-top:9em;">
			<tr>
				<td style="font-size:1.4em;text-align:right;letter-spacing: -0.02em;">学&nbsp; 校&nbsp; 名&nbsp; 称：&nbsp;&nbsp;</td>
				<td style="width:5cm;font-size:1.3em;text-align:center;border-bottom: 1px solid #000;">成都信息工程学院</td>
			</tr>
			<tr style="height:3em;">
				<td></td>
			</tr>
			<tr>
				<td style="font-size:1.4em;text-align:right;letter-spacing: -0.03em;">教&nbsp; 师&nbsp; 姓&nbsp; 名：&nbsp;&nbsp;</td>
				<td style="width:5cm;font-size:1.3em;text-align:center;border-bottom: 1px solid #000;"><?php echo ($userinfo['0']['name']); ?></td>
			</tr>
			<tr style="height:3em;">
				<td></td>
			</tr>
			<tr>
				<td style="font-size:1.4em;text-align:right;letter-spacing: -0.03em;">从事学科（专业）：&nbsp;&nbsp;</td>
				<td style="width:5cm;font-size:1.3em;text-align:center;border-bottom: 1px solid #000;">
					<?php echo ($info2['0']['xk']); ?>
				</td>
			</tr>
			<tr style="height:3em;">
				<td></td>
			</tr>
			<tr>
				<td style="font-size:1.4em;text-align:right;letter-spacing: -0.03em;">现任专业技术职务：&nbsp;&nbsp;</td>
				<td style="width:5cm;font-size:1.3em;text-align:center;border-bottom: 1px solid #000;">
					<?php echo ($zyinfo['0']); ?>
				</td>
			</tr>
			<tr style="height:3em;">
				<td></td>
			</tr>
			<tr>
				<td style="font-size:1.4em;text-align:right;letter-spacing: -0.03em;">拟评审任职资格：&nbsp;&nbsp;</td>
				<td style="width:5cm;font-size:1.3em;text-align:center;border-bottom: 1px solid #000;"><?php echo ($userinfo['0']['npzw']); ?></td>
			</tr>
		</table>
		<p style="margin:8em 0em 0em 0em;font-size:1.3em;text-align:center;letter-spacing: -0.03em;">填表时间：<?php echo ($data['0']); ?> 年 <?php echo ($data['1']); ?> 月 <?php echo ($data['2']); ?> 日</p>
		
		<p style="font-size:1.3em;text-align:center;letter-spacing: -0.03em;">四川省教育厅制</p>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<table width="740px;" cellpadding="2" cellspacing="0" border="1" align="center">
			<tr>
				<td  style="text-align:center;height:50px;" colspan="2" >姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</td >
				<td  style="text-align:center;width:75px;"><?php echo ($userinfo['0']['name']); ?></td >
				<td  style="width:3.0cm;text-align:center;">性&nbsp;&nbsp;&nbsp;&nbsp;别</td >
				<td  style="text-align:center;width75px;"><?php echo ($userinfo['0']['sex']); ?></td >
				<td  style="text-align:center;width:75px;">出生<br/>年月</td >
				<td  style="text-align:center;width:75px;"><?php echo ($userinfo['0']['csny']); ?></td >
				<td  style="text-align:center;width:3.0cm;" rowspan="4" ><img style="width:3.5cm" src="<?php echo ($userinfo['0']['zplj']); ?>"/><br/></td  >
			</tr>
			<tr>
				<td style="text-align:center;height:50px;" colspan="2">民&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族</td  class="td class="td-a"-a">
				<td style="text-align:center;"><?php echo ($userinfo['0']['mz']); ?></td >
				<td style="text-align:center;">籍&nbsp;&nbsp;&nbsp;&nbsp;贯</td >
				<td style="text-align:center;"><?php echo ($userinfo['0']['jg']); ?></td >
				<td style="text-align:center;">健康<br/>状况</td >
				<td style="text-align:center;"><?php echo ($info2['0']['jkzk']); ?></td >
			</tr>
			<tr>
				<td style="text-align:center;height:50px;" colspan="2" ><span style="font-size:16px;">何&nbsp;时&nbsp;参&nbsp;加&nbsp;何<br/>党&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;派</td >
				<td style="text-align:center;"><?php echo ($info2['0']['hscjdp']); echo ($info2['0']['cjdp']); ?></td >
				<td style="text-align:center;">参加工作<br/>时间</td >
				<td style="text-align:center;" colspan="3"><?php echo ($info2['0']['cjgzsj']); ?></td >
			</tr>
			<tr>
				<td style="text-align:center;height:70px;" colspan="2"><span style="font-size:14px;">现任专业技术职<br/>务及任职时间</span></td >
				<td style="text-align:center;" colspan="1">
					<span style="font-size:14px;"><?php echo ($info2['0']['xrjszw']); ?></span><br/>
				</td >
				<td style="text-align:center;"><span style="font-size:12px;">现任专业技术职务<br/>任职资格评委会和<br/>审批机关</span></td >
				<td style="text-align:center;" colspan="3"><?php echo ($info2['0']['pwhsp']); ?></td >
			</tr>
			<tr>
				<td style="text-align:center;height:50px;"  colspan="2">高&nbsp;&nbsp;校&nbsp;&nbsp;教&nbsp;&nbsp;龄</td >
				<td style="text-align:center;height:50px;"><?php echo ($info2['0']['xl']); ?></td >
				<td style="text-align:center;height:50px;" colspan="2">身份证号码</td >
				<td style="text-align:center;height:50px;" colspan="3"><?php echo ($userinfo['0']['sfzh']); ?></td >
			</tr>
			<tr>
				<td style="text-align:center;width:40px;" rowspan="2"><span style="line-height:1.5;">最<br/>后<br/>学<br/>历</span></td >
				<td style="text-align:center;height:60px;">大&nbsp;学</td >
				<td style="text-align:left;" colspan="6">
					&nbsp;&nbsp;<?php echo ($yjsxl_style['0']); ?>从 <?php echo ($bkxltime['kssjyear']); ?> 年 <?php echo ($bkxltime['kssjmonth']); ?> 月 至<?php echo ($bkxltime['jssjyear']); ?> 年 <?php echo ($bkxltime['jssjmonth']); ?> 月  毕业于 <?php echo ($bkxl['hd']); ?> <?php echo ($bkxl['bm']); echo ($bkxl['zy']); ?> (修业<?php echo ($bkxl['xynx']); ?>年)<?php echo ($yjsxl_style['1']); ?>

				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:60px;">研究生</td >
				<td style="text-align:left;" colspan="6">
					<?php if(is_array($yjsxls)): $i = 0; $__LIST__ = $yjsxls;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yjsxls): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;<?php echo ($yjsxl_style['0']); ?>从  <?php echo ($yjsxls['kssjyear']); ?>年 <?php echo ($yjsxls['kssjmonth']); ?> 月 至 <?php echo ($yjsxls['jssjyear']); ?> 年 <?php echo ($yjsxls['jssjmonth']); ?> 月  毕业于 <?php echo ($bkxl['hd']); ?> <?php echo ($yjsxls['bm']); ?> <?php echo ($yjsxls['zy']); ?> (修业<?php echo ($yjsxls['xynx']); ?>年)<?php echo ($yjsxl_style['1']); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:90px;" colspan="2">何时、何校获<br/>何&nbsp;种&nbsp;学&nbsp;位</td >
				<td style="text-align:left" colspan="6">
					<?php if(is_array($xw)): $i = 0; $__LIST__ = $xw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xw): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;<?php echo ($xwinfo_style['0']); echo ($xw["swsj"]); ?> 毕业于 <?php echo ($xw["byxx"]); ?> 获 <?php echo ($xw["sxzy"]); echo ($xw["xw"]); ?>学位 <?php echo ($xwinfo_style['1']); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:90px;" colspan="2">国内外留学、<br/>进修的学校、<br/>时间和内容</td >
				<td style="text-align:left" colspan="6">
					<?php if(is_array($gnwjxinfo)): $i = 0; $__LIST__ = $gnwjxinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gnwjxinfo): $mod = ($i % 2 );++$i; echo ($gnwjxinfo_style['0']); ?>&nbsp;&nbsp;<?php echo ($gnwjxinfo["kssj"]); ?> ~ <?php echo ($gnwjxinfo["jssj"]); ?> <?php echo ($gnwjxinfo["xx"]); ?> <?php echo ($gnwjxinfo_style['1']); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:90px;" colspan="2">现&nbsp;从&nbsp;事&nbsp;专&nbsp;业<br/>及&nbsp;&nbsp;&nbsp;专&nbsp;&nbsp;&nbsp;长</td >
				<td style="text-align:center" colspan="2">
					&nbsp;&nbsp;&nbsp;专业：<?php echo ($info2['0']['xcszy']); ?><br/>
					&nbsp;&nbsp;&nbsp;专长：<?php echo ($info2['0']['xcszc']); ?>
				</td >
				<td style="text-align:center;height:90px;" colspan="2">参&nbsp;加何学&nbsp;术<br/>团体、任何职<br/>务</td >
				<td  colspan="2" style="text-align:center">
					<?php if(is_array($xstizw)): $i = 0; $__LIST__ = $xstizw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xstizw): $mod = ($i % 2 );++$i;?>&nbsp;&nbsp;<?php echo ($xstizw_style['0']); echo ($xstizw); echo ($xstizw_style['1']); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:90px;" colspan="2">
						担(兼)任党政<br/>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</td >
				<td colspan="2" style="text-align:center">
					<?php echo ($info2['0']['drdzzw']); ?>
				</td >
				<td style="text-align:center;height:90px;" colspan="2">社&nbsp;&nbsp;会&nbsp;&nbsp;兼&nbsp;职</td >
				<td  colspan="2" style="text-align:center;">
					<?php echo ($info2['0']['shjz']); ?>
				</td >
			</tr>
			<tr>
				<td style="text-align:center;height:175px;" colspan="2"><br/>何时何地受何<br/>奖&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;励<br/><br/></td >
				<td  colspan="6" style="text-align:left;padding;0px;">
					<table>
						<?php if(is_array($ryinfo)): $i = 0; $__LIST__ = $ryinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ryinfo): $mod = ($i % 2 );++$i;?><tr>
							<td><?php echo ($jlcssopen); ?>&nbsp;<?php echo ($ryinfo["time"]); ?> <?php echo ($jlcssclose); ?></td>
							<td><?php echo ($jlcssopen); echo ($ryinfo["ch"]); echo ($jlcssclose); ?> </td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php if(is_array($hjinfo)): $i = 0; $__LIST__ = $hjinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hjinfo): $mod = ($i % 2 );++$i;?><tr>
								<td><?php echo ($jlcssopen); ?>&nbsp;<?php echo ($hjinfo["time"]); echo ($jlcssclose); ?></td>
								<td><?php echo ($jlcssopen); echo ($hjinfo["mcsy"]); ?> <?php echo ($jlcssclose); ?></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
				</td >
			</tr>
			<!-- <tr>
				<td style="text-align:center;height:90px;" colspan="2"><br/>何时何地受何<br/>处&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;分<br/><br/></td >
				<td  colspan="6" style="text-align:left">
					<?php if(is_array($file_cc_data)): $i = 0; $__LIST__ = $file_cc_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$file_cc_data): $mod = ($i % 2 );++$i;?>&nbsp;<?php echo ($file_cc_data); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
				</td >
			</tr> -->
		</table>
		<br/><br/><br/><br/><br/><br/><br/><br/>
		<table cellpadding="2" style="text-align:center" width="740px" class="tb" cellspacing="0" border="1" align=center>
		<tr>
			<td style="text-align:center;height:55px;" colspan="4">主&nbsp;&nbsp;&nbsp;&nbsp;要&nbsp;&nbsp;&nbsp;&nbsp;学&nbsp;&nbsp;&nbsp;&nbsp;历&nbsp;&nbsp;&nbsp;&nbsp;
			及&nbsp;&nbsp;&nbsp;&nbsp;社&nbsp;&nbsp;&nbsp;&nbsp;会&nbsp;&nbsp;&nbsp;&nbsp;经&nbsp;&nbsp;&nbsp;&nbsp;历<br/></td >
		</tr>
		<tr>
			<td style="text-align:center;height:53px;">自何年何月</td >
			<td style="text-align:center;height:53px;">至何年何月</td >
			<td style="text-align:center;height:53px;">在何地、何学校、何单位任职（或学习）</td >
			<td style="text-align:center;height:53px;">证&nbsp;明&nbsp;人</td >
		</tr>
		<?php if(is_array($xlinfo)): $i = 0; $__LIST__ = $xlinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xlinfo): $mod = ($i % 2 );++$i;?><tr>
			<td style="text-align:center;height:53px;"><?php echo ($xlinfo['kssj']); ?></td >
			<td style="text-align:center;height:53px;"><?php echo ($xlinfo['jssj']); ?></td >
			<td style="text-align:left;height:53px;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($xlinfo['hd']); ?> <?php echo ($xlinfo['bm']); ?> <?php echo ($xlinfo['zy']); ?> <?php echo ($xlinfo['rzxx']); ?></td >
			<td style="text-align:center;height:53px;"><?php echo ($xlinfo['zmr']); ?></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php if(is_array($xl_data_list)): $i = 0; $__LIST__ = $xl_data_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xl_data_list): $mod = ($i % 2 );++$i;?><tr>
			<td style="text-align:center;height:53px;"></td >
			<td style="text-align:center;height:53px;"></td >
			<td style="text-align:center;height:53px;"></td >
			<td style="text-align:center;height:53px;"></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	
	<?php if(is_array($brzj1)): $i = 0; $__LIST__ = $brzj1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brzj1): $mod = ($i % 2 );++$i;?><br/><br/><br/><br/><br/><br/><br/>
	<table cellpadding="2" width="740px" border="1" cellspacing="0" align="center">
		<tr>
			<td style="height:70px;text-align:center;">本&nbsp;&nbsp;人&nbsp;&nbsp;总&nbsp;&nbsp;结<br/>
（任现职以来的思想政治表现，教学、科学研究等工作的能力及履行职责的情况、成绩等）</td >
		</tr>
		<tr>
			<td style="height:23cm;text-align:left;padding-top:0cm;vertical-align: top;">
			&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($brzj1); ?>
				
			</td>
		</tr>
	</table><?php endforeach; endif; else: echo "" ;endif; ?>
	
	<?php if(is_array($brzj2)): $i = 0; $__LIST__ = $brzj2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$brzj2): $mod = ($i % 2 );++$i;?><br/><br/><br/><br/><br/><br/>
	<table cellpadding="2" width="740px" border="1" cellspacing="0" align="center">
		<tr>
			<td style="height:70px;text-align:center;">本&nbsp;&nbsp;人&nbsp;&nbsp;总&nbsp;&nbsp;结<br/>
（任现职以来的思想政治表现，教学、科学研究等工作的能力及履行职责的情况、成绩等）</td >
		</tr>
		<tr>
			<td style="height:24cm;text-align:left;vertical-align: top;">
				<p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($brzj2); ?></p>
				<p <?php echo ($style); ?> >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				______________ (本人签名)&nbsp;<br/>&nbsp;年&nbsp;&nbsp;月&nbsp;&nbsp;日&nbsp;</p>
			</td>
		</tr>
	</table><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php
 $user = M('User'); $user_data['id'] = $_SESSION['user_id']; $user_info_array = $user->where($user_data)->select(); if($user_info_array['0']['status'] == 0 || $user_info_array['0']['status'] == 1){ $data['xzid'] = $_SESSION['user_id']; $data['qk'] = '有'; $xzwcgz = M('Xzwcgz'); $xzwcgzinfo = $xzwcgz->where($data)->select(); } if($user_info_array['0']['status'] == 2){ $cp_jxgz = M('cp_jxgz'); $cp_jxgzdata['uid'] = $_SESSION['user_id']; $cp_jxgzdata['jxgzqk'] = 1; $cp_jxgzinfo = $cp_jxgz->where($cp_jxgzdata)->select(); $xzwcgz = M('Xzwcgz'); for($i = 0 ;$i < count($cp_jxgzinfo) ; $i++){ $xzwcgztemp[] = $xzwcgz->where('id = '.$cp_jxgzinfo["$i"]['cid'])->select(); } for($i = 0 ; $i < count($xzwcgztemp) ; $i++){ $xzwcgzinfo[] = $xzwcgztemp["$i"]['0']; } } $rktitle = '<br/><br/><br/><br/><br/><br/><table cellpadding="2" cellspacing="0" border="1" align=center width="740px"><tr><td style="text-align:center;height:60px" colspan="7">任  现  职  以  来  完  成  教  学  工  作  情 况<br/></td ></tr><tr><td style="height:53px;text-align:center;width:120px;">自何年何月</td ><td style="height:53px;text-align:center;width:120px;">至何年何月</td ><td style="height:53px;text-align:center;">讲授课程名称及<br/>其它教学任务</td ><td style="height:53px;text-align:center;width:60px;">学生<br/>人数</td ><td style="height:53px;text-align:center;width:60px;">周学<br/>时数</td ><td style="height:53px;text-align:center;width:60px;">总学<br/>时数</td ><td style="height:53px;text-align:center;width:40px">备 注</td ></tr>'; $rkend = '<tr><td style="height:53px;text-align:center;" colspan="2">合计</td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ></tr></table>'; $rkkong = '<tr><td style="height:53px;text-align:center;"></td><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ><td style="height:53px;text-align:center;"></td ></tr>'; echo $rkkong; if(count($xzwcgzinfo) < 16){ echo $rktitle; for($i = 0 ; $i < count($xzwcgzinfo) ; $i++){ echo '<tr>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['kssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['jssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['mcrw'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['xsrs'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zhxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['bz'].'</td>'; echo '</tr>'; } for($j = 0 ;$j < 15 -count($xzwcgzinfo) ; $j++){ echo $rkkong; } echo $rkend.'<br/>'; } if(count($xzwcgzinfo) >= 16){ for($i = 0 ;$i < count($xzwcgzinfo) ;$i++){ if($i == 0){ echo '<br/>'.$rktitle; echo '<tr>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['kssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['jssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['mcrw'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['xsrs'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zhxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['bz'].'</td>'; echo '</tr>'; } if($i == 16 || $i == 32 || $i == 48 || $i == 64){ echo '<br/>'.$rktitle; echo '<tr>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['kssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['jssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['mcrw'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['xsrs'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zhxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['bz'].'</td>'; echo '</tr>'; } if($i % 16 != 0){ echo '<tr>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['kssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['jssj'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['mcrw'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['xsrs'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zhxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['zxss'].'</td>'; echo '<td style="height:53px;text-align:center;font-size:12px;">'.$xzwcgzinfo["$i"]['bz'].'</td>'; echo '</tr>'; } if( $i == 15 || $i == 31 || $i == 47 || $i == 63){ echo '</table>'; } } if(count($xzwcgzinfo) % 16 == 0){ echo '<br/>'.$rktitle; for($j = 0 ;$j < 15 ; $j++){ echo $rkkong; } echo $rkend; }else{ for($j = 0 ;$j < 15 - (count($xzwcgzinfo) % 16) ; $j++){ echo $rkkong; } echo $rkend; } } ?>
	<br/><br/><br/><br/><br/><br/>
	<table border="1" align="center" width="740px" cellspacing="0">
		<tr>
			<td style="width:50px;text-align:center;height:240px;"><br/>指<br/>导<br/>研<br/>究<br/>生<br/>情<br/>况<br/></td >
			<td style="text-align:left;vertical-align: top;">&nbsp;&nbsp;<?php echo ($info2['0']['zdyjs']); ?></td >
		</tr>
		<tr>
			<td style="width:50px;text-align:center;height:240px;"><br/>指<br/>导<br/>教<br/>师<br/>进<br/>修<br/>提<br/>高<br/>情<br/>况<br/></td >
			<td style="text-align:left;vertical-align: top;">&nbsp;&nbsp;<?php echo ($info2['0']['zdjstg']); ?></td >
		</tr>
		<tr>
			<td style="width:50px;text-align:center;height:240px;"><br/>对<br/>实<br/>验<br/>室<br/>建<br/>设<br/>的<br/>贡<br/>献<br/></td >
			<td style="text-align:left;vertical-align: top;">&nbsp;&nbsp;<?php echo ($info2['0']['sysgx']); ?></td >
		</tr>
		<tr>
			<td style="width:50px;text-align:center;height:120px;"><br/>外<br/>语<br/>程<br/>度<br/></td >
			<td style="text-align:left;">&nbsp;&nbsp;<?php echo ($info2['0']['wycd']); ?></td >
		</tr>
		<tr>
			<td style="width:50px;text-align:center;height:120px;"><br/>计<br/>算<br/>机<br/>应<br/>用<br/>水<br/>平<br/></td >
			<td style="text-align:left;">&nbsp;&nbsp;<?php echo ($info2['0']['jsjsp']); ?></td >
		</tr>
	</table>
	
	<?php
 $jczzlwtitle = '<br/><br/><table width="740px" border="1" align="center" cellspacing="0" style="text-align:center"><tr><td style="text-align:center;height:75px;"colspan="7">任现职以来发表的论（译）著、教科书、教学研究或<br/>在实验及其它科学技术工作方面的成果</td ></tr><tr><td style="width:240px;height:53px;">题           目</td ><td style="width:300px;">何时在何刊物发表或出版社出版</td ><td style="width:200px;">本人承担的部分</td ></tr>'; $jczzlwend = '</table>'; $jczzlwkong = '<tr><td style="width:200px;text-align:left;height:75px;"></td ><td style="width:200px;text-align:left;height:75px;"></td ><td style="width:200px;text-align:left;height:75px;"></td ></tr>'; $user = M('User'); $user_data['id'] = $_SESSION['user_id']; $user_info_array = $user->where($user_data)->select(); if($user_info_array['0']['status'] == 0 || $user_info_array['0']['status'] == 1){ $fblwl = M('Fblwl'); $fblwldata['fid'] = $_SESSION['user_id']; $fblwldata['qk'] = '有'; $fblwlinfo = $fblwl->where($fblwldata)->select(); $jc = M('Jc'); $jcdata['uid'] = $_SESSION['user_id']; $jcdata['qk'] = '有'; $jcinfo = $jc->where($jcdata)->select(); $zzl = M('Zzl'); $zzldata['zid'] = $_SESSION['user_id']; $zzldata['qk'] = '有'; $zzlinfo = $zzl->where($zzldata)->select(); } if($user_info_array['0']['status'] == 2){ $cp_fblw = M('cp_fblw'); $cp_fblwdata['uid'] = $_SESSION['user_id']; $cp_fblwdata['fblwqk'] = 1; $cp_fblwinfo = $cp_fblw->where($cp_fblwdata)->select(); $fblwl = M('Fblwl'); for($i = 0 ; $i < count($cp_fblwinfo) ; $i++){ $fblwltemp[] = $fblwl->where('qk = "有" and id = '.$cp_fblwinfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($fblwltemp) ; $i++){ $fblwlinfo[] = $fblwltemp["$i"]['0']; } $cp_jc = M('cp_jc'); $cp_jcdata['uid'] = $_SESSION['user_id']; $cp_jcdata['jcqk'] = 1; $cp_jcinfo = $cp_jc->where($cp_jcdata)->select(); $jc = M('Jc'); for($i = 0 ; $i < count($cp_jcinfo) ; $i++){ $jctemp[] = $jc->where('qk = "有" and id = '.$cp_jcinfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($jctemp) ; $i++){ $jcinfo[] = $jctemp["$i"]['0']; } $cp_zzl = M('cp_zzl'); $cp_zzldata['uid'] = $_SESSION['user_id']; $cp_zzldata['zzlqk'] = 1; $cp_zzlinfo = $cp_zzl->where($cp_zzldata)->select(); $zzl = M('Zzl'); for($i = 0 ; $i < count($cp_zzlinfo) ; $i++){ $zzltemp[] = $zzl->where('qk = "有" and id = '.$cp_zzlinfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($zzltemp) ; $i++){ $zzlinfo[] = $zzltemp["$i"]['0']; } } for($i = 0 ;$i < count($fblwlinfo) ; $i++){ if($i == 0){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$fblwlinfo["$i"]['title'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$fblwlinfo["$i"]['time'].$fblwlinfo["$i"]['jb'].$fblwlinfo["$i"]['slmc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$fblwlinfo["$i"]['pm'].'作者</td>'; echo '</tr>'; } if($i == 11 || $i == 22 || $i == 33 || $i == 44){ echo '<br/><br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$fblwlinfo["$i"]['title'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$fblwlinfo["$i"]['time'].$fblwlinfo["$i"]['jb'].$fblwlinfo["$i"]['slmc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$fblwlinfo["$i"]['pm'].'作者</td>'; echo '</tr>'; } if($i % 11 != 0){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$fblwlinfo["$i"]['title'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$fblwlinfo["$i"]['time'].$fblwlinfo["$i"]['jb'].$fblwlinfo["$i"]['slmc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$fblwlinfo["$i"]['pm'].'作者</td>'; echo '</tr>'; } if( $i == 10 || $i == 21 || $i == 32 || $i == 43){ echo '</table>'; if($i == 21){ echo '<br/>'; } } } $flag = 11 - (count($fblwlinfo) % 11); if(count($jcinfo) < $flag){ for($i = 0 ; $i < count($jcinfo) ;$i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$jcinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$jcinfo["$i"]['cbs'].$jcinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$jcinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } $jcflag = $flag - count($jcinfo); if($jcflag > count($zzlinfo)){ for($i = 0 ; $i < count($zzlinfo) ;$i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } for($i = 0 ; $i < 11 - (count($fblwlinfo) % 11 + count($jcinfo) + count($zzlinfo)); $i++){ echo $jczzlwkong; } echo '</table>'; }else{ for($i = 0 ; $i < count($jcflag) ;$i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } echo '</table>'; for($i = $jcflag ; $i < count($zzlinfo) - $jcflag ;$i++){ if($i == $jcflag){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if($i == 11 + jcflag || $i == 22 + jcflag || $i == 33 + jcflag || $i == 44 + jcflag){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if(($i - $jcflag) % 11 != 0){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if( $i == 10 + $jcflag || $i == 21 + $jcflag || $i == 32 + $jcflag || $i == 43 + $jcflag ){ echo '</table>'; } } for($i = 0 ;$i < 11 - (count($zzlinfo) - $jcflag) % 11 ;$i++){ echo $jczzlwkong; } echo '</table>'; } }else{ for($i = 0 ; $i < $flag ;$i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$jcinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$jcinfo["$i"]['cbs'].$jcinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$jcinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } echo '</table>'; for($i = $flag ; $i < count($jcinfo) ; $i++){ if($i == $flag){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$jcinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$jcinfo["$i"]['cbs'].$jcinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$jcinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if($i == $flag + 11 || $i == $flag + 22 || $i == $flag + 33 || $i == $flag + 44){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$jcinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$jcinfo["$i"]['cbs'].$jcinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$jcinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if(($i - $flag) % 11 != 0){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$jcinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$jcinfo["$i"]['cbs'].$jcinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$jcinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if($i == $flag + 10 || $i == $flag + 21 || $i == $flag + 32 || $i == $flag + 43){ echo '</table>'; } $jcflag = 11 - (count($jcinfo) - $flag) % 11; if($jcflag > count($zzlinfo)){ for($i = 0 ;$i < count($zzlinfo) ;$i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } for($i = 0 ;$i < $jcflag - count($zzlinfo) ;$i++){ echo $jczzlwkong; } echo '</table>'; }else{ for($i = 0 ;$i < $jcflag ; $i++){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } echo '</table>'; for($i = $jcflag ; $i < count($zzlinfo) ;$i++){ if($i == $jcflag){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if($i == 11 + $jcflag || $i == 22 + $jcflag || $i == 33 + $jcflag || $i == 44 + $jcflag){ echo '<br/><br/><br/><br/>'.$jczzlwtitle; echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if(($i - $jcflag) % 11 != 0){ echo '<tr>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:249px;">'.$zzlinfo["$i"]['mc'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;width:293px;">'.$zzlinfo["$i"]['cbs'].$zzlinfo["$i"]['cbsj'].'</td>'; echo '<td style="height:75px;text-align:left;font-size:12px;padding-left: 5px;">'.$zzlinfo["$i"]['cdbf'].'</td>'; echo '</tr>'; } if($i == 10 + $jcflag || $i == 21 + $jcflag || $i == 32 + $jcflag || $i == 43 + $jcflag){ echo '</table>'; } } for($i = 0 ;$i < 11 - (count($zzlinfo) - $jcflag) % 11 ;$i++){ echo $jczzlwkong; } echo '</table>'; } } } ?>
	
	<?php
 $kytitle = '<br/><br/><br/><br/><br/><br/><table width="740px" border="1" class="tb" align="center" cellspacing="0" style="text-align:center"><tr><td style="height:70px;text-align:center;" colspan="7">任  现  职  以  来  主  要  科  研  成  果  目  录</td ></tr><tr><td style="width:80px;height:53px;text-align:center;">时   间</td ><td style="width:240px;height:53px;text-align:center;">科  研  项  目</td ><td style="width:160px;height:53px;text-align:center;">本 人 承 担 任 务</td ><td style="width:160px;height:53px;text-align:center;">完 成 任 务 情 况</td ></tr>'; $kykong = '<tr><td style="width:200px;text-align:left;height:75px;"></td ><td style="width:200px;text-align:left;height:75px;"></td ><td style="width:200px;text-align:left;height:75px;"></td ><td style="width:200px;text-align:left;height:75px;"></td ></tr>'; $kyend = '</table>'; $user = M('User'); $user_data['id'] = $_SESSION['user_id']; $user_info_array = $user->where($user_data)->select(); if($user_info_array['0']['status'] == 0 || $user_info_array['0']['status'] == 1){ $kyxm = M('Kyxm'); $kyxmdata['kyid'] = $_SESSION['user_id']; $kyxmdata['qk'] = '有'; $kyxminfo = $kyxm->where($kyxmdata)->select(); $kyhj = M('Kyhj'); $kyhjdata['kjid'] = $_SESSION['user_id']; $kyhjdata['qk'] = '有'; $kyhjinfo = $kyhj->where($kyhjdata)->select(); $fmzl = M('Fmzl'); $fmzldata['fmid'] = $_SESSION['user_id']; $fmzldata['qk'] = '有'; $fmzlinfo = $fmzl->where($fmzldata)->select(); } if($user_info_array['0']['status'] == 2){ $cp_kyxm = M('cp_kyxm'); $cp_kyxmdata['uid'] = $_SESSION['user_id']; $cp_kyxmdata['kyxmqk'] = 1; $cp_kyxminfo = $cp_kyxm->where($cp_kyxmdata)->select(); $kyxm = M('Kyxm'); for($i = 0 ; $i < count($cp_kyxminfo) ; $i++){ $kyxmtemp[] = $kyxm->where('qk = "有" and id = '.$cp_kyxminfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($kyxmtemp) ; $i++){ $kyxminfo[] = $kyxmtemp["$i"]['0']; } $cp_kyhj = M('cp_kyhj'); $cp_kyhjdata['uid'] = $_SESSION['user_id']; $cp_kyhjdata['kyhjqk'] = 1; $cp_kyhjinfo = $cp_kyhj->where($cp_kyhjdata)->select(); $kyhj = M('Kyhj'); for($i = 0 ; $i < count($cp_kyhjinfo) ; $i++){ $kyhjtemp[] = $kyhj->where('qk = "有" and id = '.$cp_kyhjinfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($kyhjtemp) ; $i++){ $kyhjinfo[] = $kyhjtemp["$i"]['0']; } $cp_fmzl = M('cp_fmzl'); $cp_fmzldata['uid'] = $_SESSION['user_id']; $cp_fmzldata['fmzlqk'] = 1; $cp_fmzlinfo = $cp_fmzl->where($cp_fmzldata)->select(); $fmzl = M('Fmzl'); for($i = 0 ; $i < count($cp_fmzlinfo) ; $i++){ $fmzltemp[] = $fmzl->where('qk = "有" and id = '.$cp_fmzlinfo["$i"]['cid'])->select(); } for($i = 0 ;$i < count($fmzltemp) ; $i++){ $fmzlinfo[] = $fmzltemp["$i"]['0']; } } for($i = 0 ;$i < count($kyxminfo) ; $i ++){ if($i == 0){ echo $kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['qzsj'].'</td >'; if($kyxminfo["$i"]['bh'] != ''){ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'('.$kyxminfo["$i"]['bh'].')</td >'; }else{ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'</td >'; } echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['cdrw'].' '.$kyxminfo["$i"]['pm'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['wcqk'].'</td >'; echo '</tr>'; } if($i == 11 || $i == 22 || $i == 33 || $i == 44){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['qzsj'].'</td >'; if($kyxminfo["$i"]['bh'] != ''){ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'('.$kyxminfo["$i"]['bh'].')</td >'; }else{ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'</td >'; } echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['cdrw'].' '.$kyxminfo["$i"]['pm'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['wcqk'].'</td >'; echo '</tr>'; } if($i % 11 != 0){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['qzsj'].'</td >'; if($kyxminfo["$i"]['bh'] != ''){ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'('.$kyxminfo["$i"]['bh'].')</td >'; }else{ echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['kyxm'].'</td >'; } echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['cdrw'].' '.$kyxminfo["$i"]['pm'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyxminfo["$i"]['wcqk'].'</td >'; echo '</tr>'; } if($i == 10 || $i == 21 || $i == 32 || $i == 43){ echo '</table>'; } } $flag = 11 - count($kyxminfo) % 11; if($flag > count($kyhjinfo)){ for($i = 0 ; $i < count($kyhjinfo) ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['sj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['cg'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['jb'].' '.$kyhjinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['pm'].'</td >'; echo '</tr>'; } $zlflag = $flag - count($fmzlinfo); if($zlflag > count($fmzlinfo)){ for($i = 0 ;$i < count($fmzlinfo) ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } for($i = 0 ;$i < $flag - (count($kyhjinfo) + count($fmzlinfo)) ;$i++){ echo $kykong; } echo '</table>'; }else{ for($i = 0 ; $i < $zlflag ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } echo '</table>'; for($i = $zlflag ; $i < count($fmzlinfo) ;$i++){ if($i == $zlflag){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if($i == 11 + $zlflag || $i == 22 + $zlflag || $i == 33 + $zlflag || $i == 44 + $zlflag){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if(($i - $zlflag) % 11 != 0){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if($i == 10 + $zlflag || $i == 21 + $zlflag || $i == 32 + $zlflag || $i == 43 + $zlflag){ echo '</table>'; } } for($i = 0 ;$i < 11 - (count($fmzlinfo) - $zlflag) % 11 ; $i++ ){ echo $kykong; } echo '</table>'; } }else{ for($i = 0 ;$i < $flag ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['sj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['cg'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['jb'].' '.$kyhjinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['pm'].'</td >'; echo '</tr>'; } echo '</table>'; for($i = $flag ; $i < count($kyhjinfo) ; $i++){ if($i == $flag){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['sj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['cg'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['jb'].' '.$kyhjinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['pm'].'</td >'; echo '</tr>'; } if($i == $flag + 11 || $i == $flag + 22 || $i == $flag + 33 || $i == $flag + 44 ){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['sj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['cg'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['jb'].' '.$kyhjinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['pm'].'</td >'; echo '</tr>'; } if(($i - $flag) % 11 != 0){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['sj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['cg'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['jb'].' '.$kyhjinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$kyhjinfo["$i"]['pm'].'</td >'; echo '</tr>'; } if($i == $flag + 10 || $i == $flag + 21 || $i == $flag + 32 || $i == $flag + 43){ echo '</table>'; } } $zlflag = 11 - (count($kyhjinfo) - $flag) % 11; if($zlflag > count($fmzlinfo)){ for($i = 0 ; $i < count($fmzlinfo) ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } for($i = 0 ;$i < $zlflag - count($fmzlinfo) ; $i++){ echo kykong; } echo '</table>'; }else{ for($i = 0 ;$i <$zlflag ; $i++){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } echo '</table>'; for($i = $zlflag ; $i < count($fmzlinfo) ;$i++){ if($i == $zlflag){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if($i == 11 + $zlflag || $i == 22 + $zlflag || $i == 33 + $zlflag || $i == 44 + $zlflag){ echo '<br/>'.$kytitle; echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if(($i - $zlflag) % 11 != 0){ echo '<tr>'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['tgsj'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['mc'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['lx'].'</td >'; echo '<td style="width:80px;text-align:left;height:75px;font-size:12px;">&nbsp;&nbsp;&nbsp;'.$fmzlinfo["$i"]['zlh'].'</td >'; echo '</tr>'; } if($i == 10 + $zlflag || $i == 21 + $zlflag || $i == 32 + $zlflag || $i == 43 + $zlflag){ echo '</table>'; } } for($i = 0 ;$i < 11 - (count($fmzlinfo) - $zlflag) % 11 ; $i++){ echo kykong; } echo '</table>'; } } ?>
	<script type="text/javascript">
		alert('预览时请选择纵向，不要选择页眉，页脚，页码');
		window.print();
	</script>
	</body>
</html>