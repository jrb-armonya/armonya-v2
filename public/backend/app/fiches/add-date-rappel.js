$("._status").change(function(){
    if( this.value == 3 ) {

        $('#date_heure_rappel_box').show();
        $('#input_date_heure_rappel').prop('required', true);
        //ON AFFICHE LE FORMULAIRE DE date_heure_rappel
    }
    else {
        $('#date_heure_rappel_box').hide();
        $('#input_date_heure_rappel').prop('required', false);
    }
});