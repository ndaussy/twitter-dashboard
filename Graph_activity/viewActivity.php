<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
</div>

<?php
    session_start();

    $content = $_SESSION['content'] ;

   include('webActivity.php');

    $webActivity = new webActivity();

    $extractData = $webActivity->extractData($content);
?>

<script>
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'line'
            },
            title: {
                text: 'Activity'
            },
            subtitle: {
                text: 'Source: Twiiter'
            },
            xAxis: {//sera fait dynamiquement
                categories: [
                <?php
                    foreach($extractData as $key => $value)
                    {

                    $day=explode(" ",$key);
                    echo "'".$day[2]."-".$day[1]."',";

                    }
                ?>
                ]
            },
            yAxis: {
                title: {
                    text: 'nombre de tweet'
                }
            },
            tooltip: {
                enabled: false,
                formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                        this.x +': '+ this.y +'°C';
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Activity',
                data: [ <?php foreach ( $extractData as $value) { echo $value.','; } ?> ]
            }]
        });
    });
</script>
