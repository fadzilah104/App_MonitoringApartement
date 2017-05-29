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
                            <h4 class="header">Kelola Pelanggan</h4>
                            <form class="form-horizontal" action="<?php echo base_url() . "index.php/crud/updatePelanggan"; ?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inputname" placeholder="" name="id_penghuni" value="<?php echo $id_penghuni; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="inputname" class="col-sm-2 control-label">Nama Penghuni : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nama" value="<?php echo $nama; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-2 control-label">Email : </label>
                                    <div class="col-sm-2">
                                        <input type="email" class="form-control" id="inputemail" placeholder="" name="email" value="<?php echo $email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputtelepon" class="col-sm-2 control-label">Telepon : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="inputtelepon" placeholder="" name="no_telp" value="<?php echo $no_telp; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-2 control-label">No. Kamar : </label>
                                    <div class="col-sm-2">
                                        <select class="form-control" name="nokamar">
                                            <option value="#" disabled>--Pilih No.Kamar--</option>
                                            <?php foreach ($kamar as $row) { ?>
                                                <option value="<?php echo $row->id_kamar; ?>" selected><?php echo $row->no_kamar; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deposit" class="col-sm-2 control-label">Status : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="status" placeholder="" name="status" value="<?php echo $status; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="deposit" class="col-sm-2 control-label">Kelola : </label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" id="kelola" placeholder="" name="kelola" value="<?php echo $kelola; ?>">
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
        </div>
</html>
