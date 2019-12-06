function getRemainingNumbers() {

    $.ajax({
        url: '/application/generator/unusedNumbers',
        method: 'GET',
        success: function(data){
            displayNumber(data);
        }
    })

}

function displayNumber(data){

    const display = $('#phones-unused');

    display.html(data);

}

getRemainingNumbers();

