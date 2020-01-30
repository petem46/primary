<script>

    var ctxPie = document.getElementById('groupAttChart').getContext('2d');
    var myChart = new Chart(ctxPie, {
        type: 'doughnut',
        data: {
            labels: ['Present', 'Absence', 'Unauthorised Abs'],
            datasets: [{
                // label: 'Sessions',
                data: [
                {{$schoolattendance->ppresent ?? ''}},
                {{$schoolattendance->pabsent ?? ''}},
                {{$schoolattendance->punauth ?? ''}},
                ],
                backgroundColor: [
                'teal',
                'rgba(255, 140, 0, 0.8)',
                'crimson',
                ],
                borderColor: [
                'white',
                'white',
                'white',
                'white'
                ],
                borderWidth: 1
            }]
        },
        options: {
            animation: {
                animateScale: true,
            },
            legend: {
                display: true,
                position: 'bottom',
            },
            plugins: {
                datalabels: {
                    formatter: (value, ctxPie) => {
                        // ** to work out percentage for the data label from counts and numbers etc **
                        // let sum = ctxPie.dataset._meta[0].total;
                        // let label = (value * 100 / sum).toFixed(1) + "%";
                        let label = value + "%";
                        if (value < 10) {
                            let label = '';
                            return label;
                        }
                        if (value > 10) {
                            return label;
                        }
                    },
                    color: [
                    'white',
                    'white',
                    'white',
                    ],
                    font: {
                        size: [
                        '16'
                        ],
                    }
                },
            },
            title: {
                display: false,
                text: '% Whole School Attendance'
            },
            tooltips: {
                enabled: true,
            },
            maintainAspectRatio: false,
            responsive: true,
            responsiveAnimationDuration: 500,
        }
    });

</script>
