<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y'); ?> <a href="">SIMPERPUS - Sistem Informasi Perpustakaan     <?php
    $quer = $koneksi->query("SELECT * FROM tb_website");
    foreach ($quer as $data) : 
    ?>
    <b><?= $data['school_name']?></b>
    
            <?php
                endforeach; 
                mysqli_free_result($quer);
                ?></a>.</strong> All rights
  reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b></b>
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../assets/plugins/jszip/jszip.min.js"></script>
<script src="../assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sweetalert/sweetalert2.all.min.js"></script>
<script src="../assets/js/myscript.js"></script>
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="../assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- <script src="../assets/plugins/chart.js/Chart.min.js"></script> -->
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<!-- <script src="../assets/dist/js/pages/dashboard3.js"></script> -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<script>
        // Function ini dijalankan ketika Halaman ini dibuka pada browser
        $(function () {
            setInterval(timestamp, 1000); //fungsi yang dijalan setiap detik, 1000 = 1 detik
        });

        //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
        function timestamp() {
            $.ajax({
                url: 'ajax_timestamp.php',
                success: function (data) {
                    $('#timestamp').html(data);
                },
            });
        }
    </script>
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example3').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    }) 
  })
</script>
<script>
  $(function () {


    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    // //Date range picker
    // $('#reservation').daterangepicker()
    //Date range picker with time picker
    // $('#reservationtime').daterangepicker({
    //   timePicker: true,
    //   timePickerIncrement: 30,
    //   locale: {
    //     format: 'DD/MM/YYYY hh:mm A'
    //   }
    // })

  })
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<script>
  window.setTimeout(function () {
    $(".hilang").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 5000);
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#largeModal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
        type: 'post',
        url: 'buku-detail.php',
        data: 'rowid=' + rowid,
        success: function (data) {
          $('.fetched-data').html(data); //menampilkan data ke dalam modal
        }
      });
    });
  });
</script>
<script>
  $(function() {
    $('[data-toggle="tooltip"]').tooltip();
  });
</script>

</body>

</html>