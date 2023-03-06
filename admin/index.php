<?php 
$halaman = 'dashboard';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="alert alert-dark alert-dismissible">
            <h5><i class="icon fas fa-check"></i> Selamat Datang</h5>
            SIMPERPUS - Sistem Informasi Perpustakaan Sekolah
            <?php
    $quer = $koneksi->query("SELECT * FROM tb_website");
    foreach ($quer as $data) : 
    ?>
            <?= $data['school_name']?>
            <?php
                endforeach; 
                mysqli_free_result($quer);
                ?>
        </div>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-lightblue">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_buku";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Jumlah Buku</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <a href="buku" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-navy">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(nis) as a FROM tb_anggota";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Data Anggota</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="anggota" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_transaksi WHERE status = 'Pinjam'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Transaksi Pinjam</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <a href="transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-gray">
                    <div class="inner">
                        <?php
              $sql = "SELECT count(id) as a FROM tb_transaksi WHERE status = 'Kembali' ";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Transaksi Kembali</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-newspaper"></i>

                    </div>
                    <a href="transaksi-kembali" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- <div class="col-lg-3 col-6">
             
                <div class="small-box bg-dark">
                    <div class="inner">
                        <?php
              echo $sql = "SELECT count(id) as a FROM tb_pengunjung WHERE tanggal  LIKE '".date('Y')."%'";
              $query = mysqli_query($koneksi, $sql);
              $data = mysqli_fetch_assoc($query);
              ?>
              <?= $data['a']; ?>
                        <h3><?= $data['a']; ?></h3>
                        <p>Pengunjung</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <a href="transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->





            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="text-lg">Statistik Data Pengunjung Perpustakaan Pada Tahun <?= date('Y')?></h3>
                            <!-- <a href="chart-report">View Report</a> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="barChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="text-lg">Buku Tamu</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Nama</th>
                                    <th>No HandPhone</th>
                                    <th>Kelas</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                     $query=$koneksi->query( "SELECT * FROM tb_pengunjung LIMIT 5");  $nomor_urut = 1;
                                    foreach ($query as $data) :
                                                ?>
                                <tr>
                                    <!-- <td><?= $nomor_urut; ?></td> -->
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['nohp']; ?></td>
                                    <td><?php echo $data['kelas']; ?></td>
                                    <td><?php echo date("d F Y", strtotime("$data[tanggal]")); ?></td>
                                    <td><?php echo date("H:i:s", strtotime("$data[tanggal]")); ?></td>

                                </tr>
                                <?php $nomor_urut++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; <?= date('Y'); ?> <a href="">SIMPERPUS - Sistem Informasi Perpustakaan <?php
    $quer = $koneksi->query("SELECT * FROM tb_website");
    foreach ($quer as $data) : 
    ?>
            <b><?= $data['school_name']?></b>

            <?php
                endforeach; 
                mysqli_free_result($quer);
                ?>
        </a>.</strong> All rights
    reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b></b>
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<?php
$datasql =
"SELECT COUNT(id) AS jumlah, DATE_FORMAT(tanggal, '%M') AS bulan FROM tb_pengunjung WHERE tanggal LIKE '2023%' GROUP BY bulan ORDER BY CASE bulan WHEN 'January' THEN 1 WHEN 'February' THEN 2 WHEN 'March' THEN 3 WHEN 'April' THEN 4 WHEN 'May' THEN 5 WHEN 'June' THEN 6 WHEN 'July' THEN 7 WHEN 'August' THEN 8 WHEN 'September' THEN 9 WHEN 'October' THEN 10 WHEN 'November' THEN 11 WHEN 'December' THEN 12 END";
// "SELECT count(id) AS jumlah, DATE_FORMAT(tanggal, '%Y%m%d') AS bulan FROM tb_pengunjung WHERE tanggal LIKE '2023%' GROUP BY DATE_FORMAT(tanggal, '%Y%m%d') ORDER BY DATE_FORMAT(tanggal, '%Y%m%d') ASC ";
$querybulan = mysqli_query($koneksi, $datasql); 
?>                
<script>
    $(function () {
        var areaChartData = {
            labels: [ 
                <?php while ($data = mysqli_fetch_assoc($querybulan)) { echo '"'. date('F', strtotime($data['bulan'])) . '",';} ?>
            ],
            datasets: [{
                    label: 'Jumlah Pengunjung',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [ <?php
                        $datasql =
                        "SELECT count(id) AS jumlah, DATE_FORMAT(tanggal, '%m') AS bulan FROM tb_pengunjung WHERE tanggal LIKE '2023%' GROUP BY DATE_FORMAT(tanggal, '%m') ORDER BY DATE_FORMAT(tanggal, '%m') ASC ";
                        $queryjumlah = mysqli_query($koneksi, $datasql);
                        while ($data = mysqli_fetch_assoc($queryjumlah)) {echo '"'.$data['jumlah'].'",';}?>
                    ]
                },
            ]
        }
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        // var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp0
        // barChartData.datasets[1] = temp0

        var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
    }

        var charsize = {
                      responsive              : true,
                      maintainAspectRatio     : false,
                      datasetFill             : false,
                      scales: {
                          yAxes: 
                                [{ 
                                    ticks: { 
                                    beginAtZero:true, 
                                    stepSize:1 
                                    }
                                }]
                        }
                    }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: charsize
        })
    })
</script>

<script>
        // Function ini dijalankan ketika Halaman ini dibuka pada browser
        $(function () {
            setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
        });

        //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
        function timestamp() {
            $.ajax({
                url: 'ajax_timestamp.php',
                success: function (data) {
                    $('#timestamp').html(data);
                },
            });
        }
    </script>

</body>

</html>