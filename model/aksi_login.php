
<?php
include "../config/config.php";
// Fungsi SQL Injection
function antiinjection($data)
{
	$conn = mysqli_connect("localhost", "root", "", "penggajian");
	$filter_sql =
		mysqli_real_escape_string($conn, $data);
	return $filter_sql;
}
$username = antiinjection($_POST['username']);
$password = antiinjection(md5($_POST['password']));
$sql = "SELECT * FROM view_pengguna WHERE username='$username' AND password='$password' ";
$tampil = mysqli_query($conn, $sql);
$jumlah = mysqli_num_rows($tampil);
$data = mysqli_fetch_array($tampil);
if ($jumlah > 0) {
	session_start();
	// Inisialisasi data pada session
	$_SESSION[nip] = $data['nip'];
	$_SESSION[username] = $data['username'];
	$_SESSION[password] = $data['password'];
	$_SESSION[level] = $data['level'];
	$_SESSION[nama_pegawai] = $data['nama_pegawai'];
	$_SESSION[imagefile] = $data['imagefile'];
	header('location:../index.php');
}
// Apabila login gagal
else {
	echo "<script>alert('Login Gagal, username atau password tidak cocok'); window.location = '../index.php'</script>";
}
?>