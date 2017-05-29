<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>Dashboard - NMS</title>

        <meta name="description" content="overview &amp; stats" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        <!-- <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script> -->

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

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.dataTables.min.css">
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    
     <script>
         $(document).ready(function() {
            $('#example').DataTable();
       } );
     </script>
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
                        </ul><!-- /.breadcrumb -->
                    </div>

                    <div class="page-content">

                        <div class="page-header">
                            <h1>
                                Monitoring                              
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="alert alert-block alert-success" align="center">

                                    Welcome to
                                    <strong class="green">
                                        Network Management System                                       
                                    </strong>
                                </div>

                                <div class="page-content">                                  
                                    
                                <form class="form-horizontal" role="form">                                  
                                    
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
                                        Kondisi : </label>
                                        <div class="col-sm-9">                                                      
                                        </div>                                      
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 
                                        Nama User : </label>
                                        <div id="pilih">
                                            
                                        </div>                                      
                                    </div>   -->                                    
                                    <div class="hr hr-24"></div>
                                </form>

                                    <div class="clearfix">                                      
                                    </div>

                                    <!-- div.dataTables_borderWrap -->
                                        <table id="example" class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No. Kamar</th>
                                                    <th>Meter ID</th>
                                                    <th>Credit (kWh)</th>
                                                    <th>Nama User</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <!-- <tfoot>
                                                <tr>
                                                    <th>No. Kamar</th>
                                                    <th>Meter ID</th>
                                                    <th>Credit (kWh)</th>
                                                    <th>Nama User</th>
                                                    <th>status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot> -->


                                            <tbody>
                                            <?php foreach ($data as $d) { ?>
                                                <tr>
                                                    <td><?php echo "$d->no_kamar"; ?></td>
                                                    <td><?php echo "$d->mid"; ?></td>
                                                    <td><?php echo "$d->credit"; ?></td>
                                                    <td><?php echo "$d->nama"; ?></td>
                                                    <?php if ($d->credit <= 30) { ?> 
                                                        <td>
                                                            low
                                                        </td>
                                                     <?php } else { ?>
                                                    <td>
                                                        normal
                                                    </td> 
                                                     <?php } ?> 
                                                    <!-- <td><span><?php echo "$d->status"; ?></span></td> -->
                                                    
                                                    
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green" href="<?php echo base_url()."Monitor/detail/".$d->mid;?>">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            Details
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        </table>
                                    </div>
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
            <script src="<?= base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
            <script src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
            <!-- <script src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script> -->

            <!-- inline scripts related to this page -->
            <script type="text/javascript">
                $('#example').DataTable( {
        initComplete: function () {
            this.api().columns(4).every( function () {
                var column = this;
                var select = $('<select class="col-xs-10 col-sm-5" id="form-field-1" ><option value=""></option></select>')
                    .appendTo( $(".col-sm-9") )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
} );
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
