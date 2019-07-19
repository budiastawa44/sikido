<?php 
    include("../../connect.php");

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $nidn = $_POST['nidn'];
    $golongan = $_POST['golongan'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];

    $queryins = "INSERT INTO tb_dosen (nama, nidn, nik, alamat, kontak, id_golongan, max_bimbing, max_uji) VALUE ('$nama', '$nidn', '$nik', '$alamat', '$kontak', '$golongan', '3', '3')";
    if ($conn->query($queryins) === TRUE) {
        header("location:../data-dosen");
    } else {
        echo("Gagal diinput");
    }
?>