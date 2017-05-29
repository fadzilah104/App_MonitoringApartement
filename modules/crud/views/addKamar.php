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
                            <h4 class="header">Kelola Kamar</h4>
                                <form class="form-horizontal" action="<?php echo base_url() . "index.php/crud/insertkamar"; ?>" method="POST">
                                    <div class="form-group">
                                        <label for="inputname" class="col-sm-2 control-label">No. Kamar : </label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="inputname" placeholder="" name="nokamar">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputemail" class="col-sm-2 control-label">Lantai : </label>
                                        <div class="col-sm-2">
                                            <input type="t  ext" class="form-control" id="inputemail" placeholder="" name="lantai">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nokamar" class="col-sm-2 control-label">Tipe Kamar : </label>
                                        <div class="col-sm-2">

                                            <select class="form-control" name="tipekamar">
                                                <option>VIP</option>
                                                <option>Family</option>
                                                <option>Classic</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nokamar" class="col-sm-2 control-label">Status Subsidi : </label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="status" id="optionsRadios1" value="Aktif" checked>
                                                Aktif
                                            </label>
                                            <label>
                                                <input type="radio" name="status" id="optionsRadios1" value="Tidak Aktif">
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
