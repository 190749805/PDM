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
<script type="text/javascript" src="__PUBLIC__/Js/two.js"></script>
<script src="__PUBLIC__/Js/audit.js"></script>
<script src="__PUBLIC__/Js/reason.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/print.css" />
<style text="css/text">
.cl1{
	color:green;
}
.cl2{
	color:red;
}
.shenhe-head{
	margin-left: 20px;
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
	<h3 class="shenhe-head">*通过是<span style="color:green">绿色</span>，没有通过是<span style="color:red">红色</span></h3>
	<form action="__URL__/audit_info" method="POST">
	<button class="btn shenhe-head" id="tj">提交</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn" id='all-select'>全选(全部通过)</button>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn" id='all-unselect'>取消(全部重置为未审核)</button>
    <h3>现任职务:<?php echo ($bt[2]); ?></h3>
    <h3>时间:<?php echo ($bt[0]); ?>年<?php echo ($bt[1]); ?>月</h3>
	<br/><br/><br/>
	<input type="hidden" name="hidden" value="<?php echo ($info1[0]['id']); ?>">
    <center>
	<table class="tb" width="740px" cellpadding="2" cellspacing="0" border="1" align="center">
	<tbody>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_name']); ?>" colspan="2" style="height:35px;" ><strong>姓&nbsp;&nbsp;名</strong>
                <select id="ckb[]" content="user*<?php echo ($info1[0]['id']); ?>" name="name">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($name)): $i = 0; $__LIST__ = $name;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vname): $mod = ($i % 2 );++$i; echo ($vname); endforeach; endif; else: echo "" ;endif; ?>
			</select>
          <span id="span_name"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_name']); ?>" ><?php echo ($info1[0]['name']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_sex']); ?>" ><strong>性&nbsp;&nbsp;别</strong>
                <select  content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="sex">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($sex)): $i = 0; $__LIST__ = $sex;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsex): $mod = ($i % 2 );++$i; echo ($vsex); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_sex"></span></td ></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_sex']); ?>"><?php echo ($info1[0]['sex']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_csny']); ?>"><strong>出生年月</strong>
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="csny">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($csny)): $i = 0; $__LIST__ = $csny;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vcsny): $mod = ($i % 2 );++$i; echo ($vcsny); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_csny"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_csny']); ?>"><?php echo ($info1[0]['csny']); ?></td >
			<td class="td-a"  rowspan="5" style="width:2.6cm;height:3.5cm;">
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="zplj">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zplj)): $i = 0; $__LIST__ = $zplj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzplj): $mod = ($i % 2 );++$i; echo ($vzplj); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_zplj"></span>
			<img style="width:2.6cm;height:3.5cm;" src="<?php echo ($info1[0]['zplj']); ?>"></img><br/></td  >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_mz']); ?>"  colspan="2"><strong>民族</strong>
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="mz">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($mz)): $i = 0; $__LIST__ = $mz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vmz): $mod = ($i % 2 );++$i; echo ($vmz); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_mz"></span></td>
			<td class="td-a cl<?php echo ($info1[0]['cp_mz']); ?>" ><?php echo ($info1[0]['mz']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_jg']); ?>"><strong>籍贯</strong>
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="jg">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($jg)): $i = 0; $__LIST__ = $jg;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjg): $mod = ($i % 2 );++$i; echo ($vjg); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jg"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_jg']); ?>"><?php echo ($info1[0]['jg_pro']); ?><br/><?php echo ($info1[0]['jg_city']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_jkzk']); ?>"><strong>健康状况</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="jkzk">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($jkzk)): $i = 0; $__LIST__ = $jkzk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjkzk): $mod = ($i % 2 );++$i; echo ($vjkzk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jkzk"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_jkzk']); ?>"><?php echo ($info2[0]['jkzk']); ?></td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_hscjdp']); ?>" colspan="2"><strong>何时参加何<br/>党&nbsp;&nbsp;&nbsp;派</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="hscjdp">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($hscjdp)): $i = 0; $__LIST__ = $hscjdp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vhscjdp): $mod = ($i % 2 );++$i; echo ($vhscjdp); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_hscjdp"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_hscjdp']); ?>"><?php echo ($info2[0]['hscjdp']); ?><br/><?php echo ($info2[0]['cjdp']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_pwhsp']); ?>"><strong>现任专业技术职务<br/>任职资格评委会和<br/>审批机关</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="pwhsp">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($pwhsp)): $i = 0; $__LIST__ = $pwhsp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vpwhsp): $mod = ($i % 2 );++$i; echo ($vpwhsp); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_pwhsp"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_pwhsp']); ?>" colspan="3"><?php echo ($info2[0]['pwhsp']); ?></td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_zwhsj']); ?>" colspan="2"><strong>现职务及任现<br/>职务时间</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="zwhsj">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zwhsj)): $i = 0; $__LIST__ = $zwhsj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzwhsj): $mod = ($i % 2 );++$i; echo ($vzwhsj); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_zwhsj"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_zwhsj']); ?>" colspan="1"><?php echo ($info2[0]['xrjszw']); ?><br/><?php echo ($info2[0]['xrzwsj']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_xl']); ?>"><strong>高校教龄</strong>
                <select content="info2*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="xl">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($xl)): $i = 0; $__LIST__ = $xl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxl): $mod = ($i % 2 );++$i; echo ($vxl); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                </select>
                <span id="span_xl"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_xl']); ?>" ><?php echo ($info2[0]['xl']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_npzw']); ?>"><strong>拟聘职务</strong>
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="npzw">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($npzw)): $i = 0; $__LIST__ = $npzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vnpzw): $mod = ($i % 2 );++$i; echo ($vnpzw); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_npzw"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_npzw']); ?>" ><?php echo ($info1[0]['npzw']); ?></td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_cjgzsj']); ?>" colspan="2"><strong>参加工作<br/>时&nbsp;&nbsp;&nbsp;&nbsp;间</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="cjgzsj">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($cjgzsj)): $i = 0; $__LIST__ = $cjgzsj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vcjgzsj): $mod = ($i % 2 );++$i; echo ($vcjgzsj); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_cjgzsj"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_cjgzsj']); ?>"><?php echo ($info2[0]['cjgzsj']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_sfzh']); ?>"><strong>身份证号码</strong>
                <select content="user*<?php echo ($info1[0]['id']); ?>" id="ckb[]" name="sfzh">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($sfzh)): $i = 0; $__LIST__ = $sfzh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsfzh): $mod = ($i % 2 );++$i; echo ($vsfzh); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_sfzh"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_sfzh']); ?>" colspan="3"><?php echo ($info1[0]['sfzh']); ?>&nbsp;</td >
		</tr>
		
		<tr>
			<td class="td-a" colspan="2"><br/><strong>何时、何校获<br/>何种学位<br/><br/></td >
			<td class="td-a" colspan="6">
			<?php if(is_array($info4)): $i = 0; $__LIST__ = $info4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xw): $mod = ($i % 2 );++$i;?><p class="cl<?php echo ($xw["xwqk"]); ?>"><?php echo ($xw["kssj"]); ?>至<?php echo ($xw["swsj"]); ?>获<?php echo ($xw["byxx"]); echo ($xw["xwlx"]); echo ($xw["xw"]); ?>学位
                    <select content="xw*<?php echo ($xw["id"]); ?>" id="ckb[]" name="xw<?php echo ($xw["id"]); ?>">
					<?php if(is_array($list4)): $i = 0; $__LIST__ = $list4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($xw['cp_xwqk'])): $i = 0; $__LIST__ = $xw['cp_xwqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxwqk): $mod = ($i % 2 );++$i; echo ($vxwqk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</p>
                <span id="span_xw<?php echo ($xw["id"]); ?>"></span><?php endforeach; endif; else: echo "" ;endif; ?>
			&nbsp;</td >
		</tr>
		<tr>
			<td class="td-a" colspan="2"><strong>国内外留学、<br/>进修的学校、<br/>时间和内容</strong></td>
			<td class="td-a" colspan="6">
			<?php if(is_array($info5)): $i = 0; $__LIST__ = $info5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gnw): $mod = ($i % 2 );++$i;?><p class="cl<?php echo ($gnw["jxqk"]); ?>"><?php echo ($gnw["kssj"]); ?>至<?php echo ($gnw["jssj"]); ?> <?php echo ($gnw["xx"]); ?> <?php echo ($gnw["lb"]); ?>
				<select content="gnw*<?php echo ($gnw["id"]); ?>" name="gnw<?php echo ($gnw["id"]); ?>" id="ckb[]">
				<?php if(is_array($list5)): $i = 0; $__LIST__ = $list5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($gnw['cp_jxqk'])): $i = 0; $__LIST__ = $gnw['cp_jxqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjxqk): $mod = ($i % 2 );++$i; echo ($vjxqk); endforeach; endif; else: echo "" ;endif; ?>
				</select></p>
                <span id="span_gnw<?php echo ($gnw["id"]); ?>"></span><?php endforeach; endif; else: echo "" ;endif; ?>
			&nbsp;</td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_zyzc']); ?>" colspan="2"><strong>现从事专业<br/>及&nbsp;专&nbsp;长</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="zyzc">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zyzc)): $i = 0; $__LIST__ = $zyzc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzyzc): $mod = ($i % 2 );++$i; echo ($vzyzc); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_zyzc"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_zyzc']); ?>" colspan="2">专业:<?php echo ($info2[0]['xcszy']); ?><br/>专长:<?php echo ($info2[0]['xcszc']); ?></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_xsttzw']); ?>" colspan="2"><strong>参加何学术团<br/>体、任何职务</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="xsttzw">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($xsttzw)): $i = 0; $__LIST__ = $xsttzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxsttzw): $mod = ($i % 2 );++$i; echo ($vxsttzw); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_xsttzw"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_xsttzw']); ?>" colspan="2"><?php echo ($info2[0]['cjxstt']); ?><br/><?php echo ($info2[0]['rhzw']); ?>&nbsp;</td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_dzzw']); ?>" colspan="2">
					<strong>担(兼)任党政<br/>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="dzzw">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($dzzw)): $i = 0; $__LIST__ = $dzzw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vdzzw): $mod = ($i % 2 );++$i; echo ($vdzzw); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_dzzw"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_dzzw']); ?>" colspan="2"><?php echo ($info2[0]['drdzzw']); ?>&nbsp;</td >
			<td class="td-a cl<?php echo ($info1[0]['cp_shjz']); ?>" colspan="2"><strong>社&nbsp;会&nbsp;兼&nbsp;职</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="shjz">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($shjz)): $i = 0; $__LIST__ = $shjz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vshjz): $mod = ($i % 2 );++$i; echo ($vshjz); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_shjz"></span></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_shjz']); ?>" colspan="2"><?php echo ($info2[0]['shjz']); ?>&nbsp;</td >
		</tr>
		<tr>
			<td class="td-a cl<?php echo ($info1[0]['cp_xkz']); ?>" colspan="2"><strong>学&nbsp;科&nbsp;组</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="xkz">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($xkz)): $i = 0; $__LIST__ = $xkz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxkz): $mod = ($i % 2 );++$i; echo ($vxkz); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_xkz"></span></td>
			<td class="td-a cl<?php echo ($info1[0]['cp_xkz']); ?>" colspan="2">校内:<?php echo ($info2[0]['xnxkz']); ?> <br/>校外:<?php echo ($info2[0]['xwxkz']); ?></td>
			<td class="td-a cl<?php echo ($info1[0]['cp_xk']); ?>" colspan="2"><strong>学&nbsp;&nbsp;科</strong>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="xk" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($xk)): $i = 0; $__LIST__ = $xk;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxk): $mod = ($i % 2 );++$i; echo ($vxk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_xk"></span></td>
			<td class="td-a cl<?php echo ($info1[0]['cp_xk']); ?>" colspan="2"><?php echo ($info2[0]['xk']); ?>&nbsp;</td>
		</tr>
	</table>
	<hr class="hr">
	<table cellpadding="2" width="740px" class="tb" cellspacing="0" border="1" align=center>
		<tr>
			<td colspan="9"><strong>教学获奖情况综述:</strong></td>
		</tr>
		<tr>
			<td colspan="8" class="cl<?php echo ($info1[0]['cp_hjzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_hjzs']); ?>" style="outline:none;border:0px" cols="77" rows="5"><?php echo ($info2[0]['hjzs']); ?></textarea></td>
			<td class="td-a">
				<select class="tishi" content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="hjzs">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($hjzs)): $i = 0; $__LIST__ = $hjzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vhjzs): $mod = ($i % 2 );++$i; echo ($vhjzs); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_hjzs"></span>
			</td>
		</tr>
		<tr>
			<td class="td-a"><strong><br/>状态</strong><br/><br/></td >
			<td class="td-a"><strong><br/>何时</strong><br/><br/></td >
			<td class="td-a"><strong><br/>名称或者事宜</strong><br/><br/></td >
			<td class="td-a"><strong><br/>单位或者地点</strong><br/><br/></td >
			<td class="td-a"><strong><br/>荣誉称号</strong><br/><br/></td >
			<td class="td-a"><strong><br/>级别</strong><br/><br/></td >
			<td class="td-a"><strong><br/>等级</strong><br/><br/></td >
			<td class="td-a"><strong><br/>排名</strong><br/><br/></td >
			<td class="td-a"><strong><br/>操作</strong><br/><br/></td >
			<?php if(is_array($info6)): $i = 0; $__LIST__ = $info6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jf): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jf["jfqk"]); ?>">
				<td class="td-a"><?php echo ($jf["status"]); ?></td>
				<td class="td-a"><?php echo ($jf["time"]); ?></td>
				<td class="td-a"><?php echo ($jf["mcsy"]); ?></td>
				<td class="td-a"><?php echo ($jf["dd"]); ?></td>
				<td class="td-a"><?php echo ($jf["ch"]); ?></td>
				<td class="td-a"><?php echo ($jf["jb"]); ?></td>
				<td class="td-a"><?php echo ($jf["dj"]); ?></td>
				<td class="td-a"><?php echo ($jf["pm"]); ?></td>
				<td class="td-a">
				<select class="tishi" content="jf*<?php echo ($jf["id"]); ?>" name="jf<?php echo ($jf["id"]); ?>" id="ckb[]">
				<?php if(is_array($list6)): $i = 0; $__LIST__ = $list6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($jf['cp_jfqk'])): $i = 0; $__LIST__ = $jf['cp_jfqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjfqk): $mod = ($i % 2 );++$i; echo ($vjfqk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                    <span id="span_jf<?php echo ($jf["id"]); ?>"></span></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
	</table>
<br />
	<hr class="hr">
	<table cellpadding="2" width="740px" class="tb" cellspacing="0" border="1" align=center>
	<tbody>
		<tr>
			<td class="td-a" colspan="10"><br/><strong>主&nbsp;&nbsp;&nbsp;&nbsp;要&nbsp;&nbsp;&nbsp;&nbsp;学&nbsp;&nbsp;&nbsp;&nbsp;历&nbsp;&nbsp;&nbsp;&nbsp;
			及&nbsp;&nbsp;&nbsp;&nbsp;社&nbsp;&nbsp;&nbsp;&nbsp;会&nbsp;&nbsp;&nbsp;&nbsp;经&nbsp;&nbsp;&nbsp;&nbsp;历</strong><br/><br/></td >
		</tr>
		<tr>
			<td class="td-a"><br/><strong>自何年何月</strong><br/><br/></td >
			<td class="td-a"><br/><strong>至何年何月</strong><br/><br/></td >
			<td class="td-a"><br/><strong>在何地</strong><br/><br/></td >
			<td class="td-a"><br/><strong>何学校(部门)</strong><br/><br/></td >
			<td class="td-a"><br/><strong>任职（或学习）</strong><br/><br/></td >
			<td class="td-a"><br/><strong>专业</strong><br/><br/></td >
			<td class="td-a"><br/><strong>学历</strong><br/><br/></td >
			<td class="td-a"><br/><strong>修业年限</strong><br/><br/></td >
			<td class="td-a"><br/><strong>证&nbsp;明&nbsp;人</strong><br/><br/></td >
			<td class="td-a"><br/><strong>审核情况</strong><br/><br/></td >
		</tr>
		<?php if(is_array($info8)): $i = 0; $__LIST__ = $info8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($xl["xlqk"]); ?>">
			<td class="td-a"><br/><?php echo ($xl["kssj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["jssj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["hd"]); ?> <br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["bm"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["rzxx"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["zy"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["xl"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["xynx"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($xl["zmr"]); ?><br/><br/></td >
			<td class="td-a"><select class="tishi" content="xl*<?php echo ($xl["id"]); ?>" name="xl<?php echo ($xl["id"]); ?>" id="ckb[]">
				<?php if(is_array($list8)): $i = 0; $__LIST__ = $list8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($xl['cp_xlqk'])): $i = 0; $__LIST__ = $xl['cp_xlqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vxl): $mod = ($i % 2 );++$i; echo ($vxl); endforeach; endif; else: echo "" ;endif; ?>

			</select>
                <span id="span_xl<?php echo ($xl["id"]); ?>"></span></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
	</table>
	<br />
	<br />
	<hr class="hr">
	<div class="PageNext"></div>
	<br/>
	<br/>
	<table cellpadding="2" width="740px" class="tb" border="1" cellspacing="0" align="center">
		<tr>
			<td colspan="2" class="td-a cl<?php echo ($info1[0]['cp_grzj']); ?>"><strong>本&nbsp;&nbsp;人&nbsp;&nbsp;总&nbsp;&nbsp;结<br/>
（任现职以来的思想政治表现，教学、科学研究等工作的能力及履行职责的情况、成绩等）</strong></td >
		</tr>
		<tr>
			<td class="td-a"><textarea class="cl<?php echo ($info1[0]['cp_grzj']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0]['brzj']); ?></textarea></td >
			<td class="cl<?php echo ($info1[0]['cp_grzj']); ?>">
                <select content="info*<?php echo ($info2[0]['id']); ?>" class="tishi" id="ckb[]" name="grzj">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($grzj)): $i = 0; $__LIST__ = $grzj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vgrzj): $mod = ($i % 2 );++$i; echo ($vgrzj); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_grzj"></span></td>
		</tr>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<div class="PageNext"></div>
	<table cellpadding="2" class="tb" cellspacing="0" border="1" align=center width="740px">
		<tr>
			<td class="td-a" colspan="9"><strong><br/>任  现  职  以  来  完  成  教  学  工  作  情 况</strong></td >
		</tr>
		<tr>
			<td colspan="9"><strong>教学授课及其他教学任务概述:</strong></td>
		</tr>
		<tr>
			<td colspan="8" class="cl<?php echo ($info1[0]['cp_jxrwzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_jxrwzs']); ?>" style="outline:none;border:0px" cols="101" rows="5"><?php echo ($info2[0]['rwgs']); ?></textarea></td>
			<td class="td-a">
				<select class="tishi" content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="jxrwzs">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($jxrwzs)): $i = 0; $__LIST__ = $jxrwzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjxrwzs): $mod = ($i % 2 );++$i; echo ($vjxrwzs); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jxrwzs"></span>
			</td>
		</tr>
		<tr>
			<td class="td-a"><strong>自何年何月</strong></td >
			<td class="td-a"><strong>至何年何月</strong></td >
			<td class="td-a"><strong>讲授课程名称及其它教学<br/>任       务</strong></td >
			<td class="td-a"><strong>任务类型</strong></td >
			<td class="td-a"><strong>学生<br/>人数</strong></td >
			<td class="td-a"><strong>周学<br/>时数</strong></td >
			<td class="td-a"><strong>总学<br/>时数</strong></td >
			<td class="td-a"><strong>备 注</strong></td >
			<td class="td-a"><strong>审核情况</strong></td >
		</tr>
		<?php if(is_array($info9)): $i = 0; $__LIST__ = $info9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jxgz): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jxgz["jxgzqk"]); ?>">
			<td class="td-a"><br/><?php echo ($jxgz["kssj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["jssj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["mcrw"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["lx"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["xsrs"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["zhxss"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["zxss"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($jxgz["bz"]); ?><br/><br/></td >
			<td class="td-a">
				<select name="jxgz<?php echo ($jxgz["id"]); ?>" content="xzwcgz*<?php echo ($jxgz["id"]); ?>" class="tishi" id="ckb[]">
					<?php if(is_array($list9)): $i = 0; $__LIST__ = $list9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($jxgz['cp_jxgzqk'])): $i = 0; $__LIST__ = $jxgz['cp_jxgzqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjxgzqk): $mod = ($i % 2 );++$i; echo ($vjxgzqk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jxgz<?php echo ($jxgz["id"]); ?>"></span>
			</td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($info9a)): $i = 0; $__LIST__ = $info9a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jxgz): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jxgz["jxgzqk"]); ?>">
                <td class="td-a"><br/><?php echo ($jxgz["kssj"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["jssj"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["mcrw"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["lx"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["xsrs"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["zhxss"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["zxss"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jxgz["bz"]); ?><br/><br/></td >
                <td class="td-a">
                    <select name="jxgz<?php echo ($jxgz["id"]); ?>" content="xzwcgz*<?php echo ($jxgz["id"]); ?>" class="tishi" id="ckb[]">
                        <?php if(is_array($list9a)): $i = 0; $__LIST__ = $list9a;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jxgz['cp_jxgzqk'])): $i = 0; $__LIST__ = $jxgz['cp_jxgzqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjxgzqk): $mod = ($i % 2 );++$i; echo ($vjxgzqk); endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span id="span_jxgz<?php echo ($jxgz["id"]); ?>"></span>
                </td >
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<br/>
	<div class="PageNext"></div>
	<table border="1" align="center" width="740px" class="tb" cellspacing="0">
		<tr>
			<td class="td-a" colspan="8"><strong><br/>任现职以来完成教改项目情况</strong></td>
		</tr>
		<tr>
			<td colspan="8"><strong>教学管理、教学改革工作综述:</strong></td>
		</tr>
		<tr>
			<td colspan="7" class="cl<?php echo ($info1[0]['cp_jxggzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_jxggzs']); ?>" style="outline:none;border:0px" cols="101" rows="5"><?php echo ($info2[0]['gggz']); ?></textarea></td>
			<td class="td-a">
				<select class="tishi" id="ckb[]" content="info*<?php echo ($info2[0]['id']); ?>" name="jxggzs">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($jxggzs)): $i = 0; $__LIST__ = $jxggzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjxggzs): $mod = ($i % 2 );++$i; echo ($vjxggzs); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jxggzs"></span>
			</td>
		</tr>
		<tr>
			<td class="td-a"><strong>项目名称</strong></td>
			<td class="td-a"><strong>项目级别</strong></td>
			<td class="td-a"><strong>项目来源</strong></td>
			<td class="td-a"><strong>开始时间</strong></td>
			<td class="td-a"><strong>结束时间</strong></td>
			<td class="td-a"><strong>结题或在研</strong></td>
			<td class="td-a"><strong>排名</strong></td>
			<td class="td-a"><strong>操作</strong></td>
		</tr>
		<?php if(is_array($info13)): $i = 0; $__LIST__ = $info13;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jgxm): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jgxm["jgxmqk"]); ?>">
			<td class="td-a"><br/><?php echo ($jgxm["xmmc"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["jb"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["ly"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["kssj"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["jssj"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["jz"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($jgxm["pm"]); ?><br/><br/></td>	
			<td class="td-a">
				<select id="ckb[]" content="jgxm*<?php echo ($jgxm["id"]); ?>" name="jgxm<?php echo ($jgxm["id"]); ?>" class="tishi">
					<?php if(is_array($list13)): $i = 0; $__LIST__ = $list13;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($jgxm['cp_jgxmqk'])): $i = 0; $__LIST__ = $jgxm['cp_jgxmqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjgxmqk): $mod = ($i % 2 );++$i; echo ($vjgxmqk); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_jgxm<?php echo ($jgxm["id"]); ?>"></span>
			</td>	
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<div class="PageNext"></div>
	<table border="1" align="center" width="740px" class="tb" cellspacing="0">
		<tr>
			<td class="td-a" colspan="9"><br/><strong>考试情况</strong></td>
		</tr>
		<tr>
			<td class="td-a"><strong>英语免试原因</strong></td>
			<td class="td-a"><strong>英语考试级别</strong></td>
			<td class="td-a"><strong>英语考试时间</strong></td>
			<td class="td-a"><strong>英语成绩</strong></td>
            <td class="td-a"><strong>计算机免试原因</strong></td>
            <td class="td-a"><strong>计算机考试级别</strong></td>
            <td class="td-a"><strong>计算机考试时间</strong></td>
            <td class="td-a"><strong>计算机成绩</strong></td>
			<td class="td-a"><strong>操作</strong></td>
		</tr>
		<?php if(is_array($info14)): $i = 0; $__LIST__ = $info14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ks): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($ks["ksqk"]); ?>">
			<td class="td-a"><br/><?php echo ($ks["yyms"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($ks["yyjb"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($ks["yysj"]); ?><br/><br/></td>
			<td class="td-a"><br/><?php echo ($ks["yycj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjms"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjjb"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjsj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjcj"]); ?><br/><br/></td>
			<td class="td-a">
                <select id="ckb[]" content="ks*<?php echo ($ks["id"]); ?>" name="ks<?php echo ($ks["id"]); ?>" class="tishi">
				<?php if(is_array($list14)): $i = 0; $__LIST__ = $list14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($ks['cp_ksqk'])): $i = 0; $__LIST__ = $ks['cp_ksqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vksqk): $mod = ($i % 2 );++$i; echo ($vksqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_ks<?php echo ($ks["id"]); ?>"></span></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<div class="PageNext"></div>
	<table class="tb" border="1" align="center" width="740px" cellspacing="0">
		<tr>
			<td class="cl<?php echo ($info1[0]['cp_zdyjs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_zdyjs']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0]['zdyjs']); ?></textarea></td >
		
			<td class="td-a cl<?php echo ($info1[0]['cp_zdyjs']); ?>" >指<br/>导<br/>研<br/>究<br/>生<br/>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="zdyjs" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zdyjs)): $i = 0; $__LIST__ = $zdyjs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzdyjs): $mod = ($i % 2 );++$i; echo ($vzdyjs); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_zdyjs"></span></td >
			</tr>
		<tr>
			<td class="cl<?php echo ($info1[0]['cp_zdjs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_zdjs']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0]['zdjstg']); ?></textarea></td >
		
			<td class="td-a cl<?php echo ($info1[0]['cp_zdjs']); ?>">指<br/>导<br/>教<br/>师<br/>提<br/>高<br/>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="zdjs" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zdjs)): $i = 0; $__LIST__ = $zdjs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzdjs): $mod = ($i % 2 );++$i; echo ($vzdjs); endforeach; endif; else: echo "" ;endif; ?></select>
                <span id="span_zdjs"></span></td >
			</tr>
		<tr>
			<td class="cl<?php echo ($info1[0]['cp_sysgx']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_sysgx']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0][sysgx]); ?></textarea></td >
		
			<td class="td-a cl<?php echo ($info1[0]['cp_sysgx']); ?>">对<br/>实<br/>验<br/>室<br/>贡<br/>献<br/>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="sysgx" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($sysgx)): $i = 0; $__LIST__ = $sysgx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsysgx): $mod = ($i % 2 );++$i; echo ($vsysgx); endforeach; endif; else: echo "" ;endif; ?></select>
                <span id="span_sysgx"></span></td >
			</tr>
		<tr>
			<td class="cl<?php echo ($info1[0]['cp_wycd']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_wycd']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0]['wycd']); ?></textarea></td >
		
			<td class="td-a cl<?php echo ($info1[0]['cp_wycd']); ?>">外<br/>语<br/>程<br/>度<br/>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="wycd" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($wycd)): $i = 0; $__LIST__ = $wycd;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vwycd): $mod = ($i % 2 );++$i; echo ($vwycd); endforeach; endif; else: echo "" ;endif; ?></select>
                <span id="span_wycd"></span></td >
			</tr>
		<tr>
			<td class="cl<?php echo ($info1[0]['cp_jsjsp']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_jsjsp']); ?>" style="outline:none;border:0px" cols="101" rows="10"><?php echo ($info2[0]['jsjsp']); ?></textarea></td >
			<td class="td-a cl<?php echo ($info1[0]['cp_jsjsp']); ?>">计<br/>算<br/>机<br/>应<br/>用<br/>水<br/>平<br/>
                <select content="info*<?php echo ($info2[0]['id']); ?>" name="jsjsp" id="ckb[]">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($jsjsp)): $i = 0; $__LIST__ = $jsjsp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjsjsp): $mod = ($i % 2 );++$i; echo ($vjsjsp); endforeach; endif; else: echo "" ;endif; ?></select>
                <span id="span_jsjsp"></span></td >
			</tr>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<br/>

	<table border="1" width="740px" cellspacing="0" class="tb" align="center">
		<tr>
			<td class="td-a" colspan="4">任现职以来发表的论（译）著、教科书、教学研究或<br/>
				在实验及其它科学技术工作方面的成果
			</td >
		</tr>
		<tr>
			<td colspan="4"><strong>主要论文、著作综述：:</strong></td>
		</tr>
		<tr>
			<td colspan="3" class="cl<?php echo ($info1[0]['cp_lwzzzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_lwzzzs']); ?>" style="outline:none;border:0px" cols="101" rows="5"><?php echo ($info2[0]['zpzs']); ?>&nbsp;</textarea></td>
			<td class="td-a">
				<select class="tishi" content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="lwzzzs">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($lwzzzs)): $i = 0; $__LIST__ = $lwzzzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vlwzzzs): $mod = ($i % 2 );++$i; echo ($vlwzzzs); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_lwzzzs"></span>
			</td>
		</tr>
		<tr>
			<td class="td-a" width="30%">题&nbsp;&nbsp;&nbsp;目</td >
			<td class="td-a">何时在何刊物发表或出版社出版</td >
			<td class="td-a">本人承担的部分</td >
			<td class="td-a">审核情况</td >
		</tr>
		<tr>
			<td colspan="4"><strong>发表论文:</strong></td>
		</tr>
		
		<?php if(is_array($info10)): $i = 0; $__LIST__ = $info10;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fblw): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($fblw["fblwqk"]); ?>">
			<td class="td-a"><br/><?php echo ($fblw["title"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($fblw["time"]); ?>、<?php echo ($fblw["status"]); ?>增刊、<?php echo ($fblw["jb"]); ?>、 由<?php echo ($fblw["slmc"]); ?>收录、检索类别是<?php echo ($fblw["js"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($fblw["pm"]); ?><br/><br/></td >
			<td class="td-a"><br/>
			<select name="fblw<?php echo ($fblw["id"]); ?>" content="fblwl*<?php echo ($fblw["id"]); ?>" id="ckb[]" class="tishi">
				<?php if(is_array($list10)): $i = 0; $__LIST__ = $list10;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($fblw['cp_fblwqk'])): $i = 0; $__LIST__ = $fblw['cp_fblwqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vfblwqk): $mod = ($i % 2 );++$i; echo ($vfblwqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_fblw<?php echo ($fblw["id"]); ?>"></span></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td colspan="4"><strong>个人著作:</strong></td>
		</tr>
		<?php if(is_array($info11)): $i = 0; $__LIST__ = $info11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zzl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($zzl["zzlqk"]); ?>">
			<td class="td-a"><br/><?php echo ($zzl["mc"]); ?><br/><br/></td >
			<td class="td-a"><?php echo ($zzl["cbsj"]); ?> 、类别:<?php echo ($zzl["lb"]); ?> 、承担：<?php echo ($zzl["cdbf"]); ?>、
                <br/>由<?php echo ($zzl["cbs"]); ?>出版、
                编写<?php echo ($zzl["sm"]); ?>章<?php echo ($zzl["num"]); ?>千字</td >
			<td class="td-a"><br/><?php echo ($zzl["cdbf"]); ?><br/><br/></td >
			<td class="td-a"><br/>
			<select name="zzl<?php echo ($zzl["id"]); ?>" content="zzl*<?php echo ($zzl["id"]); ?>" id="ckb[]" class="tishi">
				<?php if(is_array($list11)): $i = 0; $__LIST__ = $list11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($zzl['cp_zzlqk'])): $i = 0; $__LIST__ = $zzl['cp_zzlqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzzlqk): $mod = ($i % 2 );++$i; echo ($vzzlqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_zzl<?php echo ($zzl["id"]); ?>"></span></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <tr>
            <td colspan="4"><strong>教材说明:</strong></td>
        </tr>
        <?php if(is_array($info17)): $i = 0; $__LIST__ = $info17;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jc): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jc["jcqk"]); ?>">
                <td class="td-a"><br/><?php echo ($jc["mc"]); ?><br/><br/></td >
                <td class="td-a"><br/><?php echo ($jc["cbsj"]); ?> 、类别:<?php echo ($jc["lb"]); ?> 、承担：<?php echo ($jc["cdbf"]); ?>、<br/>
                    由<?php echo ($jc["cbs"]); ?>出版、
                    编写<?php echo ($jc["qksm"]); ?>章<?php echo ($jc["num"]); ?>千字<br/><br/></td >
                <td class="td-a"><br/><?php echo ($jc["cdbf"]); ?><br/><br/></td >
                <td class="td-a"><br/>
                    <select name="jc<?php echo ($jc["id"]); ?>" content="jc*<?php echo ($jc["id"]); ?>" id="ckb[]" class="tishi">
                        <?php if(is_array($list17)): $i = 0; $__LIST__ = $list17;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
                        <?php if(is_array($jc['cp_jcqk'])): $i = 0; $__LIST__ = $jc['cp_jcqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vjcqk): $mod = ($i % 2 );++$i; echo ($vjcqk); endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span id="span_jc<?php echo ($jc["id"]); ?>"></span></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	<hr class="hr">
	<br/>
	<br/>
	<br/>
	<div class="PageNext"></div>
	<table border="1" width="740px" cellspacing="0" class="tb" align="center">
		<tr>
			<td class="td-a" colspan="8">任&nbsp;&nbsp;现&nbsp;&nbsp;职&nbsp;&nbsp;以&nbsp;&nbsp;来&nbsp;&nbsp;主&nbsp;&nbsp;
				要&nbsp;&nbsp;科&nbsp;&nbsp;研&nbsp;&nbsp;成&nbsp;&nbsp;果&nbsp;&nbsp;目&nbsp;&nbsp;录
			</td >
		</tr>
		<tr>
			<td colspan="8"><strong>科研项目及获奖情况综述：:</strong></td>
		</tr>
		<tr>
			<td colspan="7" class="cl<?php echo ($info1[0]['cp_kyhjzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_kyhjzs']); ?>" style="outline:none;border:0px" cols="101" rows="5"><?php echo ($info2[0]['xmzs']); ?>&nbsp;</textarea></td>
			<td class="td-a">
				<select class="tishi" content="info*<?php echo ($info2[0]['id']); ?>" id="ckb[]" name="kyhjzs">
					<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
					<?php if(is_array($kyhjzs)): $i = 0; $__LIST__ = $kyhjzs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vkyhjzs): $mod = ($i % 2 );++$i; echo ($vkyhjzs); endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <span id="span_kyhjzs"></span>
			</td>
		</tr>
		<tr>
			<td colspan="8"><strong>科研项目:</strong></td>
		</tr>
		<tr>
			<td class="td-a">时&nbsp;&nbsp;&nbsp;间</td >
			<td class="td-a">科  研  项  目</td >
			<td class="td-a">项目来源</td >
			<td class="td-a">项目排名</td >
			<td class="td-a">项目编号</td >
			<td class="td-a">本 人 承 担 任 务</td >
			<td class="td-a">完 成 任 务 情 况</td >
			<td class="td-a">审核情况</td >
		</tr>
		<?php if(is_array($info12)): $i = 0; $__LIST__ = $info12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyxm): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($kyxm["kyxmqk"]); ?>">
			<td class="td-a"><br/><?php echo ($kyxm["qzsj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["kyxm"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["xmly"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["pm"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["bh"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["cdrw"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["wcqk"]); ?><br/><br/></td >
			<td class="td-a" colspan="2">
			<select name="kyxm<?php echo ($kyxm["id"]); ?>" content="kyxm*<?php echo ($kyxm["id"]); ?>" id="ckb[]" class="tishi">
				<?php if(is_array($list12)): $i = 0; $__LIST__ = $list12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($kyxm['cp_kyxmqk'])): $i = 0; $__LIST__ = $kyxm['cp_kyxmqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vkyxmqk): $mod = ($i % 2 );++$i; echo ($vkyxmqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_kyxm<?php echo ($kyxm["id"]); ?>"></span></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td colspan="8"><strong>科研获奖:</strong></td >
		</tr>
		<tr>
			<td class="td-a"><strong>获奖时间</strong></td>
			<td class="td-a"><strong>获奖名称</strong></td>
			<td class="td-a"><strong>获奖单位</strong></td>
			<td class="td-a"><strong>获奖级别</strong></td>
			<td class="td-a"><strong>获奖成果</strong></td>
			<td class="td-a"><strong>个人排名</strong></td>
			<td class="td-a" colspan="2"><strong>操作</strong></td>
		</tr>
		<?php if(is_array($info15)): $i = 0; $__LIST__ = $info15;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyhj): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($kyhj["kyhjqk"]); ?>">
			<td class="td-a"><br/><?php echo ($kyhj["sj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyhj["mc"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyhj["dw"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyhj["jb"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyhj["cg"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyhj["pm"]); ?><br/><br/></td >
			<td class="td-a" colspan="2">
			<select name="kyhj<?php echo ($kyhj["id"]); ?>" content="kyhj*<?php echo ($kyhj["id"]); ?>" id="ckb[]" class="tishi">
				<?php if(is_array($list15)): $i = 0; $__LIST__ = $list15;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($kyhj['cp_kyhjqk'])): $i = 0; $__LIST__ = $kyhj['cp_kyhjqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vkyhjqk): $mod = ($i % 2 );++$i; echo ($vkyhjqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_kyhj<?php echo ($kyhj["id"]); ?>"></span></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
			<td colspan="8"><strong>发明专利:</strong></td >
		</tr>
		<tr>
			<td class="td-a"><strong>专利通过时间</strong></td>
			<td class="td-a"><strong>专利名称</strong></td>
			<td class="td-a"><strong>专利类型</strong></td>
			<td class="td-a"><strong>专利号</strong></td>
			<td class="td-a" colspan="4"><strong>操作</strong></td>
		</tr>
		<?php if(is_array($info16)): $i = 0; $__LIST__ = $info16;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fmzl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($fmzl["fmzlqk"]); ?>">
			<td class="td-a"><br/><?php echo ($fmzl["tgsj"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($fmzl["mc"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($fmzl["lx"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($fmzl["zlh"]); ?><br/><br/></td >
			<td class="td-a" colspan="4">
			<select name="fmzl<?php echo ($fmzl["id"]); ?>" content="fmzl*<?php echo ($fmzl["id"]); ?>" id="ckb[]" class="tishi">
				<?php if(is_array($list16)): $i = 0; $__LIST__ = $list16;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($fmzl['cp_fmzlqk'])): $i = 0; $__LIST__ = $fmzl['cp_fmzlqk'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vfmzlqk): $mod = ($i % 2 );++$i; echo ($vfmzlqk); endforeach; endif; else: echo "" ;endif; ?>
			</select>
                <span id="span_fmzl<?php echo ($fmzl["id"]); ?>"></span></td >
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	
	</form>
	<br/><br/>
</div>
<input name="dealing-select" id="dealing-select" type="hidden" data="null"/>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					
					<code class="modal-title" id="myModalLabel">请填写未通过原因</code>
				</div>
				<div class="modal-body" style="padding:0;">
					<textarea id="reason" style="width:100%;height:200px;"></textarea>
				</div>
				<div class="modal-footer" style="padding:19px 20px 0px 20px;margin-top:0px;">
					<button type="button" class="btn btn-default"  id="save-reason">确定</button>
				</div>
			</div>
		</div>
    </div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>		
</body>
</html>