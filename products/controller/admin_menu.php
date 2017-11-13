<?php 

if(isset($_GET['page'])){
	switch ($_GET['page']) {
		case 'personal_info':
		include"../view/users_accounts.php";
		break;
		case 'add_product':
		include"../view/admin_control.php";
		break;
		
		default:
		
		include"../view/users_accounts.php";
		break;
	}
	
}

?>