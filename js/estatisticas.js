$(document).ready(function()
{
    let mesesUsers = [20, 30, 40, 50, 20, 30, 10, 30, 40, 5, 20, 40];
    let mesesRenda = [220, 310, 140, 250, 420, 230, 110, 30, 240, 353, 320, 240];
    let meses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];


    $('canvas').removeClass('none');
    $('center.loading').addClass('none');


    // Gráfico 1
    var ctx = document.getElementById('chart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data:
        {
            labels: meses,
            datasets: [
                {
                    label: 'Usuários',
                    borderWidth: 2,
                    borderColor: '#e62e55',
                    backgroundColor: '#e62e5520',
                    data: mesesUsers,
                },
            ]
        },

        options:
        {
            responsive: true,

            maintainAspectRatio: false,

            legend: {
                'display': true, position: 'bottom',

                labels: {
                    usePointStyle: true,
                    padding: 20,
                }
            },

            scales: {
                xAxes: [{ gridLines: { color: 'rgba(0, 0, 0, 0)', zeroLineColor:'transparent', } }],
                yAxes: [{ gridLines: { color: '#d3d3d350', zeroLineColor:'transparent', },
                ticks: {
                    stepSize: 20,
                    beginAtZero: true,
                }
                }],
            },
        }
    });


    // Gráfico 2
    var ctx = document.getElementById('chart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data:
        {
            labels: ['Queijo', 'Presunto', 'Pão'],
            datasets: [
                {
                    borderWidth: 2,
                    borderColor: ['#FF9292', '#F4ABC4', '#C060A1'],
                    backgroundColor:  ['#FF9292', '#F4ABC4', '#C060A1'],
                    data: [20, 33, 23],
                },
            ]
        },

        options:
        {
            responsive: true,

            maintainAspectRatio: false,

            legend: {
                'display': true, position: 'bottom',

                labels: {
                    usePointStyle: true,
                    padding: 20,
                }
            },
        }
    });


    // Gráfico 3
    var ctx = document.getElementById('chart3').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data:
        {
            labels: ['Cartão', 'Dinheiro', 'Pix'],
            datasets: [
                {
                    borderWidth: 2,
                    borderColor: ['#FF9292', '#F4ABC4', '#C060A1'],
                    backgroundColor:  ['#FF9292', '#F4ABC4', '#C060A1'],
                    data: [20, 33, 43],
                },
            ]
        },

        options:
        {
            maintainAspectRatio: false,
            circumference: Math.PI,
            rotation: -Math.PI,
            cutoutPercentage: 65,
            
            responsive: true,

            maintainAspectRatio: false,

            legend: {
                'display': true, position: 'bottom',

                labels: {
                    usePointStyle: true,
                    padding: 20,
                }
            },

        }
    });


    // Gráfico 4
    var ctx = document.getElementById('chart4').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data:
        {
            labels: meses,
            datasets: [
                {
                    label: 'Renda',
                    borderWidth: 2,
                    borderColor: '#e62e55',
                    backgroundColor: '#e62e5520',
                    data: mesesRenda,
                },
            ]
        },

        options:
        {
            responsive: true,

            maintainAspectRatio: false,

            legend: {
                'display': true, position: 'bottom',

                labels: {
                    usePointStyle: true,
                    padding: 20,
                }
            },
                        
            scales: {
                xAxes: [{ gridLines: { color: 'rgba(0, 0, 0, 0)', zeroLineColor:'transparent', } }],
                yAxes: [{ gridLines: { color: '#d3d3d350', zeroLineColor:'transparent', },
                ticks: {
                    stepSize: 200,
                    beginAtZero: true,
                    callback: function (value) { return 'R$ '+ value; },
                    scaleLabel: { display: true, labelString: 'Percentage', },
                }
                }],
            },
        }
    });
});