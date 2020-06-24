$(function(){
    $(document).on('click','.deleteTweet', function(){
        var postID    = $(this).data('post');
        const URL1 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/deletePost.php';
        $.post(URL1, {showPopup:postID}, function(data){
            $('.popupTweet').html(data);
            $('.close-retweet-popup, .cancel-it').click(function(){
                $('.retweet-popup').hide();
            });
            $(document).on('click','.delete-it', function(){
                $.post(URL1, {deletePost:postID}, function(data){
                    $('.retweet-popup').hide();
                    location.reload();
                });
            });
        }); 
    });

    $(document).on('click','.deleteComment', function(){
        var commentID = $(this).data('comment');
        var postID    = $(this).data('post');
        const URL1 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/deleteComment.php';
        const URL2 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/postpopup.php';
        $.post(URL1, {deleteComment:commentID}, function(data){
                $.post(URL2, {showPopup: postID}, function(data){
                    $('.popupTweet').html(data);
                    $('.tweet-show-popup-box-cut').click(function(){
                            $('.tweet-show-popup-wrap').hide();
                    });
                }); 
        }); 
    });
});