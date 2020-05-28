$(function(){
    const URL1 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/search.php';
    const URL2 = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/searchUserInMsg.php';
    $(".search").keyup(function(){
        var search = $(this).val();
        $.post(URL1, {search:search}, function(data){
            $('.search-result').html(data);
        });
    });
    $(document).on('keyup', '.search-user', function(){
        $('.message-recent').hide();
        var search = $(this).val();
        $.post(URL2, {search:search}, function(data){
            $('.message-body').html(data);
        });
    });
});