<?php $this->load->view('template/vbootstrap_table') ?>
<?php 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="<?= base_url(); ?>assets/css/dataTables.bootstrap.min.css">
       <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
      <script language="javascript" type="text/javascript" src="<?= base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
       <script>
         $(document).ready(function() {
            $('#example').DataTable();
       } );
        </script>
    </head>
    <body>
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
                    <a href="#">Master User</a>
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
                        <h4>Kelola Pelanggan</h4>
        <a href="<?php echo base_url('index.php/crud/addPelanggan'); ?>""><button type="button" class="btn btn-success">Tambah</button></a>
       
        <br>
        <br>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama Penghuni</th>
                    <th>Telepon</th>
                    <th>No Kamar</th>
                    <th>Status</th>
                    <th>kelola</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?php echo $d->nama; ?></td>
                        <td><?php echo $d->no_telp; ?></td>
                        <td><?php echo 'L '.$d->no_kamar; ?> </td>
                        <td><?php echo $d->status; ?> </td>
                        <td><?php echo $d->kelola; ?> </td>
                        <td style="text-align: center"><a class="btn btn-default" href="<?php  echo base_url()."index.php/crud/editPelanggan/".$d->id_penghuni;?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url()."index.php/crud/deletePelanggan/".$d->id_penghuni;?>">Hapus</a></td>
                        

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
    $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
                   
        
</html>

