$(function(){
    $(document).on('click','.deleteTweet', function(){
        var postID    = $(this).data('post');
        $.post("http://localhost:81/friendbook/core/ajax/deletePost.php", {showPopup:postID}, function(data){
            $('.popupTweet').html(data);
            $('.close-retweet-popup, .cancel-it').click(function(){
                $('.retweet-popup').hide();
            });
            $(document).on('click','.delete-it', function(){
                $.post("http://localhost:81/friendbook/core/ajax/deletePost.php", {deletePost:postID}, function(data){
                    $('.retweet-popup').hide();
                    location.reload();
                });
            });
        }); 
    });

    $(document).on('click','.deleteComment', function(){
        var commentID = $(this).data('comment');
        var postID    = $(this).data('post');
        $.post("http://localhost:81/friendbook/core/ajax/deleteComment.php", {deleteComment:commentID}, function(data){
                $.post("http://localhost:81/friendbook/core/ajax/postpopup.php", {showPopup: postID}, function(data){
                    $('.popupTweet').html(data);
                    $('.tweet-show-popup-box-cut').click(function(){
                            $('.tweet-show-popup-wrap').hide();
                    });
                }); 
        }); 
    });
});