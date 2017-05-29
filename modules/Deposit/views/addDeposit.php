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
                            <h4 class="header">Kelola Deposit</h4>
                                <form class="form-horizontal" action="<?php echo base_url('insert_deposit'); ?>" method="POST">
                                <div class="form-group">
                                        <label for="nokamar" class="col-sm-2 control-label">Tipe Kamar : </label>
                                        <div class="col-sm-2">

                                            <select class="form-control" name="tipekamar">
                                                <option>VVIP</option>
                                                <option>VIP</option>
                                                <option>Standar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputname" class="col-sm-2 control-label">Jumlah Deposit : </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="jml_deposit">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputemail" class="col-sm-2 control-label">Tanggal Dibuat : </label>
                                        <div class="col-sm-2">
                                            <input type="date" class="form-control" id="inputemail" placeholder="" name="tgl_create" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nokamar" class="col-sm-2 control-label">Status Subsidi : </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="aktif" id="optionsRadios1" value="1" checked>
                                                Aktif
                                            </label>
                                            <label>
                                                <input type="radio" name="aktif" id="optionsRadios1" value="0">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
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
            </div>
</html>
