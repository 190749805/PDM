//验证info5的数据
$(function(){
	$('.save5').click(function(){
		var xx=$('#xx').val();
        var qkValue = $('select[name="qk"]').val();
        if(qkValue == '有') {
            if(xx.trim()==""){
                $('#b-xx').html('必填，没有填无');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

	});
	$('#xx').keyup(function(){
		if($('#xx').val().trim()!=""){
			$('#b-xx').html("");
		}
	});
    $('select[name="qk"]').change(function() {
        var qk = $('select[name="qk"]').val();
        if (qk == '无') {
            $('.hid').hide();
        } else {
            $('.hid').show();
        }
    });
    var selAk = $('select[name="qk"]').val();
    if (selAk == '无') {
        $('.hid').hide();
    } else {
        $('.hid').show();
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
    var sVal = $('select[name="jssjy"]').val();
    if (sVal == '至今') {
        $('#span-m').hide();
    } else {
        $('#span-m').show();
    }

})