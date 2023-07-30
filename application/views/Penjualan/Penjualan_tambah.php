<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-4 text-gray-800">Tambah Data Penjualan</h1>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <div class="card-block" style="padding-left: 20px; padding-top: 10px">
                    <form role="form" action="<?php echo site_url('Penjualan/Penjualan_Controller/tambah') ?>" method="post">
                        <div class="box-body">
                            <div class="col-lg-5 mb-3">
                                <label for="IdBarang">Barang dan Sisa Stok</label>
                                <select class="form-control" name="IdBarang" placeholder="Barang" id="IdBarang" value="<?php echo $data->IdBarang ?>">
                                    <option value="" >Pilih Barang</option>
                                    <?php foreach ($Barang as $row) { ?>
                                        <option value="<?php echo $row->IdBarang ?>">
                                            <?php echo $row->NamaBarang ?> - Sisa <?php echo $row->stok ?> Stok
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="nama_penulis">Jumlah Penjualan<span style="color:red">*</span></label>
                                <input type="number" class="form-control" id="name" name="JumlahPenjualan" placeholder="Masukkan Jumlah Penjualan" required>
                                <span style="color: red;" class="error_form" id="error_name"></span>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="nama_penulis">Harga Jual<span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="name" name="HargaJual" placeholder="Masukkan Harga Jual" required>
                                <span style="color: red;" class="error_form" id="error_name"></span>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <label for="IdPelanggan">Nama Pelanggan</label>
                                <select class="form-control" name="IdPelanggan" placeholder="Pelanggan" id="IdPelanggan" value="<?php echo $data->IdPelanggan ?>">
                                    <option value="" >Cari Nama Pelanggan</option>
                                    <?php foreach ($Pelanggan as $row) { ?>
                                        <option value="<?php echo $row->IdPelanggan ?>">
                                            <?php echo $row->NamaPelanggan ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-5 mb-3">
                                <a href="<?php echo site_url('Penjualan/Penjualan_Controller') ?>" class="btn btn-secondary">Kembali</a>
                                &nbsp;&nbsp;
                                <button type="submit" id="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
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
      $("#IdBarang").select2();
      $("#IdPelanggan").select2();
     }); 
</script>   

</body>

</html>