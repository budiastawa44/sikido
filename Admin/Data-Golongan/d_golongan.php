<?php 
    include("../../connect.php");

    $data = $_GET['data_id'];

    $sql = "DELETE FROM tb_golongan WHERE id_golongan='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../data-golongan/");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>