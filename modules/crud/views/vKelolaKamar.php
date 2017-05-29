<?php $this->load->view('template/vbootstrap_table') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
      <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url(); ?>assets/css/sweetalert.css">
       <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
      <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
      <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
       <script>
         $(document).ready(function() {
            $('#example').DataTable();
       } );
        </script>
    <body>
<!--        <script>
       swal("Good job!", "You clicked the button!", "success");
        </script>-->
        <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Pertamina
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/crud/pelanggan'); ?>">pelanggan</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/crud/kamar'); ?>">Kamar</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/crud/meter'); ?>">Kelola meter</a>
                </li>
                <li>
                    <a href="<?php echo base_url('index.php/crud/user'); ?>">Master User</a>
                </li>
<!--                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>-->
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
        <h4 text-align="center">Kelola Kamar</h4>
        <a href="<?php echo base_url('index.php/crud/addKamar'); ?>""><button type="button" class="btn btn-success">Tambah</button></a>
        <br>
        <br />
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No Kamar</th>
                    <th>Lantai</th>
                    <th>Tipe kamar</th>
                    <th>Status kamar</th>
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
                <?php foreach ($data as $d) { ?>
                    <tr>

                        <td><?php echo $d->no_kamar; ?></td>
                        <td><?php echo $d->lantai; ?></td>
                        <td><?php echo $d->tipe_kamar; ?> </td>
                        <td><?php echo $d->status; ?> </td>
                        <td style="text-align: center"><a class="btn btn-default" href="<?php echo base_url()."index.php/crud/editKamar/".$d->id_kamar;?>">Edit</a>  <a onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url()."index.php/crud/deleteKamar/".$d->id_kamar;?>" class="btn btn-danger">Hapus</a></td>
                        
                        
                        

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
   
</html>

