
//date picker start

$(function(){


    // init francais
    (function($){
        $.fn.datepicker.dates['fr'] = {
            days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
            daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
            daysMin: ["d", "l", "ma", "me", "j", "v", "s"],
            months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
            monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
            today: "Aujourd'hui",
            monthsTitle: "Mois",
            clear: "Effacer",
            weekStart: 1,
            format: "dd/mm/yyyy"
        };
    }(jQuery));
    



    $('.date-picker-input').datepicker({
        language: 'fr',
        format: 'mm-dd-yyyy',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="fa fa-angle-left"></i>',
            rightArrow: '<i class="fa fa-angle-right"></i>'
        }
    });



    // $('.dpYears').datepicker({
    //     autoclose: true,
    //     orientation: "bottom",
    //     templates: {
    //         leftArrow: '<i class="fa fa-angle-left"></i>',
    //         rightArrow: '<i class="fa fa-angle-right"></i>'
    //     }
    // });

    // month & date only
    $('.dpMonths').datepicker({
        language: 'fr',
        format: 'mm/yyyy',
        autoclose: true,
        orientation: "bottom",
        templates: {
            leftArrow: '<i class="fa fa-angle-left"></i>',
            rightArrow: '<i class="fa fa-angle-right"></i>'
        }
    });


    // var checkin = $('.dpd1').datepicker({
    //     onRender: function(date) {
    //         return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //     }
    // }).on('changeDate', function(ev) {
    //     if (ev.date.valueOf() > checkout.date.valueOf()) {
    //         var newDate = new Date(ev.date)
    //         newDate.setDate(newDate.getDate() + 1);
    //         checkout.setValue(newDate);
    //     }
    //     checkin.hide();

    //     $('.dpd2')[0].focus();
    // }).data('datepicker');
    // var checkout = $('.dpd2').datepicker({
    //     onRender: function(date) {
    //         return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    //     }
    // }).on('changeDate', function(ev) {
    //     checkout.hide();
    // }).data('datepicker');


    // // inline picker
    // $('#inline-datepicker').datepicker({
    //     todayHighlight: true,
    //     autoclose: true,
    //     orientation: "bottom",
    //     templates: {
    //         leftArrow: '<i class="fa fa-angle-left"></i>',
    //         rightArrow: '<i class="fa fa-angle-right"></i>'
    //     }
    // });


    // // enable clear button
    // $('#helper-datepicker').datepicker({
    //     todayBtn: "linked",
    //     clearBtn: true,
    //     autoclose: true,
    //     todayHighlight: true,
    //     orientation: "bottom",
    //     templates: {
    //         leftArrow: '<i class="fa fa-angle-left"></i>',
    //         rightArrow: '<i class="fa fa-angle-right"></i>'
    //     }
    // });



});



