$(window).on('load', function() {
    
    let searchForm = $('#search-form');
    let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    let table = $('#result-table');


        $('#search-form-submit').on('click', function(){
            table.empty();
            let term = $('#search-form').val();
            $.ajax({
                url: hostIdentifier() + '/search',
                type: 'POST',
                data: {_token: CSRF_TOKEN, term: term },
                success: function (data){
                    
                    $.each(data, function( index, val ) {
                        table.append('<tr>' + 
                            '<td>' + val.id + '</td>' + 
                            '<td>' + val.name + ' ' + val.prenom  + '</td>' + 
                            '<td> <span class="badge badge-status"  style="background-color:#' + val.status.color +'" >' + val.status.name + '</span></td>' +
                            '<td>' + val.user.name + '</td>' +
                            '<td><a href="/historique/fiche/' + val.id +  '">Historique</a></td>' +
                        + '<tr>')
                    });

                }
            });

        })


    //Close search modal
    $('#searchModal').on('hide.bs.modal', function () {
        table.empty();
        searchForm.val('');
    })

});