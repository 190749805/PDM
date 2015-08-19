/* $(function(){
	//显示学科组
	var i;
	var str1="";
	var str3="";
	var vt="";
	var vs="";
	var hiddenXkz=$('#hidden-xkz').val();
	if(hiddenXkz==""){
		for(i=0;i<xkz[0].length;i++){
			str1+='<option value="'+xkz[0][i]+'">'+xkz[0][i]+'</option>';
		}
		for(i=0;i<xkz[1].length;i++){
			str3+='<option value="'+xkz[1][i]+'">'+xkz[1][i]+'</option>';
		}
	}else{
		var ary=new Array;
		ary=hiddenXkz.split("*");
		for(i=0;i<xkz[0].length;i++){
			if(xkz[0][i]==ary[0]){
				vt='<option selected="true" value="'+xkz[0][i]+'">'+xkz[0][i]+'</option>';
				continue;
			}
			str1+='<option value="'+xkz[0][i]+'">'+xkz[0][i]+'</option>';
		}
		if(ary[0]=='校内'){
			for(i=0;i<xkz[1].length;i++){
				if(xkz[1][i]==ary[1]){
					vs='<option selected="true" value="'+xkz[1][i]+'">'+xkz[1][i]+'</option>';
					continue;
				}
				str3+='<option value="'+xkz[1][i]+'">'+xkz[1][i]+'</option>';
			}
		}else{
			for(i=0;i<xkz[2].length;i++){
				if(xkz[2][i]==ary[1]){
					vs='<option selected="true" value="'+xkz[2][i]+'">'+xkz[2][i]+'</option>';
					continue;
				}
				str3+='<option value="'+xkz[2][i]+'">'+xkz[2][i]+'</option>';
			}
		}
	}
	$('#xkz').html(vt+str1);
	$('#select-xkz').html(vs+str3);
	$('#xkz').change(function(){
		var m=$(this).val();
		var str2="";
		if(m=='校内'){
			for(i=0;i<xkz[1].length;i++){
				str2+='<option value="'+xkz[1][i]+'">'+xkz[1][i]+'</option>';
			}
		}else{
			for(i=0;i<xkz[2].length;i++){
				str2+='<option value="'+xkz[2][i]+'">'+xkz[2][i]+'</option>';
			}
		}	
		$('#select-xkz').html(str2);
		//console.log(m);
	});
	
}); */
$(function(){
	//点击按钮后增加<select>
	var i=1;
	$('#zj').click(function(){
		i++;
		var str1=$('#span-xrjszw').html();
		var btn='<button type="button" class="btn-qx1" >取消</button>';
		var str2=str1.replace('id="xrjszw1"','id="xrjszw'+i+'"');
		str2=str2.replace('id="xrzwsjy1"','id="xrzwsjy'+i+'"');
		str2=str2.replace('id="xrzwsjm1"','id="xrzwsjm'+i+'"');
		str2=str2.replace(/disabled="disabled"/g,'');
		$('#span_zj').append('<p>'+str2+btn+'</p>');
		//console.log(str2);
	});
	if($('#hid-xrjszw').val()!=""){
		$('#span-xrjszw').hide().attr('disabled', true);
		$('#xrjszw1').attr('disabled',true);
		$('#xrzwsjy1').attr('disabled',true);
		$('#xrzwsjm1').attr('disabled',true);
	}
})
//判断填写的内容
$(function(){
    $('button#red1').click(function(){
        // 专业专长
        var hid = $('input[name="hidden-zyzc"]').val();
        if (hid == 0) {
            var str = $('p.zyzc').html();
            var btn = "";
            if (str.search(/none/)>0) {
                btn = '<button type="button" class="btn-qx2" >取消</button>';
            }
            $('span#span-zyzc').append('<p class="name">'+str+btn+'</p>');
        } else if(hid == 1) {
            $('p.zyzc').remove();
            var sty = '<p class="name">现从事专业: <input class="zyzc" type="text" name="xcszy[]">'+
                '&nbsp;专长:<input class="zyzc" type="text" name="xcszc[]">'+
                '<button type="button" class="btn-qx2" >取消</button></p>';
            $('span#span-zyzc').append('<p class="name">'+sty+'</p>');
        }

    })
    if ($('input[name="hidden-zyzc"]').val() == 1) {
        $('p.zyzc').remove();
        $('p.zyzc').hide();
    } else {
        $('p.zyzc').show();
    }
    // 学术团体
    $('button#red2').click(function(){
        var hid = $('input[name="hid-ttzw"]').val();
        if (!hid) {
            var str = $('p.ttzw').html();
            var btn = "";
            if (str.search(/none/)>0) {
                btn = '<button type="button" class="btn-qx3" >取消</button>';
            }
            $('span#span-ttzw').append('<p class="name">'+str+btn+'</p>');
        } else {
            $('p.ttzw').remove();
            var sty = '参加何学术团体:<input type="text" class="ttzw" name="cjxstt[]">'+
            '任何职务:<input type="text" class="ttzw" name="rhzw[]">'+
                   '<button type="button" class="btn-qx3">取消</button>';
            $('span#span-ttzw').append('<p class="name">'+sty+'</p>');
        }
    })
    if ($('input[name="hid-ttzw"]').val()) {
        $('p.ttzw').remove();
        $('p.ttzw').hide();
    } else {
        $('p.ttzw').show();
    }
	$('#save2').click(function(){
        // 专业专长
        var str=1;
        $('input.zyzc').each(function(){
            var m = $(this).val();
            if (m == "") {
                $('#b-zyzc').html('不能为空');
                str = 0;
                return false;
            }
        })
        if(str == 0) {
            return false;
        }
        if ($('input[name="hidden-zyzc"]').val() == 1) {
            $('p.zyzc').remove();
        }
        // 团体职务
        var cstr=1;
        $('input.ttzw').each(function(){
            var n = $(this).val();
            if (n == "") {
                $('#b-ttzw').html('不能为空');
                cstr = 0;
                return false;
            }
        })
        if(cstr == 0) {
            return false;
        }
        if ($('input[name="hid-ttzw"]').val()) {
            $('p.ttzw').remove();
        }
        if($('#span-xrjszw').is(":hidden")){
            $('#xrjszw1').attr('disabled',true);
        }
        $('.st1').attr('disabled',false);
        $('.st0').attr('disabled',false);
	});
	$('#drdzzw').keyup(function(){
		var hg=$('#drdzzw').val();
		if(hg.trim()!=""){
			$('#b-drdzzw').html("");
		}
	});
	$('#shjz').keyup(function(){
		var hg=$('#shjz').val();
		if(hg.trim()!=""){
			$('#b-shjz').html("");
		}
	});

})
// 取消现职务
$(function(){
	$(document).on('click','.btn-qx1',function(){
        $(this).parent().remove();
	})
    $(document).on('click','.btn-qx2',function(){
        var i = 0;
        $('button.btn-qx2').each(function(){
            i++;
        })
        if (i == 1) {
            $(this).hide();
        } else {
            $(this).parent().remove();
        }
    })
    $(document).on('click','.btn-qx3',function(){
        var i = 0;
        $('button.btn-qx3').each(function(){
            i++;
        })
        if (i == 1) {
            $(this).hide();
        } else {
            $(this).parent().remove();
        }
    })
})
// 控制评审中的其他的这个选项显示
$(function(){
    var qita = $('select[name="pwhsp"]').val();
    if (qita == '其他') {
        $('input[name="sp"]').show();
    } else {
        $('input[name="sp"]').hide();
    }
    $('select[name="pwhsp"]').change(function(){
        var qitiVal = $('select[name="pwhsp"]').val();
        if (qitiVal == '其他') {
            $('input[name="sp"]').show();
        } else {
            $('input[name="sp"]').hide();
        }
    })
})

//控制党政职务
$(function(){
    $('button#red3').click(function(){
        var str = '<p class="name">担(兼)任党政职务:<input type="text" name="drdzzw[]"></p>';
        $('#span-dz').append(str);
    })
    if ($('input[name="hid-zw"]').val() == "") {
        $('p.dzzw').show();
    } else {
        $('p.dzzw').hide();
    }
})
// 控制社会兼职
$(function(){
    $('button#red4').click(function(){
        var str = '<p class="name">社会兼职:<input type="text" name="shjz[]"></p>';
        $('#span-jz').append(str);
    })
    if ($('input[name="hid-jz"]').val() == "") {
        $('p.shjz').show();
    } else {
        $('p.shjz').hide();
    }
})
//控制学科组
$(function(){
    var str1 =  $('select[name="xwxkz"]').html();
    var ary = new Array;
    ary =Array('大气科学','电子科学与技术','信息与通信工程','计算机科学与技术','数学','控制科学与工程','工商管理');
    $('select[name="xnxkz"]').change(function(){
        var xkzVal = $(this).val();
        for (var i = 0; i < ary.length; i++) {
            if (xkzVal == ary[i]) {
                // $('select[name="xwxkz"]').html("");
                // console.log(str1);
                $('select[name="xwxkz"]').html('<option value="'+xkzVal+'">'+xkzVal+'</option>');
                return;
            } else {
                $('select[name="xwxkz"]').html(str1);
            }
        }
    });
    var xVal = $('select[name="xnxkz"]').val();
    console.log(xVal);
    for (var i = 0; i < ary.length; i++) {
        if (xVal == ary[i]) {
            // $('select[name="xwxkz"]').html("");
            // console.log(str1);
            $('select[name="xwxkz"]').html('<option value="'+xVal+'">'+xVal+'</option>');
            return;
        } else {
            $('select[name="xwxkz"]').html(str1);
        }
    }
})
// 控制校外学科组
$(function(){
    var ary =new Array('讲师','助理研究员');
    var xwxkz = $('input[name="hid-xkz"]').val();
    for (var i = 0; i < ary.length; i++) {
        if (xwxkz == ary[i]) {
            $('select[name="xwxkz"]').parent().hide();
        }
    }

})
$(function(){
    $('select[name="dp"]').change(function(){
        var dp = $('select[name="dp"]').val();
        if (dp == '群众') {
            $('select[name="hscjdpy"]').parent().hide();
        } else {
            $('select[name="hscjdpy"]').parent().show();
        }
    })
    var dpVal = $('select[name="dp"]').val();
    if (dpVal == '群众') {
        $('select[name="hscjdpy"]').parent().hide();
    } else {
        $('select[name="hscjdpy"]').parent().show();
    }
})