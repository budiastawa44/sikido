<?php
    include '../../../connect.php';
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nidn = $_POST['nidn'];
    $golongan = $_POST['golongan'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $bim = $_POST['bim'];
    $uji = $_POST['uji'];
    
    $ins = "UPDATE tb_dosen SET nama='$nama', nidn='$nidn', nik='$nik', alamat='$alamat', kontak='$kontak', id_golongan='$golongan', max_bimbing='$bim', max_uji='$uji' WHERE id_dosen='$id'";
    if ($conn->query($ins) === TRUE) {
        $Dusun = $dusun;
        header("location:../detail-dosen?data_id=$id");
    } else {
        echo("Gagal dirubah");
    }
?>