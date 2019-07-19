<?php 
    include("../../../connect.php");

    $data = $_GET['id'];
    $dosen = $_GET['dosen'];

    $sql = "DELETE FROM tb_bimbing WHERE id_bimbing='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../detail-dosen/?data_id=$dosen");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>