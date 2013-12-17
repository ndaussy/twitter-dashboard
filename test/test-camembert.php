<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto">
</div>

<?php 
    // particularité du camembert si la somme totale diffère de 100 le pourcentage afficher ne sera pas identique
    // un nouveau pourcentage sera calculé en fonction de la somme de toutes les entrées
    $graph_title= 'COUSINNNN';
    $graph_value= 45.6;
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
            text: 'Browser market shares at a specific website, 2010'
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
            name: 'Browser share',
            data: [
                ['<?php echo $graph_title; ?>',  <?php echo $graph_value; ?>],
                ['IE',       26.8],
                {
                    name: 'Chrome',
                    y: 12.8,
                    sliced: true,
                    selected: true
                },// il est peut être intéressant de mettre tout les entrées sous un format comme suit (ou précedement) name/y/sliced/selected
                    // le paramètre sliced permet de resortir la part du camembert à true (possibilité de conditionné..)
                {
                    name: 'Jeremy a une grosse tete',
                    y: 8.5,
                    sliced: true,
                    selected: false
                },// par opposition à celui la 
                ['Opera',     6.2],
                ['Others',   0.7]
            ]
        }]
    });
});
    

</script>
