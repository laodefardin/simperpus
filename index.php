<?php   
//buat koneksi ke mysql dari file config.php
if (isset($_POST["submit"])) {
  // form telah disubmit, proses data
  // ambil nilai form
$username = htmlentities(strip_tags(trim($_POST["username"])));
$password = htmlentities(strip_tags(trim($_POST["password"])));
include("koneksi.php");
session_start();
//filter dengan mysqli_real_escape_string
$username = $koneksi->escape_string($username);
$password = $koneksi->escape_string($password);

//generate hashing
$password_sha1 = md5(sha1(md5($password)));
//   $password_sha1 = sha1($password);

// cek apakah username dan password ada di tabel 
  $query = "SELECT * FROM tb_pengguna WHERE username = '$username' AND password = '$password_sha1'";
$result = $koneksi->query($query);
$row = $result->num_rows;
  $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE username = '$username'");
$akun = $sql->fetch_assoc();

  if ($row > 0 ){ // jika data ada
    $akun = $result->fetch_assoc();
     // bebaskan memory 
    mysqli_free_result($result);
    
      // tutup koneksi dengan database MySQL
    mysqli_close($koneksi);
    $_SESSION["username"] = $akun["username"];
    $_SESSION["nama"] = $akun["nama"];
    $_SESSION["level"] = $akun["level"];
    $_SESSION["id_user"] = $akun['id'];
    $_SESSION['foto'] = $akun['foto'];
    $_SESSION['nis'] = $akun['nis'];
    // $_SESSION['id_anggota'] = $akun['id_anggota'];

    $level = $akun["level"];
    if($level === 'Siswa'){
        echo "<script> document.location.href='user/index'; </script>";
    }elseif($level === 'Petugas'){
        echo "<script> document.location.href='admin/index'; </script>";
    }else{
        echo "<script> document.location.href='admin/index'; </script>";
    }
}else{
    $_SESSION['pesan'] = '<div class="alert alert-danger alert-dismissible text-center pr-3">
    Username dan Password Tidak ditemukan
    </div>';
}
}
else{
  $username = "";
  $password = "";
}

include("koneksi.php");
$quer = $koneksi->query("SELECT * FROM tb_website");
foreach ($quer as $data) : 
?>
<!doctype html>
<html lang="en">

<head>
	<title>Login | SIMPERPUS</title>
	<meta charset="utf-8">
	<meta content='width=device-width, initial-scale=1.0, user-scalable=1.0, minimum-scale=1.0, maximum-scale=5.0' name='viewport'/>
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

	<link rel="stylesheet" href="assets/login/css/style.css">
	<link rel="icon" href="assets/icon.jpg" class="img-circle" type="image/x-icon" />

</head>

<body class="img js-fullheight" style="background-image: url(assets/login/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-2">
					<!-- <h2 class="heading-section">SIMPERPUS</h2> -->
					<h1 class=""><a href="index"><b>SIM</b>PERPUS</a></h1>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-8 col-lg-4">
					<div class="login-wrap p-0">
						<h4 class="text-center text-white">Sistem Informasi Perpustakaan</h4>
						<h5 class="mb-4 text-center text-white">

    <?= $data['school_name']?>
    
            <?php
                endforeach; 
                
                ?>

						</h5>
						<?php
                //menampilkan pesan jika ada pesan
                if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo $pesan = $_SESSION['pesan'];
                    
                }
                //mengatur session pesan menjadi kosong
                $_SESSION['pesan'] = '';
                ?>
						<form action="" method="post" class="signin-form">
							<div class="form-group">
								<input type="username" class="form-control" placeholder="Username" name="username" id="username"
									value="<?php echo $username ?>" required>
							</div>
							<div class="form-group">
								<input type="password" id="password" class="form-control" name="password" placeholder="Password"
									value="<?php echo $password ?>" required>
								<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-group">
								<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
								<!-- <button type="submit" name="submit" class="btn btn-info btn-block">Masuk</button> -->
							</div>
							<div class="form-group d-md-flex">
								<div class="w-100">
									<a href="isi-datapengunjung"><i class="fa fa-book"></i> Isi Data Pengunjung</a>
								</div>
								<div class="w-50 text-md-right">
									<a href="caripustaka"><i class="fa fa-search"></i> Cari Pustaka</a>
								</div>
							</div>
						</form>
						<!-- <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p> -->
						<!-- <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="assets/login/js/jquery.min.js"></script>
	<script src="assets/login/js/popper.js"></script>
	<script src="assets/login/js/bootstrap.min.js"></script>
	<script src="assets/login/js/main.js"></script>

</body>

</html>