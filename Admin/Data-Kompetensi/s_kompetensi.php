<?php 
    include("../../connect.php");

    $kompetensi = $_POST['komp'];

    $queryins = "INSERT INTO tb_riset (riset) VALUE ('$kompetensi')";
    if ($conn->query($queryins) === TRUE) {
        header("location: ../data-kompetensi/");
    } else {
        echo("Gagal diinput");
    }
?>