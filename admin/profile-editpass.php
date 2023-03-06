<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include '../koneksi.php';
session_start();

$id = $_POST['id'];
$newpassword = $_POST['newpassword'];
$passwordrepeat = $_POST['passwordrepeat'];

// cek dulu ke database dengan query select
$query = $koneksi->query("SELECT * FROM tb_pengguna WHERE id = '$id' ");

if ($newpassword == $passwordrepeat) {
// jika password baru dan password reepat sama maka lanjut proses

// ubah password baru ke hassing
$password_sha1 = md5(sha1(md5($newpassword)));
$update = $koneksi->query("UPDATE tb_pengguna SET password='$password_sha1' WHERE id = '$id' ");
$_SESSION['pesan'] = 'Password Berhasil DiUbah';
$_SESSION['status'] = 'success';
echo "<script> document.location.href='./setting-profile';</script>";
die();
}else{
  $_SESSION['pesana'] = "
  <div class='alert alert-danger alert-dismissible'>
  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
  <h5><i class=\"icon fas fa-ban\"></i> Alert!</h5>
  New Password dan Repeat Password tidak sama, mohon pastikan password yang di input benar. 
</div>";
echo "<script> document.location.href='./setting-profile';</script>";
die();
}
?>