$(function(){
	$("#checkall").click(function(){ 
		$("input[name='baseinfo']:checkbox").each(function(){
			this.checked=true; 
		}); 
	});
	$("#delcheckall").click(function() {  
		$("input[name='baseinfo']:checkbox").each(function(){
			this.checked=false;   
		});
	});
	$("#uncheck").click(function() {  
		$("input[name='baseinfo']:checkbox").each(function(){
			if(this.checked == true){
				this.checked=false;
			}else{
				this.checked=true;
			}   
		});
	});
});