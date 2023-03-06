<?php 
$halaman = 'Edit Anggota';
include "global_header.php"; ?>

<!-- Main content -->

<div class="content">
  <div class="container-fluid col-sm-8">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">Edit Anggota</div>
          <div class="card-body">
            <?php
                    $query = $koneksi->query("SELECT * FROM tb_pengguna  WHERE nis = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
            <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <div class="col sm 5">
                      <?php
                        $foto = $data['foto'];
                        if ($foto===''){?>
                      <img class="img-thumbnail" src="./img/user/anonim.png" alt="User profile picture"
                        style="height: 380px;">
                      <?php } else { ?>
                      <img class="img-thumbnail" src="./img/user/<?= $data['foto']; ?>" alt="User profile picture"
                        style="height: 380px;">
                      <?php }?>
                    </div>

                  </div>
                </div>
                <div class="col-sm-6">
                  <label>Upload Foto baru</label>
                  <div class="form-group">
                    <div class="custom-file">
                      <input type="file" name="foto" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                  </div>
                </div>

              </div>
              <div class="form-group text-right">
                <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                <input class="btn btn-danger" id="reset" type="reset" value="Batal" onclick="self.history.back()">
              </div>
            </form>
            <?php }} ?>
          </div>
        </div>
      </div>
      <!-- /.col-md-6 -->


    <?php
    if(isset($_POST['tambah'])){
      $id = $_GET['id'];
      $img = $_FILES['foto']['name'];
      $tmp = $_FILES['foto']['tmp_name'];

      $tgl=date('d-m-Y');

      $gambar_baru = date('dYHiS').$img;
      $path = "./img/user/".$gambar_baru;

      $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE nis = '$id' ");
      $data = mysqli_fetch_array($query);
      $lokasi = $data['foto'];
      $hapus_gbr = "./img/user/".$lokasi;
      unlink($hapus_gbr);

      move_uploaded_file($_FILES['foto']['tmp_name'], './img/user/'.$gambar_baru);

      $update = "UPDATE tb_pengguna SET foto='$gambar_baru' WHERE nis = '$id' ";

      $sql = mysqli_query($koneksi, $update) or die(mysqli_error($koneksi));
      $_SESSION['pesan'] = 'Foto berhasil diubah';
      $_SESSION['status'] = 'success';
      echo "<script> document.location.href='./anggota-edit?id=$id';</script>";
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