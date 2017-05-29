<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Serverside jQuery Datatable</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link href="<?= base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>"></script>
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter</h1>

        <h3>Monthly Credit Used</h3>
        <br />
        <a href="<?php echo base_url(). "index.php/monitor/detail/".$crd; ?>">Detail Credit Used</a> ||
       <a href="<?php echo base_url(). "index.php/monitor/historiMonitor/".$crd; ?>">Historu Monitoring</a>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                	<?php $i = 0; ?>
                                    <?php foreach ($data as $d) { ?>
                                    <?php $i++; ?>
                                        <tr>
                                            <td><?php echo date('F',strtotime($d->last_update)); ?></td>
                                            <?php if($i == 1) {?><td><?php echo $d->stand_awal; ?></td>
                                            <?php } else if($i == 2) { ?> <td><?php echo $juli; ?></td>
                                            <?php } else if($i == 3) { ?> <td><?php echo $agustus; ?></td>
                                            <?php } else if($i == 4) { ?> <td><?php echo $september; ?></td>
                                            <?php } else if($i == 5) { ?> <td><?php echo $oktober; ?></td>
                                            <?php } else if($i == 6) { ?> <td><?php echo $november; ?></td>
                                            <?php } else { ?> <td><?php echo $desember; ?></td> 
                                            <?php } ?>

                                            <td><?php echo $d->last_update; ?></td>

                                            <?php if($i == 1) {?><td><?php echo $juli; ?></td>
                                            <?php } else if($i == 2) { ?> <td><?php echo $agustus; ?></td>
                                            <?php } else if($i == 3) { ?> <td><?php echo $september; ?></td>
                                            <?php } else if($i == 4) { ?> <td><?php echo $oktober; ?></td>
                                            <?php } else if($i == 5) { ?> <td><?php echo $november; ?></td>
                                            <?php } else if($i == 6){ ?> <td><?php echo $desember; ?></td> 
                                             <?php } else { ?> <td><?php echo $akhir; ?></td> 
                                            <?php } ?>

                                            <?php if ($i == 7){ ?>
                                            <td><?php echo $lastnow; ?></td>
                                            <?php }else{ ?>
                                            <td><?php echo $d->last_update; ?></td>
                                            <?php } ?>                                           

                                            <?php if($i == 1) {?><td><?php echo $cek1; ?></td>
                                            <?php } else if($i == 2) { ?> <td><?php echo $cek2; ?></td>
                                            <?php } else if($i == 3) { ?> <td><?php echo $cek3; ?></td>
                                            <?php } else if($i == 4) { ?> <td><?php echo $cek4; ?></td>
                                            <?php } else if($i == 5) { ?> <td><?php echo $cek5; ?></td>
                                            <?php } else if($i == 6) { ?> <td><?php echo $cek6; ?></td>
                                            <?php } else { ?> <td><?php echo $cek7; ?></td> 
                                            <?php } ?>
                                       	</tr>   
                                            <?php } ?>
                                </tbody>
                            </table>
    </div>
</body>
</html>