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
   
//PayPal Submission URL
define('PPCART_URL', 'https://www.paypal.com/cgi-bin/webscr');

//PayPal Account 
define('PPCART_ACCOUNT', 'salamemad11-facilitator@yahoo.com');

//Currency Code for PayPal; 
define('PPCART_CURRENCY', 'AUD');

//Country Code for PayPal;
define('PPCART_COUNTRY', 'AU');

//Return PayPal URL Invoice will be generated once payment is finalized;
define('PPCART_RETURN_URL', 'http://localhost:8888/products/controller/basket.php?pageid=placeorder');

 ?>