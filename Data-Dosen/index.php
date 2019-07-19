<?php 
  include("../connect.php");
  session_start();
  if(isset($_SESSION['login_mhs'])){
        $mhs_check = $_SESSION['login_mhs'];
        $mhs_pass = $_SESSION['login_pass'];
        $id_mhs = $_SESSION['uid'];
        $ses_sql = mysqli_query($conn,"SELECT * FROM tb_mhs WHERE id_mhs='$id_mhs'");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        $nim = $row['nim'];
        $nama = $row['namalengkap'];
        $login_id = $row['id_mhs'];
    }else{
      header("location: ../");
    }

  include("header.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Dosen
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div style="display: flex;">
                <div style="width: 80%">
                  <h3 class="box-title">Semua Data Dosen Program Studi Kimia</h3>
                </div>
                <div style="width: 20%">
                  <b>Penting : </b><i> Ketik kata kunci (nama, kompetensi, NIP) untuk mempercepat pencarian data </i>
                  
                </div>
                
              </div>
            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th rowspan="2">No</th>
                  <th rowspan="2">NIP</th>
                  <th rowspan="2">NIDN</th>
                  <th rowspan="2">Nama Dosen</th>
                  <th rowspan="2">Kontak</th>
                  <th colspan="2">Mhs Dibimbing</th>
                  <th colspan="2">Mhs Diuji</th>
                  <th rowspan="2">Detail</th>
                </tr>

                <tr>
                  <th>Kuota</th>
                  <th>Terdaftar</th>
                  <th>Kuota</th>
                  <th>Terdaftar</th>
    
                </tr>

                </thead>
                <tbody>
                <?php
                $querydata = "SELECT * FROM tb_dosen, tb_golongan WHERE tb_dosen.id_golongan = tb_golongan.id_golongan";
                $resa = $conn->query($querydata);
                $total = mysqli_num_rows($resa);
                if ($total > 0) {
                // output data of each row
                  $a = 0;
                  while($row = $resa->fetch_assoc()) {

                    $id_dosen = $row['id_dosen'];
                    $query = mysqli_query($conn, "SELECT * FROM tb_bimbing WHERE id_dosen='$id_dosen'");
                    $totbim = mysqli_num_rows($query);

                    $queryuji = mysqli_query($conn, "SELECT * FROM tb_uji WHERE id_dosen='$id_dosen'");
                    $totuji = mysqli_num_rows($queryuji);

                    $kuobim = $row['max_bimbing'] - $totbim;
                    $kuouji = $row['max_uji'] - $totuji;

                    $a = $a + 1;
                    echo "<tr border='1'>";
                    echo "<td>" . $a. "</td><td>" . $row['nik']. "</td><td>" . $row['nidn']. "</td><td>" . $row['nama']. "</td><td>" . $row['kontak']. "</td><td>" . $row['max_bimbing']. "</td><td>" . $totbim . "</td><td>" . $row['max_uji']. "</td><td>" . $totuji . "</td>";
                    echo "<td><a href='detail-dosen/?data_id=".$row['id_dosen']."' style='color: orange' class='glyphicon glyphicon-eye-open' id='custId' data-toggle='modal'></a>";
                    ?>

                    <?php

                      $queris = mysqli_query($conn, "SELECT tb_riset.riset FROM tb_riset_dosen, tb_riset WHERE tb_riset_dosen.id_riset=tb_riset.id_riset AND tb_riset_dosen.id_dosen='$id_dosen'");

                      while($rowris = $queris->fetch_assoc()) {

                    ?>
                      <div class="hidden"> <?php echo $rowris['riset']; ?> </div>

                    <?php } ?>

                    </td>

                    <?php
                    echo "</tr>";
                  }     
                }else {
                  echo "<b>Data Kunjungan Keluar Belum Ditambahkan</b>";
                }
                $conn->close();
              ?>
                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
