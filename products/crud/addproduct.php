<?php 

// Add new product
if (isset($_FILES['filetoupload'])) {
        $destination_path = '../images/' . $_FILES['filetoupload']['name'];
        move_uploaded_file($_FILES['filetoupload']['tmp_name'], $destination_path);
        $image_filename = $_FILES['filetoupload']['name'];
    } else {
        $image_filename = '';
    }
if (isset($_POST)) {
	include_once('db.php');
	$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])):null;
		 $productname = !empty($_POST["pname"])? test_user_input(($_POST["pname"])):null;
		 $Brand= !empty($_POST["brand"])? test_user_input(($_POST["brand"])):null;
		 $Model=!empty($_POST["m_del"])? test_user_input(($_POST["m_del"])):null;
		 $Quantity=!empty($_POST["quantity"])? test_user_input(($_POST["quantity"])):null;
		 $Price=!empty($_POST['price'])? test_user_input(($_POST['price'])):null;
	     $image_filename = $_FILES['filetoupload']['name'];
		 $Description= !empty($_POST['description'])? test_user_input(($_POST['description'])):null;
		 $sql="INSERT INTO `product` (`ProductID`, `ProductName`, `Brand`, `Model`, `Quantity`, `Price`, `Image`, `Description`) VALUES (DEFAULT, '$productname', '$Brand', '$Model', '$Quantity', '$Price', '$image_filename', '$Description')";
		$res = $conn->prepare($sql);
		$res->execute();
		header("location:../view/adminarea.php");
	
	
}
 ?>