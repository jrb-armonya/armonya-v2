// When press on delete btn (Partenaire)
$(window).on('load', function () {
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //when press delete button
   $(".delete-btn").click(function(e){
        e.preventDefault();
        let id = $(this).attr("data-id");
        
        $.ajax({
            url: hostIdentifier() + '/configuration/partenaires/getPartenaire',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (partenaire) {
                $("#name-partenaire-to-delete").empty();
                //Put   the data in a modal "user-modal"
                console.log(partenaire);
                $("#name-partenaire-to-delete").append(partenaire.id + " - " + partenaire.name)
                $("#PartenaireModal").empty()
                $("#PartenaireModal").append(partenaire.id)
            }
        });
    })

    // When confirm delete
    $("#delete_partenaire").click(function(e){
        e.preventDefault();
        id = $("#PartenaireModal").html();
        $.ajax({
            url:  hostIdentifier() + '/configuration/partenaires/delete',
            type: 'POST',
            data: {
                _token : CSRF_TOKEN,
                id : id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $("body").addClass("loading");
            },
            success: function (data) {
                location.reload();
            }
        });
    })

    //================================================================//
    
    // When press on delete btn (PartenaireEmail)


    //when press delete button
    $(".delete-btn").click(function(e){
        e.preventDefault();
        let id = $(this).attr("data-id");
        $.ajax({
            url: hostIdentifier() + '/configuration/partenaires/getEmail',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            success: function (email) {
                $("#name-Email-to-delete").empty();
                
                $("#name-email-to-delete").append(email.id + " - " + email.email)
                $("#EmailModal").empty()
                $("#EmailModal").append(email.id)
                
            }
        });
    })

     // When confirm delete email
     $("#delete_email").click(function(e){
        e.preventDefault();
        id = $("#EmailModal").html();
        console.log(id);
        $.ajax({
            url:  hostIdentifier() + '/configuration/partenaires/delete/email',
            type: 'POST',
            data: {
                _token : CSRF_TOKEN,
                id : id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $("body").addClass("loading");
            },
            success: function (data) {
                location.reload();
            }
        });
    })
});