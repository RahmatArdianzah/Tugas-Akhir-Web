<?php
	session_start();
	unset($_SESSION['cart']);
	$_SESSION['message'];
	header('location: tampil_produk.php');
?>