<?php $this->load->view('template/vbootstrap_table') ?>
<?php 

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
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

        <?php echo modules::run("template/sidebar"); ?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Kelola Pajak</h4>
        <a href="<?php echo base_url('')."index.php/Pajak/addPajak"; ?>""><button type="button" class="btn btn-success">Tambah</button></a>
       
        <br>
        <br>

    
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Pajak</th>
                    <th>Tanggal Dibuat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) { ?> 
                    <tr>
                        <td><?php echo $d->pajak;?></td>
                        <td><?php echo $d->tanggal_insert;?></td>
                        <td><?php  if($d->status == 1){
                            echo "Aktif";
                            }else{
                                echo "Tidak Aktif";
                                }; ?> </td>
                        <td style="text-align: center"><a class="btn btn-default" href="<?php  echo base_url()."index.php/pajak/editPajak/".$d->id; ?>">Edit</a> <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url()."index.php/pajak/deletePajak/".$d->id;?>">Hapus</a>
                        </td>
                        

                    </tr>
                <?php } ?>    
            </tbody>
        </table>
        </div>

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

