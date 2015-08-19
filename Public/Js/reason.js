$(function(){
    var objvalue;
    var claValue;
    $('select').change(function(){
        objvalue = "";
        claValue = "";
        var obj = $(this).val();
        if (obj == 2) {
            objvalue = $(this).attr('name');
            claValue = $(this).attr('content');
            // console.log(claValue.split('*'));
            $('#reason').val('信息不正确');
            $('#myModal').addClass('in');
            $('#myModal').css('display','block');
            $('#span_'+objvalue).html('<input type="hidden" name="'+claValue+'*'+objvalue+'" value>');
            // console.log(objvalue);
        } else {
            $('#span_'+objvalue).html('');
        }
    })
    $('#myModal').blur(function(){
        var value = $('#reason').val().trim();
        if(value != ''){

        }else{
            $('#myModal').addClass('in');
            $('#myModal').css('display','block');
        }
    })
    $('#save-reason').click(function(){
        var value = $('#reason').val().trim();
        if(value == ''){
            alert('请输入未通过原因');
        }else{
            // console.log(value);
            if (value.search(/#/) > 0 || value.search(/\*/) > 0) {
                alert('对不起，不能用*或#号');
            } else {
                $('input[name="'+claValue+'*'+objvalue+'"]').val(value);
                $('#myModal').removeClass('in');
                $('#myModal').css('display','none');
            }

        }
    })
})
