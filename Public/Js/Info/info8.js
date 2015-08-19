//验证info8的数据
$(function(){
	$('.save8').click(function(){
		//console.log('ff');
		var xmmc=$('#xmmc').val();
		var ly=$('#ly').val();
		var pm=$('#pm').val();
        var xmqk = $('select[name = "qk"]');
        if (xmqk == '有') {
            if(xmmc.trim()==""){
                $('#b-xmmc').html('必填，不能为空');
                return false;
            }
            else if(ly.trim()==""){
                $('#b-ly').html('必填，不能为空');
                return false;
            }
            else if(pm.trim()==""){
                $('#b-pm').html('必填，不能为空');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
	$('#xmmc').keyup(function(){
		if($('#xmmc').val().trim()!=""){
			$('#b-xmmc').html("");
		}
	});
	$('#ly').keyup(function(){
		if($('#ly').val().trim()!=""){
			$('#b-ly').html("");
		}
	});
	$('#pm').keyup(function(){
		if($('#pm').val().trim()!=""){
			$('#b-pm').html("");
		}
	});
    // 控制项目的有无情况
    $('select[name="qk"]').change(function(){
        var qkValue = $('select[name="qk"]').val();
        if (qkValue == '无') {
            $('.hid').hide();
        } else {
            $('.hid').show();
        }
    });
    var qkVal = $('select[name="qk"]').val();
    if (qkVal == '无'){
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
    $('select[name="pm"]').change(function(){
        var pm = $('select[name="pm"]').val();
        if (pm == '其他') {
            $('input[name="qita"]').show();
        } else {
            $('input[name="qita"]').hide();
        }
    })
    var pmVal = $('select[name="pm"]').val();
    if (pmVal == '其他') {
        $('input[name="qita"]').show();
    } else {
        $('input[name="qita"]').hide();
    }
    //console.log(pmVal);
})