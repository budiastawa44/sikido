<?php 
    include("../../connect.php");

    $nama = $_POST['nama'];
    $pas = $_POST['pas'];

    $queryins = "INSERT INTO tb_admin (nama, sandi) VALUE ('$nama', '$pas')";
    if ($conn->query($queryins) === TRUE) {
        header("location: ../data-admin/");
    } else {
        echo("Gagal diinput");
    }
?>