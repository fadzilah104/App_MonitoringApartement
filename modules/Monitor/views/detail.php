<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Detail Monitoring - NMS</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <style type="text/css">
            #chart {
                position: absolute;
                top: 50px;
                left: 50px;
                width: 1200px;
                height: 1200px;
            }
        </style>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
                <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?= base_url(); ?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="assets/js/html5shiv.min.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="no-skin">
        <div id="navbar" class="navbar navbar-default          ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="index.html" class="navbar-brand">
                        <small>
                            <i class="fa fa-leaf"></i>
                            Network Management System
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="purple ">
                            <a href="index.html">
                                <i class=" ace-icon fa fa-home bigger-120"></i>
                                Monitoring
                            </a>							
                        </li>

                        <li class="green ">
                            <a href="login.html">
                                <i class=" ace-icon fa fa-power-off bigger-120"></i>
                                Sign Out
                            </a>							
                        </li>						
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>

        <div class="main-container ace-save-state" id="main-container">

            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="#">Detail Monitoring</a>
                            </li>
                        </ul><!-- /.breadcrumb -->
                    </div>

                    <div class="page-content">

                        <div class="page-header">
                            <h1>
                                Detail Monitoring								
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->

                                <div class="page-content">									

                                    <form class="form-horizontal">
                                        <div class="tabbable">
                                            <ul class="nav nav-tabs padding-16">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#edit-detail">
                                                        <i class="green ace-icon fa fa-users bigger-120"></i>
                                                        Detail
                                                    </a>
                                                </li>

                                                <li>
                                                    <a data-toggle="tab" href="#edit-monthly">
                                                        <i class="green ace-icon fa fa-list-alt bigger-120"></i>
                                                        Monthly Credit Used
                                                    </a>
                                                </li>

                                                <li>
                                                    <a data-toggle="tab" href="#edit-token">
                                                        <i class="green ace-icon fa fa-rss bigger-125"></i>
                                                        History Token
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#edit-monitoring">
                                                        <i class="green ace-icon fa fa-tachometer bigger-125"></i>
                                                        History Monitoring
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#edit-credit">
                                                        <i class="blue ace-icon fa fa-signal bigger-120"></i>
                                                        Graphic Credit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#edit-energy">
                                                        <i class="purple ace-icon fa fa-signal bigger-120"></i>
                                                        Graphic Energy
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#edit-voltage">
                                                        <i class="pink ace-icon fa fa-signal bigger-120"></i>
                                                        Graphic Voltage
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#edit-current">
                                                        <i class="red ace-icon fa fa-signal bigger-120"></i>
                                                        Graphic Current
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="tab-content profile-edit-tab-content">
                                                <div id="edit-detail" class="tab-pane in active">
                                                    <h4 class="header blue bolder smaller">Pelanggan</h4>

                                                    <div class="space-4"></div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" >Nama Pelanggan</label>

                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right">
                                                                <input type="url"  value="<?php echo $namap; ?>" readonly="true">
                                                                <i class="ace-icon fa fa-user"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="space-4"></div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" >Intregasi Date</label>

                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right">
                                                                <input type="url"  value="<?php echo $tanggal_integrasi; ?>" readonly="true">
                                                                <i class="ace-icon fa fa-rss"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" >Meter ID</label>

                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right">
                                                                <input type="url"  value="<?php echo $mid; ?>" readonly='true'>
                                                                <i class="ace-icon fa fa-rss"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right" >No Kamar</label>

                                                        <div class="col-sm-9">
                                                            <span class="input-icon input-icon-right">
                                                                <input type="url"  value="<?php echo $nokamar; ?>" readonly="true">
                                                                <i class="ace-icon fa fa-key"></i>
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="space-4"></div>

                                                    <div class="space-4"></div>

                                                    <!-- <div class="form-group">
                                                        <label class="col-sm-3 control-label no-padding-right">Alamat</label>

                                                        <div class="col-sm-9">
                                                            <textarea ></textarea>
                                                        </div>
                                                    </div> -->

                                                    <!-- <h4 class="header blue bolder smaller">Kamar</h4>
                                                    
                                                    <div class="space-4"></div>

                                                    <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" >Meter ID</label>

                                                            <div class="col-sm-9">
                                                                    <span class="input-icon input-icon-right">
                                                                            <input type="url"  value="01334866500" />
                                                                    </span>
                                                            </div>
                                                    </div>

                                                    <div class="space-4"></div>

                                                    <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" >No Kamar</label>

                                                            <div class="col-sm-9">
                                                                    <span class="input-icon input-icon-right">
                                                                            <input type="url"  value="013" />
                                                                    </span>
                                                            </div>
                                                    </div>

                                                    <div class="space-4"></div>

                                                    <div class="form-group">
                                                            <label class="col-sm-3 control-label no-padding-right" >Lantai</label>

                                                            <div class="col-sm-9">
                                                                    <span class="input-icon input-icon-right">
                                                                            <input type="url"  value="13" />
                                                                    </span>
                                                            </div>
                                                    </div> -->

                                                    <div class="space-4"></div>

                                                </div>

                                                <div id="edit-monthly" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">Monthly Credit Used</h4>

                                                    <div class="space-4"></div>

                                                    <div>
                                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Periode</th>
                                                                    <th>Stand Awal</th>
                                                                    <th>Last Update</th>
                                                                    <th>Stand Akhir</th>
                                                                    <th>Last Update</th>
                                                                    <th>Pemakaian</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <?php $i = 0; ?>
                                                                    <?php foreach ($data as $d) { ?>
                                                                        <?php $i++; ?>
                                                                    <tr>
                                                                        <td><?php echo date('F', strtotime($d->last_update)); ?></td>
                                                                        <?php if ($i == 1) { ?><td><?php echo $juli; ?></td>
                                                                        <?php } else if ($i == 2) { ?> <td><?php echo $agustus; ?></td>
                                                                        <?php } else if ($i == 3) { ?> <td><?php echo $september; ?></td>
                                                                        <?php } else if ($i == 4) { ?> <td><?php echo $oktober; ?></td>
                                                                        <?php } else if ($i == 5) { ?> <td><?php echo $november; ?></td>
                                                                        <?php } else { ?> <td><?php echo $desember; ?></td> 
                                                                        <?php } ?>

                                                                        <?php if ($i == 1) { ?><td><?php echo $tgljuli; ?></td>
                                                                        <?php } else if ($i == 2) { ?> <td><?php echo $tglagustus; ?></td>
                                                                        <?php } else if ($i == 3) { ?> <td><?php echo $tglseptember; ?></td>
                                                                        <?php } else if ($i == 4) { ?> <td><?php echo $tgloktober; ?></td>
                                                                        <?php } else if ($i == 5) { ?> <td><?php echo $tglnovember; ?></td>
                                                                        <?php } else { ?> <td><?php echo $tgldesember; ?></td> 
                                                                        <?php } ?> 

                                                                        <?php if ($i == 1) { ?><td><?php echo $agustus; ?></td>
                                                                        <?php } else if ($i == 2) { ?> <td><?php echo $september; ?></td>
                                                                        <?php } else if ($i == 3) { ?> <td><?php echo $oktober; ?></td>
                                                                        <?php } else if ($i == 4) { ?> <td><?php echo $november; ?></td>
                                                                        <?php } else if ($i == 5) { ?> <td><?php echo $desember; ?></td>
                                                                        <?php } else { ?> <td><?php echo $akhir; ?></td> 
                                                                        <?php } ?>


                                                                         <?php if ($i == 1) { ?><td><?php echo $tglagustus; ?></td>
                                                                        <?php } else if ($i == 2) { ?> <td><?php echo $tglseptember; ?></td>
                                                                        <?php } else if ($i == 3) { ?> <td><?php echo $tgloktober; ?></td>
                                                                        <?php } else if ($i == 4) { ?> <td><?php echo $tglnovember; ?></td>
                                                                        <?php } else if ($i == 5) { ?> <td><?php echo $tgldesember; ?></td>
                                                                        <?php } else { ?> <td><?php echo $lastnow; ?></td> 
                                                                        <?php } ?>     


                                                                        <?php if ($i == 1) { ?><td><?php echo $cek2; ?></td>
                                                                        <?php } else if ($i == 2) { ?> <td><?php echo $cek3; ?></td>
                                                                        <?php } else if ($i == 3) { ?> <td><?php echo $cek4; ?></td>
                                                                        <?php } else if ($i == 4) { ?> <td><?php echo $cek5; ?></td>
                                                                        <?php } else if ($i == 5) { ?> <td><?php echo $cek6; ?></td>
                                                                        <?php } else { ?> <td><?php echo $cek7; ?></td> 
                                                                        <?php } ?>
                                                                    </tr>   
                                                                <?php } ?>
                                                                <tr>
                                                                	<td colspan="5" align='right'>Averrage :</td>
                                                                	<td><?php echo $rata2; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                                <div id="edit-token" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">History Token</h4>

                                                    <div class="space-4"></div>

                                                    <div>
                                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Pembelian</th>
                                                                    <th>Digit Token</th>
                                                                    <th>KWH Beli</th>
                                                                    <th>Tanggal Penggunaan</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <tr>
                                                                    <?php foreach ($token as $d) { ?>
                                                                    <tr>
                                                                        <td><?php echo "$d->waktu_proses"; ?></td>
                                                                        <td><?php echo "$d->hasil_token"; ?></td>
                                                                        <td><?php echo "$d->nilai"; ?></td>
                                                                        <td><?php echo "$d->waktu_proses"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>	
                                                    </div>	
                                                </div>

                                                <div id="edit-monitoring" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">History Monitoring</h4>

                                                    <div class="space-4"></div>

                                                    <div>
                                                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Credit</th>
                                                                    <th>Voltage</th>
                                                                    <th>Current</th>
                                                                    <th>Stand Kwh</th>
                                                                    <th>Date Insert</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php foreach ($monitor as $d) { ?>
                                                                    <tr>
                                                                        <td><?php echo "$d->credit"; ?></td>
                                                                        <td><?php echo "$d->stand"; ?></td>
                                                                        <td><?php echo "$d->voltage"; ?></td>
                                                                        <td><?php echo "$d->current"; ?></td>
                                                                        <td><?php echo "$d->last_update"; ?></td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>	
                                                    </div>
                                                </div>

                                                <div id="edit-credit" class="tab-pane">
                                                    <div class="space-10">	</div>
                                                    <h4 class="header blue bolder smaller">Graphic Credit</h4>
                                                    <div class="space-4"></div>

                                                    <div class="chart">
                                                         <?php
                                                    $i = 0;
                                                    $j = 0;
                                                    foreach ($credit as $row) {
                                                        $nama[$i] = $row->credit;
                                                        $nilai[$j] = date('d F', strtotime($row->last_update));
                                                        $i++;
                                                        $j++;
                                                    }
                                                    ?>
                                                    <canvas id="myChart"></canvas>
                                                    </div>
                                                </div>

                                                <div id="edit-energy" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">Graphic Energy</h4>
                                                    <div class="space-4"></div>

                                                    <div class="chart">
                                                 	<?php
                                                    $k = 0;
                                                    $l = 0;
                                                    foreach ($energy as $row) {
                                                        $namae[$k] = $row->stand;
                                                        $nilaie[$l] = date('d F', strtotime($row->last_update));
                                                        $k++;
                                                        $l++;
                                                    }
                                                    ?>
                                                    <canvas id="chartEnergy"></canvas>
                                                    </div>
                                                </div>

                                                <div id="edit-voltage" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">Graphic Voltage</h4>	
                                                    <div class="space-4"></div>

                                                    <div class="chart">
                                                   <?php
                                                    $m = 0;
                                                    $n = 0;
                                                    foreach ($voltage as $row) {
                                                        $namav[$m] = $row->voltage;
                                                        $nilaiv[$n] = date('d F', strtotime($row->last_update));
                                                        $m++;
                                                        $n++;
                                                    }
                                                    ?>
                                                    <canvas id="chartVoltage"></canvas>
                                                    </div>

                                                </div>

                                                <div id="edit-current" class="tab-pane">
                                                    <div class="space-10"></div>

                                                    <h4 class="header blue bolder smaller">Graphic Current</h4>	
                                                    <div class="space-4"></div>

                                                    <div class="chart">
                                                    <?php
                                                    $o = 0;
                                                    $p = 0;
                                                    foreach ($current as $row) {
                                                        $namac[$o] = $row->current;
                                                        $nilaic[$p] = date('d F', strtotime($row->last_update));
                                                        $o++;
                                                        $p++;
                                                    }
                                                    ?>
                                                    <canvas id="chartCurrent"></canvas>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="clearfix form-actions">

                                            </div>
                                        </div>
                                    </form>

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.page-content -->
                    </div>
                </div><!-- /.main-content -->

                <div class="footer">
                    <div class="footer-inner">
                        <div class="footer-content">
                            <span class="bigger-120">
                                <span class="blue bolder">Network Management System </span>
                                &copy; 2017
                            </span>

                            &nbsp; &nbsp;						
                        </div>
                    </div>
                </div>

                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
            </div><!-- /.main-container -->

            <!-- basic scripts -->

            <!--[if !IE]> -->
            <script src="<?= base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

            <!-- <![endif]-->

            <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement)
                    document.write("<script src='<?= base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            </script>
            <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

            <!-- page specific plugin scripts -->

            <!--[if lte IE 8]>
              <script src="assets/js/excanvas.min.js"></script>
            <![endif]-->
            <script src="<?= base_url(); ?>assets/js/jquery-ui.custom.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.ui.touch-punch.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.easypiechart.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.sparkline.index.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.flot.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.flot.pie.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.flot.resize.min.js"></script>

            <!-- ace scripts -->
            <script src="<?= base_url(); ?>assets/js/ace-elements.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/ace.min.js"></script>

            <!-- inline scripts related to this page -->
            <script type="text/javascript">

                var ctx = document.getElementById("myChart");

                var zzz = new Chart(ctx, {
                    type: 'line',
                    data: data = {
                        labels: <?php echo json_encode($nilai); ?>,
                        datasets: [
                            {
                                label: "Grapfik Credit Saat ini",
                                fill: false,
                                lineTension: 0.2,
                                backgroundColor: "rgba(75,192,192,0.4)",
                                borderColor: "rgba(75,192,192,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75,192,192,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                pointHoverBorderWidth: 4,
                                pointRadius: 5,
                                pointHitRadius: 10,
                                data: <?php echo json_encode($nama); ?>,
                                spanGaps: false,
                            }
                        ]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                    ticks: {
                                        autoSkip: true,
                                        beginAtZero: true,
                                        maxTicksLimit: 15
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

                var eng = document.getElementById("chartEnergy");

                var chartEnergy = new Chart(eng, {
                    type: 'line',
                    data: data = {
                        labels: <?php echo json_encode($nilaie); ?>,
                        datasets: [
                            {
                                label: "Grapfik stand Saat ini",
                                fill: false,
                                lineTension: 0.2,
                                backgroundColor: "rgba(75,192,192,0.4)",
                                borderColor: "rgba(75,192,192,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75,192,192,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                pointHoverBorderWidth: 4,
                                pointRadius: 5,
                                pointHitRadius: 10,
                                data: <?php echo json_encode($namae); ?>,
                                spanGaps: false,
                            }
                        ]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                    ticks: {
                                        autoSkip: true,
                                        beginAtZero: true,
                                        maxTicksLimit: 15
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

                var vtg = document.getElementById("chartVoltage");

                var chartVoltage = new Chart(vtg, {
                    type: 'line',
                    data: data = {
                        labels: <?php echo json_encode($nilaiv); ?>,
                        datasets: [
                            {
                                label: "Grapfik voltage Saat ini",
                                fill: false,
                                lineTension: 0.2,
                                backgroundColor: "rgba(75,192,192,0.4)",
                                borderColor: "rgba(75,192,192,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75,192,192,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                pointHoverBorderWidth: 4,
                                pointRadius: 5,
                                pointHitRadius: 10,
                                data: <?php echo json_encode($namav); ?>,
                                spanGaps: false,
                            }
                        ]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                    ticks: {
                                        autoSkip: true,
                                        beginAtZero: true,
                                        maxTicksLimit: 15
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

                var crt = document.getElementById("chartCurrent");

                var chartCurrent = new Chart(crt, {
                    type: 'line',
                    data: data = {
                        labels: <?php echo json_encode($nilaic); ?>,
                        datasets: [
                            {
                                label: "Grapfik Current Saat ini",
                                fill: false,
                                lineTension: 0.2,
                                backgroundColor: "rgba(75,192,192,0.4)",
                                borderColor: "rgba(75,192,192,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75,192,192,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                pointHoverBorderWidth: 4,
                                pointRadius: 5,
                                pointHitRadius: 10,
                                data: <?php echo json_encode($namac); ?>,
                                spanGaps: false,
                            }
                        ]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                    ticks: {
                                        autoSkip: true,
                                        beginAtZero: true,
                                        maxTicksLimit: 15
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

                jQuery(function ($) {
                    $('.easy-pie-chart.percentage').each(function () {
                        var $box = $(this).closest('.infobox');
                        var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                        var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                        var size = parseInt($(this).data('size')) || 50;
                        $(this).easyPieChart({
                            barColor: barColor,
                            trackColor: trackColor,
                            scaleColor: false,
                            lineCap: 'butt',
                            lineWidth: parseInt(size / 10),
                            animate: ace.vars['old_ie'] ? false : 1000,
                            size: size
                        });
                    })

                    $('.sparkline').each(function () {
                        var $box = $(this).closest('.infobox');
                        var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
                        $(this).sparkline('html',
                                {
                                    tagValuesAttribute: 'data-values',
                                    type: 'bar',
                                    barColor: barColor,
                                    chartRangeMin: $(this).data('min') || 0
                                });
                    });


                    //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
                    //but sometimes it brings up errors with normal resize event handlers
                    $.resize.throttleWindow = false;

                    var placeholder = $('#piechart-placeholder').css({'width': '90%', 'min-height': '150px'});
                    var data = [
                        {label: "social networks", data: 38.7, color: "#68BC31"},
                        {label: "search engines", data: 24.5, color: "#2091CF"},
                        {label: "ad campaigns", data: 8.2, color: "#AF4E96"},
                        {label: "direct traffic", data: 18.6, color: "#DA5430"},
                        {label: "other", data: 10, color: "#FEE074"}
                    ]
                    function drawPieChart(placeholder, data, position) {
                        $.plot(placeholder, data, {
                            series: {
                                pie: {
                                    show: true,
                                    tilt: 0.8,
                                    highlight: {
                                        opacity: 0.25
                                    },
                                    stroke: {
                                        color: '#fff',
                                        width: 2
                                    },
                                    startAngle: 2
                                }
                            },
                            legend: {
                                show: true,
                                position: position || "ne",
                                labelBoxBorderColor: null,
                                margin: [-30, 15]
                            }
                            ,
                            grid: {
                                hoverable: true,
                                clickable: true
                            }
                        })
                    }
                    drawPieChart(placeholder, data);

                    /**
                     we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
                     so that's not needed actually.
                     */
                    placeholder.data('chart', data);
                    placeholder.data('draw', drawPieChart);


                    //pie chart tooltip example
                    var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
                    var previousPoint = null;

                    placeholder.on('plothover', function (event, pos, item) {
                        if (item) {
                            if (previousPoint != item.seriesIndex) {
                                previousPoint = item.seriesIndex;
                                var tip = item.series['label'] + " : " + item.series['percent'] + '%';
                                $tooltip.show().children(0).text(tip);
                            }
                            $tooltip.css({top: pos.pageY + 10, left: pos.pageX + 10});
                        } else {
                            $tooltip.hide();
                            previousPoint = null;
                        }

                    });

                    /////////////////////////////////////
                    $(document).one('ajaxloadstart.page', function (e) {
                        $tooltip.remove();
                    });




                    var d1 = [];
                    for (var i = 0; i < Math.PI * 2; i += 0.5) {
                        d1.push([i, Math.sin(i)]);
                    }

                    var d2 = [];
                    for (var i = 0; i < Math.PI * 2; i += 0.5) {
                        d2.push([i, Math.cos(i)]);
                    }

                    var d3 = [];
                    for (var i = 0; i < Math.PI * 2; i += 0.2) {
                        d3.push([i, Math.tan(i)]);
                    }


                    var sales_charts = $('#sales-charts').css({'width': '100%', 'height': '220px'});
                    $.plot("#sales-charts", [
                        {label: "Domains", data: d1},
                        {label: "Hosting", data: d2},
                        {label: "Services", data: d3}
                    ], {
                        hoverable: true,
                        shadowSize: 0,
                        series: {
                            lines: {show: true},
                            points: {show: true}
                        },
                        xaxis: {
                            tickLength: 0
                        },
                        yaxis: {
                            ticks: 10,
                            min: -2,
                            max: 2,
                            tickDecimals: 3
                        },
                        grid: {
                            backgroundColor: {colors: ["#fff", "#fff"]},
                            borderWidth: 1,
                            borderColor: '#555'
                        }
                    });


                    $('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
                    function tooltip_placement(context, source) {
                        var $source = $(source);
                        var $parent = $source.closest('.tab-content')
                        var off1 = $parent.offset();
                        var w1 = $parent.width();

                        var off2 = $source.offset();
                        //var w2 = $source.width();

                        if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2))
                            return 'right';
                        return 'left';
                    }


                    $('.dialogs,.comments').ace_scroll({
                        size: 300
                    });


                    //Android's default browser somehow is confused when tapping on label which will lead to dragging the task
                    //so disable dragging when clicking on label
                    var agent = navigator.userAgent.toLowerCase();
                    if (ace.vars['touch'] && ace.vars['android']) {
                        $('#tasks').on('touchstart', function (e) {
                            var li = $(e.target).closest('#tasks li');
                            if (li.length == 0)
                                return;
                            var label = li.find('label.inline').get(0);
                            if (label == e.target || $.contains(label, e.target))
                                e.stopImmediatePropagation();
                        });
                    }

                    $('#tasks').sortable({
                        opacity: 0.8,
                        revert: true,
                        forceHelperSize: true,
                        placeholder: 'draggable-placeholder',
                        forcePlaceholderSize: true,
                        tolerance: 'pointer',
                        stop: function (event, ui) {
                            //just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
                            $(ui.item).css('z-index', 'auto');
                        }
                    }
                    );
                    $('#tasks').disableSelection();
                    $('#tasks input:checkbox').removeAttr('checked').on('click', function () {
                        if (this.checked)
                            $(this).closest('li').addClass('selected');
                        else
                            $(this).closest('li').removeClass('selected');
                    });


                    //show the dropdowns on top or bottom depending on window height and menu position
                    $('#task-tab .dropdown-hover').on('mouseenter', function (e) {
                        var offset = $(this).offset();

                        var $w = $(window)
                        if (offset.top > $w.scrollTop() + $w.innerHeight() - 100)
                            $(this).addClass('dropup');
                        else
                            $(this).removeClass('dropup');
                    });

                })
            </script>
    </body>
</html>
