<?php 
    include("../../connect.php");

    $golongan = $_POST['golongan'];

    $queryins = "INSERT INTO tb_golongan (golongan) VALUE ('$golongan')";
    if ($conn->query($queryins) === TRUE) {
        header("location: ../data-golongan/");
    } else {
        echo("Gagal diinput");
    }
?>