<?php $this->load->view('template/vbootstrap_table') ?>
<?php
//                            $data = $this->db->query("select id_kamar,distinct(tipe_kamar) as tipe_kamar from master_kamar")->result_array();
//                            foreach ($data as $row){
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div id="wrapper">

            <!-- Sidebar -->
           <?php echo modules::run("template/sidebar"); ?>

            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="header">Kelola Kamar</h4>
                            <form class="form-horizontal" action="<?php echo base_url() . "autodebet/updateDebet"; ?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inputname" placeholder="" name="id_autodebet" value="<?php echo $id_autodebet; ?>" >
                                </div>
                                <div class="form-group">
                                    <label for="inputname" class="col-sm-3 control-label">Nilai Autodebet : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nilai_autodebet" value="<?php echo $nilai_autodebet; ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-3 control-label">Tanggal Dibuat : </label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" id="inputemail" placeholder="" name="tgl_create" value="<?php echo $tgl_create; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Status Debet : </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios1" value="1" checked>
                                            aktif
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios2" value="0">
                                            Tidak aktif
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
    </body>
</html>
