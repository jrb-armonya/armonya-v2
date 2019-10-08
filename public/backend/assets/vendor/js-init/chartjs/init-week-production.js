
// Week Production Widget

$(function () {
    "use strict";
    let myNbr;
    //Week propr
    var ctx = document.getElementById('week-production').getContext('2d');
    $.ajax({
        url: hostIdentifier() + '/week-production',
        type: 'GET',
        dataType: 'JSON',
        success: function (weeknbr){
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'line',
        
                // The data for our dataset
                data: {
                    labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi'],
                    datasets: [{
                        label: "Total",
                        type: 'line',
                        data: weeknbr,
                        fill: true,
                        backgroundColor: 'rgba(98,107,227,.2)',
                        borderColor: '#626be3',
                        pointBorderColor: '#626be3',
                        pointBackgroundColor: '#fff',
                        pointBorderWidth: 0,
        
                        borderWidth: 1,
                        borderJoinStyle: 'miter',
                        // pointHoverRadius: 2,
                        pointHoverBackgroundColor: '#626be3',
                        pointHoverBorderColor: '#626be3',
                        pointHoverBorderWidth: 1,
                        pointRadius: 3
        
                    }]
                },
        
                // Configuration options go here
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true
                    },
        
                    scales: {
                        xAxes: [{
                            display: true
                        }],
                        yAxes: [{
                            display: true,
                            gridLines: {
                                zeroLineColor: '#f1f3f5',
                                color: '#f1f3f5',
                                //drawBorder: false
                            },
                            integer: true,
                        }]
        
                    },
                    elements: {
                        line: {
                            //tension: 0.00001,
                            tension: 0.4,
                            borderWidth: 1
                        },
                        point: {
                            radius: 2,
                            hitRadius: 10,
                            hoverRadius: 6,
                            borderWidth: 4
                        }
                    }
                }
        
            });
        }
    })

    

});


