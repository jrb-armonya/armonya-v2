$(window).on('load', function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    // When press on delete btn
    $(".delete-btn").click(function(e){
        e.preventDefault();
        $("#FicheModalDeleteLabel").empty();
        $("#FicheModalDeleteLabel").append($(this).attr("data-id"));
    })

    // When confirm delete
    $("#delete").click(function(e){
        e.preventDefault();
        id = $("#FicheModalDeleteLabel").html();
        $.ajax({
            url: hostIdentifier() + '/fiches/delete/rappel',
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
