<script>
    new Chart(document.getElementById("schoolWeeklyAttendanceChart"),
        {
            "type":"bar",
            "data": {
                "labels":[
                    @foreach($attrunningweekly as $week)
                        "{{"Wk " . $week->wk }}",
                    @endforeach
                ],
                "datasets":[ {
                    "label":"Weekly Attendance",
                    "data":[
                        @foreach($attrunningweekly as $week)
                            {{round($week->pattendance,1) }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach ($attrunningweekly as $week)
                            @if($week->pattendance <= 90)"rgba(220, 20, 60, 0.6)",
                            @elseif($week->pattendance < 94)"rgba(255, 140, 0, 0.6)",
                            @elseif($week->pattendance <= 96)"rgba(56,193,114,0.6)",
                            @elseif($week->pattendance > 96)"rgba(72,193,56,0.6)",
                            @endif
                        @endforeach
                    ],
                    borderColor: [
                        @foreach ($attrunningweekly as $week)
                            'black',
                        @endforeach
                    ],

                },{
                    "label":"Overall Attendance",
                    "data":[
                        @foreach($attrunningweekly as $week)
                            {{round($week->RunningPercent,1) }},
                        @endforeach
                    ],
                    type: 'line',
                    "fill":false,
                    "borderColor":"teal",
                    "lineTension":0.1
                }],
            },
            "options":{
                plugins: {
                    datalabels: {
                        display:false
                    },
                },
                maintainAspectRatio: false,
                responsive: true,
                responsiveAnimationDuration: 1000,
                scales: {
                    yAxes: [{
                        ticks: {
                            // beginAtZero: true,
                            suggestedMin: 80,
                            suggestedMax: 100,
                        },
                    }],
                },
                annotation: {
                    annotations: [{
                        drawTime: "afterDatasetsDraw",
                        // id: "hline",
                        type: "line",
                        mode: "horizontal",
                        scaleID: "y-axis-0",
                        value: 95,
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
            },
        });
        </script>

