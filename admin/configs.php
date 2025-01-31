<?php

//
include_once "includes_by_all.php";



// Configs
try{
    $tagsObject = new Configs($pdo);
    $tags = $tagsObject->fetchAll();
	//echo " tags=<pre>" . json_encode($tags, JSON_PRETTY_PRINT) . "</pre><br/>";
    $smarty->assign( "tags", $tags );
}
catch( Exception $e){
    echo "e=$e<br>";
}

//
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageConfigs.tpl" );


function createTables( $pdo, $securePath ) {
	$result = $pdo->exec( file_get_contents( $securePath . "/install/tables.sql" ) );
	if ( $result ) {
		return [0,0,null];
	}
	return $pdo->errorInfo();
}

