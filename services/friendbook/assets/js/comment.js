$(function(){
    $(document).on('click','#postComment', function(){
        const BASE_URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/comment.php';
        var comment = $('#commentField').val();
        var postID  = $('#commentField').data('post');
        if (comment != ""){
            $.post(BASE_URL, {comment:comment, postID: postID}, function(data){
                $('#comments').html(data);
                $('#commentField').val("");
            }); 
        }
    })
});