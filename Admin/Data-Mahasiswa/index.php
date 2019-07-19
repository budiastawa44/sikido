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

    include '../header.php';
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mahasiswa
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Mahasiswa</h3>
            </div>
            <div class="box-body">
              <div style="margin-left: 10%; width: 75%">
                <form method="POST" action="s_mahasiswa.php">

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nim" class="form-control" name="nim" placeholder="NIM Mahasiswa" required autocomplete="off">                
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" required autocomplete="off">                
                    </div>
                  </div>

                  <div id="pilihan" style="display: flex;">
                    <div id="tombol" style="flex: 2;">
                      <button type="submit" style="width: 150px;" class="btn btn-info" id="tombol">Tambahkan</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Semua Data Mahasiswa Aktif</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="2%"><center>No</center></th>
                  <th width="5%"><center>NIM Mahasiswa</center></th>
                  <th width="10%"><center>Nama Mahasiswa</center></th>
                  <th><center>Judul Tugas Akhir</center></th>
                  <th width="3%"><center>Kompetensi</center></th>
                  <th><center>Aksi</center></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $querydata = "SELECT * FROM tb_mhs, tb_riset WHERE tb_mhs.riset=tb_riset.id_riset";
                $resa = $conn->query($querydata);
                $total = mysqli_num_rows($resa);
                if ($total > 0) {
                // output data of each row
                  $a = 0;
                  while($row = $resa->fetch_assoc()) {
                    $a = $a + 1;
                    ?>

                    <tr border='1'>

                      <form method="POST" action="u_mahasiswa.php">

                        <input type="hidden" name="id" value="<?php echo $row['id_mhs']; ?>">

                        <td> <?php echo $a; ?> </td>
                        <td>
                          <div class="hidden"> <?php echo $row['nim']; ?> </div>
                          <div class="form-group" style="width: 100px">
                            <input type="text" style="width: 100px" id="nim" class="form-control" name="nim" placeholder="NIM Mahasiswa" value="<?php echo $row['nim']; ?>" required autocomplete="off">    
                          </div>
                        </td>
                        
                        <td>
                          <div class="hidden"> <?php echo $row['namalengkap']; ?> </div>
                          <div class="form-group">
                            <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Mahasiswa" value="<?php echo $row['namalengkap']; ?>" required autocomplete="off">
                          </div>
                        </td>

                        <td>
                          <div class="hidden"> <?php echo $row['namalengkap']; ?> </div>
                          <div class="form-group">
                            <textarea type="text" id="judul" class="form-control" name="judul" placeholder="Judul Tugas Akhir" style="width: 500px"> <?php echo $row['judul']; ?> </textarea>
                          </div>
                        </td>

                        <td>
                          <div class="form-group">
                            <?php
                                $query = mysqli_query($conn, "SELECT * FROM tb_riset");
                              ?>

                              <select class="form-control" name="riset" id="riset" required autocomplete="off">
                                
                                <option value="<?php echo $row['riset'] ?>" selected> <?php echo $row['riset'] ?> </option>
                                <?php
                                  while($rowma = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $rowma['id_riset'] ?>"> <?php echo $rowma['riset'] ?> </option>
                                <?php } ?>
                              </select>                
                          </div>
                        </td>

                        <td>
                          <div style="display: flex;">
                          <button class="btn btn-success" type="submit" title="Simpan"> <i class='glyphicon glyphicon-floppy-disk'></i></button>

                      </form>

                          <a href='r_mahasiswa.php?data_id= <?php echo $row['id_mhs']; ?>' class="btn btn-warning" title="Riset Password"> <i class='glyphicon glyphicon-lock'></i></a>

                          <a href='d_mahasiswa.php?data_id= <?php echo $row['id_mhs']; ?>' class="btn btn-danger" title="Hapus"> <i class='glyphicon glyphicon-trash'></i></a>
                        </div>
                        </td>
                    </tr>
                  <?php }     
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
  <!-- /.content-wrapper -->

<?php include("../footer.php"); ?>