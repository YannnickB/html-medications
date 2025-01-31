<?php

//
include_once "includes_by_all.php";


//
$jsonData = [ "error" => 1 ];


// Actions
if ( isset( $_GET["type"] ) && $_GET["type"] ){

	$type = $_GET["type"];

	if ( $type == "medications" ){
		$medicationsObject = new Medications($pdo);
		$medications = $medicationsObject->fetchAll();

		$jsonData = [
			"headers" => [],
			"fields" => [],
			"values" => $medications,
			"footer" => []
		];
	}
}




// JSON header
header('Content-Type: application/json; charset=utf-8');

//$jsonData["_POST"] = $_POST;
//$jsonData["_GET"] = $_GET;


// Print data
echo json_encode($jsonData);

