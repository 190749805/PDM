//验证info6数据
$(function(){
	$('.save6').click(function(){
		var mcrw=$('#mcrw').val();
		var xsrs=$('#xsrs').val();
		var zhxss=$('#zhxss').val();
		var zxss=$('#zxss').val();
        var qk = $('select[name = "qk"]').val();
        var fl = $('select[name="fl"]').val();
        if (qk == '有') {
            if (fl == '毕业设计') {
                if(xsrs.trim()=="" || isNaN(xsrs.trim())){
                    $('#b-xsrs').html('必填，且必须数字');
                    return false;
                }
            } else {
                if(mcrw.trim()==""){
                    $('#b-mcrw').html('必填，没有填无');
                    return false;
                } else if(xsrs.trim()=="" || isNaN(xsrs)){
                    $('#b-xsrs').html('必填，且必须数字');
                    return false;
                }
                else if(zhxss.trim()=="" || isNaN(zhxss)){
                    $('#b-zhxss').html('必填，且必须数字');
                    return false;
                }
                else if(zxss.trim()=="" || isNaN(zxss)){
                    $('#b-zxss').html('必填，且必须数字');
                    return false;
                }else{
                    $('.st1').attr('disabled',false);
                    $('.st0').attr('disabled',false);
                }
            }

        }

	});
	$('#mcrw').keyup(function(){
		if($('#mcrw').val().trim()!=""){
			$('#b-mcrw').html("");
		}
	});
	$('#lx').keyup(function(){
		if($('#lx').val().trim()!=""){
			$('#b-lx').html("");
		}
	});
	$('#xsrs').keyup(function(){
		if($('#xsrs').val().trim()!=""){
			$('#b-xsrs').html("");
		}
	});
	$('#zhxss').keyup(function(){
		if($('#zhxss').val().trim()!=""){
			$('#b-zhxss').html("");
		}
	});
	$('#zxss').keyup(function(){
		if($('#zxss').val().trim()!=""){
			$('#b-zxss').html("");
		}
	});
})
// 控制有无情况
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
// 控制至今的显示情况
$(function(){
    $('select[name="endy"]').change(function(){
        var endy = $('select[name="endy"]').val();
        if (endy == '至今') {
            $('#span-m').hide();
        } else {
            $('#span-m').show();
        }
    })
    var swVal = $('select[name="endy"]').val();
    if (swVal == '至今') {
        $('#span-m').hide();
    } else {
        $('#span-m').show();
    }

})
// 控制教学分类情况
$(function(){
    $('select[name="fl"]').change(function(){
        var fl = $(this).val();
        if (fl == '毕业设计') {
            $('.hid-fl').hide();
            $('#span-xsrs').html('<span style="color:red">(不能超过8人)</span>');
        } else {
            $('.hid-fl').show();
            $('#span-xsrs').html('');
        }
        $('#mcrw').text("");
        $('#xsrs').val("");
    });
    var fl = $('select[name="fl"]').val();
    if (fl == '毕业设计') {
        $('.hid-fl').hide();
        $('#span-xsrs').html('<span style="color:red">(不能超过8人)</span>');
    } else {
        $('.hid-fl').show();
        $('#span-xsrs').html('');
    }
})