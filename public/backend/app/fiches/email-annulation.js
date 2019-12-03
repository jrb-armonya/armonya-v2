$("._status").change(function() {
    $('.email-annulation').css('display', 'none')
    // if status == A Reporter
    let status = document.getElementById('status-name').innerHTML;

    if($.trim(status) == "Attente CR"){
        if(this.value == 3){

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: hostIdentifier() + '/fiches/hasPartenaire/bool',
                type: 'POST',
                data: { _token: CSRF_TOKEN, id: fiche_id},
                dataType: 'JSON',
                success: function(data){
                    console.log(data);
                    if(data == true) {
                        $('.email-annulation').css('display', 'block')
                    }
                }
            })
        }
    }


});