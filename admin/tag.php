<?php

//
include_once "includes_by_all.php";


//
if ( isset($_POST["action"] ) ){
	//echo __FILE__. " _POST=<pre>" . json_encode($_POST, JSON_PRETTY_PRINT) . "</pre><br/>";
	if ( $_POST["action"] == "updateTag" ){
		$tagsObject = new Tags($pdo, $_POST["TagId"] );
		$result = $tagsObject->update( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Tag updated", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Tag not updated", "type" => "error" ];
    }
	else if ( $_POST["action"] == "insertMedicationsTags" ){
		$medicationsObject = new MedicationsTags($pdo );
		$result = $medicationsObject->insert( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication added", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not added", "type" => "error" ];
    }
}

//
$id = $_GET["TagId"];
if ( $id ){

	//
	try{

		// Get medication
		$tagsObject = new Tags($pdo, $id );
		$tag = $tagsObject->fetch();
		$smarty->assign( "tag", $tag );


		// Get medication tags
		$medicationsTagsObject = new MedicationsTags($pdo );
		$medicationsTags = $medicationsTagsObject->fetchAll( ["MedicationTag_TagId" => $id ] );
		$smarty->assign( "medicationsTags", $medicationsTags );

		// Get all medications
		$medicationsObject = new Medications($pdo );
		$medications = $medicationsObject->fetchAll( );
		$smarty->assign( "medications", $medications );
	}
	catch( Exception $e){
		echo "e=$e<br>";
	}
}

//
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageTag.tpl" );
