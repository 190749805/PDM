$(function(){
	//判断用户的姓名填写没有并显示填写信息的列表
	$('.save1').click(function(){
		var name=$('#input-name').val();
		var sfzh=$("input[name='sfzh']").val();
		if(name.trim()==""){
			//console.log('fsa');
			$('#b-name').html('请输入姓名');
			return false;
		}else if(sfzh.trim()==""){
			$('#b-sfzh').html('请输入身份证号码');
			return false;
		}else{
			$('.st1').attr('disabled',false);
			$('.st0').attr('disabled',false);
		}
	});
	$('#input-name').keyup(function(){
			var name=$('#input-name').val();
			if(name.trim()!=""){
				$('#b-name').html("");
			}
		});
	$('input[name="sfzh"]').keyup(function(){
			var sfzh=$('input[name="sfzh"]').val();
			if(sfzh.trim()!=""){
				$('#b-sfzh').html("");
			}
		});
})
//上传图片后的显示
$(function(){
	$('#tupian').change(function(){
		var m=$('#tupian').val();
		if(m!=""){
			$('#p-id').html('已选择图片');
			//console.log('fd');
		}
	})
})
//显示籍贯
$(function(){
	var i;
	var j;
	if($('#input-jg').val()==""){
		for(i=0;i<allCityArr[0].length;i++){
			$('#jg').append('<option value="'+allCityArr[0][i]+'">'+allCityArr[0][i]+'</option>');
		}
		for(i=1;i<allCityArr[1].length;i++){
			$('#city').append('<option value="'+allCityArr[1][i]+'">'+allCityArr[1][i]+'</option>');
		}
	}else{
		var str=$('#input-jg').val();
		var pt="";
		var cy="";
		var vt="";
		var st="";
		var ary=str.split('.');
		for(i=0;i<allCityArr[0].length;i++){
			if(ary[0]==allCityArr[0][i]){
				vt=allCityArr[0][i]='<option selected="true" value="'+allCityArr[0][i]+'">'+allCityArr[0][i]+'</option>';
				continue;
			}
			pt+='<option value="'+allCityArr[0][i]+'" >'+allCityArr[0][i]+'</option>';
		}
		$('#jg').html(vt+pt);
		//var res = allCityArr.slice(1).map(function(a){ return a[0];});
		//console.log(ft);
		/* for(i=0;i<res.length;i++){
			if(res[i]==ary[0]){
				for(j=1;j<allCityArr[i+1].length;j++){
					//console.log(allCityArr[i+1].length);
					if(ary[1]==allCityArr[i+1][j]){
						st='<option selected="true" value="'+allCityArr[i+1][j]+'">'+allCityArr[i+1][j]+'</option>';
						continue;
					}
					cy+='<option value="'+allCityArr[i+1][j]+'">'+allCityArr[i+1][j]+'</option>';
				}
				break;
			}
		} */
		//console.log(st);
		for(i=1;i<allCityArr.length;i++){
			if(allCityArr[i][0]==ary[0]){
				for(j=1;j<allCityArr[i].length;j++){
					if(allCityArr[i][j]==ary[1]){
						st='<option selected="true" value="'+allCityArr[i][j]+'">'+allCityArr[i][j]+'</option>';
						continue;
					}
					cy+='<option value="'+allCityArr[i][j]+'">'+allCityArr[i][j]+'</option>';
				}
				//console.log('fds');
			}
		}
		$('#city').html(st+cy);
		//console.log(st);
	}
	$('#jg').change(function(){
		$('#city').html('');
		var m=$(this).val();
		//console.log(m);
		for(i=1;i<allCityArr.length;i++){
			if(m==allCityArr[i][0]){
				for(j=1;j<allCityArr[i].length;j++){
					$('#city').append('<option value="'+allCityArr[i][j]+'">'+allCityArr[i][j]+'</option>');
				}
			}
			//$('#city').append('<option value="'+allCityArr[i][0]+'">'+allCityArr[i][0]+'</option>');
		}
	});
})	