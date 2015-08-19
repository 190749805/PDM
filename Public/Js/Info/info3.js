//如果是学习，就要显示修学年限
$(function(){
	$(document).on('change','#rzxx',function(){
		var m=$('#rzxx').val();
		//console.log(m);
		if(m=='任职'){
			$('#div-xuexi').hide();
			$('#select-rzxx').attr('disabled',true);
			$('#select-xl').attr('disabled',true);
		}else if(m=='学习'){
			$('#div-xuexi').show();
			$('#select-rzxx').removeAttr('disabled');
			$('#select-xl').removeAttr('disabled');
		}else{
		
		}
		//console.log($('#xkz').val());
	});
})
$(function(){
	//提交info3前的验证
	$('.save3').click(function(){
		var hd=$('#hd').val();
		var bm=$('#bm').val();
		var zy=$('#zy').val();
		var zmr=$('#zmr').val();
		if(hd.trim()==""){
			$('#b-hd').html('必填，没有填无');
			return false;
		}else if(bm.trim()==""){
			$('#b-bm').html('必填，没有填无');
			return false;
		}else if(zy.trim()==""){
			$('#b-zy').html('必填，没有填无');
			return false;
		}else if(zmr.trim()==""){
			$('#b-zmr').html('必填，没有填无');
			return false;
		}else{
			$('.st1').attr('disabled',false);
		}
	});
	$('#hd').keyup(function(){
		$('#b-hd').html("");
	});
	$('#bm').keyup(function(){
		$('#b-bm').html("");
	});
	$('#zy').keyup(function(){
		$('#b-zy').html("");
	});
	$('#zmr').keyup(function(){
		$('#b-zmr').html("");
	});
})
$(function(){
	var m=$('#rzxx').val();
	if(m=='任职'){
		$('#div-xuexi').hide();
	}else{
		$('#div-xuexi').show();
	}
})
// 控制至今的显示情况
$(function(){
    $(document).on('change', '#jssjy', function(){
        var vl = $('#jssjy').val();
        if (vl == '至今') {
            $('#span-m').hide();
        } else {
            $('#span-m').show();
        }
    })
    var vly = $('#jssjy').val();
    if (vly == '至今') {
        $('#span-m').hide();
    }
})
