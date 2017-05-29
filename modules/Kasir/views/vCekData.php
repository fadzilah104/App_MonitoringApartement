<?php $this->load->view('template/vbootstrap_table'); ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cek No. Kamar</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body>
        <div id="wrapper">

            <?php 
           $menu = $this->session->userdata('menu');
           echo modules::run($menu);
            ?>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Kelola Pelanggan</h4>
                            <form class="form-horizontal" action="<?php echo base_url('').  "index.php/kasir/printData/"; ?>" method="POST" target="_blank">
                               <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">No Kamar : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nokamar" value="<?php echo $no_kamar; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">Nama Penghuni : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nama" value="<?php echo $nama; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">Meter Id : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="mid" value="<?php echo $mid; ?>">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">Token : </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="nilai">
                                                <option>100.000</option>
                                                <option>200.000</option>
                                                <option>300.000</option>
                                                <option>400.000</option>
                                                <option>500.000</option>
                                                <option>600.000</option>
                                                <option>700.000</option>
                                                <option>800.000</option>
                                                <option>900.000</option>
                                                <option value="1000">1.000.000</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                        <button type="submit" class="btn btn-default">Bayar</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>

<script>
function myFunction() {
    window.open('index.php/kasir/printData/');
    window.print();
}
</script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript">
                
                $( function() {
                    $( '#datepicker').datepicker();
                    $( '#datepicker1').datepicker();
                });
            </script>
    </body>
</html>
