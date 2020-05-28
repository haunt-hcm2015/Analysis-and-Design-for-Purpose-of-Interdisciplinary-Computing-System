$(function(){
    const BASE_URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/fetchposts.php';
    var win = $(window);
    var offset = 10;
    win.scroll(function(){
        if ($(document).height() <= (win.height() + win.scrollTop())){
            offset += 10;
            $('#loader').show();
            $.post(BASE_URL, {fetchPost:offset}, function(data){
                $('.tweets').html(data);
                $('#loader').hide();
            }); 
        }
    });
});