<?php

//
include_once "includes_by_all.php";


//
if ( isset($_POST["action"] ) ){
	//echo __FILE__. " _POST=<pre>" . json_encode($_POST, JSON_PRETTY_PRINT) . "</pre><br/>";
	if ( $_POST["action"] == "updateMedication" ){
		$medicationsObject = new Medications($pdo, $_POST["MedicationId"] );
		$result = $medicationsObject->update( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication updated", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not updated", "type" => "error" ];
    }
	else if ( $_POST["action"] == "insertMedicationsTags" ){
		$medicationsObject = new MedicationsTags($pdo );
		$result = $medicationsObject->insert( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Tag added", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Tag not added", "type" => "error" ];
    }
	else if ( $_POST["action"] == "deleteMedicationsTags" ){
		$medicationsObject = new MedicationsTags($pdo, $_POST["MedicationTagId"] );
		$result = $medicationsObject->delete();
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Tag deleted", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Tag not deleted", "type" => "error" ];
    }
}

//
$id = $_GET["MedicationId"];
if ( $id ){

	//
	try{

		// Get medication
		$medicationsObject = new Medications($pdo, $id );
		$medication = $medicationsObject->fetch();
		$smarty->assign( "medication", $medication );


		// Get medication tags
		$medicationsTagsObject = new MedicationsTags($pdo );
		$medicationsTags = $medicationsTagsObject->fetchAll( ["MedicationTag_MedicationId" => $id ] );
		$smarty->assign( "medicationsTags", $medicationsTags );

		// Get all tags
		$tagsObject = new Tags($pdo );
		$tags = $tagsObject->fetchAll( );
		$smarty->assign( "tags", $tags );
	}
	catch( Exception $e){
		echo "e=$e<br>";
	}
}

//
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageMedication.tpl" );
