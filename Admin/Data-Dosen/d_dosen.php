<?php 
    include("../../connect.php");

    $data = $_GET['data_id'];

    $sql = "DELETE FROM tb_dosen WHERE id_dosen='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../data-dosen/");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>