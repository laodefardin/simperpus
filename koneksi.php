<?php
 $dbhost = 'localhost';  //host untuk database, biasanya localhost
 $dbuser = 'root';  //username untuk mengakses database, jika dilokal biasanya 'root'
 $dbpass = '';  //password untuk mengakses databae, jika dilokal biasanya kosong
 $dbname = 'siperpus';  //nama database yang akan digunakan


 $koneksi = new mysqli($dbhost,$dbuser,$dbpass,$dbname) ;  //koneksi Database

 //Check koneksi, berhasil atau tidak
if( $koneksi->connect_errno ){
echo "Oops!! Koneksi Gagal!".$koneksi->connect_error;
}

// function query($query)
// {
//     global $koneksi;
//     $result = mysqli_query($koneksi, $query);
//     $row = [];
//     while ($row = mysqli_fetch_assoc($result)){
//         $rows[] = $row;
//     }
//     return $rows;
// }
// ?>