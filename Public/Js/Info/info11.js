//验证info11的数据
$(function(){
	$('.save11').click(function(){
		var title=$('#title').val().trim();
		var slmc=$('#slmc').val().trim();
		var js=$('#js').val().trim();
        var qk = $('select[name = "qk"]').val();
        if (qk == '有') {
            if(title==""){
                $('#b-title').html('必填，没有填无');
                return false;
            }else if(slmc==""){
                $('#b-slmc').html('必填，没有填无');
                return false;
            }else if(js==""){
                $('#b-js').html('必填，没有填无');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
	$('#title').keyup(function(){
		if($('#title').val().trim()!=""){
			$('#b-title').html('');
		}
	});
	$('#slmc').keyup(function(){
		if($('#slmc').val().trim()!=""){
			$('#b-slmc').html('');
		}
	});
	$('#js').keyup(function(){
		if($('#js').val().trim()!=""){
			$('#b-js').html('');
		}
	});
})
//控制有无情况
$(function(){
    $('select[name = "qk"]').change(function(){
        var qkVal = $('select[name = "qk"]').val();
        if (qkVal == '无') {
            $('.hid').hide();
        } else {
            $('.hid').show();
        }
    });
    var qkValue = $('select[name = "qk"]').val();
    if (qkValue == '无') {
        $('.hid').hide();
    }
})
//控制排名中的其他的情况
$(function(){
    $('select[name="spm"]').change(function(){
        var pm = $('select[name="spm"]').val();
        if (pm == '其他') {
            $('input[name="qita"]').show();
        } else {
            $('input[name="qita"]').hide();
        }
    })
    var pmVal = $('select[name="spm"]').val();
    if (pmVal == '其他') {
        $('input[name="qita"]').show();
    } else {
        $('input[name="qita"]').hide();
    }
})