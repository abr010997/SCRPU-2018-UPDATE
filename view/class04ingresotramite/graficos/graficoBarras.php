<?php require('db_config.php'); 


/* Getting demo_viewer table data */
$sql = "SELECT SUM(numberofview) as count FROM demo_viewer 
GROUP BY YEAR(created_at) ORDER BY created_at";
$viewer = mysqli_query($mysqli,$sql);
$viewer = mysqli_fetch_all($viewer,MYSQLI_ASSOC);
$viewer = json_encode(array_column($viewer, 'count'),JSON_NUMERIC_CHECK);


/* Getting demo_click table data */
$sql = "SELECT SUM(numberofclick) as count FROM demo_click 
GROUP BY YEAR(created_at) ORDER BY created_at";
$click = mysqli_query($mysqli,$sql);
$click = mysqli_fetch_all($click,MYSQLI_ASSOC);
$click = json_encode(array_column($click, 'count'),JSON_NUMERIC_CHECK);


?>


<!DOCTYPE html>
<html>
<head>
<title>HighChart</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>

<!-- <script  src="https://code.highcharts.com/modules/exporting.js"></script>
 -->
</head>
<body>


<script type="text/javascript">


$(function () { 


    var data_click = <?php echo $click; ?>;
    var data_viewer = <?php echo $viewer; ?>;


    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Gráficos de Estados'
        },
        xAxis: {
            categories: ['2013','2014','2015', '2016']
        },
        yAxis: {
            title: {
                text: 'Rangos'
            }
        },
        series: [{
            name: 'Click',
            data: data_click
        }, {
            name: 'View',
            data: data_viewer
        }]
    });
});


</script>


<div class="container">
<br/>
<h2 class="text-center">Highcharts usando php-mysql-json </h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Prueba gráficos</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>

</body>
</html>