<?php 
$halaman = 'Tambah Anggota';
include "global_header.php"; ?>

<!-- Main content -->
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

<div class="content">
    <div class="container-fluid col-9">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Tambah Anggota</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input required="" type="number" name="nis" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input required="" type="text" name="nama" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input required="" type="text" name="tempat_lahir" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input required="" type="date" name="tanggal_lahir" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Tambah Foto</label>
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile"
                                                accept="image/jpeg">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select required="" class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input required="" type="text" name="kelas" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required="" type="text" name="username" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input required="" type="text" name="password" class="form-control" />
                                    </div>
                                 
                                </div>
                                &nbsp; &nbsp;<input class="btn btn-primary btn-sm" name="tambah" type="submit"
                                    value="Tambah">
                                &nbsp;
                                <input class="btn btn-danger btn-sm" id="reset" type="reset" value="Batal"
                                    onclick="self.history.back()">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
            <?php
            if (isset($_POST['tambah'])){
            $nis= $_POST['nis'];
			$nama= $_POST['nama'];
			$tempat_lahir= $_POST['tempat_lahir'];
			$tanggal_lahir= $_POST['tanggal_lahir'];
			$jenis_kelamin= $_POST['jenis_kelamin'];
			$kelas= $_POST['kelas'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $password_sha1 = md5(sha1(md5($password)));

            $img = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];

            $tgl=date('d-m-Y');

            $gambar_baru = date('dYHiS').$img;
            $path = "./img/user/".$gambar_baru;

            $sql = "SELECT nis FROM tb_pengguna WHERE nis=$nis";
            $ceknis = mysqli_query($koneksi, $sql);

            if(mysqli_num_rows($ceknis) > 0 ){
                $_SESSION['pesan'] = 'Nis anggota sudah terdaftar, silahkan daftar anggota yang lain';
                $_SESSION['status'] = 'warning';
                echo "<script> document.location.href='./anggota-tambah';</script>";
                // echo '<script>alert("Nis anggota sudah terdaftar, silahkan daftar anggota yang lain");</script>';    
            }else{
                if (empty($img)){
                    $query = "INSERT INTO tb_anggota (nis, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kelas) values('$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$kelas')";
    
                    $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('$nis','$username','$nama','$password_sha1','Siswa','')";
    
                    $proses = $koneksi->query($query);
                    $koneksi->query($query1);
    
                    if ($proses){
                        $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
                        $_SESSION['status'] = 'success';
                        echo "<script> document.location.href='./anggota';</script>";
                    }
                }else{
                    if(move_uploaded_file($tmp, $path)){
                        
                    $query = "INSERT INTO tb_anggota (nis, nama, tempat_lahir, tanggal_lahir, jenis_kelamin, kelas) values('$nis','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$kelas')";
    
                    $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('$nis','$username','$nama','$password_sha1','Siswa','$gambar_baru')";
    
                    $proses = $koneksi->query($query);
                    $koneksi->query($query1);
    
                    if ($proses){
                        $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
                        $_SESSION['status'] = 'success';
                        echo "<script> document.location.href='./anggota';</script>";
                        die();
                    }
    
                    }
                }
            }            
                
            }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>