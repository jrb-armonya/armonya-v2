
let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

let notification_alarm = $('.notification-alarm');

let notif_container = $('#notif-container');

// Get all the partenaire notification not read.
newNotification();

// WHEN WE PRESS THE dropdown button we mark all the notifications as 'read'
$('.dropdown').on('show.bs.dropdown', function () {
    markNotifiationsAsRead();
});

// function read the notification
function markNotifiationsAsRead() {
    $.ajax({
        type: 'POST',
        url: '/espace-partenaire/notifications/markAllNotificationsAsRead',
        data: {
            _token: CSRF_TOKEN,
        },
        dataType: 'json',
        success: function(){
            notification_alarm.hide();
        }
    })
}

function newNotification()
{
    notif_container.empty();
    $.ajax({
        type: 'GET',
        url: hostIdentifier() + '/espace-partenaire/myNotifications',
        dataType: 'json',
        success: function (data) {
            // if there is unread notifications


            if (data[0].length != 0) {
                // set the notification alarm icon
                notification_alarm.show();
                $.each(data[0], function (index, notification) {

                    notif_container.append(
                        `
                            <div class="dropdown-divider mb-0"></div>
                            <a class="dropdown-item border-bottom" href="">
                                        <span class="text-success"> 
                                        <span class="weight500">
                                            <i class="fa fa-handshake-o weight600 pr-2"></i>Nouveau Rendez-vous</span>
                                        </span>
                                <span class="small float-right text-muted">${moment(notification.created_at).format('HH:mm')}</span>
            
                                <div class="dropdown-message f12">
                                    <b>${notification.data.fiche.name} ${notification.data.fiche.prenom}</b> pour le ${moment(notification.data.fiche.d_rv).format('DD/MM/YYYY')} à ${notification.data.fiche.h_rv}.
                                </div>
                            </a>
                        `
                    )
                });
            }
            $.each(data[1], function (index, notification) {

                notif_container.append(
                    `
                        <div class="dropdown-divider mb-0"></div>
                        <a class="dropdown-item border-bottom" href="">
                                    <span class="text-secondary"> 
                                    <span class="weight500">
                                        <i class="fa fa-handshake-o weight600 pr-2"></i>Rendez-vous</span>
                                    </span>
                            <span class="small float-right text-muted">${moment(notification.created_at).format('HH:mm')}</span>
        
                            <div class="dropdown-message f12">
                                <b>${notification.data.fiche.name} ${notification.data.fiche.prenom}</b> pour le ${moment(notification.data.fiche.d_rv).format('DD/MM/YYYY')} à ${notification.data.fiche.h_rv}.
                            </div>
                        </a>
                    `
                )
            });
            notif_container.append(`<a class="dropdown-item small" href="/espace-partenaire/notifications/all">Voir toutes les notifications</a>`)
        }
    });
}

// if the user click on the notification icon we mark all his notifications as read.

// we need another view to see all the old notifications.