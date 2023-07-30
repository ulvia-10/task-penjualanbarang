<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-4 text-gray-800">Ubah Data Pengguna</h1>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <div class="card-block" style="padding-left: 20px; padding-top: 10px">
                    <section class="content">
                        <?php foreach ($Pengguna as $data) { ?>
                            <form role="form" action="<?php echo site_url('Pengguna/Pengguna_Controller/update') ; ?>" method="post">
                                <div class="box-body">
                                    <input type="text" hidden="true" class="form-control" name="IdPengguna" value="<?php echo $data->IdPengguna ?>" required>                                    
                                    <div class="col-lg-5 mb-3">
                                        <label for="name">Nama Pengguna<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="name" name="NamaPengguna" placeholder="Masukkan Nama Pengguna" value="<?php echo $data->NamaPengguna ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="name">Password<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="name" name="Password" placeholder="Masukkan Nama Pengguna" value="<?php echo $data->Password ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="name1">Nama Depan<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="name1" name="NamaDepan" placeholder="Masukkan Nama Depan" value="<?php echo $data->NamaDepan ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="name22">Nama Belakang<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="name22" name="NamaBelakang" placeholder="Masukkan Nama Belakang" value="<?php echo $data->NamaBelakang ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="keterangan">No HP<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="NoHp" name="NoHp" placeholder="Masukkan NoHp" value="<?php echo $data->NoHp ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="Alamat">Alamat<span style="color:red"> * </span></label>
                                        <input type="text" class="form-control" id="Alamat" name="Alamat" placeholder="Masukkan Alamat" value="<?php echo $data->Alamat ?>" required>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <label for="IdAkses">Hak Akses</label>
                                        <select class="form-control" name="IdAkses" placeholder="Supplier" id="IdAkses" value="<?php echo $data->IdAkses ?>">
                                            <option value="" >Pilih Hak Akses</option>
                                            <?php foreach ($HakAkses as $row) { ?>
                                                <option value="<?php echo $row->IdAkses ?>" <?php echo $row->IdAkses == $data->IdAkses ? "selected" : "" ?>>
                                                    <?php echo $row->NamaAkses ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-5 mb-3">
                                        <a href="<?php echo site_url('Pengguna/Pengguna_Controller') ?>" class="btn btn-secondary">Kembali</a>
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
<script src="<?php echo base_url('assets/js/select2.min.js') ?>"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->

<script>
     $(function(){
      $("#IdAkses").select2();
     }); 
</script>
</body>
</html>