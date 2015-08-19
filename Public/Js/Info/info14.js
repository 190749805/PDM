//验证info14页面信息
$(function(){
	$('.save14').click(function(){
		var mc=$('#mc').val().trim();
		var zlh=$('#zlh').val().trim();
        var qk = $('select[name = "qk"]').val();
        if (qk == '有') {
            if(mc==""){
                $('#b-mc').html('必填，没有填无');
                return false;
            }else if(zlh==""){
                $('#b-zlh').html('必填，没有填无');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
	$('#mc').keyup(function(){
		if($('#mc').val().trim()!=""){
			$('#b-mc').html('');
		}
	});
	$('#zlh').keyup(function(){
		if($('#zlh').val().trim()!=""){
			$('#b-zlh').html('');
		}
	});
})
// 控制有无情况
$(function(){
    $('select[name = "qk"]').change(function(){
        var qkValue = $('select[name = "qk"]').val();
        if (qkValue == '有') {
            $('.hid').show();
        } else {
            $('.hid').hide();
        }
    });
    var qkVal = $('select[name = "qk"]').val();
    if (qkVal == '无') {
        $('.hid').hide();
    }
})