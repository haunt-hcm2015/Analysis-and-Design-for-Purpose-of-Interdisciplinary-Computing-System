$(function(){
    $(document).on('click', '#send', function(){
        var message = $('#msg').val();
        var getID = $(this).data('user');
        $.post("http://localhost:81/friendbook/core/ajax/message.php", {sendMessage:message, getID:getID}, function(data){
            getMessage();
            $('#msg').val('');
        });
    });
});