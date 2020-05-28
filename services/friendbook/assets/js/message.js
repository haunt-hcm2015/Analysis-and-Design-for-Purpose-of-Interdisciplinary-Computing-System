$(function(){
    const URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/message.php';
    $(document).on('click', '#messagePopup', function(){
        var getMessage = 1;
        $.post(URL, {showMessage:getMessage}, function(data){
            $('.popupTweet').html(data);
            $('#messages').hide();
        });
    });
    $(document).on('click', '.people-message', function(){
        var getID = $(this).data('user');
        $.post(URL, {showChatPopup:getID}, function(data){
            $('.popupTweet').html(data);
            if (autoscroll){
                scrolldown();
            }
            $("#chat").on('scroll', function(){
                if ($(this).scrollTop() < this.scrollHeight - $(this).height()){
                    autoscroll = false;
                }else{
                    autoscroll = true;
                }
            });
            $('.close-msgPopup').click(function(){
                clearInterval(timer);
            });
        });
        getMessage = function(){
                $.post(URL, {showChatMessage:getID}, function(data){
                $('.main-msg-inner').html(data);
                if (autoscroll){
                    scrolldown();
                }
                $("#chat").on('scroll', function(){
                    if ($(this).scrollTop() < this.scrollHeight - $(this).height()){
                        autoscroll = false;
                    }else{
                        autoscroll = true;
                    }
                });
                $('.close-msgPopup').click(function(){
                    clearInterval(timer);
                });
            });
        }
        var timer = setInterval(getMessage, 1000);
        getMessage();
        autoscroll = true;
        scrolldown = function(){
            $('#chat').scrollTop($("#chat")[0].scrollHeight);
        }
        $(document).on('click', '.back-messages', function(){
            var getMessage = 1;
            $.post(URL, {showMessage:getMessage}, function(data){
                $('.popupTweet').html(data);
                clearInterval(timer);
            });
        });
        $(document).on('click', '.deleteMsg', function(){
            var messageID = $(this).data('message');
            $('.message-del-inner').height('100px');
            $(document).on('click', '.cancel', function(){
                $('.message-del-inner').height('0px');
            });
            $(document).on('click', '.delete', function(){
                $.post(URL, {deleteMsg:messageID}, function(data){
                    $('.message-del-inner').height('0px');
                    getMessage();
                });
            });
        });
    });
});