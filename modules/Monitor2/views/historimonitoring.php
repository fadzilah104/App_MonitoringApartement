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

        <h3>History Monitoring</h3>
        <br />
       <a href="<?php echo base_url(). "index.php/monitor/detail/".$crd; ?>">Detail Credit Used</a> ||
       <a href="<?php echo base_url(). "index.php/monitor/historiMonitor/".$crd; ?>">Historu Monitoring</a>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
                                    <?php foreach ($data as $d) { ?>
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
</body>
</html>