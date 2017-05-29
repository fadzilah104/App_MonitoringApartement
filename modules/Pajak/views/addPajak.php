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
                            <h4 class="header">Kelola Pajak</h4>

                            <form class="form-horizontal" action="<?php echo base_url('')."index.php/pajak/insertPajak"; ?>" method="POST">
                                
                                <div class="form-group">
                                    <label for="deposit" class="col-sm-4 control-label">Pajak : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="pajak" placeholder="" name="pajak">
                                    </div>
                                </div>

                                <!-- <div class="form-group">
                                    <label for="datetime" class="col-sm-4 control-label">Tgl Masuk : </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tglmasuk" placeholder="" name="tglmasuk" value="<?php echo date("Y/m/d");?>">
                                    </div>
                                </div> -->

                                <div class="form-group ">
                                    <label for="nokamar" class="col-sm-4 control-label">Status Pajak : </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios1" value="1" checked>
                                            AKtif
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios2" value="0">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                        <button type="submit" class="btn btn-default">Tambah</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /#page-content-wrapper -->

            </div>
    </body>
</html>
