$( document ).ready(function() {
    //get my createdToDay
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: hostIdentifier() + '/getMyCreatedToday',
        type: 'GET',
        dataType: 'JSON',
        success: function (day) {
            //My Created this month
            $.ajax({
                url: hostIdentifier() + '/getMyCreatedThisMonth',
                type: 'GET',
                dataType: 'JSON',
                success: function(month) {
                    $('#my-created-toDay').append(day.length + ' jour / ' + month.length + ' mois')
                }
            })
            
        }
    });

    //get my createdToDayValid
    $.ajax({
        url: hostIdentifier() + '/getMyValidCreatedToday',
        type: 'GET',
        dataType: 'JSON',
        success: function (day) {
            //My Validatd this month
            $.ajax({
                url: hostIdentifier() + '/getMyValidCreatedThisMonth',
                type: 'GET',
                dataType: 'JSON',
                success: function(month) {
                    $('#my-valid-created-toDay').append(Object.keys(day).length + ' jour / ' + Object.keys(month).length + ' mois' )
                }
            })
            
        }
    });
    //get my createdToDayNoValid
    $.ajax({
        url: hostIdentifier() + '/getMyNoValidCreatedToday',
        type: 'GET',
        dataType: 'JSON',
        success: function (day) {
            //My Validatd this month
            $.ajax({
                url: hostIdentifier() + '/getMyNoValidCreatedThisMonth',
                type: 'GET',
                dataType: 'JSON',
                success: function(month) {
                    $('#my-no-valid-created-toDay').append(Object.keys(day).length + ' jour / ' + Object.keys(month).length + ' mois' )
                }
            })
        }
    });
});