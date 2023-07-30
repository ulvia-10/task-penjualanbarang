<?php  ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-4 text-gray-800">Data Pelanggan</h1>
    <a href="<?php echo site_url('Pelanggan/Pelanggan_Controller/pageTambah') ?>" class="btn btn-primary">Tambah Data</a>
    <div><br></div>
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12 col-md-7">
            <div class="card">
                <div class="card-block" style="padding: 20px;">
                    <div class="table-responsive">
                        <table class="table" id="tabeldata">
                            <thead>
                                <tr>
                                    <th width="20">No.</th>
                                    <th>Nama</th>
                                    <th>No Hp</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th width="130">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($Pelanggan as $data) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php $i++; ?>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo $data->NamaPelanggan; ?></td>
                                        <td><?php echo $data->NoHp; ?></td>
                                        <td><?php echo $data->Email; ?></td>
                                        <td><?php echo $data->Alamat; ?></td>
                                        <td>
                                            <a href="<?php echo site_url('Pelanggan/Pelanggan_Controller/edit/' . $data->IdPelanggan) ?>" class="btn btn-success">Ubah</a>
                                            <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_hapus<?php echo $data->IdPelanggan; ?>" data-backdrop="false"> Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top" style="display: none;">
    <i class="fas fa-angle-up"></i>
</a>
<?php
foreach ($Pelanggan as $data) {
?>
    <!-- ============ MODAL HAPUS Pelanggan =============== -->
    <div class="modal fade" id="modal_hapus<?php echo $data->IdPelanggan; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding-top: 30px">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Pelanggan/Pelanggan_Controller/hapus/' . $data->IdPelanggan) ?>">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus data dengan nama <b><?php echo $data->NamaPelanggan; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="IdPelanggan" value="<?php echo $data->IdPelanggan; ?>">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</div>
</main>     
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright © Team 6</div>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabeldata').DataTable();
    });
</script>
</body>

</html>