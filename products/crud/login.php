<?php  
session_start();
include_once('db.php');	

if(isset($_POST['send'])){
	$sql="SELECT * FROM login where UserName = '" . $_POST['UserName'] . "' AND Password = '" . $_POST['Password'] . "'";	
	$res = $conn->prepare($sql);

	$res->execute(); 
	if ($res->rowCount($res)==1) {
		$user = $res->fetch(PDO::FETCH_ASSOC);
		$_SESSION['login'] = $user['LoginID'];

		if ($user['LoginID'] == true) {					
			if ($user['UserType'] == 'Admin' && $user['LoginID']) {
				$_SESSION['loginID'] = $user['LoginID'];
		//$_SESSION['Login'] = $user['UserType'];
				header('location:../controller/adminsessions.php?LoginID='. $user['LoginID']);

			}
			elseif ($user['UserType'] == 'Customer' && $user['LoginID']) {
				$_SESSION['Login'] = $user['UserType'];
				header('location:../controller/customersessions.php?LoginID='. $_SESSION['login']);
			}
		}
		else  {
			$error = "There is no accopunt associated with this username";
			header('location:../view/material-login-form/index.php?'. $error);
			session_destroy();		
			die();
		}
	}
	else  {
		session_destroy();
		header('location:../view/material-login-form/index.html');						
		die();
	}	
}																												  												
?>