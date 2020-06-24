notification = function(){
    const BASE_URL = 'http://localhost:81/ai-solution/services/friendbook/core/ajax/notification.php';
    $.get(BASE_URL,{showNotification:true}, function(data){
        if (data){
            if (data.notification > 0){
                $('#notification').addClass('span-i');
                $('#notification').html(data.notification);
            }
            if (data.messages > 0){
                $('#messages').show();
                $('#messages').addClass('span-i');
                $('#messages').html(data.messages);
            }
        }
    }, 'json');
}
setInterval(notification, 1000);