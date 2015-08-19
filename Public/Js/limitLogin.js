// 提交控制用户登陆时间提示
$(function(){
    $('#btn-tj').click(function(){
        if (confirm('确认提交吗？(*谨慎此操作)')) {

        } else {
            return false;
        }
    })
})