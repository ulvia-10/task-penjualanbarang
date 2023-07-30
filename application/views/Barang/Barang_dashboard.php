<?php  ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mt-4 mb-4 text-gray-800">Dashboard Laba/Rugi Berdasarkan Daftar Barang</h1>
    <div><br></div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Top 5 Barang Paling Menguntungkan
                </div>
                <div class="card-body">
                    <canvas id="chartTop5Barang" width="100%" height="24">
                    <img id="url" />    
                    <!-- <canvas id="myChart2" height="300" width="500"></canvas> -->
                </div>
            </div>
        </div>
    </div>
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
                                    <th>Nama Barang</th>
                                    <th>Laba(+)/Rugi(-)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php foreach ($Barang as $data) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php $i++; ?>
                                            <?php echo $i; ?>
                                        </td>
                                        <td><?php echo $data->NamaBarang; ?></td>
                                        <td><?php echo ($data->keuntungan > 0? " (+) Rp " . number_format($data->keuntungan,2,',','.') : " (-) Rp " . number_format($data->keuntungan,2,',','.'))  ; ?></td>
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
foreach ($Barang as $data) {
?>
    <!-- ============ MODAL HAPUS BARANG =============== -->
    <div class="modal fade" id="modal_hapus<?php echo $data->IdBarang; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="padding-top: 30px">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Hapus</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Barang/Barang_Controller/hapus/' . $data->IdBarang) ?>">
                    <div class="modal-body">
                        <p>Anda yakin mau menghapus data dengan nama <b><?php echo $data->NamaBarang; ?></b> ?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="IdBarang" value="<?php echo $data->IdBarang; ?>">
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

<script src="<?php echo base_url('assets/js/chart.js') ?>"></script>
<!--Script untuk datatables-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tabeldata').DataTable();
    });
</script>
<script type="text/javascript">
    var ctx = document.getElementById('chartTop5Barang').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',

        data: {
            labels: [
              <?php
                if (count($Top5Barang)>0) {
                  foreach ($Top5Barang as $data) {
                    echo "'" .$data->NamaBarang ."',";
                  }
                }
              ?>
            ],
            datasets: [{
                label: 'Total Keuntungan (Rupiah)',
                backgroundColor: '#ADD8E6',
                borderColor: '##93C3D2',
                data: [
                  <?php
                    if (count($Top5Barang)>0) {
                       foreach ($Top5Barang as $data) {
                        echo $data->keuntungan . ", ";
                      }
                    }
                  ?>
                ],
            }]
        },
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        steps:4,
                        stepValue: 20
                        // max: 60 //max value for the chart is 60
                        }
                }]
            }
        }
                
    });
    </script>   
</body>

</html>