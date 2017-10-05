<?php 
 session_start();       
 		if ($_REQUEST['action_type'] =='update'){


 			include_once('db.php');

             $sql="DELETE FROM `product` WHERE ProductID =" . $_GET['ProductID']; 
                     $res = $conn->prepare($sql); 
                     $res->execute();
                     header("location:../view/adminhomepage.php");                                   

 		
 		}
                

 ?>