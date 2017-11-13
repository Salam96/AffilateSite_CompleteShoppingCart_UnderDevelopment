<?php
SESSION_START();
include_once('db.php');
if ($_SERVER["REQUEST_METHOD"]) 
{
	$fname = !empty($_POST['fname'])? test_user_input(($_POST['fname'])):null;
	$lname = !empty($_POST['lname'])? test_user_input(($_POST['lname'])):null;
	$email = !empty($_POST['email'])? test_user_input(($_POST['email'])):null;
	$address1 = !empty($_POST['address1'])? test_user_input(($_POST['address1'])):null;
	$address2 = !empty($_POST['address2'])? test_user_input(($_POST['address2'])):null;
	$dob = !empty($_POST['dob'])? test_user_input(($_POST['dob'])):null;
	$postcode = !empty($_POST['postcode'])? test_user_input(($_POST['postcode'])):null;
	$suburb = !empty($_POST['suburb'])? test_user_input(($_POST['suburb'])):null;
	$state = !empty($_POST['state'])? test_user_input(($_POST['state'])):null;
	$username = !empty($_POST['username'])? test_user_input(($_POST['username'])):null;
	$password = !empty($_POST['password'])? test_user_input(($_POST['password'])):null;
	
							// My connection to the DB
	
	if ($_REQUEST["action_type"] =="add"){
		
		try {
			$conn->beginTransaction();
			$sql ="INSERT INTO postcodeinfo (postcodeID,postcode,suburb,state) VALUES (DEFAULT,?,?,?);";		
			$res = $conn->prepare($sql);		
			$res->execute(array($postcode,$suburb,$state));
			$POST_codeID = $conn-> lastInsertId();

			$sql2 ="INSERT INTO login (LoginID,UserName,Password,UserType) VALUES (DEFAULT,?,?,'Customer');";
			
			$res = $conn->prepare($sql2);
			
			$res->execute(array($username,$password));
			$Login_ID = $conn-> lastInsertId();

			$sql3 = "INSERT INTO customer (CustomerID,FirstName,LastName,DateOfBirth,email,addressone,addresstwo,LoginID,postcodeID) VALUES (DEFAULT,?,?,?,?,?,?,'$Login_ID','$POST_codeID');";
			$res = $conn->prepare($sql3);			
			$res->bindparam(':foregin_key',$Login_ID);	
			$res->bindparam(':foregin_key',$POST_codeID);									
			$res->execute(array($fname,$lname,$dob,$email,$address1,$address2));
			$Client_ID = $conn-> lastInsertId();
			$conn->commit();

			header("Location:../view/material-login-form/index.html");
			echo "Account has been created";
			
			
		}							
		catch	(PDOException $e){
			$conn->rollback();
			echo $e;
			die();}
		}
	}

	
	
	



	?>
