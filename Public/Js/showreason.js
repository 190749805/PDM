$(function(){
	$('textarea.cl2,tr.cl2,td.cl2,p.cl2').mouseover(function(){
		var info = $(this).attr('data');
	//	console.log(info);
		if(typeof(info) != "undefined" && typeof(reason[info]) != "undefined"){
			if(typeof(reason[info]) != "undefined" && reason[info] != ''){
				$("#reason").html(reason[info]);
				$("#myModal").modal('show');
			}
		}
	})
})