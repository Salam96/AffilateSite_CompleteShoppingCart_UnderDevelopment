<?php
session_start();
$PAGEID=$_GET['pageid'];
include('../controller/cartfunctions.php');
include('../crud/invoice.php');

if (isset($_POST['Product'])) {
  $cart_product_id = $_POST['Product'];          
}else{
  $cart_product_id = false;
}
if (isset($_POST['product_qty'])) {

  $product_qty = $_POST['product_qty'];


}else{
  $product_qty = false;
}
if (isset($_POST['product_id'])) {

  $product_id = $_POST['product_id'];


}else{
  $product_id = false;
}


if ($PAGEID == 'cartadd'){ 

  cart_add($cart_product_id);
  header('location:../view/cart.php');
}
if ($PAGEID == 'updatecart') {  

  cart_update($product_id, $product_qty);
  
  if ($_SESSION['cart_items']) {

    header('location:../view/cart.php');
  }else
  header('location:../view/clienthomepage.php');

}
if ($PAGEID == 'emptycart') {  

  include('../controller/cartfunctions.php');
  cart_remove();
  header('location:../view/clienthomepage.php');

}
if ($PAGEID == 'invoice') {  

  header('location:../view/invoices.php');

}
if ($PAGEID == 'placeorder') {  

  create_invoice();
  header('location:../view/invoices.php');

}
if ($PAGEID == 'newproduct') {  
               // show_invoice();
  include"../crud/addproduct.php";

}
?>