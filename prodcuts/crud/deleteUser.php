<?php 
 session_start();       
 		if ($_REQUEST['action_type'] =='delete'){


 			include_once('db.php');

             $sql="DELETE customer, postcodeinfo, login FROM `customer`, postcodeinfo, login WHERE customer.postcodeID = postcodeinfo.postcodeID AND customer.LoginID=login.LoginID AND customer.CustomerID =" . $_GET['CustomerID']; 
                     $res = $conn->prepare($sql); 
                     $res->execute();
                     header("location:../view/adminarea.php");                                   

 		
 		}
                

 ?>