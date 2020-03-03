$(function(){
    var win = $(window);
    var offset = 10;
    win.scroll(function(){
        if ($(document).height() <= (win.height() + win.scrollTop())){
            offset += 10;
            $('#loader').show();
            $.post("http://localhost:81/friendbook/core/ajax/fetchposts.php", {fetchPost:offset}, function(data){
                $('.tweets').html(data);
                $('#loader').hide();
            }); 
        }
    });
});