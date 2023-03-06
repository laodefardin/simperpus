<?php 
$halaman = 'Edit Anggota';
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
                    <div class="card-header">Edit Anggota</div>
                    <div class="card-body">
                        <?php
                        // echo "SELECT * FROM tb_anggota 
                        // JOIN tb_pengguna ON tb_anggota.nis = tb_pengguna.nis WHERE tb_anggota.nis = '$_GET[id]'";

                    $query = $koneksi->query("SELECT * FROM tb_anggota 
                    JOIN tb_pengguna ON tb_anggota.nis = tb_pengguna.nis WHERE tb_anggota.nis = '$_GET[id]'");
                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="anggota-prosesedit.php?id=<?= $_GET['id'];?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS</label>
                                        <input required="" type="number" name="nis" class="form-control"
                                            value="<?php echo $data['nis'];?>" readonly />
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Anggota</label>
                                        <input required="" type="text" name="nama" class="form-control"
                                            value="<?php echo $data['nama'];?>" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir"
                                            value="<?php echo $data['tempat_lahir'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir"
                                            value="<?php echo $data['tanggal_lahir'];?>" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="Laki-laki"
                                                <?php if ($data['jenis_kelamin']=='Laki-laki') {echo "selected"; } ?>>
                                                Laki-laki</option>
                                            <option value="Perempuan"
                                                <?php if ($data['jenis_kelamin']=='Perempuan') {echo "selected"; } ?>>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input type="text" name="kelas" value="<?php echo $data['kelas'];?>"
                                            class="form-control" />
                                    </div>

                                    <input class="btn btn-primary" name="tambah" type="submit" value="Update">
                                    <a href="anggota" class="btn btn-danger">Kembali</a>
                                    <!-- <input class="btn btn-danger" id="reset" type="reset" value="Batal"> -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="detailSiswaTelepon">Foto</label>
                                        <div class="col-sm-5">
                                            <?php
                                            $foto = $data['foto'];
                                            if ($foto===''){?>
                                            <img class="img-thumbnail" src="./img/user/anonim.png"
                                                alt="User profile picture">
                                            <?php } else { ?>
                                            <img class="img-thumbnail" src="./img/user/<?= $data['foto']; ?>"
                                                alt="User profile picture" style="height: 440px;">
                                            <?php }?>
                                            <div class="form-group text-left">
                                            <a href="anggota-ubahfoto?id=<?= $_GET['id']; ?>" class="btn btn-primary btn-xs"
                                                    role="button">Ganti Foto</a>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- <label>Upload Foto baru</label>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div> -->
                                </div>


                            </div>
                        </form>
                        <?php }} ?>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>