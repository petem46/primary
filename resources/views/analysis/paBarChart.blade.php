<script>

    var ctx = document.getElementById('paBarChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: [
                @foreach ($pagroups as $group)
                    '{{$group->cohort}}',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach ($pagroups as $group)
                        {{round($group->pAt_Risk,1)}},
                    @endforeach
                ],
                backgroundColor: [
                    '#00615A',
                    @foreach ($pagroups as $group)
                        // 'steelblue',
                    @endforeach
                ],
                borderColor: [
                    @foreach ($pagroups as $group)
                        'black',
                    @endforeach
                ],
                borderWidth: 0.5,
            }]
        },
        options: {
            animation: {
                animateScale: false,
            },
            legend: {
                display: false,
                // position: 'right',
            },
            plugins: {
                datalabels: {
                    color: [
                    'white',
                    ],
                },
            },
            maintainAspectRatio: false,
            responsive: true,
            responsiveAnimationDuration: 500,
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        beginAtZero: true,
                        // suggestedMax: 50,
                    }
                }],
                yAxes: [{
                }],
            },
            title: {
                display: false,
                text: '% Pupils At Risk of PA by Group'
            },
            tooltips: {
                enabled: false,
            },
            annotation: {
                annotations: [{
                    drawTime: "afterDatasetsDraw",
                    // id: "hline",
                    type: "line",
                    mode: "vertical",
                    scaleID: "x-axis-0",
                    value: 15,
                    borderColor: "red",
                    borderWidth: 2,
                    borderDash: [10,10],
                    label: {
                        backgroundColor: "white",
                        content: "Nat",
                        enabled: false,
                    },
                }],
            },
        }
    });
</script>
