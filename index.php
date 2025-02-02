<?php

//
include_once "includes_by_all.php";

$filters = [];
if ( isset( $_GET["q"] ) && $_GET["q"] !== "" ) $filters["q"] = $_GET["q"];
if ( isset( $_GET["MedicationIsNaturalProduct"] ) && $_GET["MedicationIsNaturalProduct"] !== "" ) $filters["MedicationIsNaturalProduct"] = (int)$_GET["MedicationIsNaturalProduct"];
$smarty->assign( "filters", $filters );


// Medications
//$medicationsObject = new Medications($pdo);
//$medications = $medicationsObject->fetchAll();
//echo "<pre>" . json_encode($medications[0], JSON_PRETTY_PRINT) . "</pre><br/>";
//$smarty->assign( "medications", $medications );


// Medications
$medicationsObject = new Medications($pdo);
$medications = $medicationsObject->findAll( $filters );
//echo "<pre>" . json_encode($medications[0], JSON_PRETTY_PRINT) . "</pre><br/>";
$smarty->assign( "medications", $medications );


// Tags
try{
    $tagsObject = new Tags($pdo);
    $tags = $tagsObject->fetchAll();
	//echo __FILE__. " tags=<pre>" . json_encode($tags, JSON_PRETTY_PRINT) . "</pre><br/>";
    $smarty->assign( "tags", $tags );
}
catch( Exception $e){
    echo "e=$e<br>";
}

//
include "header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/pageIndex.tpl" );

