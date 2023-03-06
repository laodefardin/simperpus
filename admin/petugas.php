<?php
$halaman = 'Tambah Petugas';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");

?>
<!-- Main content -->
<div class="content">
<div class="container-fluid col-sm-9">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Data Petugas Perpustakaan</h3>
                        <a style="text-align: right;" class="btn bg-warning btn-sm offset-md-7" href="petugas-tambah"> <i
                                class="fa fa-plus"></i> Tambah Petugas</a>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $koneksi->query("SELECT * FROM tb_pengguna WHERE level = 'Petugas' ");
                        $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                <tr>
                                    <td><?= $nomor_urut; ?></td>
							<td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['username']; ?></td>
                            <td><?php echo $data['level']; ?></td>
                                    <td>
                                        <a href="petugas-edit?id=<?= $data['id'];?>"
                                            class="btn bg-lightblue btn-xs"><i class="fa fa-edit"></i></a>
                                        <a href="petugas-ubahpassword?id=<?= $data['id'];?>"
                                            class="btn bg-lightblue btn-xs">Set Password</a>
                                        <a href="petugas-hapus?id=<?= $data['id']; ?>"
                                            class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Hapus"><i
                                                class="fa fa-trash"></i></a>

                                    </td>
                                </tr>
                                <?php $nomor_urut++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Foto Anggota</h4>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="fetched-data"></div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                    <!-- <button class="btn btn-primary" type="button">Save changes</button> -->
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!-- /.card -->


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