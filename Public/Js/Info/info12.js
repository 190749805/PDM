//验证info12数据
$(function(){
	$('.save12').click(function(){
		var kyxm=$('#kyxm').val().trim();
		var cdrw=$('#cdrw').val().trim();
        var qk = $('select[name = "qk"]').val();
        var bh = $('input[name = "bh"]').val().trim();
        if (qk == '有') {
            if(kyxm==""){
                $('#b-kyxm').html('必填，没有填无');
                return false;
            }else if(cdrw==""){
                $('#b-cdrw').html('必填，没有填无');
                return false;
            }else if(bh==""){
                $('#b-bh').html('必填，没有填无');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
	$('#kyxm').keyup(function(){
		if($('#kyxm').val().trim()!=""){
			$('#b-kyxm').html('');
		}
	});
	$('#cdrw').keyup(function(){
		if($('#cdrw').val().trim()!=""){
			$('#b-cdrw').html('');
		}
	});
    $('input[name="bh"]').keyup(function(){
        if($('select[name="bh"]').val().trim()!=""){
            $('#b-bh').html('');
        }
    });
})
// 控制有无的情况
$(function(){
    $('select[name = "qk"]').change(function(){
        var qkVal = $('select[name = "qk"]').val();
        if (qkVal == '有') {
            $('.hid').show();
        } else {
            $('.hid').hide();
        }
    });
    var qkValue = $('select[name = "qk"]').val();
    if (qkValue == '无') {
        $('.hid').hide();
    }
})
// 控制至今的显示情况
$(function(){
    $('select[name="jssjy"]').change(function(){
        var sjy = $('select[name="jssjy"]').val();
        if (sjy == '至今') {
            $('#span-m').hide();
        } else {
            $('#span-m').show();
        }
    })
    var swVal = $('select[name="jssjy"]').val();
    if (swVal == '至今') {
        $('#span-m').hide();
    } else {
        $('#span-m').show();
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
//