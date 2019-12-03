var select = $("#partenaire_action");
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.ajax({
    url: hostIdentifier() + '/configuration/partenaires',
    type: 'GET',
    data: {_token: CSRF_TOKEN},
    dataType: 'JSON',
    success: function(data) {
        select.empty();
        for(i=0; i<data.length; i++) {
            select.append("<option value='" + data[i].id + "'>"+ data[i].name +"</option>")
        }
    }
})

