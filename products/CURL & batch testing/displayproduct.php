<?php 
header('Content-Type: application/json');
if (isset($_GET)) {
	include_once('../curd/db.php');
	if (isset($_REQUEST['action_type']) =='list'){
		$sql = "SELECT * FROM product";
		$res = $conn->prepare($sql);
		$res->execute();
		$result = $res->fetchAll();
		echo json_encode($result);
	}
}
?>