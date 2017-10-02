<?php 	
session_start();
	
				if (isset($_SESSION['login'])){

					if (isset($_GET['LoginID'])){

						AdminArea();

					}
							
				}


	else {
                                   session_destroy();
                                   header('location:index.php');
                                   die();
           }
   function AdminArea(){
   			header('location:../view/adminarea.php');

   }


 ?>