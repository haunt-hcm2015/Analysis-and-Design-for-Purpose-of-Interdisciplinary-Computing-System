$(function(){
    $(document).on('click', '#send', function(){
        const URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/message.php';
        var message = $('#msg').val();
        var getID = $(this).data('user');
        $.post(URL, {sendMessage:message, getID:getID}, function(data){
            getMessage();
            $('#msg').val('');
        });
    });
});