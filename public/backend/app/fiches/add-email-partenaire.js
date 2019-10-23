var selectPartenaire = $("#partenaire");
var selectEmail = $("#partenaire_emails");
var selectEmailCC = $("#partenaire_emails_cc");

$("._status").change(function() {

    
    // if status == Attente CR
    if( this.value == 7 ) {
        
        selectEmail.append("<option value=''>---------------</option>")

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        
        // get all partenaires and append them to the select
        $.ajax({
            url: hostIdentifier() + '/configuration/partenaires',
            type: 'GET',
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            success: function(data) {
                $.ajax({
                    url : hostIdentifier() + '/configuration/getOldPartenaires',
                    type : 'POST',
                    data:{_token: CSRF_TOKEN, id : fiche_id},
                    dataType: 'JSON',
                    success : function(oldPartenaires){
                        console.log(oldPartenaires);
                        console.log(data);
                        selectPartenaire.empty();
                        for(i=0; i<data.length; i++) {
                            if(oldPartenaires.includes(data[i].id)){
                                selectPartenaire.append("<option disabled value='" + data[i].id + "'>"+ data[i].name +"</option>")
                            }
                            else{
                                selectPartenaire.append("<option value='" + data[i].id + "'>"+ data[i].name +"</option>")
                            }
                         }
                    }
                })
                
            }
        })
        $('#partenaire_box').show();

        $("#partenaire").change(function(){
            partenaire_id = this.value;
            $.ajax({
                url: hostIdentifier() + '/configuration/partenaires/getEmails',
                type: 'POST',
                data: { _token: CSRF_TOKEN, id: partenaire_id},
                dataType: 'JSON',
                success: function(data) {
                    selectEmail.empty();
                    selectEmailCC.empty();
                    for(i=0; i<data.length; i++) {
                        selectEmail.append("<option value='" + data[i].id + "'>"+ data[i].email +"</option>")
                        selectEmailCC.append("<option value='" + data[i].id + "'>"+ data[i].email +"</option>")
                    }
                }
            })

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
            
            $("#partenaire_email_box").show();
        })
        
    }
    else {
        selectPartenaire.empty();
        selectEmail.empty();
        $('#partenaire_box').hide();
        $("#partenaire_email_box").hide();
    }
});