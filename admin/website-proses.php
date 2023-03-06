<?php
include '../koneksi.php';
session_start();
    // siswa
    $id = $_POST['id'];
    $school_name = $_POST['school_name'];

    $img = $_FILES['foto']['name'];
    $gambar_baru = date('dYHiS').$img;

    if(empty($img)){
        $update = "UPDATE tb_website SET school_name='$school_name' WHERE id = '".$id."' ";
        $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./website';</script>";
        die();  

    }else{
        $query = $koneksi->query("SELECT * FROM tb_website WHERE id = '$id' ");
        $data = mysqli_fetch_array($query);
        $lokasi = $data['logo'];
        $hapus_gbr = "../img/".$lokasi;
        unlink($hapus_gbr);

        move_uploaded_file($_FILES['foto']['tmp_name'], '../img/'.$gambar_baru);

        $update = "UPDATE tb_website SET school_name='$school_name', logo='$gambar_baru' WHERE id = '".$id."' ";

        $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));

        $_SESSION['pesan'] = 'Data Berhasil Di Edit';
        $_SESSION['status'] = 'success';
        echo "<script> document.location.href='./website';</script>";
        die();
        
    }
    ?>    