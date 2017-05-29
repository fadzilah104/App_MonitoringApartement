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
                            <h4 class="header">Kelola Kamar</h4>

                            <?php if(validation_errors()){ ?>

                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo validation_errors(); } ?>
                            </div>

                                

                                <form class="form-horizontal" action="<?php echo base_url('insert_kamar'); ?>" method="POST">
                                    
                                    <div class="form-group">
                                        <label for="inputemail" class="col-sm-3 control-label">Lantai : </label>
                                        <div class="col-sm-3">
                                            <input type="t  ext" class="form-control" id="inputemail" placeholder="" name="lantai">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputname" class="col-sm-3 control-label">No. Kamar : </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="nokamar">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label for="inputname" class="col-sm-3 control-label">Meter ID : </label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="mid">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="nokamar" class="col-sm-3 control-label">Tipe Kamar : </label>
                                        <div class="col-sm-3">

                                            <select class="form-control" name="tipekamar">
                                                <option>VVIP</option>
                                                <option>VIP</option>
                                                <option>Standar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
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
