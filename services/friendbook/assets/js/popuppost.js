$(function(){
    $(document).on('click', '.t-show-popup', function(){
        var postID = $(this).data('post');
        const URL1 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/postpopup.php';
        $.post(URL1, {showPopup: postID}, function(data){
           $('.popupTweet').html(data);
           $('.tweet-show-popup-box-cut').click(function(){
                $('.tweet-show-popup-wrap').hide();
           });
        }); 
    });
    $(document).on('click', '.imagePopup', function(e){
        e.stopPropagation();
        const URL2 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/imagepopup.php';
        var postID = $(this).data('post');
        $.post(URL2, {showImage: postID}, function(data){
           $('.popupTweet').html(data);
           $('.close-imagePopup').click(function(){
                $('.img-popup').hide();
           });
        }); 
    });
});