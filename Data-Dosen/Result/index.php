<?php 
  include("../../connect.php");
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
        $key = $_POST['key'];
    }else{
      header("location: ../../");
    }

  include '../header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hasil Pencarian
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dosen Dengan Kompetensi "<?php echo $key ?>"</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>NIDN</th>
                  <th>Nama Dosen</th>
                  <th>Alamat</th>
                  <th>Kontak</th>
                  <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $querydata = "SELECT * FROM tb_dosen, tb_riset_dosen, tb_riset WHERE tb_dosen.id_dosen=tb_riset_dosen.id_dosen AND tb_riset_dosen.id_riset=tb_riset.id_riset AND riset LIKE '%$key%'";
                $resa = $conn->query($querydata);
                $total = mysqli_num_rows($resa);
                if ($total > 0) {
                // output data of each row
                  $a = 0;
                  while($row = $resa->fetch_assoc()) {
                    $a = $a + 1;
                    echo "<tr border='1'>";
                    echo "<td>" . $a. "</td><td>" . $row['nik']. "</td><td>" . $row['nidn']. "</td><td>" . $row['nama']. "</td><td>" . $row['alamat']. "</td><td>" . $row['kontak']. "</td>";
                    echo "<td><a href='../detail-dosen/?data_id=".$row['id_dosen']."' style='color: orange' class='glyphicon glyphicon-eye-open' id='custId' data-toggle='modal'></a>&nbsp&nbsp&nbsp&nbsp";
                    echo "</tr>";
                  }     
                }else {
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

<?php include '../footer.php'; ?>