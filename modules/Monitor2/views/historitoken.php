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

        <h3>History Token</h3>
        <br />
       <a href="<?php echo base_url(). "index.php/monitor/detail/".$crd; ?>">Detail Credit Used</a> ||
       <a href="<?php echo base_url(). "index.php/monitor/historiToken/".$sql; ?>">Histori Token</a> ||
       <a href="<?php echo base_url(). "index.php/monitor/historiMonitor/".$crd; ?>">Historu Monitoring</a>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Pembelian</th>
                                        <th>Digit Token</th>
                                        <th>KWH Beli</th>
                                        <th>Penggunaan Token</th>
                                        <th>Respons</th>
                                        <th>credit</th>
                                        <th>Response</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $d) { ?>
                                        <tr>
                                            <td><?php echo "$d->waktu_proses"; ?></td>
                                            <td><?php echo "$d->hasil_token"; ?></td>
                                            <td><?php echo "$d->nilai"; ?></td>
                                            <td><?php echo "null"; ?></td>
                                            <td><?php echo "null"; ?></td>
                                            <td><?php echo "null"; ?></td>
                                            <td><?php echo "null"; ?></td>
                                       	</tr>
                                       	<?php } ?>  
                                </tbody>
                            </table>
    </div>
</body>
</html>