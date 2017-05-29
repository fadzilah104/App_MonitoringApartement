<?php $this->load->view('template/vbootstrap_table') ?>
<?php
//                            $data = $this->db->query("select id_kamar,distinct(tipe_kamar) as tipe_kamar from master_kamar")->result_array();
//                            foreach ($data as $row){
?>
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

                            <form class="form-horizontal" action="<?php echo base_url('update_kamar'); ?>" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="inputname" placeholder="" name="id_kamar" value="<?php echo $id_kamar; ?>" >
                                </div>
                                
                                 <div class="form-group">
                                    <label for="inputemail" class="col-sm-3 control-label">Lantai : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputemail" placeholder="" name="lantai" value="<?php echo $lantai; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputname" class="col-sm-3 control-label">No. Kamar : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nokamar" value="<?php echo $nokamar; ?>" >
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label for="inputname" class="col-sm-3 control-label">Meter ID : </label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="inputname" placeholder=""  readonly value="<?php echo $mid; ?>" >
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Tipe Kamar : </label>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="tipekamar">
                                            <option value="<?php echo $tipekamar; ?>" selected>tipe sebelumnya <?php echo $tipekamar; ?></option>
                                            <option>VVIP</option>
                                            <option>VIP</option>
                                            <option>Standar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-3 control-label">Status Kamar : </label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios1" value="1" 
                                            <?php if ($aktif == 1){
                                                echo "checked"; 
                                                }else{
                                                    echo "";
                                                    }; ?>
                                            >
                                            aktif 
                                        </label>
                                        &nbsp;
                                        <label>
                                            <input type="radio" name="aktif" id="optionsRadios2" value="0" <?php if ($aktif == 0){
                                                echo "checked"; 
                                                }else{
                                                    echo "";
                                                    }; ?>>
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
