<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus = "DELETE FROM tb_transaksi WHERE id = '$id'";

$proses = $koneksi->query($hapus);
if ($proses) {
    $_SESSION['pesan'] = 'Data Berhasil Di Hapus';
    $_SESSION['status'] = 'success';
}
echo "<script> document.location.href='./transaksi-belumdiambil';</script>";
die();
