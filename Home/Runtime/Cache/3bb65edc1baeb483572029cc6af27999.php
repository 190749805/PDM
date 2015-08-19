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

<script src="__PUBLIC__/Js/audit.js"></script>
<!--<script src="__PUBLIC__/Js/reason.js"></script>-->
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/print.css" />
<div class="center">
    <br/><style text="css/text">
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

    <p id="time">&nbsp;&nbsp;&nbsp;当前日期:<?php date_default_timezone_set('PRC'); echo date('Y:m:d');?></p>
    <h3 class="shenhe-head">*通过是<span style="color:green">绿色</span>，没有通过是<span style="color:red">红色</span></h3>
    <form action="__URL__/auditOne" method="POST">
        <button class="btn shenhe-head" id="tj">提交</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn" id='all-select'>全选(全部通过)</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" class="btn" id='all-unselect'>取消(全部重置为未审核)</button>
        <br/><br/><br/>
        <input type="hidden" name="hidden" value="<?php echo ($id); ?>">
        <center>
        <table class="tb" width="740px" cellpadding="2" cellspacing="0" border="1" align="center">
            <tbody>
            <tr>
                <th class="td-a">现任专业职务和时间</th><th class="td-a">操作</th>
            </tr>
            <tr>
                <td class="td-a cl<?php echo ($info1[0]['cp_sex']); ?>"><?php if(is_array($ary)): $i = 0; $__LIST__ = $ary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zzsj): $mod = ($i % 2 );++$i; echo ($zzsj); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?></td><td class="td-a">
                <select name="zzsj" id="ckb[]" class="tishi" content="info*<?php echo ($id['id']); ?>">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
                    <?php if(is_array($zzsj)): $i = 0; $__LIST__ = $zzsj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vzzsj): $mod = ($i % 2 );++$i; echo ($vzzsj); endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <span id="span_zzsj"></span>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
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