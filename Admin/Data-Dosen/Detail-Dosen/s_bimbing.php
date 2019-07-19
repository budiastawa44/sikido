<?php 
include '../../../connect.php';
$id_dosen = $_POST['id_dosen'];
$mhs = $_POST['mhs'];

$ins =  "INSERT INTO tb_bimbing (id_dosen, id_mhs) VALUE ('$id_dosen', '$mhs')";
if ($conn->query($ins) === TRUE) {
    header("location:../detail-dosen?data_id=$id_dosen");

} else {
    echo("Data Pembimbing Gagal Disimpan");
}
 
?>