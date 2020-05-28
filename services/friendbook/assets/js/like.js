$(function(){
    $(document).on('click', '.like-btn', function(){
        const URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/like.php';
        var postID  = $(this).data('post');
        var userID  = $(this).data('user');
        var counter = $(this).find(".likesCount");
        var count   = counter.text();
        var button  = $(this);

        $.post(URL, {like:postID, userID: userID}, function(){
            button.addClass('unlike-btn');
            button.removeClass('like-btn');
            count++;
            counter.text(count);
            button.find('.fa-heart-o').addClass('fa-heart');
            button.find('.fa-heart').removeClass('fa-heart-o');
        }); 
    });

    $(document).on('click', '.unlike-btn', function(){
        var postID  = $(this).data('post');
        var userID  = $(this).data('user');
        var counter = $(this).find(".likesCount");
        var count   = counter.text();
        var button  = $(this);
        $.post(URL, {unlike:postID, userID: userID}, function(){
            counter.show();
            button.addClass('like-btn');
            button.removeClass('unlike-btn');
            count--;
            if (count === 0)
                counter.hide();
            else
                counter.text(count);
            button.find('.fa-heart').addClass('fa-heart-o');
            button.find('.fa-heart-o').removeClass('fa-heart');
        }); 
    });
});