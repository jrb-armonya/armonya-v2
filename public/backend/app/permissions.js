$(".check-delete").click(function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    id = $(this).attr("data-id");
    $.ajax({
        url: '/configuration/permissions/delete',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: id
            },
            dataType: 'JSON',
            beforeSend: function() {
                $("body").addClass("loading");
            },
            success: function (data) {
                $('#wait').hide();
                location.reload();
            },
            error: function (data) {
                $('#wait').hide();
                roles = jQuery.parseJSON(data.responseText);
                confirm('Vous ne pouvez pas supprimer cette permission, elle dépend d\' autre roles');

                $("body").removeClass("loading");
            },
    });
});