<?php
$halaman = 'Laporan Data Pengunjung';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid col-8">
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
                        <h3 class="card-title">Cetak Report Data Pengunjung</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tampung1">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No HandPhone</th>
                                        <th>Kelas</th>
                                        <th>Tanggal berkunjung</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $query=$koneksi->query( "SELECT * FROM tb_pengunjung");  $nomor_urut = 1;
                                    foreach ($query as $data) :
                                                ?>
                                    <tr>
                                        <td><?= $nomor_urut; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['nohp']; ?></td>
                                        <td><?php echo $data['kelas']; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td>
                                        <a href="laporan-user-hapus?id=<?= $data['id']; ?>"
                                            class="btn btn-danger btn-xs tombol-hapus" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Hapus"><i
                                                class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $nomor_urut++; endforeach; ?>
                                </tbody>
                            </table>
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