let notificationsContainer = $('#notification-container');

function sendNotification(text, clasz){
    let notification = document.createElement('div');
    notification.classList.add("alert");
    notification.classList.add(clasz);
    notification.innerText = text;
    notification.role = "alert";
    sendNotificationNode(notification);
}

function sendNotificationNode(node) {
    notificationsContainer.append(node);
    if(notificationsContainer.children().length === 1){
        proccessNotification(node);
    }
}

function proccessNotification(notification){
    $(notification).fadeTo(2000, 500).slideUp(500, function(){
        $(notification).slideUp(500, function () {
            notification.remove();
            if(notificationsContainer.children().length > 0){
                proccessNotification(notificationsContainer.children().first()[0])
            }
        });
    });
}