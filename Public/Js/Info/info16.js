//验证数据
$(function(){
	$('.save16').click(function(){
		var brzj=$('#brzj').val().trim();
		var rwgs=$('#rwgs').val().trim();
		var hjzs=$('#hjzs').val().trim();
		var jxggzs=$('#jxggzs').val().trim();
		var zdyjs=$('#zdyjs').val().trim();
		var zdjstg=$('#zdjstg').val().trim();
		var sysgx=$('#sysgx').val().trim();
		var wycd=$('#wycd').val().trim();
		var jsjsp=$('#jsjsp').val().trim();
		var lwzzzs=$('#lwzzzs').val().trim();
		var kyhjzs=$('#kyhjzs').val().trim();
		if(brzj==""){
			$('#b-brzj').html('必填，没有填无');
			return false;
		}else if(rwgs==""){
			$('#b-rwgs').html('必填，没有填无');
			return false;
		}else if(hjzs==""){
			$('#b-hjzs').html('必填，没有填无');
			return false;
		}else if(jxggzs==""){
			$('#b-jxggzs').html('必填，没有填无');
			return false;
		}else if(zdyjs==""){
			$('#b-zdyjs').html('必填，没有填无');
			return false;
		}else if(zdjstg==""){
			$('#b-zdjstg').html('必填，没有填无');
			return false;
		}else if(sysgx==""){
			$('#b-sysgx').html('必填，没有填无');
			return false;
		}else if(wycd==""){
			$('#b-wycd').html('必填，没有填无');
			return false;
		}else if(jsjsp==""){
			$('#b-jsjsp').html('必填，没有填无');
			return false;
		}else if(lwzzzs==""){
			$('#b-lwzzzs').html('必填，没有填无');
			return false;
		}else if(kyhjzs==""){
			$('#b-kyhjzs').html('必填，没有填无');
			return false;
		} else {
            $('.text-kk').attr('disabled',false);
        }
	});
	$('#kyhjzs').keyup(function(){
		var kyhjzs=$('#kyhjzs').val().trim();
		if(kyhjzs!=""){
			$('#b-kyhjzs').html("");
		}
	});
	$('#lwzzzs').keyup(function(){
		var lwzzzs=$('#lwzzzs').val().trim();
		if(lwzzzs!=""){
			$('#b-lwzzzs').html("");
		}
	});
	$('#jsjsp').keyup(function(){
		var jsjsp=$('#jsjsp').val().trim();
		if(jsjsp!=""){
			$('#b-jsjsp').html("");
		}
	});
	$('#wycd').keyup(function(){
		var wycd=$('#wycd').val().trim();
		if(wycd!=""){
			$('#b-wycd').html("");
		}
	});
	$('#sysgx').keyup(function(){
		var sysgx=$('#sysgx').val().trim();
		if(sysgx!=""){
			$('#b-sysgx').html("");
		}
	});
	$('#zdjstg').keyup(function(){
		var zdjstg=$('#zdjstg').val().trim();
		if(zdjstg!=""){
			$('#b-zdjstg').html("");
		}
	});
	$('#brzj').keyup(function(){
		var brzj=$('#brzj').val().trim();
		if(brzj!=""){
			$('#b-brzj').html("");
		}
	});
	$('#rwgs').keyup(function(){
		var rwgs=$('#rwgs').val().trim();
		if(rwgs!=""){
			$('#b-rwgs').html("");
		}
	});
	$('#hjzs').keyup(function(){
		var hjzs=$('#hjzs').val().trim();
		if(hjzs!=""){
			$('#b-hjzs').html("");
		}
	});
	$('#jxggzs').keyup(function(){
		var jxggzs=$('#jxggzs').val().trim();
		if(jxggzs!=""){
			$('#b-jxggzs').html("");
		}
	});
	$('#zdyjs').keyup(function(){
		var zdyjs=$('#zdyjs').val().trim();
		if(zdyjs!=""){
			$('#b-zdyjs').html("");
		}
	});
})
$(function(){
	$('#change_to_audit').click(function(){
		if(confirm('提交审核后进入待审核状态，不能修改以填写的信息')){
			$('.text-kk').attr('disabled',false);
			window.location.href='/PDM/index.php?s=/Info/change_to_audit';
		}else{
			return false;
		}
	})
})