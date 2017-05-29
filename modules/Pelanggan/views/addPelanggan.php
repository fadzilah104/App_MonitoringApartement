<?php $this->load->view('template/vbootstrap_table') ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
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
                            <h4 class="header">Kelola Pelanggan</h4>

                            <?php 
                                   if(validation_errors()){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo validation_errors(); } ?>
                            </div>

                             <?php 
                                   if($this->session->flashdata('pesan')){ ?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Perhatian!</strong> <?php echo $this->session->flashdata('pesan'); } ?>
                            </div>


                            <form class="form-horizontal" action="<?php echo base_url('insert_pelanggan'); ?>" method="POST">
                               <div class="form-group ktp-div">
                                    <label for="inputname" class="col-sm-4 control-label">Cari KTP : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputKTP" placeholder="" name="ktp"><button type="button" class="btn btn-primary" onclick="cekKTP()">Cari</button>

                                    </div>
                                </div>
                                
                                <div id="hasil">
                                </div>
                                      
                                <!-- <div class="form-group">
                                    <label for="inputname" class="col-sm-4 control-label">Nama Penghuni : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="inputname" placeholder="" name="nama">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputemail" class="col-sm-4 control-label">Email : </label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control" id="inputemail" placeholder="" name="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputtelepon" class="col-sm-4 control-label">Telepon : </label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="inputtelepon" placeholder="" name="telepon">
                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">No. Kamar : </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="nokamar">
                                            <option value="#" disabled selected>Pilih No. Kamar</option>
                                            <?php foreach ($kamar as $row) { ?>
                                                <option value="<?php echo $row->id_kamar; ?>"><?php echo $row->no_kamar; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">Nilai Autodebet : </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="autodebet">
                                            <option value="#" disabled selected>Pilih Nilai Autodebet</option>
                                            <?php foreach ($debet as $row) { ?>
                                                <option value="<?php echo $row->nilai_autodebet; ?>"><?php echo $row->nilai_autodebet; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="nokamar" class="col-sm-4 control-label">Meter Id : </label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="meter">
                                            <option value="#" disabled selected>Pilih Meter Id</option>

                                            <?php foreach ($mid as $row) { ?>
                                                <option value="<?php echo $row->mid; ?>"><?php echo $row->mid; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                
                                <div class="form-group">
                                    <label for="deposit" class="col-sm-4 control-label">Deposit : </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="deposit" placeholder="" name="deposit">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="date" class="col-sm-4 control-label">Tgl Masuk : </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tglmasuk" placeholder="" name="tglmasuk" value="<?php echo date("Y-m-d");?>">
                                    </div>
                                </div>

                               <!--  <div class="form-group">
                                    <label for="date" class="col-sm-4 control-label">Tgl Keluar : </label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="tglkeluar" placeholder="" name="tglkeluar" value="<?php echo date("Y-m-d");?>">
                                    </div>
                                </div> -->

                                <div class="form-group ">
                                    <label for="nokamar" class="col-sm-4 control-label">Status Pelanggan : </label>
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

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script type="text/javascript">
                
                $( function() {
                    $( '#datepicker').datepicker();
                    $( '#datepicker1').datepicker();
                });

                // $(document).ready(function(){
                //      $("#inputKTP").keypress(function(event) {
                //          Act on the event 
                //         alert(event);

                //     });

                // });

                function cekKTP(){
                    var ktp = $("#inputKTP").val();
                    var url = "<?php echo base_url('pelanggan/cekKtp/')?>";

                    $.ajax({
                        type : "GET",
                        data : "ktp="+ktp,
                        url : url,
                        success : function(e){
                            $("#hasil").html(e);
                            //$("#inputKTP").hide();
                            
                        }

                    });
                }

            </script>
    </body>
</html>
