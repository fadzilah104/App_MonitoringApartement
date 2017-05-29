<?php $this->load->view('template/vbootstrap_table') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>

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
                            <h4 class="header">Halaman teknisi</h4>

                            
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>

 
    </body>
</html>
