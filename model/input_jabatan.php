<?php
include "../config/config.php";

$sql = "INSERT INTO `t_jabatan`(
	`nama_jabatan`,
	`gapok`,
	`tunjangan`)
	VALUES ('$_POST[nama_jabatan]','$_POST[gapok]','$_POST[tunjangan]')";
mysqli_query($conn, $sql) or die("Gagal Menyimpan");
header("location:../index.php?p=data_jabatan");
