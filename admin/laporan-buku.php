<?php
$halaman = 'Laporan Data Buku';
include "global_header.php"; 
// $query = query("SELECT * FROM barang");

?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
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
                <!-- <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cetak Rekap Data Berdasarkan Tahun dan Bulan</h3>
                    </div>
                    <div class="card-body"> -->
                        <!-- <form action="page/laporan/export_laporan_buku_excel.php" method="post">
                            <div class="row form-group">

                                <div class="col-md-5">
                                    <select name="bln" id='bln' class="form-control">
                                        <option selected="selected">Pilih Bulan</option>
                                        <option value="all">Semua Bulan</option>
                                        <?php
                                        $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        $jlh_bln=count($bulan);
                                        for($c=0; $c<$jlh_bln; $c+=1){
                                        echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <?php
                                    $now=date('Y');
                                    echo "<select name='thn' id='thn' class='form-control'>";
                                    echo "<option selected='selected'>Pilih Tahun</option>";
                                    for ($a=2018;$a<=$now;$a++)
                                    {
                                        echo "<option value='$a'>$a</option>";
                                    }
                                        echo "</select>";
                                ?>
                                </div>
                                <input class="btn btn-success btn-sm" name="submit_excel" target="_blank" type="submit"
                                    value="Export to Excel">
                            </div>
                        </form>


                        <form id="Myform1">
                            <div class="row form-group">

                                <div class="col-md-5">
                                    <select name="bln" id='bln' class="form-control">
                                        <option selected="selected">Pilih Bulan</option>
                                        <option value="all">Semua Bulan</option>
                                        <?php
                                        $bulan=array("","","Maret","","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                        $jlh_bln=count($bulan);
                                        for($c=0; $c<$jlh_bln; $c+=1){
                                        echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                <?php
                                    $now=date('Y');
                                    echo "<select name='thn' id='thn' class='form-control'>";
                                    echo "<option selected='selected'>Pilih Tahun</option>";
                                    for ($a=2018;$a<=$now;$a++)
                                    {
                                        echo "<option value='$a'>$a</option>";
                                    }
                                        echo "</select>";
                                ?>
                                </div>
                                <input class="btn btn-primary btn-sm" name="submit2" type="submit" value="Tampilkan">
                                 <a style="text-align: right;" class="btn btn-danger btn-sm"
                                    href="laporan-buku">Refresh</a>
                            </div>
                        </form> -->

                        <!-- <form action="" id="Myform1" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Bulan</label>
                                <div class="col">
                                    <select name="bln" id='bln' class="form-control">
                                        <option selected="selected">Pilih Bulan</option>
                                        <option value="all">ALL</option>
                                        <option value="1">Januari</option>
                                        <option value="2">February</option>
                                        <option value="3">Maret</option>
                                        <option value="4">April</option>
                                        <option value="5">Mei</option>
                                        <option value="6">Juni</option>
                                        <option value="7">Juli</option>
                                        <option value="8">Agustus</option>
                                        <option value="9">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label class="form-label col-3 col-form-label">Tahun</label>
                                <div class="col">
                                    <?php
                                    $now=date('Y');
                                    echo "<select name='thn' id='thn' class='form-control'>";
                                    echo "<option selected='selected'>Pilih Tahun</option>";
                                    for ($a=2018;$a<=$now;$a++)
                                    {
                                        echo "<option value='$a'>$a</option>";
                                    }
                                        echo "</select>";
                                ?>
                                </div>
                            </div>
                            <div class="form-footer">
                                <input class="btn btn-success btn-sm" name="submit_excel" target="_blank" type="submit"
                                    value="Excel">
                                <a style="text-align: right;" class="btn btn-danger btn-sm"
                                    href="laporan-buku">Refresh</a>
                            </div>

                        </form> -->
                    <!-- </div>
                </div> -->


                <div class="card card-lightblue">
                    <div class="card-header">
                        <h3 class="card-title">Cetak Report Data Buku</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tampung1">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>ISBN</th>
                                        <th>Jumlah Buku</th>
                                        <th>Lokasi Buku</th>
                                        <th>Tanggal Input</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $query=$koneksi->query( "SELECT * FROM tb_buku");  $nomor_urut = 1;
                        foreach ($query as $data) :
                                                ?>
                                    <tr>
                                        <td><?= $nomor_urut; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['pengarang']; ?></td>
                                        <td><?php echo $data['penerbit']; ?></td>
                                        <td><?php echo $data['tahun_terbit']; ?></td>
                                        <td><?php echo $data['isbn']; ?></td>
                                        <td><?php echo $data['jumlah_buku']; ?></td>
                                        <td><?php echo $data['lokasi']; ?></td>
                                        <td><?php echo $data['tanggal_input']; ?></td>
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
<?php
if (isset($_POST['submit_excel'])){
session_start();
$_SESSION["bln"] = $_POST['bln'];
$_SESSION["thn"] = $_POST['thn'];
echo "<script>window.open('cetak/laporanbuku.php', '_blank');</script>";
}
?>

<?php include "global_footer.php"; ?>