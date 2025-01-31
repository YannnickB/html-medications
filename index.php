<?php

//
include_once "includes_by_all.php";


// Medications
try{
    //$medicationsObject = new Medications($pdo);
    //$medications = $medicationsObject->fetchAll();
	//echo "<pre>" . json_encode($medications, JSON_PRETTY_PRINT) . "</pre><br/>";
    //$globalSmarty->assign( "medications", $medications );
}
catch( Exception $e){
    echo "e=$e<br>";
}


// Tags
try{
    $tagsObject = new Tags($pdo);
    $tags = $tagsObject->fetchAll();
	//echo __FILE__. " tags=<pre>" . json_encode($tags, JSON_PRETTY_PRINT) . "</pre><br/>";
    $globalSmarty->assign( "tags", $tags );
}
catch( Exception $e){
    echo "e=$e<br>";
}

//
include "header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/pageIndex.tpl" );

