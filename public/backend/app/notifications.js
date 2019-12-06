let CSRF_TOKEN_NOTIFICATION = $('meta[name="csrf-token"]').attr('content');

let notification_alarm = $('.notification-alarm');

let notif_container = $('#notif-container');

receiveCRNotification();

// WHEN WE PRESS THE dropdown button we mark all the notifications as 'read'
$('.dropdown').on('show.bs.dropdown', function () {
    markNotifiationsAsRead();
});

// function read the notification
function markNotifiationsAsRead() {
    $.ajax({
        type: 'POST',
        url: '/configuration/users/notifications/markAllNotificationsAsRead',
        data: {
            _token: CSRF_TOKEN_NOTIFICATION,
        },
        dataType: 'json',
        success: function () {
            notification_alarm.hide();
        }
    })
}


function receiveCRNotification() {
    
    notif_container.empty();
    
    $.ajax({
        type: 'GET',
        url: '/configuration/users/myNotifications',
        dataType: 'json',
        success: function (data) {
            // if there is unread notifications


            if (data[0].length != 0) {
                // set the notification alarm icon
                    
                $.each(data[0], function (index, notification) {
                    console.log(notification);
                    let color = "danger"

                    if(notification.data.cr.state == "Ciblé") {
                        color = "success"
                    }

                    notif_container.append(
                        `
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item border-bottom" href="">
                                        <span class="text-${color}"> 
                                        <span class="weight500">
                                            <i class="fa fa-handshake-o weight600 pr-2"></i>CR de ${notification.data.partenaire.name}</span>
                                        </span>
                                <span class="small float-right text-muted">${moment(notification.created_at).format('HH:mm')}</span>
            
                                <div class="dropdown-message f12">
                                    <b>${notification.data.fiche.name}</b>.
                                </div>
                            </a>
                        `
                    )
                });

                notification_alarm.show();
            }

            $.each(data[1], function (index, notification) {
                

                console.log(notification)

                notif_container.append(
                    `
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item border-bottom" href="">
                                    <span class="text-secondary"> 
                                    <span class="weight500">
                                        <i class="fa fa-handshake-o weight600 pr-2"></i>CR de ${notification.data.partenaire.name}</span>
                                    </span>
                            <span class="small float-right text-muted">${moment(notification.created_at).format('HH:mm')}</span>
        
                            <div class="dropdown-message f12">
                                <b>${notification.data.fiche.name}</b>.
                            </div>
                        </a>
                    `
                )
            });

            

            notif_container.append(`<a class="dropdown-item small" href="/espace-partenaire/notifications/all">Voir toutes les notifications</a>`)
        }
    });
}