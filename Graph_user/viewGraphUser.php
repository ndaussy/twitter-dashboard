
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
</div>

<?php

    session_start();

    $content = $_SESSION['content'] ;

    include('graphUser.php');

    $graphUser = new graphUser();

    $extractData = $graphUser->extractData($content);

?>

<script>
$(function () {
        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Personne cite dans les twitts'
            },
            subtitle: {
                text: 'Source: twitter'
            },
            xAxis: {
                categories: [
                    <?php
                    foreach($extractData as $key => $value)
                    {
                       if(0<strripos($key,"'"))
                        {
                        echo "'".str_replace("'","",$key)."',";
                        }
                        else
                        {
                        echo "'".$key."',";
                        }
                    }
                    ?>
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Occurence'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Number of occurence',
                data: [
                <?php
                foreach ($extractData as $key => $value)
                {
                    echo $value.",";
                }

                ?>]

            }]
        });
    });
</script>