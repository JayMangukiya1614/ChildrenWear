@extends('MainAdmin.Main.Master')

@section('FrontAdmin')
    <h1 style="margin-top: 6rem">Dashoard</h1>
    <form action="{{ route('chartdate') }}" method="get">
        <input type="date" name="date">
        <button type="submit">submit</button>
    </form>

    {{-- <section classs="content" style="margin-left:20px;margin-right:20px;margin-top:50px;">
        <select name="chart" onchange="myfunction()" class="form-control" id="chart" style="width:120px;">
            <option value="pie">Pie</option>
            <option value="column">Column</option>

        </select>
        <div class="product-index" align="right" style="margin-top:40px;">
            <div id="chartContainer" style="height:370px; width:100%"></div>
        </div>
    </section> --}}
    {{-- <script>
        function myfunction() {
            var charttype = document.getElementById("chart").value;

            var chart = new CanvasJs.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "Date"
                },
                subtitles: [{
                    text: "March 2023"
                }],
                data: [{
                    type: charttype,
                    yValueFormatString: "#,##0.\"\"",
                    indexLabel: "{label} ({y})",
                    dataPoints:  <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script> --}}
   
        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    exportEnabled: true,
                    theme: "light1", // "light1", "light2", "dark1", "dark2"
                    title: {
                        text: "Simple Column Chart Of Regular Order"
                    },
                    axisY: {
                        includeZero: true
                    },
                    data: [{
                        type: "column", //change type to bar, line, area, pie, etc
                        //indexLabel: "{y}", //Shows y value on all Data Points
                        yValueFormatString: "#,##0.\"\"",
                        indexLabel: "{label} ({y})",
                        dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();

            }
        </script>
 

    
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  

   
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
