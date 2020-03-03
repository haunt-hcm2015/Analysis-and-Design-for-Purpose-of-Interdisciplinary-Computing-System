$(function(){
    $(document).on('click', '.t-show-popup', function(){
        var postID = $(this).data('post');
        $.post("http://localhost:81/friendbook/core/ajax/postpopup.php", {showPopup: postID}, function(data){
           $('.popupTweet').html(data);
           $('.tweet-show-popup-box-cut').click(function(){
                $('.tweet-show-popup-wrap').hide();
           });
        }); 
    });
    $(document).on('click', '.imagePopup', function(e){
        e.stopPropagation();
        var postID = $(this).data('post');
        $.post("http://localhost:81/friendbook/core/ajax/imagepopup.php", {showImage: postID}, function(data){
           $('.popupTweet').html(data);
           $('.close-imagePopup').click(function(){
                $('.img-popup').hide();
           });
        }); 
    });
});