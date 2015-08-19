$(function(){
	$('.st0').attr('disabled',true);
	$('.st1').attr('disabled',true);
	//console.log('fd');
})
$(function(){
	var url =  document.location.search;
	var pages = url.length;
//	console.log(pages);
	if(pages < 15){
	//	console.log(pages);
		var page = url.substr(13,1);
	}else if(pages == 15){
		var page = url.substr(13,2);
	}else if(pages == 19){
		var page = url.substr(13,1);
	}else if(pages == 20){
		var page = url.substr(13,2);
		console.log(page);
	}else if(pages == 21){
		var page = parseInt(url.substr(13,2));
	}
	$("input.btn[value$='"+page+"']").first().css('background','#000').css('color','#fff').css('opacity','0.75');
})
$(function(){
	$('.info_table a').css('color','#fff');
})