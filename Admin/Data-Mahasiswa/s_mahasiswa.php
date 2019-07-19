<?php 
    include("../../connect.php");

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $pas = 1234567;

    $queryins = "INSERT INTO tb_mhs (nim, namalengkap, password) VALUE ('$nim', '$nama', '$pas')";
    if ($conn->query($queryins) === TRUE) {
        header("location: ../data-mahasiswa/");
    } else {
        echo("Gagal diinput");
    }
?>