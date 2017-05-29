<!DOCTYPE html>
<html>
<head>
<style type="text/css">
    #chart {
        position: absolute;
        top: 50px;
        left: 50px;
        width: 1200px;
        height: 1200px;
    }
</style>
	<title>belajar chart Js</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
</head>
<body>
<?php 
    $i = 0;
    $j = 0;
    foreach ($data as $d) {
        $nama[$i] = $d->stand;
        $tanggal [$j] = date("d F", strtotime($d->last_update));
        $i++;
        $j++;
    }

 ?>
<div id="chart">
<canvas id="myChart"></canvas>
</div>
</body>
<script>
var ctx = document.getElementById("myChart");

var myChart = new Chart(ctx, {
    type: 'line',
    data: data = {
    	labels: <?php echo json_encode($tanggal); ?>,
    	datasets: [
        {
            label: "Graphics Stand Saat ini",
            fill: false,
            lineTension: 0.2,
            backgroundColor: "rgba(193,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.5,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 2,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 5,
            pointHitRadius: 10,
            data:<?php echo json_encode($nama); ?>,
            spanGaps: false,
        }
    ]
},
    options: {
        scales: {
            xAxes: [{
                ticks: {
                    autoSkip:true,
                    beginAtZero:true,
                    maxTicksLimit:15    
                }
            }]
            // yAxes: [{
            //     ticks: {
            //         beginAtZero:true
            //     }
            // }]
        }
    }
});
</script>
</html>