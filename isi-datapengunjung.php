<!DOCTYPE html>
<?php
include 'koneksi.php';
session_start();
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>SIMPERPUS - Data Pengunjung</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon" /> -->
    <link rel="icon" href="assets/icon.jpg" class="img-circle" type="image/x-icon" />
</head>
<style>
    .container {
        max-width: 1300px;
    }

    .content-wrapper {
        background: #eaeaea;
    }
</style>

<body class="hold-transition layout-top-nav accent-dark">
    <div class="wrapper">
        <?php
  //menampilkan pesan jika ada pesan
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
  $pesan = $_SESSION['pesan']; ?>

        <div id="flash-data" data-flashdata="<?= $_SESSION['notif'];?>" data-type="<?= $_SESSION['status']; ?>"
            data-message="<?= $_SESSION['pesan']; ?>">
        </div>
        <?php }//mengatur session pesan menjadi kosong
  $_SESSION['pesan'] = '';
  unset($_SESSION['pesan']);
  unset($_SESSION['status']);
  ?>
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-dark navbar-warning"
            style="background-image: url('./assets/login/images/bg.jpg');">
            <div class="container">
                <a href="index" class="navbar-brand">
                    <span class="brand-text font-weight-light text-white">SIMPERPUS - Sistem Informasi Perpustakaan
                        Sekolah
                        <?php
    $quer = $koneksi->query("SELECT * FROM tb_website");
    foreach ($quer as $data) : 
    ?>
                        <?= $data['school_name']?>

                        <?php
                endforeach; 
                mysqli_free_result($quer);
                ?></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <!-- <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="index" class="nav-link">Login</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid col-sm-7">

                    <div class="col-sm-11">
                        <!-- <h1 class="m-0 text-dark"> Cari Pustaka <small>Informasi Data Pustaka</small></h1> -->
                        <div class="form-group text-left">
                            <a href="index" class="btn bg-lightblue btn-sm"> Login</a>
                            <a href="caripustaka" class="btn bg-lightblue btn-sm"> Lihat Pustaka</a>
                        </div>

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->

            </div>
            <!-- /.content-header -->


            <!-- Main content -->
            <div class="content">
                <div class="container-fluid col-sm-7">
                    <div class="card card-outline card-warning" style="border-top: 3px solid #9f6d42;">
                        <div class="card-header">
                            <h4 class="card-title text-bold text-center">Isi Data Pengunjung</h4>
                            <!-- <div class="form-group text-right">
                                <a href="" class="btn bg-lightblue btn-sm"> Lihat Data Pengunjung</a>
                                </div> -->
                        </div>
                        <div class="container col-sm-2">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <!-- Fullname -->
                                    <div class="form-group">
                                        <label for="editPenggunaFullname" class="col-form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan Nama Pengunjung" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editPenggunaFullname" class="col-form-label">No HandPhone</label>
                                        <input type="number" name="nohp" class="form-control"
                                            placeholder="Masukkan Nomor HandPhone" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="editPenggunaFullname" class="col-form-label">Kelas *Jika
                                            Siswa*</label>
                                        <input type="text" name="kelas" class="form-control"
                                            placeholder="Masukkan kelas Jika anda seorang siswa" />
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" name="tambah" class="btn bg-lightblue btn-sm"><i
                                                class="fa fa-save"></i>&ensp;Add Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- /.card-body -->


                    </div>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class='container'>
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    <!-- Anything you want -->
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; <?= date('Y'); ?> <a href="">SIMPERPUS - Sistem Informasi Perpustakaan Sekolah <?php
    $quer = $koneksi->query("SELECT * FROM tb_website");
    foreach ($quer as $data) : 
    ?>
                        <b><?= $data['school_name']?></b>

                        <?php
                endforeach; 
                mysqli_free_result($quer);
                ?></a>.</strong> All rights
                reserved.
            </div>
        </footer>
    </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>

    <script src="assets/js/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/js/myscript.js"></script>

    <!-- Bootstrap -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


    <!-- AdminLTE -->
    <script src="assets/dist/js/adminlte.js"></script>
</body>

</html>
<?php
if (isset($_POST['tambah'])){          
$nama= $_POST['nama'];
$nohp= $_POST['nohp'];
$kelas= $_POST['kelas'];
            
$query1 = "INSERT INTO tb_pengunjung (nama, nohp, kelas, tanggal) values ( '$nama' , '$nohp', '$kelas', NOW() )";

$proses = $koneksi->query($query1);
if ($proses){
        $_SESSION['pesan'] = 'Data Berhasil Di Tambah. Terima Kasih Telah berkunjung ^_^';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./isi-datapengunjung';</script>";
        die();
    }
}?>