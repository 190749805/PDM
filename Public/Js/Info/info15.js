$(function(){
    $('.save15').click(function(){
        var mc=$('#mc').val().trim();
        var cbs=$('#cbs').val().trim();
        var sm=$('#sm').val().trim();
        var qk = $('select[name="qk"]').val();
        var num = $('input[name="num"]').val().trim();
        if (qk == '有') {
            if(mc==""){
                $('#b-mc').html('必填，没有填无');
                return false;
            }
            else if(cbs==""){
                $('#b-cbs').html('必填，没有填无');
                return false;
            }
            else if(sm==""){
                $('#b-sm').html('必填，没有填无');
                return false;
            }else if (num == "" || isNaN(num)) {
                $('#b-num').html('必填，必须为数字');
                return false;
            }else{
                $('.st1').attr('disabled',false);
                $('.st0').attr('disabled',false);
            }
        }

    });
    $('#mc').keyup(function(){
        if($('#mc').val().trim()!=""){
            $('#b-mc').html("");
        }
    });
    $('#cbs').keyup(function(){
        if($('#cbs').val().trim()!=""){
            $('#b-mcbs').html("");
        }
    });
    $('#sm').keyup(function(){
        if($('#sm').val().trim()!=""){
            $('#b-sm').html("");
        }
    });

})
$(function(){
    $('select[name = "qk"]').change(function(){
        var qkVal = $('select[name = "qk"]').val();
        if (qkVal == '无') {
            $('.hid').hide();
        } else {
            $('.hid').show();
        }
    });
    var qkValue = $('select[name = "qk"]').val();
    if (qkValue == '无') {
        $('.hid').hide();
    }
})
//控制承担部分中的其他的情况
$(function(){
    $('select[name="cdbf"]').change(function(){
        var pm = $('select[name="cdbf"]').val();
        if (pm == '其他') {
            $('input[name="qita"]').css('display','inline-block');
        } else {
            $('input[name="qita"]').css('display','none');
        }
    })
    var pmVal = $('select[name="cdbf"]').val();
    if (pmVal == '其他') {
        $('input[name="qita"]').show();
    } else {
        $('input[name="qita"]').hide();
    }
})