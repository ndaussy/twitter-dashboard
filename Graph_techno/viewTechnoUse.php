<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
</div>

<?php     
    session_start();
 
    $content = $_SESSION['content'] ;
    //var_dump($content);
   	include('technoUse.php');

    $technoUse = new technoUse();
    
    $extractData = $technoUse->extractData($content);

    
?>

<script>
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Service use to share twitter'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Service',
            data: 

            	[
            	<?php foreach($extractData as $key => $value)
            	{
            		if($value!=0)
            		{
            		echo "['".$key."',".$value."],";
            		}
            	}
                ?>
            ]
        }]
    });
});
</script>