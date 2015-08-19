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
<script type="text/javascript" src="__PUBLIC__/Js/bootstrap.js"></script>
<script src="__PUBLIC__/Js/audit.js"></script>
<script src="__PUBLIC__/Js/reason.js"></script>
<script src="__PUBLIC__/Js/showreason.js"></script>
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
<?php echo ($reason); ?>
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

<br/><br/><br/>

<table class="tb" width="740px" cellpadding="2" cellspacing="0" border="1" align="center">
<tbody>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_name']); ?>" data="user<?php echo ($userid); ?>name" colspan="2" style="height:35px;" ><strong>姓&nbsp;&nbsp;名</strong>

        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_name']); ?>" data="user<?php echo ($userid); ?>name"><?php echo ($info1[0]['name']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_sex']); ?>" data="user<?php echo ($userid); ?>sex" ><strong>性&nbsp;&nbsp;别</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_sex']); ?>" data="user<?php echo ($userid); ?>sex"><?php echo ($info1[0]['sex']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_csny']); ?>" data="user<?php echo ($userid); ?>csny"><strong>出生年月</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_csny']); ?>" data="user<?php echo ($userid); ?>csny"><?php echo ($info1[0]['csny']); ?></td >
    <td class="td-a"  rowspan="5" style="width:2.6cm;height:3.5cm;" data="user<?php echo ($userid); ?>zplj">

        <img style="width:2.6cm;height:3.5cm;" src="<?php echo ($info1[0]['zplj']); ?>"></img><br/></td  >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_mz']); ?>"  colspan="2" data="user<?php echo ($userid); ?>mz"><strong>民族</strong>
       </td>
    <td class="td-a cl<?php echo ($info1[0]['cp_mz']); ?>" data="user<?php echo ($userid); ?>mz"><?php echo ($info1[0]['mz']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_jg']); ?>" data="user<?php echo ($userid); ?>jg"><strong>籍贯</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_jg']); ?>" data="user<?php echo ($userid); ?>jg"><?php echo ($info1[0]['jg_pro']); ?><br/><?php echo ($info1[0]['jg_city']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_jkzk']); ?>" data="info<?php echo ($infoid); ?>jkzk"><strong>健康状况</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_jkzk']); ?>" data="info<?php echo ($infoid); ?>jkzk"><?php echo ($info2[0]['jkzk']); ?></td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_hscjdp']); ?>" colspan="2" data="info<?php echo ($infoid); ?>hscjdp"><strong>何时参加何<br/>党&nbsp;&nbsp;&nbsp;派</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_hscjdp']); ?>" data="info<?php echo ($infoid); ?>hscjdp"><?php echo ($info2[0]['hscjdp']); ?><br/><?php echo ($info2[0]['cjdp']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_pwhsp']); ?>" data="info<?php echo ($infoid); ?>pwhsp"><strong>现任专业技术职务<br/>任职资格评委会和<br/>审批机关</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_pwhsp']); ?>" colspan="3" data="info<?php echo ($infoid); ?>pwhsp"><?php echo ($info2[0]['pwhsp']); ?></td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_zwhsj']); ?>" colspan="2" data="info<?php echo ($infoid); ?>xrjszw"><strong>现职务及任现<br/>职务时间</strong>
        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_zwhsj']); ?>" colspan="1" data="info<?php echo ($infoid); ?>xrjszw"><?php echo ($info2[0]['xrjszw']); ?><br/><?php echo ($info2[0]['xrzwsj']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_xl']); ?>" data="info<?php echo ($infoid); ?>xl"><strong>高校教龄</strong>
      </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_xl']); ?>" data="info<?php echo ($infoid); ?>xl"><?php echo ($info2[0]['xl']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_npzw']); ?>" data="info<?php echo ($infoid); ?>npzw"><strong>拟聘职务</strong>
        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_npzw']); ?>" data="info<?php echo ($infoid); ?>npzw"><?php echo ($info1[0]['npzw']); ?></td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_cjgzsj']); ?>" colspan="2" data="info<?php echo ($infoid); ?>cjgzsj"><strong>参加工作<br/>时&nbsp;&nbsp;&nbsp;&nbsp;间</strong>
        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_cjgzsj']); ?>" data="info<?php echo ($infoid); ?>cjgzsj"><?php echo ($info2[0]['cjgzsj']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_sfzh']); ?>" data="info<?php echo ($infoid); ?>sfzh"><strong>身份证号码</strong>
        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_sfzh']); ?>" colspan="3" data="info<?php echo ($infoid); ?>sfzh"><?php echo ($info1[0]['sfzh']); ?>&nbsp;</td >
</tr>

<tr>
    <td class="td-a" colspan="2"><br/><strong>何时、何校获<br/>何种学位<br/><br/></td >
    <td class="td-a" colspan="6">
        <?php if(is_array($info4)): $i = 0; $__LIST__ = $info4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xw): $mod = ($i % 2 );++$i;?><p class="cl<?php echo ($xw["xwqk"]); ?>" data="xw<?php echo ($xw["id"]); ?>"><?php echo ($xw["kssj"]); ?>至<?php echo ($xw["swsj"]); ?>获<?php echo ($xw["byxx"]); echo ($xw["xwlx"]); echo ($xw["xw"]); ?>学位

            </p><?php endforeach; endif; else: echo "" ;endif; ?>
        &nbsp;</td >
</tr>
<tr>
    <td class="td-a" colspan="2"><strong>国内外留学、<br/>进修的学校、<br/>时间和内容</strong></td>
    <td class="td-a" colspan="6">
        <?php if(is_array($info5)): $i = 0; $__LIST__ = $info5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gnw): $mod = ($i % 2 );++$i;?><p class="cl<?php echo ($gnw["jxqk"]); ?>" data="gnwjx<?php echo ($gnw["id"]); ?>"><?php echo ($gnw["kssj"]); ?>至<?php echo ($gnw["jssj"]); ?> <?php echo ($gnw["xx"]); ?> <?php echo ($gnw["lb"]); endforeach; endif; else: echo "" ;endif; ?>
        &nbsp;</td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_zyzc']); ?>" colspan="2" data="info<?php echo ($infoid); ?>zyzc"><strong>现从事专业<br/>及&nbsp;专&nbsp;长</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_zyzc']); ?>" colspan="2" data="info<?php echo ($infoid); ?>zyzc">专业:<?php echo ($info2[0]['xcszy']); ?><br/>专长:<?php echo ($info2[0]['xcszc']); ?></td >
    <td class="td-a cl<?php echo ($info1[0]['cp_xsttzw']); ?>" colspan="2" data="info<?php echo ($infoid); ?>xsttzw"><strong>参加何学术团<br/>体、任何职务</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_xsttzw']); ?>" colspan="2" data="info<?php echo ($infoid); ?>xsttzw"><?php echo ($info2[0]['cjxstt']); ?><br/><?php echo ($info2[0]['rhzw']); ?>&nbsp;</td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_dzzw']); ?>" colspan="2" data="info<?php echo ($info); ?>drdzzw">
        <strong>担(兼)任党政<br/>职&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;务</strong>
       </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_dzzw']); ?>" colspan="2" data="info<?php echo ($info); ?>drdzzw"><?php echo ($info2[0]['drdzzw']); ?>&nbsp;</td >
    <td class="td-a cl<?php echo ($info1[0]['cp_shjz']); ?>" colspan="2" data="info<?php echo ($info); ?>shjz"><strong>社&nbsp;会&nbsp;兼&nbsp;职</strong>
        </td >
    <td class="td-a cl<?php echo ($info1[0]['cp_shjz']); ?>" colspan="2" data="info<?php echo ($info); ?>shjz"><?php echo ($info2[0]['shjz']); ?>&nbsp;</td >
</tr>
<tr>
    <td class="td-a cl<?php echo ($info1[0]['cp_xkz']); ?>" colspan="2" data="info<?php echo ($info); ?>xkz"><strong>学&nbsp;科&nbsp;组</strong>
       </td>
    <td class="td-a cl<?php echo ($info1[0]['cp_xkz']); ?>" colspan="2" data="info<?php echo ($info); ?>xkz">校内:<?php echo ($info2[0]['xnxkz']); ?> <br/>校外:<?php echo ($info2[0]['xwxkz']); ?></td>
    <td class="td-a cl<?php echo ($info1[0]['cp_xk']); ?>" colspan="2" data="info<?php echo ($info); ?>xk"><strong>学&nbsp;&nbsp;科</strong>
       </td>
    <td class="td-a cl<?php echo ($info1[0]['cp_xk']); ?>" colspan="2" data="info<?php echo ($info); ?>xk"><?php echo ($info2[0]['xk']); ?>&nbsp;</td>
</tr>
</table>
<hr class="hr">
<table cellpadding="2" width="740px" class="tb" cellspacing="0" border="1" align=center>
    <tr>
        <td colspan="9" data="info<?php echo ($info); ?>hjzs"><strong>教学获奖情况综述:</strong></td>
    </tr>
    <tr>
        <td colspan="8" class="cl<?php echo ($info1[0]['cp_hjzs']); ?>" data="info<?php echo ($info); ?>hjzs"><textarea class="cl<?php echo ($info1[0]['cp_hjzs']); ?>" style="outline:none;border:0px" cols="88" rows="5"><?php echo ($info2[0]['hjzs']); ?></textarea></td>


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
        <?php if(is_array($info6)): $i = 0; $__LIST__ = $info6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jf): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jf["jfqk"]); ?>" data="jf<?php echo ($jf["id"]); ?>">
                <td class="td-a"><?php echo ($jf["status"]); ?></td>
                <td class="td-a"><?php echo ($jf["time"]); ?></td>
                <td class="td-a"><?php echo ($jf["mcsy"]); ?></td>
                <td class="td-a"><?php echo ($jf["dd"]); ?></td>
                <td class="td-a"><?php echo ($jf["ch"]); ?></td>
                <td class="td-a"><?php echo ($jf["jb"]); ?></td>
                <td class="td-a"><?php echo ($jf["dj"]); ?></td>
                <td class="td-a"><?php echo ($jf["pm"]); ?></td>

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
    </tr>
    <?php if(is_array($info8)): $i = 0; $__LIST__ = $info8;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($xl["xlqk"]); ?>" data="xl<?php echo ($xl["id"]); ?>">
            <td class="td-a"><br/><?php echo ($xl["kssj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["jssj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["bm"]); ?> <br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["zy"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["rzxx"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["zy"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["xl"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["xynx"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($xl["zmr"]); ?><br/><br/></td >

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
        <td colspan="2" class="td-a cl<?php echo ($info1[0]['cp_grzj']); ?>" data="info<?php echo ($infoid); ?>brzj"><strong>本&nbsp;&nbsp;人&nbsp;&nbsp;总&nbsp;&nbsp;结<br/>
            （任现职以来的思想政治表现，教学、科学研究等工作的能力及履行职责的情况、成绩等）</strong></td >
    </tr>
    <tr>
        <td class="td-a" data="info<?php echo ($infoid); ?>brzj"><textarea class="cl<?php echo ($info1[0]['cp_grzj']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0]['brzj']); ?></textarea></td >

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
        <td colspan="9" data="info<?php echo ($infoid); ?>rwgs"><strong>教学授课及其他教学任务概述:</strong></td>
    </tr>
    <tr>
        <td colspan="8" class="cl<?php echo ($info1[0]['cp_jxrwzs']); ?>" data="info<?php echo ($infoid); ?>rwgs"><textarea class="cl<?php echo ($info1[0]['cp_jxrwzs']); ?>" style="outline:none;border:0px" cols="88" rows="5"><?php echo ($info2[0]['rwgs']); ?></textarea></td>

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

    </tr>
    <?php if(is_array($info9)): $i = 0; $__LIST__ = $info9;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jxgz): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jxgz["jxgzqk"]); ?>" data="xzwcgz<?php echo ($jxgz["id"]); ?>">
            <td class="td-a"><br/><?php echo ($jxgz["kssj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["jssj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["mcrw"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["lx"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["xsrs"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["zhxss"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["zxss"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jxgz["bz"]); ?><br/><br/></td >

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
        <td colspan="8" data="info<?php echo ($infoid); ?>gggz}"><strong>教学管理、教学改革工作综述:</strong></td>
    </tr>
    <tr>
        <td colspan="7" class="cl<?php echo ($info1[0]['cp_jxggzs']); ?>" data="info<?php echo ($infoid); ?>gggz}"><textarea class="cl<?php echo ($info1[0]['cp_jxggzs']); ?>" style="outline:none;border:0px" cols="88" rows="5"><?php echo ($info2[0]['gggz']); ?></textarea></td>

    </tr>
    <tr>
        <td class="td-a"><strong>项目名称</strong></td>
        <td class="td-a"><strong>项目级别</strong></td>
        <td class="td-a"><strong>项目来源</strong></td>
        <td class="td-a"><strong>开始时间</strong></td>
        <td class="td-a"><strong>结束时间</strong></td>
        <td class="td-a"><strong>结题或在研</strong></td>
        <td class="td-a"><strong>排名</strong></td>

    </tr>
    <?php if(is_array($info13)): $i = 0; $__LIST__ = $info13;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jgxm): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jgxm["jgxmqk"]); ?>" data="jgxm<?php echo ($jgxm["id"]); ?>">
            <td class="td-a"><br/><?php echo ($jgxm["xmmc"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["jb"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["ly"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["kssj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["jssj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["jz"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($jgxm["pm"]); ?><br/><br/></td>

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
     
    </tr>
    <?php if(is_array($info14)): $i = 0; $__LIST__ = $info14;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ks): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($ks["ksqk"]); ?>"  data="ks<?php echo ($ks["id"]); ?>">
            <td class="td-a"><br/><?php echo ($ks["yyms"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["yyjb"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["yysj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["yycj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjms"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjjb"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjsj"]); ?><br/><br/></td>
            <td class="td-a"><br/><?php echo ($ks["jsjcj"]); ?><br/><br/></td>
          
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<hr class="hr">
<br/>
<br/>
<div class="PageNext"></div>
<table class="tb" border="1" align="center" width="740px" cellspacing="0">
    <tr>
        <td class="cl<?php echo ($info1[0]['cp_zdyjs']); ?>" data="info<?php echo ($infoid); ?>zdyjs}"><textarea class="cl<?php echo ($info1[0]['cp_zdyjs']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0]['zdyjs']); ?></textarea></td >

        <td class="td-a cl<?php echo ($info1[0]['cp_zdyjs']); ?>" >指<br/>导<br/>研<br/>究<br/>生<br/>
            </td >
    </tr>
    <tr>
        <td class="cl<?php echo ($info1[0]['cp_zdjs']); ?>" data="info<?php echo ($infoid); ?>zdjstg}"><textarea class="cl<?php echo ($info1[0]['cp_zdjs']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0]['zdjstg']); ?></textarea></td >

        <td class="td-a cl<?php echo ($info1[0]['cp_zdjs']); ?>">指<br/>导<br/>教<br/>师<br/>提<br/>高<br/>
           </td >
    </tr>
    <tr>
        <td class="cl<?php echo ($info1[0]['cp_sysgx']); ?>" data="info<?php echo ($infoid); ?>sysgx}"><textarea class="cl<?php echo ($info1[0]['cp_sysgx']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0][sysgx]); ?></textarea></td >

        <td class="td-a cl<?php echo ($info1[0]['cp_sysgx']); ?>">对<br/>实<br/>验<br/>室<br/>贡<br/>献<br/>
           </td >
    </tr>
    <tr>
        <td class="cl<?php echo ($info1[0]['cp_wycd']); ?>" data="info<?php echo ($infoid); ?>wycd}"><textarea class="cl<?php echo ($info1[0]['cp_wycd']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0]['wycd']); ?></textarea></td >

        <td class="td-a cl<?php echo ($info1[0]['cp_wycd']); ?>">外<br/>语<br/>程<br/>度<br/>
            
            <span id="span_wycd"></span></td >
    </tr>
    <tr>
        <td class="cl<?php echo ($info1[0]['cp_jsjsp']); ?>" data="info<?php echo ($infoid); ?>jsjsp}"><textarea class="cl<?php echo ($info1[0]['cp_jsjsp']); ?>" style="outline:none;border:0px" cols="88" rows="10"><?php echo ($info2[0]['jsjsp']); ?></textarea></td >
        <td class="td-a cl<?php echo ($info1[0]['cp_jsjsp']); ?>">计<br/>算<br/>机<br/>应<br/>用<br/>水<br/>平<br/>
           </td >
    </tr>
</table>
<hr class="hr">
<br/>
<br/>
<br/>

<table border="1" width="740px" cellspacing="0" class="tb" align="center">
    <tr>
        <td class="td-a" colspan="3">任现职以来发表的论（译）著、教科书、教学研究或<br/>
            在实验及其它科学技术工作方面的成果
        </td >
    </tr>
    <tr>
        <td colspan="3" data="info<?php echo ($infoid); ?>zpzs}"><strong>主要论文、著作综述：:</strong></td>
    </tr>
    <tr>
        <td colspan="3" class="cl<?php echo ($info1[0]['cp_lwzzzs']); ?>" data="info<?php echo ($infoid); ?>zpzs}"><textarea class="cl<?php echo ($info1[0]['cp_lwzzzs']); ?>" style="outline:none;border:0px" cols="88" rows="5"><?php echo ($info2[0]['zpzs']); ?>&nbsp;</textarea></td>

    </tr>
    <tr>
        <td class="td-a" width="30%">题&nbsp;&nbsp;&nbsp;目</td >
        <td class="td-a">何时在何刊物发表或出版社出版</td >
        <td class="td-a">本人承担的部分</td >
    </tr>
    <tr>
        <td colspan="4"><strong>发表论文:</strong></td>
    </tr>

    <?php if(is_array($info10)): $i = 0; $__LIST__ = $info10;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fblw): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($fblw["fblwqk"]); ?>" data="fblwl<?php echo ($fblw["id"]); ?>">
            <td class="td-a"><br/><?php echo ($fblw["title"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fblw["time"]); ?>、<?php echo ($fblw["status"]); ?>增刊、<?php echo ($fblw["jb"]); ?>、 由<?php echo ($fblw["slmc"]); ?>收录、检索类别是<?php echo ($fblw["js"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fblw["pm"]); ?><br/><br/></td >

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="4"><strong>个人著作:</strong></td>
    </tr>
    <?php if(is_array($info11)): $i = 0; $__LIST__ = $info11;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zzl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($zzl["zzlqk"]); ?>" data="zzl<?php echo ($zzl["id"]); ?>">
            <td class="td-a"><br/><?php echo ($zzl["mc"]); ?><br/><br/></td >
            <td class="td-a"><?php echo ($zzl["cbsj"]); ?> 、类别:<?php echo ($zzl["lb"]); ?> 、承担：<?php echo ($zzl["cdbf"]); ?>、
                <br/>由<?php echo ($zzl["cbs"]); ?>出版、
                编写<?php echo ($zzl["sm"]); ?>章<?php echo ($zzl["num"]); ?>千字</td >
            <td class="td-a"><br/><?php echo ($zzl["cdbf"]); ?><br/><br/></td >

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="4"><strong>教材说明:</strong></td>
    </tr>
    <?php if(is_array($info17)): $i = 0; $__LIST__ = $info17;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$jc): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($jc["jcqk"]); ?>" data="jc<?php echo ($jc["id"]); ?>">
            <td class="td-a"><br/><?php echo ($jc["mc"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($jc["cbsj"]); ?> 、类别:<?php echo ($jc["lb"]); ?> 、承担：<?php echo ($jc["cdbf"]); ?>、<br/>
                由<?php echo ($jc["cbs"]); ?>出版、
                编写<?php echo ($jc["qksm"]); ?>章<?php echo ($jc["num"]); ?>千字<br/><br/></td >
            <td class="td-a"><br/><?php echo ($jc["cdbf"]); ?><br/><br/></td >

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<hr class="hr">
<br/>
<br/>
<br/>
<div class="PageNext"></div>
<table border="1" width="740px" cellspacing="0" class="tb" align="center">
    <tr>
        <td class="td-a" colspan="6">任&nbsp;&nbsp;现&nbsp;&nbsp;职&nbsp;&nbsp;以&nbsp;&nbsp;来&nbsp;&nbsp;主&nbsp;&nbsp;
            要&nbsp;&nbsp;科&nbsp;&nbsp;研&nbsp;&nbsp;成&nbsp;&nbsp;果&nbsp;&nbsp;目&nbsp;&nbsp;录
        </td >
    </tr>
    <tr>
        <td colspan="6" data="info<?php echo ($infoid); ?>xmzs}"><strong>科研项目及获奖情况综述：:</strong></td>
    </tr>
    <tr>
        <td colspan="6" class="cl<?php echo ($info1[0]['cp_kyhjzs']); ?>"><textarea class="cl<?php echo ($info1[0]['cp_kyhjzs']); ?>" style="outline:none;border:0px" cols="88" rows="5"><?php echo ($info2[0]['xmzs']); ?>&nbsp;</textarea></td>

    </tr>
    <tr>
        <td colspan="6"><strong>科研项目:</strong></td>
    </tr>
    <tr>
        <td class="td-a">时&nbsp;&nbsp;&nbsp;间</td >
        <td class="td-a">项  目  编  号</td >
		<td class="td-a">科  研  项  目</td >
        <td class="td-a">项目来源</td >
        <td class="td-a">项目排名</td >
        <td class="td-a">本 人 承 担 任 务</td >
        <td class="td-a">完 成 任 务 情 况</td >
    </tr>
    <?php if(is_array($info12)): $i = 0; $__LIST__ = $info12;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyxm): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($kyxm["kyxmqk"]); ?>" data="kyxm<?php echo ($kyxm["id"]); ?>">
            <td class="td-a"><br/><?php echo ($kyxm["qzsj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["bh"]); ?><br/><br/></td >
			<td class="td-a"><br/><?php echo ($kyxm["kyxm"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["xmly"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["pm"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["cdrw"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyxm["wcqk"]); ?><br/><br/></td >
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="6"><strong>科研获奖:</strong></td >
    </tr>
    <tr>
        <td class="td-a"><strong>获奖时间</strong></td>
        <td class="td-a"><strong>获奖名称</strong></td>
        <td class="td-a"><strong>获奖单位</strong></td>
        <td class="td-a"><strong>获奖级别</strong></td>
        <td class="td-a"><strong>获奖成果</strong></td>
        <td class="td-a"><strong>个人排名</strong></td>
    </tr>
    <?php if(is_array($info15)): $i = 0; $__LIST__ = $info15;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kyhj): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($kyhj["kyhjqk"]); ?>" data="kyhj<?php echo ($kyhj["id"]); ?>">
            <td class="td-a"><br/><?php echo ($kyhj["sj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyhj["mc"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyhj["dw"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyhj["jb"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyhj["cg"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($kyhj["pm"]); ?><br/><br/></td >


        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
        <td colspan="6"><strong>发明专利:</strong></td >
    </tr>
    <tr>
        <td class="td-a"><strong>专利通过时间</strong></td>
        <td class="td-a"><strong>专利名称</strong></td>
        <td class="td-a"><strong>专利类型</strong></td>
        <td class="td-a"><strong>是否授权</strong></td>
        <td class="td-a"><strong>专利号</strong></td>
		<td class="td-a"></td>
    </tr>
    <?php if(is_array($info16)): $i = 0; $__LIST__ = $info16;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fmzl): $mod = ($i % 2 );++$i;?><tr class="cl<?php echo ($fmzl["fmzlqk"]); ?>" data="fmzl<?php echo ($fmzl); ?>">
            <td class="td-a"><br/><?php echo ($fmzl["tgsj"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fmzl["mc"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fmzl["lx"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fmzl["sq"]); ?><br/><br/></td >
            <td class="td-a"><br/><?php echo ($fmzl["zlh"]); ?><br/><br/></td >
			<td class="td-a"></td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <code class="modal-title" id="myModalLabel">未通过原因</code>
            </div>
            <div class="modal-body" style="padding:0;">
                <textarea id="reason" style="width:100%;height:200px;"></textarea>
            </div>
            <div class="modal-footer" style="padding:19px 20px 0px 20px;margin-top:0px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">确定</button>
            </div>
        </div>
    </div>
</div>
<br/><br/><br/>
</div>
			<div id="foot">                
				地址：四川省成都市西南航空港经济开发区学府路一段24号邮编：610225<br/>
　 				Copyright 2013-2021 成都信息工程学院　建议使用Google,1024*768以上浏览
			</div>
</body>
</html>