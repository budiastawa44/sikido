<?php 
    include("../../connect.php");
    session_start();
    if(isset($_SESSION['login_admin'])){
        $admin_check = $_SESSION['login_admin'];
        $admin_pass = $_SESSION['login_pass'];
        $id_admin = $_SESSION['uid'];
        $ses_sql = mysqli_query($conn,"SELECT * FROM tb_admin WHERE nama = '$admin_check' and sandi = '$admin_pass'");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        $login_session = $row['nama'];
        $login_id = $row['id_admin'];
    }else{
      header("location: ../");
    }
    include("../header.php");
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
              <h3 class="box-title">Semua Data Dosen Program Studi Kimia</h3>
            </div>
            <a href="a_dosen.php"><button class="btn btn-success" style="margin-left: 10px">Tambah Data</button></a>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Golongan</th>
                  <th>Alamat</th>
                  <th>Kontak</th>
                  <th>Aksi</th>
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
                    $a = $a + 1;
                    echo "<tr border='1'>";
                    echo "<td>" . $a. "</td><td>" . $row['nik']. "</td><td>" . $row['nidn']. "</td><td>" . $row['nama']. "</td><td>" . $row['golongan']. "</td><td>" . $row['alamat']. "</td><td>" . $row['kontak']. "</td>";
                    echo "<td><a href='detail-dosen/?data_id=".$row['id_dosen']."' style='color: orange' class='glyphicon glyphicon-edit' id='custId' data-toggle='modal'></a>&nbsp&nbsp&nbsp&nbsp";
                    echo "<a href='d_dosen.php?data_id=".$row['id_dosen']."' style='color: red' class='glyphicon glyphicon-trash' id='custId' data-toggle='modal'></a></td>";
                    echo "</tr>";
                  }     
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
  
<?php include("../footer.php"); ?>