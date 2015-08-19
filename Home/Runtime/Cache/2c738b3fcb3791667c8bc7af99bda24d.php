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
<script src="__PUBLIC__/Js/Info/info2.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/three.js"></script>

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
		
		<form action="__URL__/commit_info2" method="post">
			<br/>
			<p class="title">基本信息填写</p>
					<?php if($list[0]['xcszy'] == null): ?><button class="btn"  type="submit" id="save2">保存</button>
					<?php else: ?><button class="btn"  type="submit" id="save2">修改</button><?php endif; ?>
					<br/>
					<br/>
					<input type="button" onclick="window.location.href='__URL__/delete_info2/id/<?php echo ($list[0]['id']); ?>'" class="btn" value="删除"/>
			<p class="name">参与党派:<select class="st<?php echo ($contl['hscjdp']); ?>" name="dp" id="dp">
					<?php if(is_array($dp)): $i = 0; $__LIST__ = $dp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dp): $mod = ($i % 2 );++$i; echo ($dp); endforeach; endif; else: echo "" ;endif; ?>
				</select></p>
			<p class="name">何时参加党派：
				<select class="st<?php echo ($contl['hscjdp']); ?>" name="hscjdpy" id="hscjdpy">
					<?php if(is_array($year)): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year): $mod = ($i % 2 );++$i; echo ($year); endforeach; endif; else: echo "" ;endif; ?>
				</select>年
				<select class="st<?php echo ($contl['hscjdp']); ?>" name="hscjdpm" id="hscjdpm">
					<?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month): $mod = ($i % 2 );++$i; echo ($month); endforeach; endif; else: echo "" ;endif; ?>
				</select>月
			</p>
						<p class="name">健康状况：<select class="st<?php echo ($contl['jkzk']); ?>" name="jkzk" id="jkzk">
					<?php if(is_array($jkzk)): $i = 0; $__LIST__ = $jkzk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jkzk): $mod = ($i % 2 );++$i; echo ($jkzk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</p>

			<p class="name">现任专业技术职务:
				<br/>
				<input type="hidden" value="<?php echo ($xrjszwArr); ?>" id="hid-xrjszw"/>
					<span id="span-xrjszw">
					<select class="select-jszw" name="xrjszw[]" id="xrjszw1" >
					<?php if(is_array($xrjszw)): $i = 0; $__LIST__ = $xrjszw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xrjs): $mod = ($i % 2 );++$i; echo ($xrjs); endforeach; endif; else: echo "" ;endif; ?>
					</select>
					任职务时间:
						<select name="xrzwsjy[]" id="xrzwsjy1">
							<?php if(is_array($year1)): $i = 0; $__LIST__ = $year1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year1): $mod = ($i % 2 );++$i; echo ($year1); endforeach; endif; else: echo "" ;endif; ?>
						</select>年
						<select name="xrzwsjm[]"  id="xrzwsjm1">
							<?php if(is_array($month1)): $i = 0; $__LIST__ = $month1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month1): $mod = ($i % 2 );++$i; echo ($month1); endforeach; endif; else: echo "" ;endif; ?>
						</select>月

					</span>
				
					<?php if(is_array($xrjszwArr)): $i = 0; $__LIST__ = $xrjszwArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xrzw): $mod = ($i % 2 );++$i;?><p class="name"><select class="select-jszw st<?php echo ($contl['zwhsj']); ?>" name="xrjszw[]" >
						<?php echo ($xrzw["xrjszw"]); ?>
					</select>
					任职务时间:
					<select name="xrzwsjy[]" class="st<?php echo ($contl['zwhsj']); ?>">
						<?php if(is_array($xrzw['jszwsjy'])): $i = 0; $__LIST__ = $xrzw['jszwsjy'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zwsjy): $mod = ($i % 2 );++$i; echo ($zwsjy); endforeach; endif; else: echo "" ;endif; ?>
					</select>年
					<select name="xrzwsjm[]" class="st<?php echo ($contl['zwhsj']); ?>">
						<?php if(is_array($xrzw['jszwsjm'])): $i = 0; $__LIST__ = $xrzw['jszwsjm'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zwsjm): $mod = ($i % 2 );++$i; echo ($zwsjm); endforeach; endif; else: echo "" ;endif; ?>
					</select>月
					<button type="button" class="btn-qx1 st<?php echo ($contl['zwhsj']); ?>" >取消</button></p><?php endforeach; endif; else: echo "" ;endif; ?>
			</p>
			<p class="name">
				<button id="zj" class="st<?php echo ($contl['zwhsj']); ?>"" type="button">增加</button><b class="b-tishi" id="b-xrjszw"></b>
			</P>
			<p class="name"><span id="span_zj">
			</span></p>
			<p class="name">高校教龄:<select name="xl" class="st<?php echo ($contl['xl']); ?>"" id="xl">
			<?php if(is_array($xl)): $i = 0; $__LIST__ = $xl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xl): $mod = ($i % 2 );++$i; echo ($xl); endforeach; endif; else: echo "" ;endif; ?>
			</select>年
			</p>
			
			<p class="name">参加工作时间:
				<select name="cjgzsjy" class="st<?php echo ($contl['cjgzsj']); ?>" id="cjgzsjy">
					<?php if(is_array($year2)): $i = 0; $__LIST__ = $year2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$year2): $mod = ($i % 2 );++$i; echo ($year2); endforeach; endif; else: echo "" ;endif; ?>
				</select>年
				<select name="cjgzsjm" class="st<?php echo ($contl['cjgzsj']); ?>" id="cjgzsjm">
					<?php if(is_array($month2)): $i = 0; $__LIST__ = $month2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$month2): $mod = ($i % 2 );++$i; echo ($month2); endforeach; endif; else: echo "" ;endif; ?>
				</select>月
			</p>
			<p class="name">
			现任专业技术职务任职资格评委会和审批机关：<br/>
                <select name="pwhsp" class="st<?php echo ($contl['pwhsp']); ?>">
                    <?php if(is_array($pwhsp)): $i = 0; $__LIST__ = $pwhsp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pwhsp): $mod = ($i % 2 );++$i; echo ($pwhsp); endforeach; endif; else: echo "" ;endif; ?>
                </select>

                <input type="text" name="sp" class="st<?php echo ($contl['pwhsp']); ?>" value="<?php echo ($list[0]['pwhsp']); ?>">
			<b class="b-tishi" id="b-pwhsp"></b>
			</p>
			<p class="name zyzc">现从事专业:
                <input class="st<?php echo ($contl['zyzc']); ?> zyzc" type="text" name="xcszy[]">
		   &nbsp;专长:<input class="st<?php echo ($contl['zyzc']); ?> zyzc" type="text" name="xcszc[]">
                <button type="button" class="btn-qx2" >取消</button>
            </p>

            <input type="hidden" name="hidden-zyzc" value="<?php if($zyzc != null): ?>1<?php else: ?>0<?php endif; ?>">
            <?php if(is_array($zyzc)): $i = 0; $__LIST__ = $zyzc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zyzc): $mod = ($i % 2 );++$i;?><p class="name">现从事专业:
                    <input class="st<?php echo ($contl['zyzc']); ?> zyzc" type="text" name="xcszy[]" value="<?php echo ($zyzc["zy"]); ?>">
                    &nbsp;专长:<input class="st<?php echo ($contl['zyzc']); ?> zyzc" type="text" name="xcszc[]" value="<?php echo ($zyzc["zc"]); ?>">
                    <button type="button" class="btn-qx2 st<?php echo ($contl['zyzc']); ?>" >取消</button>
                </p><?php endforeach; endif; else: echo "" ;endif; ?>
             <span id="span-zyzc"></span>
            <p class="name"><button id="red1" type="button" class="st<?php echo ($contl['zyzc']); ?>">增加</button></p>
            <b class="b-tishi" id="b-zyzc"></b>
			<input type="hidden" value="<?php echo ($list[0]['xkz']); ?>" id="hidden-xkz"/>
			<p class="name">校内学科组:<select name="xnxkz" class="st<?php echo ($contl['xkz']); ?>">
				<?php if(is_array($xnxkz)): $i = 0; $__LIST__ = $xnxkz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xnxkz): $mod = ($i % 2 );++$i; echo ($xnxkz); endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</p>
			<p class="name">校外学科组:<select name="xwxkz" class="st<?php echo ($contl['xkz']); ?>">
				<?php if(is_array($xwxkz)): $i = 0; $__LIST__ = $xwxkz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xwxkz): $mod = ($i % 2 );++$i; echo ($xwxkz); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <input type="hidden" name="hid-xkz" value="<?php echo ($npzw); ?>">
			</p>	
			<p class="name">学科:<select class="st<?php echo ($contl['xk']); ?>" name="yjxk" id="yjxk">
				<?php if(is_array($yjxk)): $i = 0; $__LIST__ = $yjxk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$yjxk): $mod = ($i % 2 );++$i; echo ($yjxk); endforeach; endif; else: echo "" ;endif; ?>
			</select></p>

			<p class="name ttzw">参加何学术团体:<input type="text" class="ttzw" name="cjxstt[]">
			任何职务:<input class="ttzw" type="text"  name="rhzw[]">
            <button type="button" class="btn-qx3">取消</button></p>
            <input type="hidden" name="hid-ttzw" value="<?php echo ($ttzw); ?>" >
            <?php if(is_array($ttzw)): $i = 0; $__LIST__ = $ttzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ttzw): $mod = ($i % 2 );++$i;?><p class="name">参加何学术团体:
                    <input class="st<?php echo ($contl['xsttzw']); ?> ttzw" type="text" value="<?php echo ($ttzw["tt"]); ?>" name="cjxstt[]">
                    任何职务:<input class="st<?php echo ($contl['xsttzw']); ?> ttzw" type="text" value="<?php echo ($ttzw["zw"]); ?>" name="rhzw[]">
                    <button type="button" class="btn-qx3 st<?php echo ($contl['xsttzw']); ?>">取消</button></p><?php endforeach; endif; else: echo "" ;endif; ?>
            <span id="span-ttzw"></span>
            <p class="name"><button class="st<?php echo ($contl['xsttzw']); ?>" type="button" id="red2">增加</button>
                <b class="b-tishi" id="b-ttzw"></b></p>

           <input type="hidden" value="<?php echo ($list[0]['drdzzw']); ?>" name="hid-zw">
            <p class="name dzzw">担(兼)任党政职务:<input type="text" class="st<?php echo ($contl['dzzw']); ?>" name="drdzzw[]"></p>
            <?php if(is_array($dzzw)): $i = 0; $__LIST__ = $dzzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dzzw): $mod = ($i % 2 );++$i;?><p class="name">担(兼)任党政职务:<input type="text" class="st<?php echo ($contl['dzzw']); ?>" name="drdzzw[]" value="<?php echo ($dzzw); ?>"></p><?php endforeach; endif; else: echo "" ;endif; ?>
            <span id="span-dz"></span>
            <p class="name"><button class="st<?php echo ($contl['dzzw']); ?>" type="button" id="red3">增加</button></p>

            <input type="hidden" value="<?php echo ($list[0]['shjz']); ?>" name="hid-jz">
            <p class="name shjz">社会兼职:<input type="text" class="st<?php echo ($contl['shjz']); ?>"  name="shjz[]"></p>
			<?php if(is_array($shjz)): $i = 0; $__LIST__ = $shjz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shjz): $mod = ($i % 2 );++$i;?><p class="name">社会兼职:<input type="text" class="st<?php echo ($contl['shjz']); ?>" name="shjz[]" value="<?php echo ($shjz); ?>"></p><?php endforeach; endif; else: echo "" ;endif; ?>
            <span id="span-jz"></span>
            <p class="name"><button class="st<?php echo ($contl['shjz']); ?>" type="button" id="red4">增加</button></p>
            <div class="daohang">
						<input type="button" onclick="window.location.href='__URL__/info1'" class="btn" value="上一页">
						<?php $__FOR_START_3281__=1;$__FOR_END_3281__=17;for($i=$__FOR_START_3281__;$i < $__FOR_END_3281__;$i+=1){ ?><input type="button" onclick="window.location.href='__URL__/info<?php echo ($i); ?>'" class="btn" value="<?php echo ($i); ?>"><?php } ?>
						<input type="button" onclick="window.location.href='__URL__/info3'" class="btn" value="下一页">
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