<?php 
    include("../../../connect.php");

    $data = $_GET['id'];
    $dosen = $_GET['dosen'];

    $sql = "DELETE FROM tb_uji WHERE id_uji = '$data'";
    if ($conn->query($sql) === TRUE) {
    	$da = 1;
        header("location: ../detail-dosen/?data_id=$dosen", $da);
    } else {
        echo("Periksa Koneksi Anda, hapus gagal !");
    }
?>