//验证info9数据
$(function(){
	/*$('.save9').click(function(){
		// var jb=$('input[name="jb"]').val().trim();
        var msVal = $('select[name = "slx"]').val();
//        var msyy = $('select[name = "msyy"]').val().trim();
        if (msVal != '免试') {
            if(jb==""){
                $('#b-jb').html('必填，没有填无');
                return false;
            }
        }

	});
    // 考试类型的变换
    $('select[name = "slx"]').change(function(){
        var lx  = $('select[name = "slx"]').val();
        if (lx == '免试') {
            $('.ks').hide();
            $('.ms').show();
        } else {
            $('.ks').show();
            $('.ms').hide();
        }
    })
    var mslx = $('select[name  = "slx"]').val();
    if (mslx == '免试') {
        $('.ks').hide();
        $('.ms').show();
    } else {
        $('.ks').show();
        $('.ms').hide();
    }
    //
    //
    var arr = new Array;
    var i;
    arr[0] =Array('离退休年龄不足5年','专业免试','学历免试','在国外留学进修一年以上','国家英语六级430分以上免中级，国家英语四级430分以上免初级');
    arr[1] =Array('年龄免试','专业免试');
    $('select[name = "mslx"]').change(function(){
        var mslxVal = $('select[name = "mslx"]').val();
        var msyy = "";
        if (mslxVal == '英语') {
            for (i = 0; i < arr[0].length; i++ ) {
                msyy += '<option value="'+arr[0][i]+'">'+arr[0][i]+'</option>';
            }

        } else {
//            console.log(arr[1]);
            for (i = 0; i < arr[1].length; i++ ) {
                msyy += '<option value="'+arr[1][i]+'">'+arr[1][i]+'</option>';
            }
        }
        $('select[name = "msyy"]').html(msyy);
    })
    var msValue = $('select[name = "mslx"]').val();
    var msyyVal = "";
    var yy = $('#input-msyy').val();
    if (yy != "") {
        if (msValue == '英语') {
            var str = '';
            for (i = 0; i < arr[0].length; i++ ) {
                if (arr[0][i] == yy) {
                    str  = '<option selected="true" value="'+yy+'">'+yy+'</option>';
                    continue;
                }
                msyyVal += '<option value="'+arr[0][i]+'">'+arr[0][i]+'</option>';
            }

        } else {
            // console.log(arr[1]);
            for (i = 0; i < arr[1].length; i++ ) {
                if (arr[1][i] == yy) {
                    str = '<option selected="true" value="'+yy+'">'+yy+'</option>';
                    continue;
                }
                msyyVal += '<option value="'+arr[1][i]+'">'+arr[1][i]+'</option>';
            }
        }
        msyyVal = msyyVal + str;
    } else {
        if (msValue == '英语') {
            for (i = 0; i < arr[0].length; i++ ) {
                msyyVal += '<option value="'+arr[0][i]+'">'+arr[0][i]+'</option>';
            }

        } else {
            // console.log(arr[1]);
            for (i = 0; i < arr[1].length; i++ ) {
                msyyVal += '<option value="'+arr[1][i]+'">'+arr[1][i]+'</option>';
            }
        }
    }
    $('select[name = "msyy"]').html(msyyVal);*/

})
//控制免试的情况
$(function(){
    //英语免试
    $('select[name="yycj"]').change(function(){
        var yycj = $(this).val();
        // console.log(yycj);
        if (yycj == '免试') {
            $('span#yy').hide();
            $('select[name="yyms"]').parent().show();
        } else {
            $('span#yy').show();
            $('select[name="yyms"]').parent().hide();
        }
    })
    var yyVal = $('select[name="yycj"]').val();
    // console.log(yyVal);
    if (yyVal == '免试') {
        $('span#yy').hide();
        $('select[name="yyms"]').show();
    } else {
        $('span#yy').show();
        $('select[name="yyms"]').parent().hide();
    }
    
    // 计算机免试
    $('select[name="jsjcj"]').change(function(){
        var jsjcj = $(this).val();
        // console.log(jsjcj);
        if (jsjcj == '免试') {
            $('span#jsj').hide();
            $('select[name="jsjms"]').parent().show();
        } else {
            $('span#jsj').show();
            $('select[name="jsjms"]').parent().hide();
        }
    })
    var jsjVal = $('select[name="jsjcj"]').val();
    if (jsjVal == '免试') {
        $('span#jsj').hide();
        $('select[name="jsjms"]').show();
    } else {
        $('span#jsj').show();
        $('select[name="jsjms"]').parent().hide();
    }
})