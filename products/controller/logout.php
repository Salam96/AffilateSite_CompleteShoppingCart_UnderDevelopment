<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"]) {
	unset($_SESSION['cart_items']);
	session_destroy();
	header('location:../view/index.php');
}
else{echo "wrong";}

 ?>