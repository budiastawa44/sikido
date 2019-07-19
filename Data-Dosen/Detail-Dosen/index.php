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
    }else{
      header("location: ../../");
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
              <h3 class="box-title">Detail Data Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-body">
              <div style="margin-left: 10%; width: 75%">
                <?php
                  $data = $_GET['data_id'];
                  $querydata = "SELECT * FROM tb_dosen WHERE id_dosen='$data'";
                  $resa = $conn->query($querydata);
                  $total = mysqli_num_rows($resa);
                  $row = $resa->fetch_assoc();
                ?>
                <form method="POST" action="u_dosen.php">

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Nama Dosen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nama" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" required autocomplete="off" disabled>                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nik" class="form-control" name="nik" value="<?php echo $row['nik'] ?>" required autocomplete="off" disabled>                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIDN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nidn" class="form-control" name="nidn" value="<?php echo $row['nidn'] ?>" required autocomplete="off" disabled>                
                    </div>
                  </div>
                  <div class="form-group">
                    <?php
                        $golama = $row['id_golongan'];
                        $querygolama = mysqli_query($conn, "SELECT * FROM tb_golongan WHERE id_golongan='$golama'");
                        $rowgolama = $querygolama->fetch_assoc();
                        $querygol = mysqli_query($conn, 'SELECT * FROM tb_golongan');
                    ?>
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="golongan" class="form-control" name="golongan" value="<?php echo $rowgolama['golongan'] ?>" required autocomplete="off" disabled>         
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="alamat" class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>" required autocomplete="off" disabled>     
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Kontak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="kontak" class="form-control" name="kontak" value="<?php echo $row['kontak'] ?>" required autocomplete="off" disabled>     
                    </div>
                  </div>

                </form>
              </div>
            </div>

            
            <h4 class="box-title">Bidang Riset Dosen</h4>
            <?php
                $no = 1;
                $data = $_GET['data_id'];
                $queryset = mysqli_query($conn, 'SELECT * FROM tb_riset');
              ?>
              <form method="POST" action="s_riset.php" style="margin-left: 120px">
                <input type="hidden" name="id_dosen" value="<?php echo $data ?>" >
                <?php
                  $a = 0;
                  while($rowset = mysqli_fetch_array($queryset)){
                    $data = $_GET['data_id'];
                    $data2 = $rowset['id_riset'];
                    $queryrd = mysqli_query($conn, "SELECT * FROM tb_riset_dosen WHERE id_dosen='$data' AND tb_riset_dosen.id_riset='$data2'"); 
                    $rowrd = mysqli_fetch_array($queryrd); 
                    $total = mysqli_num_rows($queryrd);
                    $a = $a + 1;
                    if ($total > 0) { ?>
                       <label> <?php echo ($no++).". ".$rowset['riset'] ?><br />
                     <?php } ?>
                  <?php }?>


            
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

<?php include("../footer.php");
