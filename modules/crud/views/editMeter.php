<?php $this->load->view('template/vbootstrap_table') ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand">
                        <a href="#">
                            Pertamina
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/crud/pelanggan'); ?>">pelanggan</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/crud/kamar'); ?>">Kamar</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('index.php/crud/meter'); ?>">Kelola meter</a>
                    </li>
                    <li>
                        <a href="#">Master User</a>
                    </li>
                    <!--                <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Services</a>
                                    </li>
                                    <li>
                                        <a href="#">Contact</a>
                                    </li>-->
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Kelola KWH Meter</h4>
                            <form class="form-horizontal" action="<?php echo base_url() . "index.php/crud/updateMeter"; ?>" method="POST">
                                <div class="form-group">
                                    <label for="inputname" class="col-sm-2 control-label">Nomor Meter : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nometer" value="<?php echo $nometer; ?>" >

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-2 control-label">ID Pelanggan : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="idpel" placeholder="" name="idpel" value="<?php echo $idpel; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-2 control-label">Ip Modem : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="inputip" placeholder="" name="ip" value="<?php echo $ip; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-2 control-label">Phase : </label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="phase">
                                            <option>1 Phase</option>
                                            <option>3 Phase</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-2 control-label">Status Subsidi : </label>
                                    <div class="col-sm-2">
                                        <input type="radio" name="status" value="Aktif" checked/>Aktif
                                        &nbsp;
                                        <input type="radio" name="status" value="Tidak Aktif"/>Tidak Aktif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
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
