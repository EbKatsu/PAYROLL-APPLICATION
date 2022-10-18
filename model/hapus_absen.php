<?php
include "../config/config.php";

header("Access-Control-Allow-Origin: *");

$sql = "DELETE FROM `t_absen` WHERE `id` =
'$_POST[nip]'";

if (mysqli_query($conn, $sql)) {
	$data['say'] = "ok";
} else {
	$data['say'] = "NotOk";
}
echo json_encode($data);
