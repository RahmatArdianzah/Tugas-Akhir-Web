<?php
	session_start();

	//check if product is already in the cart
	if(!in_array($_GET['id'], $_SESSION['cart'])){
		array_push($_SESSION['cart'], $_GET['id']);
		$_SESSION['message'];
	}
	else{
		$_SESSION['message'];
	}

	header('location: tampil_produk.php');
?>