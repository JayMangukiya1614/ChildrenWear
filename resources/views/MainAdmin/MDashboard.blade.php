@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
    <h1 style="margin-top: 6rem; margin-bottom:4rem; text-align:center">Dashboard</h1>


    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                exportEnabled: true,
                animationEnabled: true,
                title: {
                    text: "Order Chart"
                },
                legend: {
                    cursor: "pointer",
                    itemclick: explodePie
                },
                data: [{
                    type: "pie",
                    showInLegend: true,
                    toolTipContent: "{name}: <strong>{y}%</strong>",
                    indexLabel: "{name} - {y}%",
                    dataPoints: [{
                            y: {{ $pending }},
                            name: "Total Order",
                            exploded: true
                        },
                        {
                            y: {{ $delet }},
                            name: "Delete Order"
                        },
                        {
                            y: {{ $confirem }},
                            name: "Confirm Order "
                        },



                    ]
                }]
            });
            chart.render();
        }

        function explodePie(e) {
            if (typeof(e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e
                    .dataPointIndex].exploded) {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
            } else {
                e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
            }
            e.chart.render();

        }
    </script>



    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
