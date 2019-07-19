<?php 
    include("../../connect.php");

    $data = $_GET['data_id'];

    $sql = "DELETE FROM tb_riset WHERE id_riset='$data'";
    if ($conn->query($sql) === TRUE) {
        header("location: ../data-kompetensi/");
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
        echo $data;
    }
?>