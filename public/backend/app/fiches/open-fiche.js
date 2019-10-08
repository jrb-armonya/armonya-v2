let fiche_id;
$(document).ready(function () {


    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //OPEN Fiche
    $("#fiches-table").on("click", ".btn-open-fiche", function (e) {
        e.preventDefault();

        let lockFiche = $('#lock-fiche');
        fiche_id = $(this).data("id");

        lockFiche.prop('checked', false);
        $(".fiche-input").prop('disabled', true);

        $.ajax({
            /* the route pointing to the post function */
            url: hostIdentifier() + '/fiches/getFiche',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: fiche_id
            },
            dataType: 'JSON',
            beforeSend: function () {
                $('body').addClass('loading');
            },
            success: function (data) {
                console.log(data);
                populateModal(data);
                $('body').removeClass('loading');
            }
        });

        $("#fiche-modal").modal();

        $('#lock-fiche').change(function () {
            if (this.checked) {
                $(".fiche-input").prop('disabled', false);
            } else {
                $(".fiche-input").prop('disabled', true);
            }
        });

    })


    //close fiche
    $('#fiche-modal').on('hidden.bs.modal', function () {
        $('#fiche-name').empty();
        $.ajax({
            url: hostIdentifier() + '/fiches/close',
            type: 'POST',
            data: {
                _token: CSRF_TOKEN,
                id: fiche_id
            },
            dataType: 'JSON',
            success: function () {
                console.log('closed');
                table.ajax.reload(null, false);
            }
        })
    })
})