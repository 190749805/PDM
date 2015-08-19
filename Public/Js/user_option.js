$(function(){
	$('.deleteuser').click(function(){
		var user = '<font color=#31708f>'+$(this).html()+'</font>';
		var id = $(this).attr('data');
		var qx = $(this).attr('qx');
		var name = $(this).html();
		$('#user_id').val(id);
		$('#myModalLabel').html('正在对'+user+'用户进行操作');
		$('#user-id').val(id);
		$('#user-id').attr('qx',qx);
		$('#user-id').attr('uname',name);
		$('#delete_info').html('请选择您要对'+user+'进行的操作！');
		$('#myModal').modal('show');
	
	})
	$('#qx').click(function(){
		var user = '<font color=#31708f>'+$('#user-id').attr('uname')+'</font>';
		var oldchmod = $('#user-id').attr('qx');
		var newchmod;
		if(oldchmod == '三审管理员'){
			newchmod = '普通用户';
		}//dq5433433
		if(oldchmod == '普通用户'){
			newchmod = '管理员';
		}
		var chmod = '<br/><br/>原权限为<font color="#3c763d"> '+oldchmod+' </font> 修改为  <font color="#2d6ca2">'+newchmod+'</font>';
		var id = $('#user-id').val();
		$('#myModalLabel2').html('正在修改用户权限');
		$('#delete_info2').html('请谨慎操作，您正在修改用户名'+user+'的权限。请确认，该操作不可逆！'+chmod);
		$('#myModal2').modal('show');
		$('#submit2').attr('href','/PDM/index.php?s=/System/changchmod_by_id/id/'+id+'/option/changemod/newchmod/'+newchmod);
		$('#submit2').html('<button type="button" class="btn btn-primary">确定</button>');
	})
	$('#reset').click(function(){
		var user = '<font color=#31708f>'+$('#user-id').attr('uname')+'</font>';
		var id = $('#user-id').val();
		$('#option_user_id').val(id);
		$('#myModalLabel3').html('正在重置用户密码');
		$('#delete_info3').html('请谨慎操作，您正在重置用户名'+user+'的密码。请确认，该操作不可逆！');
		$('#myModal3').modal('show');
	
	})
	$('#delete').click(function(){
		var user = '<font color=#31708f>'+$('#user-id').attr('uname')+'</font>';
		var id = $('#user-id').val();
		$('#myModalLabel2').html('正在删除用户');
		$('#delete_info2').html('请谨慎操作，您正在删除用户名'+user+'的用户。请确认，该操作不可逆！');
		$('#myModal2').modal('show');
		$('#submit2').attr('href','/PDM/index.php?s=/System/changchmod_by_id/id/'+id+'/option/delete');
		$('#submit2').html('<button type="button" class="btn btn-primary">确定</button>');
	})
})