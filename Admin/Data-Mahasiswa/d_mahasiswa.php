<?php 
    include("../../connect.php");

    $data = $_GET['data_id'];

    $sql = "DELETE FROM tb_mhs WHERE id_mhs='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../data-mahasiswa/");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>