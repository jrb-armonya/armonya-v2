
getLastActiv = () => {

    let rightTimeLine = $('#right-timeline');
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    rightTimeLine.empty();
    $.ajax({
        url: hostIdentifier() + '/actions/last',
        type: 'GET',
        dataType: 'JSON',
        data: {_token: CSRF_TOKEN},
        success: function(data) {
            console.log(data);
            data.forEach( action => {
                let li;
                let partenaire = '';

                if(action.action == 'Edit') {
                    li = '<li class="time-dot-purple-light">';
                } else if  (action.action == 'Création') {
                    li = '<li class="time-dot-info">';
                } else if  (action.action == 'Report') {
                    li = '<li class="time-dot-info " style="color:#' + action.old_status.color + ' " >';
                } else if (action.action == 'Ecoute') {
                    li = '<li class="time-dot-ecoute" style="color:#' + action.old_status.color + ' " >';
                } else if (action.action == 'A Confirmer') {
                    li = '<li class="time-dot-confirmer" style="color:#' + action.old_status.color + ' " >';
                }
                else if (action.action == 'Confirmée') {
                    li = '<li class="time-dot-confirmer" style="color:#' + action.old_status.color + ' " >';
                }
                else if (action.action == 'Partenaire') {
                    li = '<li class="time-dot-partenaire" style="color:#' + action.old_status.color + ' " >';
                    partenaire = " id: #" + action.partenaire_id;
                }
                else if (action.action == 'Déqualification') {
                    li = '<li class="time-dot-partenaire" style="color:red;" >';
                    
                }
                // else {
                //     if(jQuery.inArray(action.new_status.id, [11,12,13,14,15,16,17,18,19,20,21,22,23,24])) {
                //         li = '<li class="time-dot-danger"  style="color:#' + action.new_status.color + ' " >';
                //     }
                //     else {
                //         li = '<li class="time-dot-success"  style="color:#' + action.new_status.color + ' " >';
                //     }
                // }
                let elem = 
                    li + 
                        '<div class="base-timeline-info">' + 
                            '<a href="#" id="activity-user">' + action.user.name + '</a> <span id="activity-action" >' + action.action + partenaire + ' fiche # <span id="activity-fiche-id"> '+ action.fiche.id + '</span></span>'+
                        '</div>'+
                        '<small class="text-muted" id="activity-created-at">' + 
                            action.created_at  + 
                        '</small> ' +
                    '</li>';
                rightTimeLine.append(elem)
            });
        }
    });

}
