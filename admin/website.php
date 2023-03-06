<?php
$halaman = 'Data Website';
include "global_header.php"; 
$level = $_SESSION['level'];
$nama = $_SESSION['nama'];

$query = $koneksi->query("SELECT * FROM tb_website");
?>

<?php
  //menampilkan pesan jika ada pesan
  if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
  $pesan = $_SESSION['pesan']; ?>
  
  <div id="flash-data" 
  data-flashdata="<?= $_SESSION['notif'];?>" 
  data-type="<?= $_SESSION['status']; ?>" 
  data-message="<?= $_SESSION['pesan']; ?>">
  </div>
  <?php }//mengatur session pesan menjadi kosong
  $_SESSION['pesan'] = '';
  unset($_SESSION['pesan']);
  unset($_SESSION['status']);
  ?>


<!-- Main content -->
<div class="content">
  <div class="container-fluid col-sm-9">
    <div class="card card-outline card-warning" style="border-top: 3px solid #9f6d42;">
      <div class="card-header">
        <h4 class="card-title text-bold"><?= $halaman ?></h4>
      </div>
      <div class="card-body">

        <form action="website-proses.php" method="post" enctype="multipart/form-data">
          <?php
          $nomor_urut = 1;
          foreach ($query as $data) : ?>

          <input type="text" name="id" value="<?= $data['id'] ?>" hidden>
          <!-- Fullname -->
          <div class="form-group">
            <label for="editPenggunaFullname" class="col-form-label">Nama Sekolah</label>
            <input type="text" name="school_name" class="form-control" id="editPenggunaFullname"
              placeholder="Nama Sekolah" value="<?= $data['school_name']?>" />
          </div>
          <!-- / Fullname -->

          <!-- Fullname -->
          <!-- <div class="form-group">
            <label for="editPenggunaEmail" class="col-form-label">Point</label>
            <input type="text" name="point" class="form-control" id="editPenggunaEmail" placeholder="Point"
              value="<?= $data['point']; ?>" />
            <p class="text-danger">*Catatan : Batas point, jika point siswa melebihi batas yang ditentukan, tombol
              print surat akan keluar</p>
          </div> -->
          <!-- / Fullname -->

          <!-- form-group -->
          <div class="form-group">
            <label for="logo">Logo</label> <br>
            <?php
                $foto = $data['logo'];
                if ($foto === ''){?>
            <img class="img-fluid" src="../img/no-image.png" alt="Photo" style="height: 200px;">
            <?php }else{ ?>
            <img class="img-fluid" src="../img/<?= $data['logo'] ?>" alt="Photo" style="height: 200px;">
            <?php }?>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label for="foto">Ganti Foto</label>
            <div class="custom-file">
              <input type="file" name="foto" class="custom-file-input" id="customFile" accept="image/png, image/gif, image/jpeg" />
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>

          <div class="form-group text-right">
            <button type="submit" class="btn btn-dark btn-sm"><i class="fa fa-edit"></i>&ensp;Update</button>
          </div>
          <?php
          endforeach; 
          mysqli_free_result($query);?>
        </form>

      </div>
      <!-- /.card-body -->


    </div>
  </div>
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>