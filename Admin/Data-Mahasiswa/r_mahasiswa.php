<?php
    include '../../connect.php';
    $id = $_GET['data_id'];
    $pas = 1234567;
    
    $ins = "UPDATE tb_mhs SET password='$pas' WHERE id_mhs='$id'";
    if ($conn->query($ins) === TRUE) {
        header("location: ../data-mahasiswa/");
    } else {
        echo("Password gagal diriset ! ");
    }
?>