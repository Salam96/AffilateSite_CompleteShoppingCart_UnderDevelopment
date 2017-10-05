<?php 	
session_start();
	
				if (isset($_SESSION['login'])){

					if (isset($_GET['LoginID'])){

						clientArea();

					}
							
				}


	else {
                                   session_destroy();
                                   header('location:index.php');
                                   die();
           }
   function clientArea(){
   		//	header('location:../view/clientarea.php');
   			header('location:../view/clientarea.php');

   }
 ?>

