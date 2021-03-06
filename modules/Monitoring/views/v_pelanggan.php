<?php $this->load->view('template/vbootstrap_table') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sweetalert.css">
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <body>
<!--        <script>
       swal("Good job!", "You clicked the button!", "success");
        </script>-->
        <div id="wrapper">

            
           <?php echo modules::run("template/sidebar"); ?>

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 text-align="center">Monitoring</h4>
                            <!-- <a href="<?php echo base_url('tambah_kamar'); ?>""><button type="button" class="btn btn-success">Tambah</button></a>
                            <br> -->
                            <br />
                            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Meter ID</th>
                                        <th>Credit</th>
                                        <th>Energy</th>
                                        <th>Voltage</th>
                                        <th>Current</th>
                                        <th>last Update</th>
                                        <th>Nama User/th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                    <!--            <tfoot>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th colspan="2">Action</th>
                                </tfoot>-->
                                <tbody>
                                    <?php foreach ($kamar as $d) { ?>
                                        <tr>
                                            <td><?php echo $d->mid; ?></td>
                                            <td><?php echo $d->credit; ?></td>
                                            <td><?php echo $d->stand; ?></td>
                                            <td><?php echo $d->voltage; ?> </td>
                                            <td><?php echo $d->current; ?> </td>
                                            <td><?php echo $d->last_update; ?> </td>
                                            <td><?php ?></td>
                                            <td style="text-align: center"><a class="btn btn-default" href="<?php echo base_url('edit_kamar/'.$d->id_kamar);?>">Detail</a>




                                        </tr>
                                    <?php } ?>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>

    </body>

<script>
   function myFunction() {
       swal({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {
           swal({
              title: "Deleted!",
              text: "Your row has been deleted.",
              type: "success",
              timer: 3000
           });
           function () {
              location.reload(true);
              tr.hide();
           };
        }
        else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
    });
   }
    
    </script>