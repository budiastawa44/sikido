<?php
    include 'connect.php';
    session_start();
    $id = $_POST['id_mhs'];
    $plama = $_POST['plama'];
    $pbaru = $_POST['pbaru'];

    $user_pass = $_SESSION['login_pass'];

    if ($plama == $user_pass) {
        $ins = "UPDATE tb_mhs SET password='$pbaru' WHERE password='$plama' AND id_mhs='$id'";
        if ($conn->query($ins) === TRUE) {
            $Dusun = $dusun;
            header("location: data-dosen/");
        }
    }else {
        echo("Gagal dirubah, password lama anda salah !");
    }

?>