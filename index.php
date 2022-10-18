<?php
session_start();
if (
	empty($_SESSION['username']) and
	empty($_SESSION['password'])
) {
	header('location:login.php');
} else {
	if ($_SESSION['level'] == 'admin') {
		include 'view/head.php';
		include 'view/container.php';
	} else if ($_SESSION['level'] == 'bendahara') {
		include 'view/head.php';
		include 'view/container_bendahara.php';
	} else if ($_SESSION['level'] == 'pimpinan') {
		include 'view/head.php';
		include 'view/container_pimpinan.php';
	} else if ($_SESSION['level'] == 'user') {
		include 'view/head.php';
		include 'view/container_user.php';
	} else {
		echo "Anda bukan Administrator";
	}
}
