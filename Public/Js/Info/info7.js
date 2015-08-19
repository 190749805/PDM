$(function(){
	var sts=$('#status').val();
	if(sts=='无'){
		$('#span-hjqk').hide();
        $('.ry').attr('disabled',false);
	}else if(sts=='获奖' || sts == '荣誉'){
        if (sts == '获奖') {
            $('#span-hjqk').show();
            $('.jy').show();
            $('.ry').attr('disabled',false);
        } else {
            $('#span-hjqk').show();
            $('.jy').show();
            $('.ry').attr('disabled',true);
        }
	}else{
		$('#span-hjqk').show();
		$('.jy').hide();
        $('.st1').attr('disabled',false);
	}
	//控制info7中获奖或者惩处
	$('#status').change(function(){
		var m=$('#status').val();
		// console.log(m);
		if(m=='获奖' || m=='荣誉'){
            if (m == '获奖') {
                $('#span-hjqk').show();
                $('.jy').show();
                $('.ry').attr('disabled',false);
            } else {
                $('#span-hjqk').show();
                $('.jy').show();
                $('.ry').attr('disabled',true);
            }

		}else if(m=='惩处'){
            $('.ry').attr('disabled',false);
			$('#span-hjqk').show();
			$('.jy').hide();
		}else{
            $('.ry').attr('disabled',false);
			$('#span-hjqk').hide();
		}
	});
	//验证数据
		$('.save7').click(function(){
            var mcsy = $('#mcsy').val();
            var dd = $('#dd').val();
            var bz = $('#bz').val();
            var ch = $('#ch').val().trim();
            var n = $('#status').val();
			if(n != '无'){
                if (n == '荣誉') {
                    if (ch == "") {
                        $('#b-ch').html('不能为空');
                        return false;
                    }
                } else if ($('#status').val() == '惩处') {
                    if(mcsy.trim()==""){
                        $('#b-mcsy').html('必填，没有填无');
                        return false;
                    }
                    else if(dd.trim()==""){
                        $('#b-dd').html('必填，没有填无');
                        return false;
                    }
                    else if(bz.trim()==""){
                        $('#b-bz').html('必填，没有填无');
                        return false;
                    }
                } else {

                    if(mcsy.trim()==""){
                        $('#b-mcsy').html('必填，没有填无');
                        return false;
                    }else if(ch ==""){
                        $('#b-ch').html('不能为空');
                        return false;
                    }
                    else if(dd.trim()==""){
                        $('#b-dd').html('必填，没有填无');
                        return false;
                    }
                    else if(bz.trim()==""){
                        $('#b-bz').html('必填，没有填无');
                        return false;
                    }
                    else  if($('#pm').val().trim()==""){
                            $('#b-pm').html('如果选择获奖必填');
                            return false;
                    }
                }
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
			}
		});

		$('#mcsy').keyup(function(){
			if($('#mcsy').val().trim()!=""){
				$('#b-mcsy').html("");
			}
		});
		$('#dd').keyup(function(){
			if($('#dd').val().trim()!=""){
				$('#b-dd').html("");
			}
		});
		$('#pm').keyup(function(){
			if($('#pm').val().trim()!=""){
				$('#b-pm').html("");
			}
		});
		$('#ch').keyup(function(){
			if($('#ch').val().trim()!=""){
				$('#b-ch').html("");
			}
		});
		$('#bz').keyup(function(){
			if($('#bz').val().trim()!=""){
				$('#b-bz').html("");
			}
		});
})