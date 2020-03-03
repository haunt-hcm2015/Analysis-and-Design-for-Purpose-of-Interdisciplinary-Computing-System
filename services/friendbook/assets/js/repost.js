$(function(){
    
    $(document).on('click', '.retweet', function(){
        $postID  = $(this).data('post');
        $userID  = $(this).data('user');
        $counter = $(this).find(".rePostsCount");
        $count   = $counter.text();
        $button  = $(this);
        // Repost popup
        $.post("http://localhost:81/friendbook/core/ajax/repost.php", {showPopup: $postID, userID: $userID}, function(data){
            $('.popupTweet').html(data);
            $('.close-retweet-popup').click(function(){
                $('.retweet-popup').hide();
            });
        }); 
    });
    $(document).on('click', '.retweet-it', function(){
        var comment = $('.retweetMsg').val();
        $.post("http://localhost:81/friendbook/core/ajax/repost.php", {repost: $postID, userID: $userID, comment:comment}, function(data){
            $('.retweet-popup').hide();
            $count++;
            $counter.text($count);
            $button.removeClass('retweet').addClass('retweeted');
        }); 
    });
});
