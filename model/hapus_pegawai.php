<?php
include "../config/config.php";

$sql = "DELETE FROM `t_pegawai` WHERE `t_pegawai`.`nip` =
'$_POST[nip]'";
if (mysqli_query($conn, $sql)) {
	$data['say'] = "ok";
} else {
	$data['say'] = "NotOk";
}
echo json_encode($data);
