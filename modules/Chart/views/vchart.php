<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- load library jquery dan highcharts -->
	<script type="text/javascript" src="<?php echo base_url($murl.'views/js/jquery.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url($murl.'views/js/highcharts.js') ?>"></script>
	<script type="text/javascript" src="<?php echo base_url($murl.'views/js/jquery-1.9.1.min.js') ?>"></script>
	<!-- end load library -->
	<style type="text/css">		
		.container{
			margin: auto 300px;
	}	

	</style>

	
</head>
<body>
<?php 
	// $nama = array() ;
	// $nilai = array();
	$i = 0;	
	$j = 0;

	// foreach ($chart as $row) {
	// 	echo json_encode($row->id);
	// }
	
	// /*mengambil query report*/
	foreach($chart as $row){
		$nama[$i] = date('d F',strtotime($row->last_update));
		$nilai[$j] = (int)$row->stand;
		$i++;
		$j++;
	}
	// $coba = date('F d',strtotime($nama[0]));
	// print_r($coba);
		// echo $chart;
	// 	echo $row;
	// }
	// echo json_encode($nilai);
	// echo json_encode($);
	 ?>

<!-- load chart dengan id -->

<div class="container" id="line"></div>

<div class="container" id="column"></div>

<div class="container" id="pie"></div>


<!-- end load chart -->


<!-- script untuk mengambil library highcharts -->

<!--<script type="text/javascript">
 $( document ).ready(function() {
	$(function(){
		$('#column').highcharts({
			chart: {
				// renderTo: 'chart',
				type: 'column',
				margin: 75,
				options3d: {
					enabled: false,
					alpha: 10,
					beta: 25,
					depth: 70
				}
			},
			title: {
				text: 'report Jan - Agustus',
				style: {
					fontSize: '18px',
					fontFamily: 'Verdana, sans-serif'
				}
			},
			subtitle: {
				text: 'Penjualan',
				style: {
					fontSize: '15px',
					fontFamily: 'Verdana, sans-serif' 
				}
			},
			plotOptions: {
				column: {
					depth: 25
				}
			},
			credits: {
				enabled: false
			},
			xAxis: {
				categories: <?php echo json_encode($bulan);?>
			},
			exporting: {
				enabled: false
			},
			yAxis : {
				title: {
					text: 'jumlah'
				}
			},
			tooltip: {
				formatter: function(){
					return 'The Value for <b>'+ this.x +'</b> is <b>' + Highcharts.numberFormat(this.y,0) + '</b>, in'+ this.series.name;
				}
			},
			series: [{
				name: 'Report Data',
				data: <?php echo json_encode($nilai);?>,
				shadow: true,
				dataLabels: {
					enabled: true,
					color: '#045396',
					align: 'center',
					formatter: function(){
						return Highcharts.numberFormat(this.y, 0);
					},
					y: 0,
					style: {
						fontSize: '13px',
						fontFamily: 'Verdana, sans-serif'
					}
				}
			}]

		});
	});
  }); 

 </script>
	<?php  ?>-->


<script type="text/javascript">
	jQuery(function(){
		new Highcharts.Chart({
			chart: {
				renderTo: 'column',
				type: 'line'
			},
			title: {
				text: 'Grapfik',
				x: -20
			},
			subtitle: {
				text: 'contoh',
				x: -20
			},
			tooltip: {
				x: <?php echo json_encode($nama) ?>,
				formatter: function(){
					return 'The Value for <b>'+ this.categories +'</b> is <b>' + Highcharts.numberFormat(this.y, 0) + '</b>, in'+ this.point.name;
				}
			},
			// tooltip: {
   //                  formatter: function() {
   //                      return '<b>'+
   //                      this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
   //                  }
   //               },
			plotOptions: {
                    column: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.x + '</b>: ' + Highcharts.numberFormat(this.y, 0) +' % ';
                            }
                        }
                    }
                 },
			xAxis: {
				categories: <?php echo json_encode($nama); ?>	
			},
			exporting: {
				enabled: false
			},
			yAxis: {
				title: {
					text: 'jumlah'
				}
			},
			series: [{
				name: 'Bulan',
				data: <?php echo json_encode($nilai) ?>
			}]
			
		});
	});
</script>

<!-- chart column -->

<script type="text/javascript">
	jQuery(function(){
		new Highcharts.Chart({
			chart: {
				renderTo: 'line',
				type: 'line'
			},
			title: {
				text: 'Grapfik',
				x: -20
			},
			subtitle: {
				text: 'contoh',
				x: -20
			},
			tooltip: {
				x: <?php echo json_encode($bulan) ?>,
				formatter: function(){
					return 'The Value for <b>'+ this.categories +'</b> is <b>' + Highcharts.numberFormat(this.y, 0) + '</b>, in'+ this.point.name;
				}
			},
			// tooltip: {
   //                  formatter: function() {
   //                      return '<b>'+
   //                      this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
   //                  }
   //               },
			plotOptions: {
                    line: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.x + '</b>: ' + Highcharts.numberFormat(this.y, 0) +' % ';
                            }
                        }
                    }
                 },
			xAxis: {
				categories: <?php echo json_encode($bulan); ?>	
			},
			exporting: {
				enabled: false
			},
			yAxis: {
				title: {
					text: 'jumlah'
				}
			},
			series: [{
				name: 'Bulan',
				data: <?php echo json_encode($nilai) ?>
			}]
			
		});
	});
</script>

 <!-- char pie -->

<script type="text/javascript">
	jQuery(function(){
		new Highcharts.Chart({
			chart: {
				renderTo: 'pie',
				type: 'pie'
			},
			title: {
				text: 'Grapfik',
				x: -20
			},
			subtitle: {
				text: 'contoh',
				x: -20
			},
			tooltip: {
				x: <?php echo json_encode($bulan) ?>,
				formatter: function(){
					return 'The Value for <b>'+ this.categories +'</b> is <b>' + Highcharts.numberFormat(this.y, 0) + '</b>, in'+ this.point.name;
				}
			},
			// tooltip: {
   //                  formatter: function() {
   //                      return '<b>'+
   //                      this.point.name +'</b>: '+ Highcharts.numberFormat(this.percentage, 2) +' % ';
   //                  }
   //               },
			plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: 'green',
                            formatter: function() 
                            {
                                return '<b>' + this.x + '</b>: ' + Highcharts.numberFormat(this.y, 0) +' % ';
                            }
                        }
                    }
                 },
			xAxis: {
				categories: <?php echo json_encode($bulan); ?>	
			},
			exporting: {
				enabled: false
			},
			yAxis: {
				title: {
					text: 'jumlah'
				}
			},
			series: [{
				name: 'Bulan',
				data: <?php echo json_encode($nilai) ?>
			}]
			
		});
	});
</script>
</body>	
</html>

