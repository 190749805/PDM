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
<script type="text/javascript" src="__PUBLIC__/Js/one.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/user_option.js"></script>
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

					<p id="time">&nbsp;&nbsp;&nbsp;当前日期:<?php date_default_timezone_set('PRC'); echo date('Y/m/d');?></p>
					<br/><br/>
					<p class="info" style="margin-left:100px;">查看用户(<?php echo ($range); ?>)</p>
					<br/>
					<table style="width:700px;margin-left:100px;" class="table table-striped">
						<tr>
							
							<th>
								部&nbsp;门
							</th>
							<th>
								用户名
							</th>
							<th>
								姓&nbsp;名
							</th>
							
							<th>
								权&nbsp;限
							</th>
						</tr>
						<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;?><tr>
							
							<td>
								<?php echo ($info["bm"]); ?>
							</td>
							<td>
									<a class="deleteuser" href="#" data="<?php echo ($info["id"]); ?>" qx="<?php echo ($info["qx"]); ?>"><?php echo ($info["username"]); ?></a>
							</td>
							<td>
								<?php echo ($info["name"]); ?>
							</td>
							
							<td>
								<?php echo ($info["qx"]); ?>
							</td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</table>
					<span style="margin-left: 60%;"><?php echo ($page); ?></span>
				
		</div>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<code class="modal-title" id="myModalLabel"></code>
				</div>
				<div class="modal-body">
					<span id="delete_info"></span>
					<input id="user-id" type="hidden"/>
					<br/><br/>
					<?php echo ($status); ?>
				</div>
				<div class="modal-footer">
					
					<a id="submit" href="#"><button type="button" data-dismiss="modal" class="btn btn-primary">确定</button></a>
					
				</div>
			</div>
		</div>
    </div>
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<code class="modal-title" id="myModalLabel2"></code>
				</div>
				<div class="modal-body">
					<span id="delete_info2"></span>
					<br/><br/>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<a id="submit2" href="#"><button type="button" class="btn btn-primary">确定</button></a>
					
				</div>
			</div>
		</div>
    </div>
	
	<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<code class="modal-title" id="myModalLabel3"></code>
				</div>
				<div class="modal-body">
					<span id="delete_info3"></span>
					<br/><br/>
					<form style="font-size:12px;margin-left:60px;" action="__URL__/reset_pass" method="post">
						<input type="hidden" id="option_user_id" name="id"/>
						新密码
						<br/>
						<input type="text" name="pass" id="pass" style="width:300px;"/>
						<br/><br/>
						确认密码
						<br/>
						<input type="text" name="passl" id="passl" style="width:300px;"/>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					<a id="submit3" href="#"><button type="submit" class="btn btn-primary">确定</button></a>
					</form>
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