<?php
include '../koneksi.php';
// mysqli_report (MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
session_start(); 
    $id = $_POST['id'];
    $full_name = $_POST['nama'];

    $img = $_FILES['foto']['name'];
    $gambar_baru = date('dYHiS').$img;

    if(empty($img)){
        $update = "UPDATE tb_pengguna SET nama ='$full_name' WHERE id = '".$id."' ";

        $sql = mysqli_query($koneksi, $update);

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./petugas';</script>";
        die();  

    }else{
        $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE id = '$id' ");
        $data = mysqli_fetch_array($query);
        $lokasi = $data['foto'];
        $hapus_gbr = "./img/user/".$lokasi;
        unlink($hapus_gbr);

        move_uploaded_file($_FILES['foto']['tmp_name'], '../img/user/'.$gambar_baru);

        $update = "UPDATE tb_pengguna SET nama ='$full_name', foto='$gambar_baru' WHERE id = '".$id."' ";

        $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./petugas';</script>";
        die();
        
    }

    ?>