//验证info13数据
$(function(){
	$('.save13').click(function(){
        var cg=$('#cg').val().trim();
		var mc=$('#mc').val().trim();
		var dw=$('#dw').val().trim();
		var jb=$('#jb').val().trim();
        var qk = $('select[name = "qk"]').val();
        if (qk == '有') {
            if(mc==""){
                $('#b-mc').html('必填，没有填无');
                return false;
            }else if (cg==""){
                $('#b-cg').html('必填，没有填无');
                return false;
            }else if(dw==""){
                $('#b-dw').html('必填，没有填无');
                return false;
            }else if(jb==""){
                $('#b-jb').html('必填，没有填无');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
    $('#cg').keyup(function(){
        if($('#cg').val().trim()!=""){
            $('#b-cg').html('');
        }
    });
	$('#mc').keyup(function(){
		if($('#mc').val().trim()!=""){
			$('#b-mc').html('');
		}
	});
	$('#dw').keyup(function(){
		if($('#dw').val().trim()!=""){
			$('#b-dw').html('');
		}
	});
	$('#jb').keyup(function(){
		if($('#jb').val().trim()!=""){
			$('#b-jb').html('');
		}
	});
})
// 控制有无的操作显示情况
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