<?php

//
include_once "includes_by_all.php";


// Init database
$sqlitePath = $config["database"]["filepath"];
//echo __FILE__." line ".__LINE__. "() sqlitePath=$sqlitePath<br>";


//
//echo __FILE__." line ".__LINE__. "() _POST=<pre>".json_encode($_POST, JSON_PRETTY_PRINT )."</pre><br>";
if ( isset($_POST["action"] ) ){
    if ( $_POST["action"] == "deleteDatabase" ){
        global $pdo;
        $pdo = null;
		//$userAlerts[] =  [ "message" => "Init tables" , "type" => "success" ];
		$userAlerts[] =  [ "title" => "Delete database", "message" => $sqlitePath , "type" => "success" ];
        if (file_exists( $sqlitePath)) unlink($sqlitePath);
    }
    else if ( $_POST["action"] == "insertMedication" ){
		$medicationsObject = new Medications($pdo );
		$result = $medicationsObject->insert( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication added", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not added", "type" => "error" ];
    }
	else if ( $_POST["action"] == "deleteMedication" ){
		$medicationsObject = new Medications($pdo, $_POST["MedicationId"] );
		$result = $medicationsObject->delete();
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication deleted", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not deleted", "type" => "error" ];
    }
}


// PDO
$pdo = null;
if (file_exists( $sqlitePath)) {
	$pdo = new PDO( "sqlite:".$sqlitePath );
}
else{
	$userAlerts[] =  [ "title" => "Create database", "message" => $sqlitePath, "type" => "success" ];
	$pdo = new PDO( "sqlite:".$sqlitePath );
	$result = createTables( $pdo, $config["securePath"] );
	//echo __FILE__." line ".__LINE__. "() result=".json_encode($result, JSON_PRETTY_PRINT )."<br>";
	if ( $result[1] === 0 ) {
		$userAlerts[] =  [ "title" => "", "message" => "Tables created", "type" => "success" ];
	}
	else {
		echo "<div class='alert alert-danger'>ERROR: ".$result[2]."</div>";
		$userAlerts[] =  [ "title" => $result[2], "message" => "Tables not created <br/>".$result[2], "type" => "error" ];
	}
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

// Medications
try{
    $medicationsObject = new Medications($pdo);
    $medications = $medicationsObject->fetchAll();
	//echo __FILE__. " medications=<pre>" . json_encode($medications, JSON_PRETTY_PRINT) . "</pre><br/>";
    $smarty->assign( "medications", $medications );
}
catch( Exception $e){
    echo "e=$e<br>";
}


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
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageIndex.tpl" );


function createTables( $pdo, $securePath ) {
	$result = $pdo->exec( file_get_contents( $securePath . "/install/tables.sql" ) );
	echo __FILE__. " result=<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre><br/>";

	$installPath = $securePath . "/install";

	//
	if ( $result ) {
		$tablesJsonListPath = $installPath . "/tables.json";
		$tables = json_decode( file_get_contents($tablesJsonListPath ) );
		echo __FILE__. " tables=<pre>" . json_encode($tables, JSON_PRETTY_PRINT) . "</pre><br/>";
		
		if ( $tables ) {
			
			// Save in global config
			foreach ( $tables as $key => $table){
				$sqlFilePath = $installPath . "/" . $key.".sql";
				//echo __FILE__. " key=$key, sqlFilePath=$sqlFilePath, table=<pre>" . json_encode($table, JSON_PRETTY_PRINT) . "</pre><br/>";

				$result = $pdo->exec( file_get_contents( $sqlFilePath ) );
				echo __FILE__. " result=<pre>" . json_encode($result, JSON_PRETTY_PRINT) . "</pre><br/>";

				if ( !$result) return [1,1,"ERROR installing table $key," . json_encode($pdo->errorInfo()[2] ) ];
			}
			return [0,0,null];
		}
	}
	
	return $pdo->errorInfo();
}

