$(function(){
    var text=$('#msg').val().toLowerCase();
        $.ajax({
                type:"post",
                url:"http://localhost:81/friendbook/core/ajax/searchquestion.php",
                data:{text:text},
                success:function(data){
                    $('#ref').load(' #ref');
                }
        });
});