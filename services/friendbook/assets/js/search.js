$(function(){
    $(".search").keyup(function(){
        var search = $(this).val();
        // $_POST['search']
        $.post("http://localhost:81/friendbook/core/ajax/search.php", {search:search}, function(data){
            $('.search-result').html(data);
        });
    });
    $(document).on('keyup', '.search-user', function(){
        $('.message-recent').hide();
        var search = $(this).val();
        $.post("http://localhost:81/friendbook/core/ajax/searchUserInMsg.php", {search:search}, function(data){
            $('.message-body').html(data);
        });
    });
});