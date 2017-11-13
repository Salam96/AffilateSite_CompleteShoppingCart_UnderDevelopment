<?php 

function cart_add($product_id){
	if (isset($_SESSION['cart_items'])) {
		$key = array_search($product_id, array_column($_SESSION['cart_items'], 0));
		if ($key === false) {
			array_push($_SESSION['cart_items'], array($product_id, 1));
		}else{
			$new_qty = $_SESSION['cart_items'][$key][1] + 1;
			$_SESSION['cart_items'][$key] = array($product_id, $new_qty);
			
		}
	}else{
		$_SESSION['cart_items'][] = array($product_id, 1);
	}
}
function product_remove(){
	$key = array_search($product_id, array_column($_SESSION['cart_items'], 0));
	if ($key === false) {
		return false;
	}else{
		if (count($_SESSION['cart_items']) == 1) {
			unset($_SESSION['cart_items']);
		}else{
			unset($_SESSION['cart_items'][$key]);
		}
	}
}
function cart_remove(){
	unset($_SESSION['cart_items']);
	header('../view/clienthomepage.php');
	
}

function cart_update($item, $qty){ 
	$key = array_search($item, array_column($_SESSION['cart_items'], 0));

	if ($qty == 0) {
		header('location:../view/clienthomepage.php');
		if (count($_SESSION['cart_items']) == 1) {
			unset($_SESSION['cart_items']);

		} else {
			unset($_SESSION['cart_items'][$key]);


		}
	} else {
		$_SESSION['cart_items'][$key] = array($item, $qty);
	}
}


?>