//验证info4的数据
$(function(){
	$('.save4').click(function(){
		var byxx=$('#byxx').val();
		var szyx=$('#szyx').val();
		if(byxx.trim()==""){
			$('#b-byxx').html('必填，没有填无');
			return false;
		}else if(szyx.trim()==""){
			$('#b-szyx').html('必填，没有填无');
			return false;
		}else{
			$('.st1').attr('disabled',false);
			$('.st0').attr('disabled',false);
		}
	})
	$('#byxx').keyup(function(){
		if($('#byxx').val().trim()!=""){
			$('#b-byxx').html("");
		}
	});
	$('#szyx').keyup(function(){
		if($('#szyx').val().trim()!=""){
			$('#b-szyx').html("");
		}
	});
})
//控制学位显示
$(function(){
	if($('#sxw').val()=='无学位'){
		$('#span-xw').hide();
	}else{
		$('#span-xw').show();
	}
	
	$('#sxw').change(function(){
		if($(this).val()=='无学位'){
			$('#span-xw').hide();
		}else{
			$('#span-xw').show();
		}
	});
})
// 控制至今的显示情况
$(function(){
    $('select[name="swsjy"]').change(function(){
        var swsjy = $('select[name="swsjy"]').val();
        if (swsjy == '至今') {
            $('#span-m').hide();
        } else {
            $('#span-m').show();
        }
    })
    var swVal = $('select[name="swsjy"]').val();
    if (swVal == '至今') {
        $('#span-m').hide();
    } else {
        $('#span-m').show();
    }
})
// 控制学位
$(function(){
    var stry = "";
    var zyxw = $('input[name="zyxw"]').val();
    var stry2 = "";
    for (var j = 0; j < xwArr[0].length; j++){
        stry += '<option value="'+xwArr[0][j]+'">'+xwArr[0][j]+'</option>';
        if (xwArr[0][j] == zyxw) {
            stry += '<option selected="true" value="'+xwArr[0][j]+'">'+xwArr[0][j]+'</option>';
        }

    }
    for (var i = 0; i < xwArr[1].length; i++){
        stry2 += '<option value="'+xwArr[1][i]+'">'+xwArr[1][i]+'</option>';
        if (xwArr[1][i] == zyxw) {
            stry2 += '<option selected="true" value="'+xwArr[1][i]+'">'+xwArr[1][i]+'</option>';
        }
    }
    //console.log(stry2);
    if (stry.search(/selected/) > 0) {
       $('#ssxzy').html(stry);
    } else if (stry2.search(/selected/) > 0) {
        $('#ssxzy').html(stry2);
    } else {
        $('#ssxzy').html(stry);
    }

    $('#sxwlx').change(function(){
        var lx = $(this).val();
        // console.log(lx);
        var str;
        if (lx == '学术') {
            for (var i = 0; i< xwArr[0].length; i++) {
                str += '<option value="'+xwArr[0][i]+'">'+xwArr[0][i]+'</option>';
            }
        } else {
            for (var i = 0; i < xwArr[1].length; i++) {
                str += '<option value="'+xwArr[1][i]+'">'+xwArr[1][i]+'</option>';
            }
        }
        $('#ssxzy').html(str);
    })
})
