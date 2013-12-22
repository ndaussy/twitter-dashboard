<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
</div>

<?php
    session_start();

    $content = $_SESSION['content'] ;

   include('Rtweet.php');

    $Rtweet = new Rtweet();

    $extractData = $Rtweet->extractData($content);
?>

<script>
$(function () {
        $('#container').highcharts({
    
            chart: {
                type: 'column'
            },
    
            title: {
                text: 'Total fruit consumtion, grouped by gender'
            },
    
            xAxis: {
                
            },
    
            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Nombre Tweet/Like'
                }
            },    
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.x +'</b><br/>'+
                        this.series.name +': '+ this.y +'<br/>'+
                        'Like: '+ (this.point.stackTotal-this.y);
                }
            },
    
            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },
    
            series: [{
                name: 'Retweet',
                data: [
                    <?php foreach($extractData["retweet"] as $key => $value)
            	{
            		if($value!=0)
            		{
            		echo $value.",";
            		}
            	}
                ?>],
                stack: 'male'
            }, {
                name: 'Like',
                data: [
                    <?php foreach($extractData["favorite"] as $key => $value)
            	{
            		if($value!=0)
            		{
            		echo $value.",";
            		}
            	}
                ?>],
                stack: 'male'
            }]
        });
    });
</script>
