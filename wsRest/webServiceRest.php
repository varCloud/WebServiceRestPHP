<?php
header('Content-Type: application/json');
if(isset($_GET['accion']))
	$view = $_GET['accion'];
else
	echo json_encode("no hay nada");
/*
controls the RESTful services
URL mapping
*/



switch($view){

	case "suma":
		// to handle REST Url /mobile/list/

	$data["num1"] = 1;
	$data["num2"] = 1;
	$data["total"] = $data["num1"] + $data["num1"] ; 
	echo json_encode($data);
		break;
		

	case "" :
		echo json_encode("error en operacion");
		break;
}

?>