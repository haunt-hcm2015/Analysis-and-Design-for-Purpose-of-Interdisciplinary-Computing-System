$(function(){
    const BASE_URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/searchquestion.php';
    var text=$('#msg').val().toLowerCase();
        $.ajax({
                type: "post",
                url: BASE_URL,
                data:{text:text},
                success:function(data){
                    $('#ref').load(' #ref');
                }
        });
});