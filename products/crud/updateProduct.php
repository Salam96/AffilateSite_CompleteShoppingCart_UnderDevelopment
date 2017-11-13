<?php 
header('Content-Type: application/json');
if (isset($_GET)) {
	include_once('db.php');
	if ($_REQUEST['action_type'] =='listvalues'){
		$sql = "SELECT * FROM product WHERE ProductID =" . $_GET['ProductID'];
		$res = $conn->prepare($sql);
		$res->execute();
		$result = $res->fetch(PDO::FETCH_ASSOC);
		echo json_encode($result);
	}
}
if (isset($_POST)) {
	include_once('db.php');
	if ($_REQUEST['action_type'] =='update'){
		$productname = $_POST["pname"];
		$Brand= $_POST['brand'];
		$Model=$_POST['m_del'];
		$Quantity=$_POST['quantity'];
		$Price=$_POST['price'];
		$Description= $_POST['description'];
		$sql = "UPDATE product SET ProductName= '$productname', Brand='$Brand', Model='$Model', Quantity='$Quantity', Price='$Price', Description='$Description' WHERE ProductID =" . $_POST['primarykey'];
		$res = $conn->prepare($sql);
		$res->execute();
		$result = $res->fetch(PDO::FETCH_ASSOC);


	}
	
}



?>