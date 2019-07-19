<?php 
    include("../../connect.php");

    $data = $_GET['data_id'];

    $sql = "DELETE FROM tb_admin WHERE id_admin='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../data-admin/");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>