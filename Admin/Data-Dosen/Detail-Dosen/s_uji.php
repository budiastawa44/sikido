<?php 
include '../../../connect.php';
$id_dosen = $_POST['id_dosen'];
$mhs = $_POST['mhs'];

$ins =  "INSERT INTO tb_uji (id_dosen, id_mhs) VALUE ('$id_dosen', '$mhs')";
if ($conn->query($ins) === TRUE) {
    header("location:../detail-dosen?data_id=$id_dosen");

} else {
    echo("Data Penguji Gagal Disimpan");
}
 
?>