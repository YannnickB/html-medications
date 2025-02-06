<?php

//
include_once "includes_by_all.php";


// Filters
$filters = [];
if ( isset( $_GET["q"] ) && $_GET["q"] !== "" ) $filters["q"] = $_GET["q"];
if ( isset( $_GET["MedicationIsNaturalProduct"] ) && $_GET["MedicationIsNaturalProduct"] !== "" ) $filters["MedicationIsNaturalProduct"] = (int)$_GET["MedicationIsNaturalProduct"];
$smarty->assign( "filters", $filters );


// Medications
$medicationsObject = new Medications($pdo);
$medications = $medicationsObject->findAll( $filters );
//echo "<pre>" . json_encode($medications[0], JSON_PRETTY_PRINT) . "</pre><br/>";


// Tags
$tagsObject = new Tags($pdo);
$tags = $tagsObject->fetchAll();

//
include "header.php";
$smarty->assign( "medications", $medications );
$smarty->assign( "tags", $tags );
echo $smarty->fetch( $config["templatesPath"] . "/pageIndex.tpl" );
include "footer.php";
