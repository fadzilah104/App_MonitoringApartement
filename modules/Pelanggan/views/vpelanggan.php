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
                        <h4>Kelola Pelanggan</h4>
        <a href="<?php echo base_url('tambah_pelanggan'); ?>""><button type="button" class="btn btn-success">Tambah</button></a>
       
        <br>
        <br>

    <form action="<?php echo base_url('pelanggan/deletePelanggan')?>" method="POST" accept-charset="utf-8">
        <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkall" name="checkall"> No KTP</th>
                    <th>No Meter</th>
                    <th>No Kamar</th>
                    <th>Nama Penghuni</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>kelola</th>
                    <th>Action</th>
                </tr>
            </thead>

            
            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td> <input type="checkbox" id="pilih[]" name="pilih[]" value="<?php echo $d->id; ?>">
                         <?php echo $d->ktp;?>
                        </td>
                        <td><?php echo $d->mid;?></td>
                        <td><?php echo $d->no_kamar;?></td>
                        <td><?php echo $d->nama;?></td>
                        <td><?php echo $d->no_telp; ?></td>
                        <td><?php echo $d->jabatan; ?> </td>
                        <td><?php  if($d->aktif == 1){
                            echo "Aktif";
                            }else{
                                echo "Tidak Aktif";
                                }; ?> </td>
                        <td style="text-align: center"><a class="btn btn-default" href="<?php  echo base_url('edit_pelanggan/'.$d->ktp);?>">Edit</a>
                        <!-- <a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url('hapus_pelanggan/'.$d->id);?>">Hapus</a>
                         -->
                        <button type="submit" class="btn btn-danger" name="hapus" onclick="return confirm('Apakah anda yakin ?');">Hapus</button>
                        <button type="submit" class="btn btn-danger" name="checkout" onclick="return confirm('Apakah anda yakin ?');">Check Out</button>
                            <!-- <a class="btn btn-primary" onclick="return confirm('Apakah anda yakin ?');" href="<?php echo base_url('check_out/'.$d->id);?>">Check out</a> -->
                        </td>
                        
                       
                    </tr>
                <?php } ?>    
            </tbody>
        </table>
        </div>
        </form>


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

        $('#checkall').click(function(){
         $(':checkbox').attr({checked: 'true'});
        var del=confirm("yakin akan semua?");
            if(del==true){
                //delete here using $.ajax              
            }
            else{
                window.location.reload(false);
                $('#checkAll').attr({checked: 'false'});
            }
        
        });

        </script>
                   
        
</html>

