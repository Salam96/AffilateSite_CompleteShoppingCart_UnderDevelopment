<?php 
		
					try {
						$conn = new PDO("mysql:host=localhost;dbname=shoppingcart;charset=utf8","root","root");
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

					} catch (Exception $e) {
						return $e;
					}
						
	function test_user_input($data)
			    					{
			   										   $data =trim($data); 											
			   										   $data =stripslashes($data);
	   												   $data =htmlspecialchars($data);
								    return $data;
			  												  }

 ?>