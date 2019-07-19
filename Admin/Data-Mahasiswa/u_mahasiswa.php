<?php
    include '../../connect.php';
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $riset = $_POST['riset'];
    
    $ins = "UPDATE tb_mhs SET nim='$nim', namalengkap='$nama', judul='$judul', riset='$riset' WHERE id_mhs='$id'";
    if ($conn->query($ins) === TRUE) {
        header("location: ../data-mahasiswa/");
    } else {
        echo("Gagal dirubah");
    }
?>