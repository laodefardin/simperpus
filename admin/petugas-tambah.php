<?php 
$halaman = 'Tambah Petugas';
include "global_header.php"; ?>

<div class="content">
  <div class="container-fluid col-7">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Tambah Petugas</div>
          <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Petugas</label>
                    <input required="" type="text" name="nama" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label for="foto">Tambah Foto</label>
                    <div class="custom-file">
                      <input type="file" name="foto" class="custom-file-input" id="customFile" accept="image/jpeg">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Username</label>
                    <input required="" type="text" name="username" class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input required="" type="text" name="password" class="form-control" />
                  </div>

                </div>
                &nbsp; &nbsp;<input class="btn btn-primary btn-sm" name="tambah" type="submit" value="Tambah">
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
			      $nama= $_POST['nama'];
            $username= $_POST['username'];
            $password= $_POST['password'];
            $password_sha1 = md5(sha1(md5($password)));

            $img = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];

            $tgl=date('d-m-Y');

            $gambar_baru = date('dYHiS').$img;
            $path = "./img/user/".$gambar_baru;

            if (empty($img)){
              $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('','$username','$nama','$password_sha1','Petugas','')";

              $proses = $koneksi->query($query1);
              if ($proses){
                  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
                  $_SESSION['status'] = 'success';
                  echo "<script> document.location.href='./petugas';</script>";
                  die();
              }
          }else{
              if(move_uploaded_file($tmp, $path)){
              $query1 = "INSERT INTO tb_pengguna (nis, username, nama, password, level, foto) values ('','$username','$nama','$password_sha1','Petugas','$gambar_baru')";

              $proses = $koneksi->query($query1);
              if ($proses){
                  $_SESSION['pesan'] = 'Data Berhasil Di Tambah';
                  $_SESSION['status'] = 'success';
                  echo "<script> document.location.href='./petugas';</script>";
                  die();
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