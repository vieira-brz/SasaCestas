$(document).ready(function()
{
    // $('html').addClass("dark");

    let totalUsuarios = [20, 30, 40, 50, 20, 30, 10, 30, 40, 5, 20, 40];
    let totalUsuariosMeses = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];

    grafico_hora_pico (totalUsuarios, totalUsuariosMeses);

});

function grafico_hora_pico (totalUsuarios, totalUsuariosMeses)
{
    $('canvas').removeClass('none');
    $('center.loading').addClass('none');

    var ctx = document.getElementById('chart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data:
        {
            labels: totalUsuariosMeses,
            datasets: [
                {
                    label: 'USUÁRIOS ANUAIS',
                    borderWidth: 2,
                    borderColor: '#e62e55',
                    backgroundColor: '#e62e5520',
                    data: totalUsuarios,
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
                    beginAtZero: true,
                    }
                }],
            },
        }
    });


    var ctx = document.getElementById('chart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data:
        {
            labels: ['Queijo', 'Presunto', 'Rola'],
            datasets: [
                {
                    label: 'USUÁRIOS ANUAIS',
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


    var ctx = document.getElementById('chart3').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data:
        {
            labels: ['Cartão', 'Dinheiro', 'Pix'],
            datasets: [
                {
                    label: 'USUÁRIOS ANUAIS',
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


    var ctx = document.getElementById('chart4').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data:
        {
            labels: totalUsuariosMeses,
            datasets: [
                {
                    label: 'USUÁRIOS ANUAIS',
                    borderWidth: 2,
                    borderColor: '#e62e55',
                    backgroundColor: '#e62e5520',
                    data: totalUsuarios,
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
                    beginAtZero: true,
                    }
                }],
            },
        }
    });
}