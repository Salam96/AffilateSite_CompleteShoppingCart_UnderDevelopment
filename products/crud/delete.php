<?php       
session_start();       
include_once('db.php');

$sql="DELETE postcodeinfo, login FROM `customer`, postcodeinfo, login WHERE customer.postcodeID = postcodeinfo.postcodeID AND customer.LoginID=login.LoginID AND customer.CustomerID =" . $_SESSION['CustomerID']; 
$res = $conn->prepare($sql); 
$res->execute();
header("location:../view/index.php");
session_destroy();
exit();                                            
?>