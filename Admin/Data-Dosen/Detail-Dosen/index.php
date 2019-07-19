<?php 
    include("../../../connect.php");
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
      header("location: ../../");
    }

    include '../../header.php';
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
              <div style="margin-left: 10%; width: 75%">
                <?php
                  $data = $_GET['data_id'];
                  $querydata = "SELECT * FROM tb_dosen WHERE id_dosen='$data'";
                  $resa = $conn->query($querydata);
                  $total = mysqli_num_rows($resa);
                  $row = $resa->fetch_assoc();
                  $maxbim = $row['max_bimbing'];
                  $maxuji = $row['max_uji'];
                ?>
                <form method="POST" action="u_dosen.php">
                  <input type="hidden" name="id" value="<?php echo $row['id_dosen'] ?>">
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Nama Dosen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nama" class="form-control" name="nama" value="<?php echo $row['nama'] ?>" required autocomplete="off">                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIK&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nik" class="form-control" name="nik" value="<?php echo $row['nik'] ?>" required autocomplete="off">                
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">NIDN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="nidn" class="form-control" name="nidn" value="<?php echo $row['nidn'] ?>" required autocomplete="off">                
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
                      <select class="form-control" name="golongan" id="golongan" required autocomplete="off">
                        <option value="<?php echo $row['id_golongan'] ?>" selected> <?php echo $rowgolama['golongan'] ?> </option>
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
                      <input type="text" id="alamat" class="form-control" name="alamat" value="<?php echo $row['alamat'] ?>" required autocomplete="off">     
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Kontak&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="kontak" class="form-control" name="kontak" value="<?php echo $row['kontak'] ?>" required autocomplete="off">     
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Max. Bimbing&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="bim" class="form-control" name="bim" value="<?php echo $row['max_bimbing'] ?>" required autocomplete="off">     
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group"><span class="input-group-addon" id="basic-addon1">Max. Nguji&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                      <input type="text" id="uji" class="form-control" name="uji" value="<?php echo $row['max_uji'] ?>" required autocomplete="off">     
                    </div>
                  </div>

                  <div id="pilihan" style="display: flex;">
                    <div id="tombol" style="flex: 2;">
                      <button type="submit" style="width: 150px;" class="btn btn-success" id="tombol">Simpan Perubahan</button>
                    </div>
                    <div style="flex: 2; margin-left: 50%">Tekan simpan perubahan jika ingin mengganti data dosen</div>
                  </div>

                </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kompetensi / Bidang Riset</h3>
            </div>
            <div class="box-body">

              <?php
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
                       <input type="checkbox" name="riset[]" value="<?php echo $rowset['id_riset'] ?>" <?php echo'checked'; ?>> <?php echo $rowset['riset'] ?><br />
                     <?php }elseif($rowset['riset'] != ""){ ?>
                      <input type="checkbox" name="riset[]" value="<?php echo $rowset['id_riset'] ?>"> <?php echo $rowset['riset'] ?><br />
                     <?php } ?>
                  <?php }?>

                <div id="pilihan" style="display: flex; margin-top: 10px">
                  <div id="tombol" style="flex: 2;">
                    <button type="submit" style="width: 150px;" class="btn btn-success" id="tombol">Simpan Perubahan</button>
                  </div>
                  <div style="flex: 2; margin-left: 50%">Centang bidang riset dari dosen yang bersangkutan dan tekan simpan perubahan</div>
                </div>
              </form>
              
            </div>

            
          </div>
          <!-- /.box -->

          <div style="display: flex;">
            <div class="box" style="width: 49%">
              <div class="box-header" style="display: flex">
                <div style="width: 85%">
                  <h3 class="box-title">Mahasiswa Dibimbing (Maks. <?php echo $maxbim ?>) </h3>
                </div>
                <div style="width: 10%">

                  <?php
                    $query = mysqli_query($conn, "SELECT tb_bimbing.id_bimbing, tb_bimbing.id_dosen, tb_bimbing.id_mhs, tb_mhs.namalengkap, tb_mhs.nim, tb_mhs.judul, tb_riset.riset FROM tb_bimbing, tb_mhs, tb_riset WHERE tb_bimbing.id_dosen='$data' AND tb_bimbing.id_mhs = tb_mhs.id_mhs AND tb_mhs.riset=tb_riset.id_riset");

                    $tot = mysqli_num_rows($query);

                    if ($tot < $maxbim) {
                      $modal = 'modal-add';
                    }else{
                      $modal = 'alert-bimbing';
                    }

                  ?>

                  <a class='btn btn-info' data-toggle="modal" data-target="#<?php echo $modal; ?>" data-popup="tooltip" data-placement="top" title='Tambah Data Bimbingan'><i class='glyphicon glyphicon-plus'></i> Tambah</a>
                </div>
              </div>
              <div class="box-body">
                
                <table class="table table-bordered" id="example2">
                  <thead>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JUDUL SKRIPSI</th>
                    <th>AKSI</th>
                  </thead>

                  <?php

                      $no=0;

                      while($rowbim = mysqli_fetch_array($query)){
                        $no++;
                  ?>

                  <tbody>
                    <tr>
                      <td> <?php echo $no; ?> </td>
                      <td> <?php echo $rowbim['nim']; ?> </td>
                      <td> <?php echo $rowbim['namalengkap']; ?> </td>
                      <td> <?php echo $rowbim['judul']; ?> </td>
                      <td>

                        <a href="d_bimbing.php?id=<?php echo $rowbim['id_bimbing'] ?>?&dosen=<?php echo $data ?>" class='btn btn-danger' title="Hapus Data"><i class='glyphicon glyphicon-trash'></i></a>

                        
                      </td>
                    </tr>
                    
                  </tbody>
                  <?php } ?>

                </table>

              </div>
            </div>

            <div style="width: 2%"></div>

            <div class="box" style="width: 49%;">
              <div class="box-header">
                <div style="display: flex;">
                  <div style="width: 85%">
                    <h3 class="box-title">Mahasiswa Diuji (Maks. <?php echo $maxuji ?>)</h3>
                  </div>
                  <div style="width: 10%">

                    <?php
                      $queryuji = mysqli_query($conn, "SELECT tb_uji.id_uji, tb_uji.id_dosen, tb_uji.id_mhs, tb_mhs.namalengkap, tb_mhs.nim, tb_mhs.judul, tb_riset.riset FROM tb_uji, tb_mhs, tb_riset WHERE tb_uji.id_dosen='$data' AND tb_uji.id_mhs = tb_mhs.id_mhs AND tb_mhs.riset=tb_riset.id_riset");

                      $totuji = mysqli_num_rows($queryuji);

                      if ($totuji < $maxbim) {
                        $modal = 'modal-add-ujian';
                      }else{
                        $modal = 'alert-uji';
                      }
                    ?>

                    <a class='btn btn-info' data-toggle="modal" data-target="#<?php echo $modal; ?>" data-popup="tooltip" data-placement="top" title='Tambah Data Ujian'><i class='glyphicon glyphicon-plus'></i> Tambah</a>
                  </div>
                </div>
              </div>
              <div class="box-body">

                <table class="table table-bordered" id="example3">
                  <thead>
                    <th>NO</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>JUDUL SKRIPSI</th>
                    <th>AKSI</th>
                  </thead>

                  <?php

                      $no=0;

                      while($rowuji = mysqli_fetch_array($queryuji)){
                        $no++;
                  ?>

                  <tbody>
                    <tr>
                      <td> <?php echo $no; ?> </td>
                      <td> <?php echo $rowuji['nim']; ?> </td>
                      <td> <?php echo $rowuji['namalengkap']; ?> </td>
                      <td> <?php echo $rowuji['judul']; ?> </td>
                      <td>

                        <a href="d_uji.php?id=<?php echo $rowuji['id_uji'] ?>?&dosen=<?php echo $data ?>" class='btn btn-danger' title="Hapus Data"><i class='glyphicon glyphicon-trash'></i></a>

                        
                      </td>
                    </tr>
                    
                  </tbody>
                  <?php } ?>

                </table>

              </div>
            </div>
          </div>

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<!-- ADD BIMBINGANN  -->
  <div>
    <div id="modal-add" class="modal fade">
      <div class="modal-dialog">
        <form method="POST" action="s_bimbing.php">
          <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data Bimbingan</h4>
            </div>

            <div class="modal-body">

              <input type="hidden" name="id_dosen" value="<?php echo $data; ?>">

              <div class="form-group">
                <label>Mahasiswa</label>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_mhs");
                ?>
                  <select class="form-control" name="mhs" id="mhs" required autocomplete="off">
                    <?php
                      while($rowma = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $rowma['id_mhs'] ?>"> <?php echo $rowma['nim']." - ".$rowma['namalengkap'] ?> </option>
                    <?php } ?>
                  </select>                
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i>Tambah</button>
            </div>

        </form>
      </div>
    </div>
  </div>

  <!-- ADD UJIAN  -->
  <div>
    <div id="modal-add-ujian" class="modal fade">
      <div class="modal-dialog">
        <form method="POST" action="s_uji.php">
          <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header bg-primary">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Tambah Data Ujian</h4>
            </div>

            <div class="modal-body">

              <input type="hidden" name="id_dosen" value="<?php echo $data; ?>">

              <div class="form-group">
                <label>Mahasiswa</label>
                <?php
                    $query = mysqli_query($conn, "SELECT * FROM tb_mhs");
                ?>
                  <select class="form-control" name="mhs" id="mhs" required autocomplete="off">
                    <?php
                      while($rowma = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php echo $rowma['id_mhs'] ?>"> <?php echo $rowma['nim']." - ".$rowma['namalengkap'] ?> </option>
                    <?php } ?>
                  </select>                
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success"><i class="icon-pencil5"></i>Tambah</button>
            </div>

        </form>
      </div>
    </div>
  </div>

 <!--  Kuota Pembimbing Penuh -->
 <div>
  <div id="alert-bimbing" class="modal fade">
    <div class="modal-dialog">
      <form method="POST" action="s_uji.php">
        <div class="modal-content" style="border-radius: 10px">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penting ! </h4>
          </div>

          <div class="modal-body">
            <h3>Maaf, kuota sebagai pembimbing penuh !</h3>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>
  </div>
</div>

 <!--  Kuota Penguji Penuh -->
 <div>
  <div id="alert-uji" class="modal fade">
    <div class="modal-dialog">
      <form method="POST" action="s_uji.php">
        <div class="modal-content" style="border-radius: 10px">
          <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Penting ! </h4>
          </div>

          <div class="modal-body">
            <h3>Maaf, kuota sebagai penguji penuh !</h3>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

      </form>
    </div>
  </div>
</div>


 <!--  Hapus Bimbingan -->

<?php include("../../footer.php"); ?>