            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mt-4 mb-4 text-gray-800">Profil Pengguna</h1>
                <div><br></div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12 col-md-7">
                        <div class="card">
                            <div class="card-block" style="padding-left: 20px; padding-top: 10px">
                                <section class="content">
                                    <?php foreach ($ms_pengguna as $data) { ?>
                                        <form role="form" action="<?php echo site_url('Ms_Pengguna/Ms_Pengguna_Controller/updateAgent'); ?>" method="post">
                                            <div class="box-body">
                                                <input hidden="true" class="form-control" type="text" name="modified_by" value="<?php echo $this->session->userdata('id'); ?>">
                                                <input type="text" hidden="true" class="form-control" name="id" value="<?php echo $data->id ?>" required>
                                                
                                                <div class="col-lg-5 mb-3">
                                                    <label for="nama_tipe">Nama<span style="color:red"> * </span></label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Nama" name="name" value="<?php echo $data->name ?>" required>
                                                </div>

                                                <div class="col-lg-5 mb-3">
                                                    <label for="nama_tipe">NRP<span style="color:red"> * </span></label>
                                                    <input readonly type="text" class="form-control" placeholder="Masukkan NRP" name="nrp" value="<?php echo $data->nrp ?>" required>
                                                </div>
                                                
                                                <div class="col-lg-5 mb-3">
                                                    <label for="nama_tipe">E-Mail<span style="color:red"> * </span></label>
                                                    <input type="text" class="form-control" placeholder="Masukkan Alamat Email" name="email" value="<?php echo $data->email_pengguna ?>" required>
                                                </div>

                                                <div class="col-lg-5 mb-3">
                                                    <label for="nama_tipe">No. HP<span style="color:red"> * </span></label>
                                                    <input type="number" class="form-control" placeholder="Masukkan No. HP" name="no_hp" value="<?php echo $data->no_hp_pengguna ?>" required>
                                                </div>

                                                <div class="col-lg-5 mb-3">
                                                    <a href="<?php echo site_url('Tr_Data_Kerja_Cdb/Tr_Data_Kerja_Cdb_Controller/indexAgent') ?>" class="btn btn-secondary">Kembali</a>
                                                    &nbsp;&nbsp;
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>

                                            </div>
                                        </form>
                                    <?php } ?>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            </main>     
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright © Customer Relation Department 2022</div>
                    </div>
                </div>
            </footer>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url('assets/js/scripts.js') ?>"></script>
            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

            <!--Script untuk datatables-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
            <script>
//konfirmasi password
    function confirmPassword(){
      var pw1=$("#txtPassword").val();
      var pw2=$("#txtPasswordConfirm").val();
      if(pw1 === pw2){
        $("#PWMsg").hide();
        $('#submit').prop('disabled', false);
      }else{
        $("#PWMsg").html("Password Tidak Cocok");
        $("#PWMsg").show();
        error_password_confirm = true;
        $('#submit').prop('disabled', true);
      }
    }

    function confirmOldPassword(){
      var pw1=$("#txtPasswordLama").val();
      var pw2=$("#txtPasswordLama2").val();
      if(pw1 === pw2){
        $("#pwLamaMsg").hide();
        $('#submit').prop('disabled', false);
        $("#txtPassword").val(pw1);
        $("#txtPasswordConfirm").val(pw1);
      }else{
        $("#pwLamaMsg").html("Password Lama Salah");
        $("#pwLamaMsg").show();
        $('#submit').prop('disabled', true);
        error_password_confirm2 = true;
      }
    }

    $(function() {
        $("#PWMsg").hide();
        $("#pwLamaMsg").hide();

        var error_password_confirm = false;
        var error_password_confirm2 = false;

        $("#txtPasswordConfirm").focusout(function(){
            confirmPassword();
        });

        $("#txtPasswordLama").focusout(function(){
            confirmOldPassword();
        });
    });
</script>


            </body>

            </html>