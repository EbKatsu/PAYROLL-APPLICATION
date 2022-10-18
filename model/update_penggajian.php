
<?php
include "../config/config.php";
$sql = "UPDATE `t_penggajian` SET
		`bonus` = '$_POST[bonus]',
		`potongan` = '$_POST[potongan]' WHERE `no_penggajian` ='$_POST[no_penggajian]';";
mysqli_query($conn, $sql) or die("Gagal Memperbaharui");
header("location:../index.php?p=data_gaji");
?>