<?php
include '../koneksi.php';
session_start();
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

$id = $_GET['id'];

$hapus_user = "DELETE FROM tb_pengguna WHERE id = '$id'";

$proses = $koneksi->query($hapus_user);
if ($proses) {
    $_SESSION['pesan'] = 'Data Berhasil Di hapus';
    $_SESSION['status'] = 'success';
}
echo "<script> document.location.href='./petugas';</script>";
die();
