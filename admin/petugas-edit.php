<?php 
$halaman = 'Tambah Petugas';
include "global_header.php"; ?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid col-9">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">Edit Petugas</div>
                    <div class="card-body">
                        <?php
                        // echo "SELECT * FROM tb_anggota 
                        // JOIN tb_pengguna ON tb_anggota.nis = tb_pengguna.nis WHERE tb_anggota.nis = '$_GET[id]'";

                    $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE id = '$_GET[id]'");

                    if(is_array($query) || is_object($query)){
                    foreach ($query as $data) {
                    ?>
                        <form action="petugas-editproses.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" value="<?= $_GET[id] ?>" name="id" hidden>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input required="" type="text" name="username"
                                            value="<?php echo $data['username'];?>" class="form-control" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Petugas</label>
                                        <input required="" type="text" name="nama" class="form-control"
                                            value="<?php echo $data['nama'];?>" />
                                    </div>

                                    <!-- <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" />
                                    </div> -->

                                    <input class="btn btn-primary btn-sm" name="tambah" type="submit" value="Update">
                                    <input class="btn btn-danger btn-sm" id="reset" type="reset" value="Batal"
                                        onclick="self.history.back()">
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
                                                alt="User profile picture" style="width: 440px;">
                                            <?php }?>
                                            <div class="form-group text-left">
                                                <label for="detailSiswaTelepon">Ganti Foto</label>
                                                <div class="custom-file">
                                                    <input type="file" name="foto" class="custom-file-input"
                                                        id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
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