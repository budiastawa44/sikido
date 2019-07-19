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
        Data Dosen Baru
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Dosen Program Studi Kimia</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <div style="margin-left: 10%; width: 75%">
                <form method="POST" action="s_dosen.php">

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Nama Dosen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama" required autocomplete="off">                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nik" class="form-control" name="nik" placeholder="NIK" required autocomplete="off">                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIDN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nidn" class="form-control" name="nidn" placeholder="NIDN" required autocomplete="off">                
                    </div>
                  </div>
                  <div class="form-group">
                    <?php
                        $querygol = mysqli_query($conn, 'SELECT * FROM tb_golongan');
                    ?>
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Golongan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <select class="form-control" name="golongan" id="golongan" required autocomplete="off">
                        <option value="pilih" selected>--- Pilih Golongan ---</option>
                        <?php
                          while($rowgol = mysqli_fetch_array($querygol)){
                        ?>
                        <option value="<?php echo $rowgol['id_golongan'] ?>"> <?php echo $rowgol['golongan'] ?> </option>
                        <?php } ?>
                      </select>                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat" required autocomplete="off">     
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Kontak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="kontak" class="form-control" name="kontak" placeholder="Kontak yang dapat dihubungi" required autocomplete="off">     
                    </div>
                  </div>

                  <div id="pilihan" style="display: flex;">
                    <div id="tombol" style="flex: 2;">
                      <button type="submit" style="width: 150px;" class="btn btn-info" id="tombol">Tambahkan</button>
                    </div>
                    <div style="flex: 2; margin-left: 50%">Pastikan semua data terisi dengan benar</div>
                  </div>

                </form>
              </div>
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