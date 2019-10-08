$( document ).ready(function() {
    $.ajax({
        url: hostIdentifier() + '/my-team',
        type: 'GET',
        success: function (data) {
            $('#team-total-month').append(data.teamMonthTotal);
            $('#team-total-day').append(data.teamDayTotal);
            
            $('#team-valid').append(data.teamValidMonthTotal);
            $('#team-no-valid').append(data.teamNoValidMonthTotal);
        }
    })
})