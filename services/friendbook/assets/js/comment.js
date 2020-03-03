$(function(){
    $(document).on('click','#postComment', function(){
        var comment = $('#commentField').val();
        var postID  = $('#commentField').data('post');
        if (comment != ""){
            $.post("http://localhost:81/friendbook/core/ajax/comment.php", {comment:comment, postID: postID}, function(data){
                $('#comments').html(data);
                $('#commentField').val("");
            }); 
        }
    })
});