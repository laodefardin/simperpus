<?php
$halaman = 'Profile';
include "global_header.php"; 
?>
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

<?php
$query = $koneksi->query("SELECT * FROM tb_pengguna
WHERE id = '$id_users'");
foreach ($query as $data):
?>

<!-- Main content -->
<section class="content">
  <div class="container-fluid">


    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-warning card-outline" style="border-top: 3px solid #9f6d42;">
          <div class="card-body box-profile">
            <div class="text-center">
              <?php
          $foto = $data['foto'];
          if ($foto===''){?>
              <img class="profile-user-img img-fluid img-circle" src="../img/anonim.png" alt="User profile picture">
              <?php } else { ?>
              <img class="profile-user-img img-fluid img-circle" src="../img/user/<?= $data['foto']; ?>"
                alt="User profile picture">
              <?php }?>
            </div>
            <h3 class="profile-username text-center"><?= $data['nama']?></h3>

            <p class="text-muted text-center"><?= $data['level']?></p>

          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#detailProfile" data-toggle="tab">Detail Profile</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="#EditProfile" data-toggle="tab">Update Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Change Password</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="detailProfile">
                <form>
                  <div class="form-group row">
                    <label for="profileUsername" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="profileUsername"
                        value="<?php echo $data['username']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="profileUserFullname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="profileUserFullname"
                        value="<?php echo $data['nama']; ?>">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="profileUserEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control" id="profileUserEmail"
                        value="<?php echo $data['email']; ?>">
                    </div>
                  </div> -->
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="EditProfile">
                <form class="form-horizontal" action="profile-edit.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" readonly value="<?php echo $data['id'];?>" class="form-control">
                  <div class="form-group row">
                    <label for="inputProfileUsrename" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputProfileUsrename"
                        value="<?php echo $data['username']?>" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputProfileFullname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="full_name" class="form-control" id="inputProfileFullname"
                        value="<?php echo $data['nama']?>">
                    </div>
                  </div>
                  <!-- <div class="form-group row">
                    <label for="inputProfilEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="text" name="email" class="form-control" id="inputProfilEmail" placeholder="Email"
                        value="<?php echo $data['email']; ?>">
                    </div>
                  </div> -->
                  <div class="form-group row">
                    <div class="col-sm-2">
                      <label for="inputProfilAddress" class="col-form-label">Picture</label>
                    </div>
                    <div class="col-sm-10">
                      <div class="row">
                        <div class="col-sm-3">
                          <?php
                          $foto = $data['foto'];
                          if ($foto===''){?>
                          <img class="img-thumbnail" src="../img/anonim.png" alt="User profile picture">
                          <?php } else { ?>
                          <img class="img-thumbnail" src="../img/user/<?= $data['foto']; ?>" alt="User profile picture">
                          <?php }?>
                        </div>
                        <div class="col-sm-9">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-warning btn-sm float-left"><i
                          class="fas fa-edit"></i>&ensp;Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="profile-editpass.php" method="post">
                  <input type="hidden" name="id" readonly value="<?= $data['id'];?>" class="form-control">
                  <div class="form-group row">
                    <label for="inputNewPass" class="col-sm-3 col-form-label">New Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="newpassword" class="form-control" id="inputNewPass"
                        placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputRepeatPass" class="col-sm-3 col-form-label">Repeat Password</label>
                    <div class="col-sm-6">
                      <input type="password" name="passwordrepeat" class="form-control" id="inputRepeatPass"
                        placeholder="Repeat Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-3 col-sm-10">
                      <button type="submit" class="btn btn-danger btn-sm">Change</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


<?php
      endforeach;
      // $koneksi->close();
      ?>
</div>
<!-- /.content-wrapper -->
<?php include "global_footer.php"; ?>