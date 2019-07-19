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
        Data Kompetensi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Kompetensi</h3>
            </div>
            <div class="box-body">
              <div style="margin-left: 10%; width: 75%">
                <form method="POST" action="s_kompetensi.php">

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Kompetensi Baru&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="komp" class="form-control" name="komp" placeholder="Nama kompetensi baru" required autocomplete="off">                
                    </div>
                  </div>
                  <div id="pilihan" style="display: flex;">
                    <div id="tombol" style="flex: 2;">
                      <button type="submit" style="width: 150px;" class="btn btn-info" id="tombol">Tambahkan</button>
                    </div>
                    <div style="flex: 2; margin-left: 50%">Pastikan semua data kompetensi baru sudah benar</div>
                  </div>

                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Semua Data Kompetensi</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kompetensi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $querydata = "SELECT * FROM tb_riset";
                  $resa = $conn->query($querydata);
                  $total = mysqli_num_rows($resa);
                  if ($total > 0) {
                  // output data of each row
                    $a = 0;
                    while($row = $resa->fetch_assoc()) {
                      $a = $a + 1;
                      echo "<tr border='1'>";
                      echo "<td>" . $a. "</td><td>" . $row['riset']. "</td>";
                      echo "<td><a href='d_kompetensi.php?data_id=".$row['id_riset']."' style='color: red' class='glyphicon glyphicon-trash' id='custId' data-toggle='modal'></a></td>";
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

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<?php include("../footer.php"); ?>