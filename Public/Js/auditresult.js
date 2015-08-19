$(function(){
	$('select').removeAttr("name").removeAttr("id").attr('disabled','disabled').hide();
	$('textarea').attr('disabled','disabled');
	$('select').remove();
})
$(function(){
    $('table.tb td.td-a').mouseover(function(){
        var i;
        for( i = 0 ; i < allReasonArr.length ; i++ ) {
            if( $(this).html() == allReasonArr[i][1] ) {
                $('#reason').html( allReasonArr[i][0] );
                $('#myModal').modal('show')
            }
        }
    })
})
