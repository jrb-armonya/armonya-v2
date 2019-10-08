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
    
    // let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // function pour avoir les disabled dates
    $.ajax({
        /* the route pointing to the post function */
        url: hostIdentifier() + '/configuration/dates',
        type: 'GET',
        dataType: 'JSON',
        beforeSend: function() {
        //  $('body').addClass('loading');
        }, 
        success: function( data ) {
            var bloquedDates = [];
            data.forEach(function(date){

                var year        = date.date.substring(0, 4);
                var day       = date.date.substring(5, 7);
                var month       = date.date.substring(8, 10);
                var newDate        = month + '/' + day + '/' + year;

                bloquedDates.push(newDate);
            });

            // $(".form_datetime-component").datetimepicker({
            //     format: "dd/mm/yyyy - hh:ii",
            //     datesDisabled: '11/04/2019 - 00:00',
            //     autoclose: true,
            //     // todayBtn: true,
            //     // pickerPosition: "bottom-left",
            //     // templates: {
            //     //     leftArrow: '<i class="fa fa-angle-left"></i>',
            //     //     rightArrow: '<i class="fa fa-angle-right"></i>'
            //     // }
            // });



            $('#date_rendez_vous_input').datepicker({
                language: 'fr',
                format: "dd/mm/yyyy",
                autoclose: true,
                datesDisabled: bloquedDates
            })


            // $('.timepicker-24').timepicker({
            //     autoclose: true,
            //     minuteStep: 1,
            //     showSeconds: false,
            //     showMeridian: false,
            //     pickerPosition: "top-left"
            // });
            

            $('.clockpicker').clockpicker();

            
            $(".form_datetime-component-rappel").datetimepicker({
                format: "dd/mm/yyyy - hh:ii",
                autoclose: true,
                todayBtn: true,
                pickerPosition: "top-left",
                templates: {
                    leftArrow: '<i class="fa fa-angle-left"></i>',
                    rightArrow: '<i class="fa fa-angle-right"></i>'
                }
            });
            

            // $.fn.datepicker.defaults.language = 'fr';
        }
    })

   



    $(".date-picker-range").datepicker({
        // language: 'fr',
        format: "dd/mm/yyyy",
        autoclose: true,
        todayBtn: true,
        pickerPosition: "top-left",
        templates: {
            leftArrow: '<i class="fa fa-angle-left"></i>',
            rightArrow: '<i class="fa fa-angle-right"></i>'
        }
    });

});