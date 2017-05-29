<?php $this->load->view('template/vbootstrap_table') ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            <?php echo modules::run("template/sidebar"); ?>
            <!-- /#sidebar-wrapper -->

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Kelola Subsidi</h4>

                            <?php 
                                   if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo validation_errors(); } ?>
                            </div>

                                <form class="form-horizontal" action="<?php echo base_url('update_subsidi'); ?>" method="POST">
                                <div class="form-group">
                                        <div class="col-sm-2">
                                            <input type="hidden" class="form-control" id="inputname" placeholder="" name="id_subsidi" value="<?php echo $id_subsidi; ?>" >
                                        </div>
                                        </div>
                                <div class="form-group">
                                        <label for="nokamar" class="col-sm-3 control-label">Tipe Kamar : </label>
                                        <div class="col-sm-3">

                                            <select class="form-control" name="tipekamar">
                                                <option id="<?php echo $tipe_kamar; ?>" disabled selected><?php echo $tipe_kamar; ?></option>
                                                <option>VVIP</option>
                                                <option>VIP</option>
                                                <option>Standar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputname" class="col-sm-3 control-label">Jumlah Subsidi : </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="jml_subsidi" value="<?php echo $jml_subsidi; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputemail" class="col-sm-3 control-label">Tanggal Dibuat : </label>
                                        <div class="col-sm-3">
                                            <input type="date" class="form-control" id="inputemail" placeholder="" name="tgl_create" value="<?php echo $tgl_create;?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nokamar" class="col-sm-3 control-label">Status Subsidi : </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="aktif" id="optionsRadios1" value="1" checked>
                                                Aktif
                                            </label>
                                            &nbsp;
                                            <label>
                                                <input type="radio" name="aktif" id="optionsRadios1" value="0">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <button type="submit" class="btn btn-default">Ubah</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
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
