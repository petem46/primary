<script>

    var ctx = document.getElementById('groupAttChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Present', 'Absence', 'Unauthorised Abs'],
            datasets: [{
                // label: 'Sessions',
                data: [
                {{$attgroups[0]->pAttendance ?? ''}},
                97 - {{$attgroups[0]->pAttendance ?? ''}},
                3,
                ],
                backgroundColor: [
                '#00615A',
                'darkorange',
                'red',
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
                    formatter: (value, ctx) => {
                        let sum = ctx.dataset._meta[0].total;
                        let percentage = (value * 100 / sum).toFixed(1) + "%";
                        if (value/sum < 0.1) {
                            let percentage = '';
                            return percentage;
                        }
                        if (value/sum >= 0.1) {
                            return percentage;
                        }
                    },
                    color: [
                    'white',
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
