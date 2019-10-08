$('#submit-btn').prop("disabled",true);
$(".fiche-input").change(function(){
    let brut = document.getElementById('brut').checked ? 1 : 0;
    let rev_mois  = Number( $('#rev_mois').val() ) || 0 ;
    let rev_annee = Number( $('#rev_annee').val()) || 0 ;

    let imp_annee = Number( $('#imp_annee').val()) || 0 ;
    let imp_mois  = Number( $('#imp_mois').val() ) || 0 ;

    if( this.attributes.id.value == "rev_annee") {
        rev_mois = Math.round(rev_annee / 12);
    }
    else if (this.attributes.id.value == "rev_mois")
    {
        rev_annee = rev_mois * 12;
    }

    if( this.attributes.id.value == "imp_annee")
    {
        imp_mois = Math.round(imp_annee / 12);

    } 
    else if (this.attributes.id.value == "imp_mois")
    {
        imp_annee = imp_mois * 12;
    }
    
    let taux = 0;
    let cre_total = 0;

    let cre_res = Number( $('#cre_res').val() ) || 0;
    let cre_auto = Number( $('#cre_auto').val() ) || 0;
    let cre_conso = Number( $('#cre_conso').val() ) || 0;
    let cre_autre = Number( $('#cre_autre').val() ) || 0;
    let rev_loc = Number( $('#rev_loc').val() ) || 0;
    let montant = Number( $('#loy_eche').val() ) || 0;

    // net ? 1 : rev_mois = rev_mois * 0.78;
    // net ? 0 : rev_mois = rev_mois / 0.78;
    cre_total =  montant + cre_res + cre_auto + cre_conso + cre_autre;

    if(rev_mois){
        if(brut == 1 )
            taux = Math.round(cre_total / (rev_mois * 0.78 + rev_loc ) * 100);
        else taux = Math.round(cre_total / (rev_mois + rev_loc ) * 100);
    }
    else
        taux = 0;
    printValue(cre_total, taux);
    color_taux(taux);
    
    //Submit button disabled if name or prenom is empty
    if( $('#name').val() != "" && $('#prenom').val() != "" && $('#input_data_rendez_vous').val() != "") {
        $('#submit-btn').prop("disabled",false);
    }
    else {
        $('#submit-btn').prop("disabled", true);
    }

    function color_taux(taux)
    {
        if(taux >= 35)
        {
            $('#taux').css("background-color", "rgba(255, 0, 0, 0.32)3b");
            $('#taux').css("border", "1px solid red");
            // $('#taux').css("color", "black");
        }
        else
        {
            $('#taux').css("background-color", "rgba(0, 128, 0, 0.21);");
            $('#taux').css("border-color", "green");
            // $('#taux').css("color", "black");
        }
    }
    function printValue(){
        $('#cre_total').val( cre_total )
        $('#taux').val( taux )
        $('#rev_annee').val( rev_annee )
        $('#rev_mois').val( rev_mois )
        $('#imp_annee').val( imp_annee )
        $('#imp_mois').val( imp_mois )
    }
});
