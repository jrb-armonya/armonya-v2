function getReportUser(id) {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        /* the route pointing to the post function */
        url: hostIdentifier() + '/fiches/getReportedBy',
        type: 'POST',
        data: {
            _token: CSRF_TOKEN,
            id: id
        },
        dataType: 'JSON',
        beforeSend: function () {
            // $('body').addClass('loading');
        },
        success: function (data) {
            // return data.name;
            $('.report-annulation').css('display', 'block');
            $('.report_annulation').empty();
            $('.report_annulation').append('Annuler le Report de ' + data.name + '?');
        }
    });
}

function populateModal(data) {
    $('#genre-select select option[value="' + data.genre + '"]').prop('selected', true);
    $('#id').val(data.id)

    $('#name').val(data.name)
    $('#prenom').val(data.prenom)
    $('#s_age').val(data.s_age)
    $('#age').val(data.age)
    $('#profession').val(data.profession)
    $('#societe').val(data.societe)
    $('#adresse').val(data.adresse)
    $('#cp').val(data.cp)
    $('#ville').val(data.ville)
    $('#tel_fix').val(data.tel_fix)
    $('#tel_mobile').val(data.tel_mobile)
    $('#tel_bureau').val(data.tel_bureau)
    $('.email-input').val(data.email)
    $('#sf').val(data.sf)
    $('#nbr_enfants').val(data.nbr_enfants)
    $('.s_rev').val(data.s_rev)
    $('#rev_annee').val(data.rev_annee)
    $('#rev_mois').val(data.rev_mois)
    $('#rev_loc').val(data.rev_loc)


    if (data.l_rv == 3) {

        $("#arrondissement").css('display', 'block');
        if (data.arrondissement == "") {
            $("#arrondissement-input").css({
                "border-color": "red",
                "border-width": "1px",
                "border-style": "solid"
            });
        }
        $("#arrondissement-input").val(data.arrondissement);
    }

    //data rappel
    if (data.status_id == 3) {
        if (data.d_rappel != null) {
            $("#date_heure_rappel_box").css('display', 'block');
            date = data.d_rappel.substring(0, 10).split("-");
            newDate = date[2] + "/" + date[1] + "/" + date[0];

            $('#input_date_heure_rappel').val(newDate + ' - ' + data.h_rappel)
        } else {
            d_rappel = "2001-01-01 00:00:00";
            h_rappel = "00:00";
            $("#date_heure_rappel_box").css('display', 'block');
            date = d_rappel.substring(0, 10).split("-");
            newDate = date[2] + "/" + date[1] + "/" + date[0];
            $('#input_date_heure_rappel').val(newDate + ' - ' + h_rappel)
        }

    }

    //Net brut
    if (data.net == 1) {
        $('#net').prop("checked", true)
    } else if (data.net == 0) {
        $('#brut').prop("checked", true);
    }
    //Locataire prop gratuit
    if (data.locataire == 1) {
        $("#loca").prop("checked", true);
    } else if (data.proprietaire == 1) {
        $("#prop").prop("checked", true);
    } else if (data.gratuit == 1) {
        $("#gratuit").prop("checked", true);
    }

    $('#loy_eche').val(data.loy_eche)
    //locataire / Prop / gratuit
    $('.s_imp').val(data.s_imp)
    $('#imp_annee').val(data.imp_annee)
    $('#imp_mois').val(data.imp_mois)
    $('#cre_res').val(data.cre_res)
    $('#cre_auto').val(data.cre_auto)
    $('#cre_conso').val(data.cre_conso)
    $('#cre_autre').val(data.cre_autre)
    $('#cre_total').val(data.cre_total)

    if (taux >= 35) {
        $('#taux').css("background-color", "rgba(255, 0, 0, 0.32)3b");
        $('#taux').css("border", "1px solid red");
        // $('#taux').css("color", "black");
    } else {
        $('#taux').css("background-color", "rgba(0, 128, 0, 0.21);");
        $('#taux').css("border-color", "green");
        // $('#taux').css("color", "black");
    }

    $('#taux').val(data.taux)
    // CGP
    if (data.cgp == 1) {
        $('#cgp').prop("checked", true)
    } else {
        $('#cgp').prop("checked", false)
    }

    //Sms_conf sms_prise
    if (data.sms_conf == 0 && data.sms_prise == 0) {
        $('#sans').prop('checked', true);
    }
    if (data.sms_conf == 1) {
        $('#sms_conf').prop('checked', true);
    } else if (data.sms_prise == 1) {
        $('#sms_prise').prop('checked', true);
    }
    // d_rv
    date = data.d_rv.substring(0, 10).split("-");
    newDate = date[2] + "/" + date[1] + "/" + date[0];
    $('#date_rendez_vous_input').val(newDate)
    $('#heure_rendez_vous_input').val(data.h_rv)


    // $('#lieu_rendez_vous').val( data.l_rv )
    $('#l_rv select option[value="' + data.l_rv + '"]').prop('selected', true);
    $('#l_rv').val(data.l_rv)
    $('#commentaire').val(data.commentaire)
    $('#internal_comment').val(data.internal_comment)


    $('#fiche-name').append(data.id + ' - ' + data.name + ' ' + data.prenom + ' - Le ' + newDate + ' à ' + data.h_rv)

    //if fiche has report_id
    if (data.repo_id != null) {
        getReportUser(data.id);
        // console.log(reportedUser);
    }



    // CR ZONE
    let crZone = $("#cr-zone");

    if(crZone.length !== 0) {
        crZone.empty();
        $('#id-for-cr').val(data.id)
	    for(i=0; i<data.crs.length; i++) {
            let color = 'warning';

            if(data.crs[i].state == "Ciblé") {
                color = 'success';
            }
            
		    crZone.append(`
		        <li class="media">
                    <a href="#" class="pull-left">
                        <img width="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxcve5VkCws5NlUSM5bo7UhJ3zeP3GscYxHqaXGb4KWJo3EB_rFw&s" alt="" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right">
                            <small class="text-muted">${data.crs[i].created_at}</small>
                        </span>
                        <strong class="text-success">@${data.crs[i].from_armonya ? 'Armonya' :  'Partenaire'}</strong>
                        <small class="badge badge-${color}">${data.crs[i].state}</small>
                        <p>
                            ${data.crs[i].cr}
                        </p>
                    </div>
                </li>
		    `)
	    }

    }


}