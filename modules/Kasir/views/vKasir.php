<?php $this->load->view('template/vbootstrap_table') ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            
            <?php 
           $menu = $this->session->userdata('menu');
           echo modules::run($menu);
            ?>
            <!-- /#sidebar-wrapper -->

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Cek No Kamar</h4>
                                <form class="form-horizontal" action="<?php echo base_url('')."index.php/kasir/cekData"; ?>" method="POST">

                                    <div class="form-group">
                                        <label for="inputname" class="col-sm-2 control-label">No. Kamar : </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="nokamar">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">Cek</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /#page-content-wrapper -->

                </div>
            </div>
</html>
