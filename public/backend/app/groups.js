$(window).on('load', function () {


    $(".delete-btn").click(function(e){
        console.log('delete');
        e.preventDefault();
        let id = $(this).attr("data-id");
        $("#GroupModalDeleteLabel").append(id)

    });    

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // When confirm delete
    $("#delete").click(function(e){

        e.preventDefault();
        id = $("#GroupModalDeleteLabel").html();
        $.ajax({
            url: hostIdentifier() + '/groups/delete',
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
})
 
 
