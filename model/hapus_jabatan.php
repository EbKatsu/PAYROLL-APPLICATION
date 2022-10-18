<?php
include "../config/config.php";

$sql = "DELETE FROM `t_jabatan` WHERE `id_jabatan` =
'$_POST[nip]'";
if (mysqli_query($conn, $sql)) {
	$data['say'] = "ok";
} else {
	$data['say'] = "NotOk";
}
echo json_encode($data);
