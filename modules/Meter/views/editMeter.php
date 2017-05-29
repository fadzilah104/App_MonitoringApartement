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
                            <h4 class="header">Kelola KWH Meter</h4>
                            
                             <?php 
                                   if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo validation_errors(); } ?>
                            </div>

                            <form class="form-horizontal" action="<?php echo base_url('update_meter'); ?>" method="POST">
                                <div class="form-group">
                                    <label for="inputname" class="col-sm-3 control-label">Nomor Meter : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nometer" readonly value="<?php echo $nometer; ?>" >

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-3 control-label">ID Pelanggan : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="idpel" placeholder="" name="idpel" value="<?php echo $idpel; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Ip Modem : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputip" placeholder="" name="ip" value="<?php echo $ip; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Mac Address : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputip" placeholder="" name="macaddress" value="<?php echo $mac_address; ?>">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">SSID : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputip" placeholder="" name="ssid" value="<?php echo $ssid; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Phase : </label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="phase">
                                            <option>1 Phase</option>
                                            <option>3 Phase</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Status Meter : </label>
                                    <div class="col-sm-3">
                                        <input type="radio" name="aktif" value="1" checked/>Aktif
                                        &nbsp;
                                        <input type="radio" name="aktif" value="0"/>Tidak Aktif
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
        </diV>
    </body>
</html>
