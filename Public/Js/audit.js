//获取哪些是打勾的，---审核通过的
$(function(){
	/* $('#tj').click(function(){
		var i;
		var j=0;
		var num;
		var ckb=$('input[name="ckb[]"]');
		for(i=0;i<ckb.length;i++){
			if(ckb[i].checked){
				j++;
			}
		}
		num=ckb.length-j;
		if(j==0){
			alert('你还么有审核，或者都没有通过');
			return false;
		}else{
			alert('总共'+j+'项通过审核，还有'+num+'项未通过审核');
		}
	}); */
})

//检查审核的情况
$(function(){
	$('#tj').click(function(){
		var i;
		var a=0;
		var b=0;
		var c=0;
		var ckb=$('select[id="ckb[]"]');
		//console.log(ckb.length);
		for(i=0;i<ckb.length;i++){
			if($(ckb[i]).val()==0){
				a++;
			}else if($(ckb[i]).val()==1){
					b++
			}else{
				c++
			}
		}
		if(a>0){
			if(confirm('还有'+a+'项没有审核，确认要提交吗?')){

			}else{
				return false;
			}
	
		}else{
			if(confirm('已经有'+b+'项通过,还有'+c+'项未通过确认审核完毕?')){
			
			}else{
				return false;
			}
		}
		
	});
})
//通过审核过程中选择哪个就显示相应的颜色
$(function(){
	$('select').change(function(){
		var n=$(this).val();
		if(n==1){
			$(this).parent().css('color','green');
		}else if(n==0){
			$(this).parent().css('color','black');
		}else if(n==2){
			$(this).parent().css('color','red');
		}
	});
	$('select[class="tishi"]').change(function(){
		var n=$(this).val();
		if(n==1){
			$(this).parent().parent().css('color','green');
			$(this).parent().prev().children().css('color','green');	
		}else if(n==0){
			$(this).parent().parent().css('color','black');
			$(this).parent().prev().children().css('color','black');
		}else if(n==2){
			$(this).parent().parent().css('color','red');
			$(this).parent().prev().children().css('color','red');
			//console.log($(this).parent());
		}
	});
})
$(function(){
	$('#all-select').click(function(){
		$('select').each(function(){
			$("option[value$='1']").attr('selected','selected');
			var n=$(this).val();
			if(n==1){
				$(this).parent().css('color','green');
			}else if(n==0){
				$(this).parent().css('color','black');
			}else if(n==2){
				$(this).parent().css('color','red');
			}
			var ntishi = $('select[class="tishi"]').val();
			if(ntishi==1){
				$(this).parent().parent().css('color','green');
				$(this).parent().prev().children().css('color','green');	
			}else if(ntishi==0){
				$(this).parent().parent().css('color','black');
				$(this).parent().prev().children().css('color','black');
			}else if(ntishi==2){
				$(this).parent().parent().css('color','red');
				$(this).parent().prev().children().css('color','red');
				//console.log($(this).parent());
			}
			$('td.cl2').css('color','green');
		})
	})
})
$(function(){
	$('#all-unselect').click(function(){
		$('select').each(function(){
			$("option[value$='0']").attr('selected','selected');
			var n=$(this).val();
			if(n==1){
				$(this).parent().css('color','green');
			}else if(n==0){
				$(this).parent().css('color','black');
			}else if(n==2){
				$(this).parent().css('color','red');
			}
			var ntishi = $('select[class="tishi"]').val();
			if(ntishi==1){
				$(this).parent().parent().css('color','green');
				$(this).parent().prev().children().css('color','green');	
			}else if(ntishi==0){
				$(this).parent().parent().css('color','black');
				$(this).parent().prev().children().css('color','black');
			}else if(ntishi==2){
				$(this).parent().parent().css('color','red');
				$(this).parent().prev().children().css('color','red');
				//console.log($(this).parent());
			}
			$('td.cl2').css('color','#000');
			$('td.cl1').css('color','#000');
		})
	})
})