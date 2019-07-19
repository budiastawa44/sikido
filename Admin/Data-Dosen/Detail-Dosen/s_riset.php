<?php 
include '../../../connect.php';
$id_dosen = $_POST['id_dosen'];
$riset = $_POST['riset'];
$jumriset = count($riset);

$querydel = mysqli_query($conn, "DELETE FROM tb_riset_dosen WHERE id_dosen='$id_dosen'");

for($x=0;$x<$jumriset;$x++){
	$data2 = $riset[$x];
	$query = "INSERT INTO tb_riset_dosen (id_dosen, id_riset) VALUE ('$id_dosen','$riset[$x]')";
	$conn->query($query);
}

header("location:../detail-dosen?data_id=$id_dosen");
 
?>